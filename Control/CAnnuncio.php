<?php

class CAnnuncio
{

    static function esplora($id=null){
        $view = new VAnnunci();
        $pm = USingleton::getInstance('FPersistantManager');

        if ($id != null){
            $annunci = $pm::load('FAnnuncio',array('id'),array($id),'id',1);
            $array = self::homeAnnunci($annunci); //da creare
            $view->showAnnunci($annunci, $array);
        } else {
            $annunci = $pm::load('FAnnuncio',array('id'),array($id),'id',1);
            $array = self::homeAnnunci($annunci);
            $view->showAnnunci($annunci, $array);
        }
    }

    static function esploraAnnunci($cerca = null, $index = null) {

        $ricettePagina = 12;

     /* if ($cerca == null && isset($_COOKIE['searchOn'])) {
            if ($_COOKIE['searchOn'] == 1) self::searchOff();
        }

        if ($index == null) {
            $newIndex = 1;
        }
        else {
            $newIndex = $index;
        }           bisogna capire a che serve */

        $pm = USingleton::getInstance('FPersistentManager');
        if (isset($_COOKIE['annuncioRicerca'])) {
            $data = unserialize($_COOKIE['annuncioRicerca']);
        }

        if (!isset($_COOKIE['annuncioRicerca']) || !is_array($data)) {
            $numRicette = $pm::getRows('FAnnuncio');
        }
        elseif($data[0] == 'noCategoria' || $data[0] == 'noRicerca') {
            $numRicette = $pm::getRows('FAnnuncio');
        }
        else {
            if (isset($data['nomeAnnuncio']) || isset($data['id'])) {
                $numRicette = 1;
            }
            elseif (is_array($data[0])) {
                $numRicette = sizeof($data);
            }
        }

        $foto = array();
        $categorie = $pm::load('FCategoria');

        if ($numRicette % $ricettePagina != 0) {
            $numPagine = floor($numRicette / $ricettePagina + 1);
        }
    }

    static function homeAnnunci($annunci){
        $pm = USingleton::getInstance('FPersistantManager');
        if($annunci!=null){
            if(is_array($annunci)){
                for ($i = 0; $i < count($annunci); $i++){
                    $annunci_home[$i] = $annunci[$i];
                    $autori_annunci[$i] = $pm::load('FUtente', array('id'), array($annunci[$i]->getAutore()),'id',1);
                    $immagini_home[$i] = $pm::load('FImmagine',array('id'), array($annunci[$i]->getImmagine()),'id',1);
                   // $immagini_autore[$i] = $pm::load('FImmagine', array(['id', '=', $autori_ricette[$i]->getid_immagine()]));
                }
            }
            else{
                $annunci_home = $annunci;
                $autori_annunci = $pm::load('FUtente', array('id'), array($annunci->getAutore()),'id',1);
                $immagini_home = $pm::load('FFotoAnnuncio',array('id'), array($annunci->getIdFoto()),'id',1);
                $immagini_autore = $pm::load('FFotoUtente', array('id'), array($annunci->getIdFoto()),'id',1);
            }
        }
        return array($annunci_home, $autori_annunci, $immagini_home, $immagini_autore);
    }

    static function creaAnnuncio() {
        $view = new VAnnunci();
        $view->showCreaAnnuncio();
    }

    static function pubblicaAnnuncio() {
        $pm=USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        if (CUtente::isLogged()) {
            $idFoto = self::upload();
            if ($idFoto != false) {
                $utente = unserialize($session->readValue('utente'));
                $idVenditore = $utente->getIdUser();
                $titolo = VAnnunci::getTitoloAnnuncio();
                $descrizione = VAnnunci::getDescrizioneAnnuncio();
                $prezzo = VAnnunci::getPrezzoAnnuncio();
                $data = date('d-m-Y');
                $categoria = VAnnunci::getCategoriaAnnuncio();

                $annuncio = new EAnnuncio($titolo, $descrizione, $prezzo, $data, $idVenditore, $categoria);
                $pm::store($annuncio);
                header('Location: /localmp/Annunci/infoAnnuncio/$idAnnuncio');
            }
        }
        else {
            header('Location: /localmp/Utente/login');
        }
    }

    static function upload() {
        $pm = USingleton::getInstance('FPersistentManager');
        $result = false;
        $maxSize = 600000;
        $result = is_uploaded_file($_FILES['file']['tmpName']);
        if (!$result) {
            return false;
        }
        else {
            $size = $_FILES['file']['size'];
            if ($size > $maxSize) {
                return false;
            }
            $type = $_FILES['file']['type'];
            $nome = $_FILES['file']['name'];
            $foto = file_get_contents($_FILES['file']['tmpName']);
            $foto = addslashes($foto);
            $fotoCaricata = new EFotoAnnuncio($id=0, $nome, $size, $type, $foto);
            $pm::storeMedia($fotoCaricata, 'file');
            return $fotoCaricata->getIdFoto();
        }

    }

    static function cancellaAnnuncio($id, $idFoto) {
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        $utente = unserialize($session->readValue("utente"));
        if ($utente != null) {
            $annuncio = $pm::load("FAnnuncio", array('idAnnuncio'), array($id));
            if ($annuncio->getIdVenditore() == $utente->getIdUser()){
                $pm::delete('idAnnuncio', $id, "FAnnuncio");
                $pm::delete('idAnnuncio', $id, "FRecensione");
                $pm::delete('idFoto', $idFoto, "FFotoAnnuncio");

                header("Location: /localmp/");
            } else {
                header("Location: /localmp/");
            }
        } else {
            header("Location: /localmp/");
        }
    }
}