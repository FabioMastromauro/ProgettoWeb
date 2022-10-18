<?php

class CAnnunci
{

    static function esplora($id=null){
        $view = new VAnnunci();
        $pm = USingleton::getInstance('FPersistentManager');

        if ($id != null){
            $annunci = $pm::load('FAnnuncio',array(['idAnnuncio','=',$id]));
            $array = self::homeAnnunci($annunci);
            $view->showAnnunci($annunci, $array);
        } else {
            $annunci = $pm::load('FAnnuncio',array(), '', 3);
            $array = self::homeAnnunci($annunci);
            $view->showAnnunci($annunci, $array);
        }
    }

    static function esploraAnnunci($cerca = null, $index = null) {

        $annunciPagina = 12;

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
            $numAnnunci = $pm::getRows('FAnnuncio');
        }
        elseif($data[0] == 'noCategoria' || $data[0] == 'noRicerca') {
            $numAnnunci = $pm::getRows('FAnnuncio');
        }
        else {
            if (isset($data['nomeAnnuncio']) || isset($data['id'])) {
                $numAnnunci = 1;
            }
            elseif (is_array($data[0])) {
                $numAnnunci = sizeof($data);
            }
        }

        $foto = array();
        $categorie = $pm::load('FCategoria');

        if ($numAnnunci % $annunciPagina != 0) {
            $numPagine = floor($numAnnunci / $annunciPagina + 1);
        }
        else {
            $numPagine = $numAnnunci / $annunciPagina;
        }
  /*      if (!isset($_COOKIE['annuncioRicerca']) || $data[0] == 'noCategoria' || $data[0] == 'noRicerca') {
          //  if ($newIndex * $annunciPagina <= $numAnnunci) {
            //    $annunciPagina = $pm::load('FAnnuncio', array())
          //  } else {
            $limite = $numAnnunci % $annunciPagina;
            $annunciPagina = $pm::load();
        } */

