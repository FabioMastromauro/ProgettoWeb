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
            $pm = USingleton::getInstance('FPersistentManager');
            $list = $pm::load('FUtente');
            $immagine = $pm::load('FFoto', array('id'), array($utente->getIdImmagine()), 'id', 1);
            $view->homeAdmin($utente, $list, $immagine);
        } else {
            header('Location: /localmp/'); // da definire!
        }
    }
    static function profiloUtente($id) {
        $view = new VAdmin();
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getAdmin() == 1) {
            $utente = $pm::load('Futente', array(['id', '=', $id]));
            $immagine = $pm::load('FImmagine', array(['id', '=', $$id]));
            $view->profiloUtente($utente, $immagine);
        } else {
            header('Location: /localmp/');
        }
    }

    static function bannaUtente($id) {
        $view = new VAdmin();
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getAdmin() == 1) {
            $pm = USingleton::getInstance('FPersistentManager');
            $date = $view->getDate();
            date_default_timezone_set('Europe/Rome');
            $timezone = date_default_timezone_get();
            if (strtotime($date) > strtotime($timezone)) {
                $pm::update('data_fine_bar', $date, 'id', $id, 'FUtente');
                $pm::update('ban', 1, 'id', $id, 'FUtente');
                header('Location: /localmp/Admin/profiloUtente/$id');
            } else {

                header('Location: /localmp/Admin/profiloUtente/$id');
            }
        }
        else {
            header('Location: /localmp/');
        }
    }
}