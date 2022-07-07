<?php
/** La classe FUtente fornisce query per gli oggetti EUtente
 * @author Gruppo 7
 * @package Foundation
 */
class FUtente extends FDatabase
{
    /** @var string tabella con cui opera */
    private static $table = "utente";
    /** classe foundation  */
    private static $class = "FUtente";
    /** valori della tabella */
    private static $values = '(:nome, :cognome, :username, :password, :email, :annunci, :recensioni, :storico, :idUser)';
    public function __construct()
    {
        parent::__construct(); //richiama il costruttore di FDatabase
        $this->table = 'utente';
        $this->valori = '(:$nome, :$cognome, :$username, :$password, :$email)';
        $this->class = 'FUtente';
    }

/** Questo metodo lega gli attributi dell'Utente da inserire con i parametri della INSERT
 *@param PDOStatement $stmt
 *@param EUtente $user Utente in cui i dati devono essere inseriti nel DB
 */
    public static function bind($stmt, EUtente $user)
    {
        $stmt->bindValue(':idUser', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':nome', $user->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':cognome', $user->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':username', $user->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
    }
    /** Questo metodo restituisce il nome della tabella per la costruzione della Query
     *@return string $table nome della tabella
     */
    public static function getTable(): string {
        return self::$table;
    }
    /** Questo metodo restituisce il nome della classe per la costruzione della Query
     *@return string $class nome della classe
     */
    public static function getClass(): string {
        return self::$table;
    }
    /** Questo metodo restituisce l'insieme dei valori per la costruzione della Query */
    public static function getValues() :string {
        return self::$values;
    }
    /** Metodo che permette la store di un utente
     *@param $utente utente da salvare
     */
    public static function store($utente){
        $db = parent::getInstance();
        $id = $db->insertDb(self::$class, $utente);
        $utente->setId($id);
    }
    /** Metodo che può aggiornare i campi di un utente
     * @param $val valore della primary key da usare come riferimento per la riga
     * @param $newValue nuovo valore da assegnare
     * @param $field campo in cui si vuole modificare il valore
     * @param $pk
     * @return true se esiste il mezzo, altrimenti false
     */
    public static function update($field, $newValue, $pk, $val){
        $db = parent::getInstance();
        $result = $db->updateDB(self::getClass(),$field,$newValue,$pk,$val);
        if($result) return true;
        else return false;
    }
    /** Metodo che permette la delete sul db in base all'id
     *@param $id id dell'oggetto da eliminare dal db
     */
    public static function delete($field,$id){
        $db = parent::getInstance();
        $result = $db->deleteDB(self::getClass(),$field,$id);
        if($result != null) return true;
        else return false;
    }
    /** Metodo che permette di verificare se esiste un utente nel DB
     *@param $id valore della riga di cui si vuole verificare l'esistenza
     *@param $field colonna su cui eseguire la verifica
     */
    public static function exist($field,$id){
        $db = parent::getInstance();
        $result = $db->existDB(self::getClass(),$field,$id);
        if ($result != null) return true;
        else return false;
    }
    /** Metodo che cerca un determinato oggetto nel DB */
    public static function search($parametri=array(),$ordinamento='',$limite=''){
        $db = parent::getInstance();
        $result = $db->searchDB(self::$class,$parametri,$ordinamento,$limite);
        return $result;
    }
    /** Metodo che permette il caricamento del login di un utente, passati la sua email e password
     *@param email dell'utente
     * @param pass password dell'utente
     */
    public static function loadLogin($user,$pass){
        $utente = null;
        $db = FDatabase::getInstance();
        $result = $db->checkIfLogged($user,$pass);
        if(isset($result)){
            $utente = self::loadByField(array(['email', '=', $result['email']]));
        }
    }
    /** Metodo che prende determinate righe dal DB */
    public static function getRows($parametri = array(),$ordinamento = '',$limite = ''){
        $db = parent::getInstance();
        $result = $db->getRowNum(self::$class,$parametri,$ordinamento,$limite);
        return $result;
    }
    /** Metodo che permette la load su db
     * @return object $utente utente loggato
     */
    public static function loadByField($parametri = array(),$ordinamento = '',$limite = ''){
        $utente = null;
        $db = parent::getInstance();
        $result = $db->searchDb(static::getClass(),$parametri,$ordinamento,$limite);
        if(count($parametri)>0){
            $rows_number = $db->getRowNum(static::getClass(), $parametri);
        } else{
            $rows_number = $db->getRowNum(static::getClass());
        }
        if(($result != null) && ($rows_number > 1)){
            $utente = new EUtente($result['nome'],$result['cognome'],$result['username'],$result['password'],['email'],$result['idUser']); // idFoto
        }
        else{
            if(($result != null) && ($rows_number > 1)){
                $utente = array();
                for($i = 0; count($result);$i++){
                    $utente[] = new EUtente($result['nome'],$result['cognome'],$result['username'],$result['password'],['email'],$result['idUser'];)
                }
            }
        }
        return $utente;
    }







// metodo che crea un oggetto EUtente a partire dalla tupla della tabella utente
    public function getFromRow($row)
    {
        $ut = new EUtente($row['nome'], $row['cognome'], $row['username'], $row['password'], $row['email']);
        $ut->setIdUser($row['idUser']);
        $ut->setRecensioni($row['recensioni']);
        $ut->setAnnunci(['annunci']);
        $ut->setStorico(['storico']);
        $ut->setFotoUtente(['fotoUtente']);
        return $ut;
    }
// metodo che costruisce una row completa per "utente" così da poterla passare
// direttamente al metodo getFromRow
    private function buildRow($row)
    {
        //caricamento recensioni dell'utente
        $frece = new FRecensione();
        $arrayrece = $frece->loadByIdUser($row['idUser']);
        $row['recensioni'] = $arrayrece;

        //caricamento annunci dell'utente
        $fann = new FAnnuncio();
        $arrayann = $fann->loadByIdUser($row['idUser']);
        $row['annunci'] = $arrayann;

        //caricamento foto dell'utente


        // da completare con preferiti
        return $row;
    }

//Metodo che esegue la load dell'utente in base all'id
    public function loadById($idutente)
    {
        $row = parent::loadById($idutente);
        if (($row != null) && (count($row) > 0)) {
            $rowAss = $row[0];
            $rowCompl = $this->buildRow($rowAss);
            $ut = $this->getFromRow($rowCompl);
            return $ut;
        } else {
            return null;
        }
    }

//Metodo load di oggetti EUtente dal db dato un gruppo di id
    public function loadAllByIds($idsut)
    {
        $utrows = parent::loadAllByIds($idsut);// TODO: Change the autogenerated stub
        if (($utrows != null) && (count($utrows) > 0)) {
            $arrayUt = array();
            foreach ($utrows as $rowAss) {
                $rowCompl = $this->buildRow($rowAss);
                $utente = $this->getFromRow($rowCompl);
                array_push($arrayUt, $utente);
            }
            return $arrayUt;
        } else return null;
    }

// Metodo che verifica se un utente è presente nel db
    public function existUtente($username, $password)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE username= '" . $username . "' AND password='" . $password . "';";
        try {
            $this->connection->beginTransaction();
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->connection->commit();
            if (($row != null) && (count($row) > 0)) {
                $rowass = $row[0];
                $id = $rowass['idUser'];
                return $id;
            } else return false;
        } catch (PDOException $e) {
            $this->localmp->rollback();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }
    }

// metodo che restituisce gli utenti che contengono una determinata stringa in uno degli attributi
    public function search($attributo, $valore)
    {
        $utrows = parent::search($attributo, $valore); // TODO: Change the autogenerated stub
        if (($utrows != null) && (count($utrows) > 0)) {
            $arrayUt = array();
            foreach ($utrows as $rowAss) {
                $rowCompl = $this->buildRow($rowAss);
                $utente = $this->getFromRow($rowCompl);
                array_push($arrayUt, $utente);
            }
            return $arrayUt;
        } else return null;
    }

// metodo per verificare se è presente un utente con un certo username
    public function existUsername($username)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE username= '" . $username . "';";
        try {
            $this->localmp->beginTransaction();
            $stmt = $this->localmp->prepare($query);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->localmp->commit();
            if (($row != null) && (count($row) > 0)) {
                return true;
            } else return false;
        } catch (PDOException $e) {
            $this->localmp->rollback();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }
    }
