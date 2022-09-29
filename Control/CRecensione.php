<?php

class CRecensione
{

    public static function scriviRecensione($id) {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue("utente"));
        $annuncio = $pm::load("FAnnuncio", array('idAnnuncio'), array($id));

        if ($utente != null && $utente->getIdUser() == $annuncio->getIdCompratore()) {
            $view = new VRecensione();
            $value = $view->getFormRecensione();

            $commento = $value[0];
            $valutazione = $value[1];
            $idAnnuncio = $annuncio->getIdAnnuncio();
            date_default_timezone_set('Europe/Rome');
            $dataPubblicazione = (string) date("d-m-Y h:m:s");
            $autore = $utente->getIdUser();

            $recensione = new ERecensione($commento, $valutazione, $idAnnuncio, $dataPubblicazione, $autore);

        }
    }
}