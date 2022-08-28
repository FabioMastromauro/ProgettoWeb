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
    private static $values = '(:idUser,:nome, :cognome, :username, :password, :email, :annunci, :recensioni, :storico, :idUser,:fotoUtente)';

    public function __construct(){}


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
        $stmt->bindValue(':annunci', $user->getAnnunci(), PDO::PARAM_STR);
        $stmt->bindValue(':recensioni', $user->getRecensioni(), PDO::PARAM_STR);
        $stmt->bindValue(':storico', $user->getStorico(), PDO::PARAM_STR);
        $stmt->bindValue(':fotoUtente', $user->getFotoUtente(), PDO::PARAM_LOB);


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
        return self::$class;
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
        $id = $db->storeDb(self::$class, $utente);
        $utente->setidUser($id);
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
           return $utente = self::loadByField(array('email = '. "'". $result['email'] . "'"));
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
    public static function loadByField($parametri = array(),$attr = array(),$ordinamento = '',$limite = ''){
        $utente = null;
        $db = parent::getInstance();
        $result = $db->searchDB(static::getClass(),$parametri,$attr, $ordinamento,$limite);
        if(count($parametri)>0){
             $rows_number = $db->getRowNum(static::getClass(), $parametri,$attr,$ordinamento,$limite);
        } else{
            $rows_number = $db->getRowNum(static::getClass());
        }
        if(($result != null) && ($rows_number == 1)){
            $utente = new EUtente($result['nome'],$result['cognome'],$result['username'],$result['password'], $result['email'], $result['annunci'], $result['recensioni'], $result['storico'], $result['fotoUtente'];
        }
        else{
            if(($result != null) && ($rows_number > 1)){
                $utente = array();
                for($i = 0; $i < count($result) ;$i++){
                    $utente[] = new EUtente($result[$i]['nome'],$result[$i]['cognome'],$result[$i]['username'],$result[$i]['password'],$result[$i]['email'], $result[$i]['annunci'], $result[$i]['recensioni'], $result[$i]['storico'],$result[$i]['fotoUtente']);
                }
            }
        }
        return $utente;
    }
}







