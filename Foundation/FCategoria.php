<?php

class FCategoria extends FDatabase
{
    private static $table = "categoria";
    private static $class = "FCategoria";
    private static $values = "(:categoria, :id)";

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

    public static function bind($stmt, ECategoria $categoria) {
        $stmt->bindValue(":categoria", $categoria->getCategoria(), PDO::PARAM_STR);
        $stmt->bindValue(":id", $categoria->getIdCate(), PDO::PARAM_INT);
    }

    public static function store($categoria) {
        $db = parent::getInstance();
        $id = $db->storeDB(self::getClass(), $categoria);
        if ($id)
            return $id;
        else
            return null;
    }

    public static function update($field, $newvalue, $pk, $val) {
        $db = parent::getInstance();
        $id = $db->updateDB(self::getClass(), $field, $newvalue, $pk, $val);
        if ($id)
            return $id;
        else
            return null;
    }

    public static function delete($field, $id) {
        $db = parent::getInstance();
        $id = $db->deleteDB(self::getClass(), $field, $id);
        if ($id)
            return $id;
        else
            return null;
    }

    public static function exist($field, $id) {
        $db = parent::getInstance();
        $id = $db->existDB(self::getClass(), $field, $id);
        if ($id)
            return $id;
        else
            return null;
    }

    public static function search($field, $id) {
        $db = parent::getInstance();
        $id = $db->searchDB(self::getClass(), $field, $id);
        if ($id)
            return $id;
        else
            return null;
    }

    // manca loadbyidfield
}