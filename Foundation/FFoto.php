<?php

class FFoto extends FDatabase
{
    private static $table = "foto";
    private static $class = "FFoto";
    private static $values = "(:idFoto, :nomeFoto, :altezza, :larghezza, :tipo, :data)";

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

    public static function bind($stmt, EFoto $foto, $nome_file) {
        $path = $_FILES[$nome_file]['tmp_name'];
        $file = fopen($path, "r") or die ("Attenzione! Impossibile da aprire");
        $stmt->bindValue(':id', $foto->getIdFoto(), PDO::PARAM_INT);
        $stmt->bindValue(':nomeFoto', $foto->getNomeFoto(), PDO::PARAM_STR);
        $stmt->bindValue(':altezza', $foto->getAltezza(), PDO::PARAM_INT);
        $stmt->bindValue(':larghezza', $foto->getLarghezza(), PDO::PARAM_INT);
        $stmt->bindValue(':tipo', $foto->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(':data', fread($file, filesize($path)), PDO::PARAM_LOB);
        unset($file);
        unlink($path);
    }


}