<?php

class FVerifica extends FDatabase
{
    /**
     * @var string tabella con cui opera
     */
    private static $table = "verifica";
    /**
     * Classe foundation
     */
    private static $class = "FVerifica";
    /**
     * Valori della tabella
     */
    private static $values = '(:idVerifica, :codice, :tempo, :email)';
    /**
     * Costruttore
     */
    public function __construct(){}



    /**
     * Questo metodo lega gli attributi dell'utente da inserire con i parametri della insert
     * @param PDOStatement $stmt
     * @param EUtente $user Utente in cui i dati devono essere inseriti nel DB
     */
    public static function bind($stmt, EVerifica $verifica)
    {
        $stmt->bindValue(':idVerifica', $verifica->getIdVerifica(), PDO::PARAM_INT);
        $stmt->bindValue(':codice',$verifica->getCodice(), PDO::PARAM_INT);
        $stmt->bindValue(':tempo', $verifica->getTempo(), PDO::PARAM_INT);
        $stmt->bindValue(':email', $verifica->getEmail(), PDO::PARAM_STR);
    }

    /**
     * Questo metodo restituisce il nome della tabella per la costruzione della query
     * @return string $table nome della tabella
     */
    public static function getTable(): string {
        return self::$table;
    }
    /**
     * Questo metodo restituisce il nome della classe per la costruzione della query
     * @return string $class nome della classe
     */
    public static function getClass(): string {
        return self::$class;
    }

    /**
     * Questo metodo restituisce l'insieme dei valori per la costruzione della Query
     */
    public static function getValues() :string {
        return self::$values;
    }

    /**
     * Metodo che permette la store di un utente
     * @param $verifica utente da salvare
     * @return null
     */
    public static function store($verifica){

        $db = parent::getInstance();
        $id = $db->storeDB(self::$class, $verifica);
        $verifica->setIiVerifica($id);
    }

    /**
     * Metodo che permette la delete sul DB in base all'id
     * @param $field campo da considerare quando viene passat l'id
     * @param $id id dell'oggetto da eliminare dal DB
     * @return true|false
     */
    public static function delete($field,$id){
        $db = parent::getInstance();
        $result = $db->deleteDB(self::getClass(),$field,$id);
        if($result != null) return true;
        else return false;
    }
    /**
     * Metodo che cerca un determinato oggetto nel DB
     * @param array $parametri
     * @param string $ordinamento
     * @param string $limite
     * @return mixed
     */
    public static function search($parametri=array(),$ordinamento='',$limite=''){
        $db = parent::getInstance();
        $result = $db->searchDB(self::$class,$parametri,$ordinamento,$limite);
        return $result;
    }


    public static function exist($field,$id){
        $db = parent::getInstance();
        $result = $db->existDB(self::getClass(),$field,$id);
        if ($result != null) return true;
        else return false;
    }
    /**
     * Metodo che prende determinate righe dal DB
     * @param array $parametri
     * @param string $ordinamento
     * @param string $limite
     * @return mixed
     */
    public static function getRows($parametri = array(),$ordinamento = '',$limite = ''){
        $db = parent::getInstance();
        $result = $db->getRowNum(self::$class,$parametri,$ordinamento,$limite);
        return $result;
    }

    /**
     * Metodo che permette la load di uno o più utenti da DB
     * @param array $parametri
     * @param string $ordinamento
     * @param string $limite
     * @return object $verifica -> utenti risultanti dalla query
     */
    public static function loadByField($parametri = array(), $ordinamento = '', $limite = ''){
        $verifica = null;
        $db = parent::getInstance();
        $result = $db->searchDB(static::getClass(),$parametri, $ordinamento,$limite);
        if(count($parametri)>0){
            $rows_number = $db->getRowNum(static::getClass(), $parametri,$ordinamento,$limite);
        } else{
            $rows_number = $db->getRowNum(static::getClass());
        }
        if(($result != null) && ($rows_number == 1)){
            $verifica = new EVerifica($result['idVerifica'],$result['codice'], $result['tempo'], $result['email']);
        }
        else{
            if(($result != null) && ($rows_number > 1)){
                $verifica = array();
                for($i = 0; $i < count($result) ;$i++){
                    $verifica[] = new EVerifica($result[$i]['idVerifica'],$result[$i]['codice'], $result[$i]['tempo'], $result[$i]['email']);

                }
            }
        }

        return $verifica;
    }


}