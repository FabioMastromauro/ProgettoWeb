<?php

/**
 * La classe CAdmin permette all'admin di effettuare delle operazioni di ban/riattivazione
 * su utenti e annunci
 * @package Control
 */
class CAdmin
{
    /**
     * Metodo che mostra la schermata con tutti gli utenti all'admin
     * @return void
     */
    static function homeAdmin() {
        $view = new VAdmin();
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if ($utente != null && $utente->getadmin() == 1) {
            $pm = USingleton::getInstance('FPersistentManager');
            $list = $pm::load('FUtente');
            $immagine = $pm::load('FFotoUtente',  array(['idFoto', '=', $utente->getidFoto()]));
            $view->homeAdmin($utente, $list, $immagine);
        } else {
            header('Location: /localmp/');
        }
    }

    /**
     * Metodo che visualizza il profilo di un utente strutturato per l'admin
     * @param $id
     * @return void
     */
    static function profiloUtente($id) {
        $view = new VAdmin();
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getAdmin() == 1) {
            $utente = $pm::load('FUtente', array('idUser'), array($id));
            $immagine = $pm::load('FFotoUtente',  array(['idFoto', '=', $utente->getidFoto()]));
            $view->profiloUtente($utente, $immagine);
        } else {
            header('Location: /localmp/');
        }
    }

    /**
     * Metodo che permette il ban di un untente da parte dell'admin
     * @param $id
     * @return void
     */
    static function bannaUtente($id) {
        $view = new VAdmin();
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getAdmin() == 1) {
            $pm = USingleton::getInstance('FPersistentManager');
            $date = $view->getDate();
            date_default_timezone_set('Europe/Rome');
            $timezone = date_default_timezone_get();
            try {
                if (strtotime($date) > strtotime($timezone)) {
                    $pm::update('dataFineBar', $date, 'idUser', $id, 'FUtente');
                    $pm::update('ban', 1, 'idUser', $id, 'FUtente');
                    header('Location: /localmp/Admin/profiloUtente/$id');
                }
            } catch (Exception $e) {
                echo ('Data antecedente a quella corrente: '. $e->getMessage());
                header('Location: /localmp/Admin/profiloUtente/$id');
            }
        }
        else {
            header('Location: /localmp/');
        }
    }

    /**
     * Metodo che permette la riattivazione di un utente da parte dell'admin
     * @param $id
     * @return void
     */
    static function ripristinaUtente($id) {
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getAdmin() == 1) {
            $pm = USingleton::getInstance('FPersistentManager');
            $pm::update('ban', 0, 'idUser', $id, 'FUtente');
            $pm::update('dataFineBan', null, 'idUser', $id, 'FUtente');
            header('Location: /localmp/Admin/profiloUtente/$id');
        } else {
            header('Location: /localmp/');
        }
    }

    /**
     * Metodo che permette il ban di un annuncio da parte dell'admin
     * @param $id
     * @return void
     */
    static function bannaAnnuncio($id) {
        $view = new VAdmin();
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getAdmin() == 1) {
            $pm = USingleton::getInstance('FPersistentManager');
            // $annuncio = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $id])); è inutile
            $date = $view->getDate();
            date_default_timezone_set('Europe/Rome');
            $timezone = date_default_timezone_get();
            try {
                if (strtotime($date) > strtotime($timezone)) {
                    // $pm::update('dataFineBan', $date, 'idAnnuncio', $id, 'FAnnuncio');
                    $pm::update('ban', 1, 'idAnnuncio', $id, 'FAnnuncio');
                    header('Location: /localmp/Admin/annunci');
                }
            } catch(Exception $e) {
                echo ('Data antecedente a quella corrente: '. $e->getMessage());
                header('Location: /localmp/Admin/annunci');
            }
        }
        else {
            header('Location: /localmp/');
        }
    }

    /**
     * Metodo che permette la riattivazione di un annuncio da parte dell'admin
     * @param $id
     * @return void
     */
    static function ripristinaAnnuncio($id) {
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getAdmin() == 1) {
            $pm = USingleton::getInstance('FPersistentManager');
            $pm::update('ban', 0, 'idAnnuncio', $id, 'FAnnuncio');
            // $pm::update('dataFineBan', null, 'idAnnuncio', $id, 'FAnnuncio');
            header('Location: /localmp/Admin/annunci');
        } else {
            header('Location: /localmp/');
        }
    }
}