        if (is_array($annunciPagina)) {
            for ($i = 0; $i < sizeof($annunciPagina); $i++) {
                $foto[$i] = $pm::load('FFotoAnnuncio', array(['idFoto','=',$annunciPagina->getIdFoto()]));
            }
        }
    }

    static function infoAnnuncio(int $id) {
        $view = new VAnnunci();
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $mod = unserialize($session->readValue('utente'));
        $session->setValue($id, 'id_ricetta');
        $annuncio = $pm::load('FAnnuncio', array('idAnnuncio'), array($id));
        $autore = $pm::load('FUtente', array(['idUser','=',array($annuncio->getIdVenditore())]));
        $foto = $pm::load('FFotoAnnuncio', array(['idFoto','=',$annuncio->getIdFoto()]));
        $fotoUtente = $pm::load('FFotoUtente', array(['idFoto','=',$autore->getIdFoto()]));

        $view->showInfo($annuncio, $autore, $mod, $foto, $fotoUtente);
    }

    static function homeAnnunci($annunci) {
        $pm = USingleton::getInstance('FPersistentManager');
        if($annunci!=null) {
            if(is_array($annunci)) {
                for ($i = 0; $i < count($annunci); $i++) {
                    $annunciHome[$i] = $annunci[$i];
                    $autoriAnnunci[$i] = $pm::load('FUtente', array(['idUser','=',$annunci[$i]->getAutore()]));
                    $fotoHome[$i] = $pm::load('FFotoAnnuncio', array(['idFoto','=',$annunci[$i]->getIdFoto()]));
                    $fotoAutore[$i] = $pm::load('FFotoUtente', array(['idFoto','=',$autoriAnnunci[$i]->getIdFoto()]));
                }
            }
            else{
                $annunciHome = $annunci;
                $autoriAnnunci = $pm::load('FUtente', array(['idUser','=',$annunci->getAutore()]));
                $fotoHome = $pm::load('FFotoAnnuncio', array(['idFoto','=',$annunci->getIdFoto()]));
                $fotoAutore = $pm::load('FFotoUtente', array(['idFoto','=',$autoriAnnunci->getIdFoto()]));
            }
        }
        return array($annunciHome, $autoriAnnunci, $fotoHome, $fotoAutore);
    }

    static function cerca($categoria = null) {
        $pm = USingleton::getInstance('FPersistentManager');
        if ($categoria != null) {
            $annunci = $pm::load('FAnnuncio', array(['idCate', '=', $categoria]));
            if ($annunci != null) {
                if (is_array($annunci)) {
                    for ($i = 0; $i < sizeof($annunci); $i++) {
                        $array[$i]['nome_annuncio'] = $annunci[$i]->getTitolo();
                        $array[$i]['id_annuncio'] = $annunci[$i]->getIdAnnuncio();
                    }
                }
                else {
                    $array['nome_annuncio'] = $annunci->getTitolo();
                    $array['id_annuncio'] = $annunci->getIdAnnuncio();
                }
                $data = serialize($array);
                setcookie('annuncio_ricerca', $data);
                setcookie('searchOn', 1);
            }
            else {
                $data = serialize(['no_categoria', $categoria]);
                setcookie('annuncio_ricerca', $data);
                setcookie('searchOn', 1);
            }
            header('Location: /localmp/Annunci/EsploraAnnunci/cerca');
        }
        else {
            $c = 0;
            $array = null;
            $parametro = VAnnunci::getRicerca();
            $parametro = strtoupper($parametro);

        }
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
                $data = new DateTime('now');
                $categoria = VAnnunci::getCategoriaAnnuncio();

                $annuncio = new EAnnuncio($titolo, $descrizione, $prezzo,$idFoto, $data, $idVenditore, $categoria, $ban = 0);
                $pm::store($annuncio);
                header('Location: /localmp/Annunci/infoAnnuncio/$idAnnuncio');
            }
        }
        else {
            header('Location: /localmp/Utente/login');
        }
    }

    static function modificaAnnuncio($idAnnuncio) {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        $annuncio = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $idAnnuncio]));
        if (CUtente::isLogged() && $utente->getIdUser() == $annuncio->getIdVenditore()) {
            $foto = $pm::load('FFotoAnnuncio', array(['idFoto', '=', $annuncio->getIdFoto()]));
            $categoria = $pm::load('FCategoria', array(['idCate', '=', $annuncio->getCategoria()]));
            $view = new VAnnunci();
            $view->modificaAnnuncio($annuncio, $foto, $annuncio->getDescrizione(), $categoria, $annuncio->getPrezzo());
        }
        else {
            header('Location: /localmp/Utente/login');
        }
    }

    static function confermaModifiche($idAnnuncio, $idFotoVecchia) {
        $pm=USingleton::getInstance('FPersistentManager');
        if (CUtente::isLogged()) {
            $titolo = VAnnunci::getTitoloAnnuncio();
            $descrizione = VAnnunci::getDescrizioneAnnuncio();
            $categoria = VAnnunci::getCategoriaAnnuncio();
            $prezzo = VAnnunci::getPrezzoAnnuncio();
            $idFoto = self::upload();
            if ($idFoto != false) {
                $pm::update('idFoto', $idFoto, 'idAnnuncio', $idAnnuncio, 'FAnnuncio');
                $pm::delete('idFoto', $idFotoVecchia, 'FFotoAnnuncio');
            }
            $pm::update('titolo', $titolo, 'idAnnuncio', $idAnnuncio, 'FAnnuncio');
            $pm::update('descrizione', $descrizione, 'idAnnuncio', $idAnnuncio, 'FAnnuncio');
            $pm::update('categoria', $categoria, 'idAnnuncio', $idAnnuncio, 'FAnnuncio');
            $pm::update('prezzo', $prezzo, 'idAnnuncio', $idAnnuncio, 'FAnnuncio');
            header('Location: /localmp/Annunci/infoAnnuncio/$idAnnuncio');
        } else {
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
            $fotoCaricata = new EFotoAnnuncio($idFoto=0, $nome, $size, $type, $foto);
            $pm::storeMedia($fotoCaricata, 'file');
            return true;
        }

    }

    static function cancellaAnnuncio($id, $idFoto) {
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        $utente = unserialize($session->readValue("utente"));
        if (CUtente::isLogged()) {
            $annuncio = $pm::load("FAnnuncio", array('idAnnuncio'), array($id));
            if ($annuncio->getIdVenditore() == $utente->getIdUser()){
                $pm::delete('idAnnuncio', $id, "FAnnuncio");
                $pm::delete('idAnnuncio', $id, "FRecensione");
                $pm::delete('idFoto', $idFoto, "FFotoAnnuncio");

                header("Location: /localmp/Annunci/esploraAnnunci");
            } else {
                header("Location: /localmp/Annunci/esploraAnnunci");
            }
        } else {
            header("Location: /localmp/Utente/login");
        }
    }
}