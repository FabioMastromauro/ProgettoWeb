<?php

class CAdmin
{
    //verifica l'admin e visualizza la sua home page
    static function homepage()
    {
        $view = new VAdmin();
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if ($utente != null && $utente->getadmin() == 1) {
        $pm = USingleton::getInstance('FPersistantManager');
        $list = $pm::load('FUtente');
        $immagine = $pm::load('FFoto', array('id'),array($utente->getIdImmagine()),'id',1);
        $view->homepage($utente, $list, $immagine);
    } else {
        header(); // da definire!
    }


    }
}