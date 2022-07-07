<?php

class FPersistantManager
{

    /* Metodo che permette di salvare un oggetto sul db */
    public static function store($obj) {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $Fclass::store($obj);
    }

    /* Metodo che permette di salvare una foto sul db */
    public static function storeMedia($obj, $nome_file) {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $Fclass::store($obj, $nome_file);
    }

    /* Metodo che permette di caricare il valore di un campo come parametro */
    public static function load($field, $val, $Fclass) {
        $ris = $Fclass::loadByField($field, $val);
        return $ris;
    }

    /* Metodo che permette il login di un utente fornite le credenziali */
    public static function loadLogin($user, $pass) {
        $ris = FUtente::loadLogin($user, $pass);
        return $ris;
    }

    /* Metodo che permette di cancellare il valore di un campo passato come parametro */
    public static function delete($field, $val, $Fclass) {
        $Fclass::delete($field, $val);
    }

    /* Metodo che verifica l'esistenza di un valore di un campo passato come parametro */
    public static function exist($field, $val, $Fclass) {
        $ris = $Fclass::exist($field, $val);
        return $ris;
    }

    /* Metodo che permette l'aggiornamento di un campo passato come parametro */
    public static function update($field, $newvalue, $pk, $val, $Fclass) {
        $ris = $Fclass::update($field, $newvalue, $pk,$val, $Fclass);
        return $ris;
    }



}