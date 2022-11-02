<?php

/**
 * La classe CRecensione permette la scrittura o cancellazione di recensioni riguardo
 * un annuncio da parte dell'utente che ha acquistato il prodotto
 * @package Control
 */
class CRecensione
{

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
            $idAnnuncio = unserialize($session->readValue('id_annuncio'));
            $annuncio = $pm::load("FAnnuncio", array(['idAnnuncio', '=', $idAnnuncio]));

            if ($utente != null && $utente->getIdUser() == $annuncio->getIdCompratore()) {

                $commento = VRecensione::getCommento();
                $valutazione = VRecensione::getValutazione();
                $idAnnuncio = $annuncio->getIdAnnuncio();
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