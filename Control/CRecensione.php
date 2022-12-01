<?php

/**
 * La classe CRecensione permette la scrittura o cancellazione di recensioni riguardo
 * un annuncio da parte dell'utente che ha acquistato il prodotto
 * @author Gruppo7
 * @package Control
 */
class CRecensione
{


    static function showRecensioni($id=null)
    {
        $view = new VRecensione();
        $session = USingleton::getInstance('USession');
        $pm = USingleton::getInstance('FPersistentManager');
        if($id == null){
            $utente = unserialize($session->readValue('utente'));
        } else {
            $utente = $pm::load('FUtente', array(['idUser', '=', $id]));
        }
        if (CUtente::isLogged() || $id != null) {
            $recensione =$pm::load('FRecensione', array(['idRecensito','=',$utente->getIdUser()]));
            if(!is_array($recensione)) $recensione=array($recensione);
        }

        if ($recensione != null) {
            if (is_array($recensione)) {
                for ($i = 0; $i < sizeof($recensione); $i++) {
                    $autori[$i] = $pm::load('FUtente', array(['idUser', '=', $recensione[$i]->getAutore()]));
                    $foto[$i] = $pm::load('FFotoUtente', array(['idFoto', '=', $autori[$i]->getIdFoto()]));
                }
            } else {
                $autori= $pm::load('FUtente', array(['idUser', '=', $recensione->getAutore()]));
                $foto = $pm::load('FFotoUtente', array(['idFoto', '=', $autori->getIdFoto()]));
            }
            if (!isset($foto)) $foto=null;
            $view->paginaRecensione($autori,$foto,$recensione,$utente);
        }
        else {
            if (!isset($foto)) $foto=null;
            $view->paginaRecensione($autori,$foto,$recensione,$utente);
            }
        }


    /**
     * Funzione invocata quando un utente scrive una recensione su un oggetto acquistato
     * @param $id
     * @return void
     */
    public static function scriviRecensione($id) {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        if (CUtente::isLogged()) {
            $utente = unserialize($session->readValue("utente"));
            $idAnnuncio = unserialize($session->readValue('idUser'));
            $recensione = $pm::load("FUtente", array(['idUser', '=', $idAnnuncio])); //prende l'utente dell'annuncio

            if ($utente != null && $utente->getIdUser() == $recensione->getIdCompratore()) {

                $commento = VRecensione::getCommento();
                $valutazione = VRecensione::getValutazione();
                $idAnnuncio = $recensione->getIdAnnuncio();
                date_default_timezone_set('Europe/Rome');
                $dataPubblicazione = (string)date("d-m-Y h:m:s");
                $autore = $utente->getIdUser();

                $recensione = new ERecensione($commento, $valutazione, $idAnnuncio, $dataPubblicazione, $autore);
                $pm->store($recensione);

                $session->destroyValue('id_annuncio');
                setcookie('id_annuncio', '');

                header('Location: /localmp/Utente/profilo');
            }
        }
        else {
            header('Location: /localmp/Utente/profilo');
        }
    }

    /**
     * Funzione invocata quando un utente decide di cancellare la propria recensione
     * @param $id
     * @return void
     */
    static function cancellaRecensione($id) {
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        $utente = unserialize($session->readValue("utente"));
        if ($utente != null) {
            $recensione = $pm::load("FRecensione", array(['idRecensione','=',$id]));
            if ($recensione != null && $recensione->getAutore() == $utente->getIdUser()) {
                $pm::delete('idRecensione', $id, "FRecensione");
                header("Location: /localmp/Utente/{$utente->getIdUser()}");
            }
            else {
                header("Location: /localmp/Utente/profilo");
            }
        }
        else {
            header("Location: /localmp/Utente/profilo");
        }
    }
}