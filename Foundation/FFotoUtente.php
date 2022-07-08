<?php

class FFotoUtente extends FDatabase
{
    private static $table = "fotoUtente";
    private static $class = "FFotoUtente";
    private static $values = "(:idFoto, :nomeFoto, :altezza, :larghezza, :tipo, :data, :idUser)";

    public function __construct() {}

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

    public function store(ECategoria $fotoUtente, $nome_file){
       $db = parent::getInstance();
        $db->storeMediaDB(static::getClass(), $fotoUtente, $nome_file);
    }

    public static function exist($field, $id) {
        $db = parent::getInstance();
        $result = $db->existDB(static::getClass(), $field, $id);
        if ($result != null)
            return true;
        else
            return false;
    }

    /**
     * Metodo che permette la cancellazione del media di un utente in base all id(del media)
     * @param int $id del media (dell utente)
     * @return bool
     */
    public function delete($field, $id){
        $db = parent::getInstance();
        $db->deleteDB(static::getClass(), $field, $id);
    }

    /**
     * Metodo che effettua il bind degli attributi di
     * EFotoUtente, con i valori contenuti nella tabella foto
     * @param $stmt
     * @param $fotoUtente immagine da salvare
     * @param $nome_file
     */
    public static function bind($stmt, ECategoria $fotoUtente, $nome_file){
        $path = $_FILES[$nome_file]['tmp_name'];
        $file = fopen($path, 'r') or die ("Attenzione! Impossibile da aprire!");
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':nomeFoto', $fotoUtente->getNomeFoto(), PDO::PARAM_STR);
        $stmt->bindValue(':altezza', $fotoUtente->getAltezza(), PDO::PARAM_INT);
        $stmt->bindValue(':larghezza', $fotoUtente->getLarghezza(), PDO::PARAM_INT);
        $stmt->bindValue(':tipo', $fotoUtente->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(':data', fread($file, filesize($path)), PDO::PARAM_LOB);
        $stmt->bindValue(':idUser', $fotoUtente->getIdUser(), PDO::PARAM_INT);

    }

    public static function loadByField($parametri = array(), string $ordinamento, string $limite) {
        $foto = null;
        $db = parent::getInstance();
        $result = $db->searchDB(static::getClass(), $parametri, $ordinamento, $limite);
        $rows_number = $db->getRowNum(static::getClass(), $parametri, $ordinamento, $limite);
        if (($result != null) && ($rows_number = 1)) {
            $foto = new EFotoUtente($result['idFoto'], $result['nomeFoto'], $result['altezza'], $result['larghezza'], $result['tipo'], $result['data'], $result['idUser']);
        }
        else {
            if (($result != null) && ($rows_number > 1)) {
                $foto = array();
                for ($i = 0; $i < count($result); $i++) {
                    $foto[] = new EFotoUtente($result[$i]['idFoto'], $result[$i]['nomeFoto'], $result[$i]['altezza'], $result[$i]['larghezza'], $result[$i]['tipo'], $result[$i]['data'], $result[$i]['idUser']);
                }
            }
        }
        return $foto;
    }




}