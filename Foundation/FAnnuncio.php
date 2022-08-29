<?php

class FAnnuncio extends FDatabase{

    private static $table = 'annuncio';
    private static $class = 'FAnnuncio';
    private static $values = '(:titolo, :descrizione, :prezzo, idFoto, :data, :idAnnuncio, :idVenditore, :idCompratore, :categoria)';

public function __construct(){}

    /**
     * @return string
     */
    public static function getTable(): string
    {
        return self::$table;
    }

    /**
     * @return string
     */
    public static function getClass(): string
    {
        return self::$class;
    }

    /**
     * @return string
     */
    public static function getValues(): string
    {
        return self::$values;
    }

    public static function bind($stmt, EAnnuncio $annuncio)
    {
        $stmt->bindValue(':titolo', $annuncio->getTitolo(), PDO::PARAM_STR);
        $stmt->bindValue(':descrizione', $annuncio->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue(':prezzo', $annuncio->getPrezzo(), PDO::PARAM_INT);
        $stmt->bindValue(':idFoto', $annuncio->getIdFoto(), PDO::PARAM_INT);
        $stmt->bindValue(':data', $annuncio->getData()->format('Y-m-d H:i:s') , PDO::PARAM_STR);
        $stmt->bindValue(':idAnnuncio', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':idVenditore', $annuncio->getIdVenditore(), PDO::PARAM_INT);
        $stmt->bindValue(':idCompratore', $annuncio->getIdCompratore(), PDO::PARAM_INT);
        $stmt->bindValue(':categoria', $annuncio->getCategoria(), PDO::PARAM_STR);
    }
    /** Metodo che salva una recensione nel DB */
    public static function store($object){
        $db = parent::getInstance();
        $id = $db->storeDB(self::$class, $object);
        $object->setIdAnnuncio($id);
    }

    public static function loadByField($parametri = array(), $ordinamento = '', $limite = ''){
        $annuncio = null;
        $db = parent::getInstance();
        $result = $db->searchDB(static::getClass(), $parametri, $ordinamento, $limite);
        if (sizeof($parametri) > 0) {
            $rows_number = $db->getRowNum(static::getClass(), $parametri);
        } else {
            $rows_number = $db->getRowNum(static::getClass());
        }
        if(($result != null) && ($rows_number == 1)) {
            $annuncio = new EAnnuncio($result['titolo'], $result['descrizione'], $result['prezzo'], $result['idFoto'], $result['data'],
            $result['idAnnuncio'], $result['idVenditore'], $result['idCompratore'], $result['categoria']);
            $annuncio->setIdAnnuncio($result['id']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $annuncio = array();
                for($i = 0; $i < count($result); $i++){
                    $annuncio = new EAnnuncio($result['titolo'], $result['descrizione'], $result['prezzo'], $result['idFoto'], $result['data'],
                        $result['idAnnuncio'], $result['idVenditore'], $result['idCompratore'], $result['categoria']);
                    $annuncio[$i]->setIdAnnuncio($result[$i]['id']);
                }
            }
        }
        return $annuncio;
    }
    /** Metodo che aggiorna un determinato campo di un annuncio nel DB */
    public static function update($field, $newvalue, $pk, $val){
        $db = parent::getInstance();
        $result = $db->updateDB(self::getClass(), $field, $newvalue, $pk, $val);
        if ($result) return true;
        else return false;
    }
    /** Metodo che elimina un annuncio dato il suo id */
    public static function delete($field, $id){
        $db = parent::getInstance();
        $result = $db->deleteDB(self::getClass(), $field, $id);;
        if ($result) return true;
        else return false;
    }

    /** Metodo che verifica se esiste un determinato annuncio dati il campo e l'id */
    public static function exist($field, $id){
        $db = parent::getInstance();
        $result = $db->existDB(self::getClass(), $field, $id);
        if ($result != null) return true;
        else return false;
    }

    /** Metodo che cerca un determinato annuncio nel DB */
    public static function search($parametri=array(), $ordinamento='', $limite=''){
        $db = parent::getInstance();
        $result = $db->searchDB(self::$class, $parametri, $ordinamento, $limite);
        return $result;
    }

    public static function getRows($parametri = array(), $ordinamento = '', $limite = ''){
        $db = parent::getInstance();
        $result = $db->getRowNum(self::$class, $parametri, $ordinamento, $limite);
        return $result;
    }








}