// metodo che conta gli utenti registrati
    public function contaUtentiRegistrati()
    {
        $query = "SELECT COUNT(idUser) AS n FROM " . $this->table . ";";
        try {
            $this->localmp->beginTransaction();
            $stmt = $this->localmp->prepare($query);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->localmp->commit();
            return $row[0]['n'];


        } catch (PDOException $e) {
            $this->localmp->rollBack();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }
    }



    public function utentiByString ($array, $toSearch)
    {
        if ($toSearch == 'nome')
            $query = "SELECT * FROM utente where name = '" . $array[0] . "' OR surname = '" . $array[0] . "';";
        else
            $query = "SELECT * FROM utente where name = '" . $array[0] . "' AND surname = '" . $array[1] . "' OR name = '" . $array[1] . "' AND surname = '" . $array[0] . "';";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();
        if ($num == 0)
            $result = null;
        elseif ($num == 1)
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        else {
            $result = array();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch())
                $result[] = $row;
        }
        return array($result, $num);
    }


    public static function loadUtentiByString($string){
        $utente = null;
        $toSearch = null;
        $pieces = explode(" ", $string);
        $lastElement = end($pieces);
        if ($pieces[0] == $lastElement) {
            $toSearch = 'nome';
        }
        list ($result, $rows_number)=utentiByString($pieces, $toSearch);
        if(($result!=null) && ($rows_number == 1)) {
            $utente=new EUtente($result['name'],$result['surname'], $result['email'], $result['password']);
        }
        else {
            if(($result!=null) && ($rows_number > 1)){
                $utente = array();
                for($i=0; $i<count($result); $i++){
                    $utente[]=new EUtente($result[$i]['name'],$result[$i]['surname'], $result[$i]['email'], $result[$i]['password']);
                }
            }
        }
        return $utente;

    }

}



