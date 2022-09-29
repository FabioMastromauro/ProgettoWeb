<?php

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
        $utente = unserialize($session->readValue("utente"));
        $annuncio = $pm::load("FAnnuncio", array('idAnnuncio'), array($id));

        if ($utente != null && $utente->getIdUser() == $annuncio->getIdCompratore()) {

            $commento = VRecensione::getCommento();
            $valutazione = VRecensione::getValutazione();
            $idAnnuncio = $annuncio->getIdAnnuncio();
            date_default_timezone_set('Europe/Rome');
            $dataPubblicazione = (string) date("d-m-Y h:m:s");
            $autore = $utente->getIdUser();

            $recensione = new ERecensione($commento, $valutazione, $idAnnuncio, $dataPubblicazione, $autore);
            $pm->store($recensione);

            header('Location: /localmp/Utente/profilo');
        }
        else {
            header('Location: /localmp/Utente/profilo');
        }
    }

    static function cancellaRecensione($id) {

    }
}