<?php

class FPersistentManager
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
        $Fclass::storeMedia($obj, $nome_file);
    }

    /* Metodo che permette di caricare il valore di un campo come parametro */
    public static function load($Fclass, $parametri = array(), $ordinamento = '', $limite = '') {
        $ris = $Fclass::loadByField($parametri = array(), $ordinamento = '', $limite = '');
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

    /* Metodo che permette la ricerca per categoria */
    public static function filterByCategoria($class, $categoria) {
        if ($class == "FAnnuncio") {
            $ris = $class::filterByCategoria($categoria);
        }
        return $ris;
    }

    /* Metodo che permette la ricerca secondo determinati parametri */
    public static function search($Fclass, $parametri = array(), string $ordinamento, string $limite) {
        $ris = $Fclass::search($parametri, $ordinamento, $limite);
        return $ris;
    }

    /* Metodo che restituisce il numero di righe in cui è contenuta la ricerca */
    public static function getRows($class, $parametri = array(), string $ordinamento, string $limite) {
        $ris = $class::getRows($parametri, $ordinamento, $limite);
        return $ris;
    }

    public static function loadDefCol($class, $columns = array(), $order = '', $limite = '') {
        $ris = $class::loadDefCol($columns, $order, $limite);
        return $ris;
    }


}