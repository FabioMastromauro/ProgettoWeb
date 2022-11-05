<?php

/**
 * La classe CAnnunci viene utilizzata per eseguire tutte le operazioni
 * CRUD (create/read/delete/update) sugli annunci
 * @package Control
 */
class CAnnunci
{

    /**
     * Metodo che permette la visualizzazione di un annuncio in base all'id e, se non presente,
     * permette la visualizzazione di 12 annunci caricati direttamente dal DB
     * @param $id
     * @return void
     */
    static function esplora($id=null){
        $view = new VAnnunci();
        $pm = USingleton::getInstance('FPersistentManager');

        if ($id != null){
            $annunci = $pm::load('FAnnuncio',array(['idAnnuncio', '=', $id]));
            $array = self::homeAnnunci($annunci);
            $view->showAnnunci($annunci, $array);
        } else {
            $annunci = $pm::load('FAnnuncio',array(), '', 12);
            $array = self::homeAnnunci($annunci);
            $view->showAnnunci($annunci, $array);
        }
    }

    /**
     * Metodo che permette la visualizzazione di/degli annuncio/annunci trovato/i
     * in base ai parametri di ricerca e, se non sono presenti annunci nella
     * categoria cercata o non sono stati trovati annunci inerenti la ricerca,
     * viene mostrata una pagina con degli annunci casuali
     * @param $cerca
     * @param $index
     * @return void
     */
    static function esploraAnnunci($cerca = null, $index = null) {

        $annunciPagina = 12;

        if ($cerca == null && isset($_COOKIE['searchOn'])) {
            if ($_COOKIE['searchOn'] == 1) self::searchOff();
        }

        if ($index == null) {
            $newIndex = 1;
        }
        else {
            $newIndex = $index;
        }

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
        if (!isset($_COOKIE['annuncioRicerca']) || $data[0] == 'noCategoria' || $data[0] == 'noRicerca') {
            if ($newIndex * $annunciPagina <= $numAnnunci) {
                $annunciPagina = $pm::load('FAnnuncio', array(['idAnnuncio', '>', ($newIndex - 1) * $annunciPagina]), '', $annunciPagina);
            } else {
                $limite = $numAnnunci % $annunciPagina;
                $annunciPagina = $pm::load('FAnnunci', array(['idAnnuncio', '>', $newIndex * $annunciPagina - $annunciPagina]), '', $limite);
            }

            if (is_array($annunciPagina)) {
                for ($i = 0; $i < sizeof($annunciPagina); $i++) {
                    $foto[$i] = $pm::load('FFotoAnnuncio', array(['idFoto','=',$annunciPagina[$i]->getIdFoto()]));
                }
            } else {
                $foto = $pm::load('FFotoAnnuncio', array(['idFoto', '=', $annunciPagina->getIdFoto()]));
            }
        } else {
            if ($newIndex * 12 <= $numAnnunci) {
                for ($i = 0; $i < 12; $i++) {
                    $annunciPagina[] = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $data[$i]['idAnnuncio']]));
                }
            } else {
                if (isset($data['nome_annuncio'])) {
                    $annunciPagina = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $data['idAnnuncio']]));
                } elseif (is_array($data[0])) {
                    for ($i = 0; $i < count($data); $i++) {
                        $annunciPagina[] = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $data[$i]['idAnnuncio']]));
                    }
                }
            }
            if (is_array($annunciPagina)) {
                for ($i = 0; $i < sizeof($annunciPagina); $i++) {
                    $foto[$i] = $pm::load('FFotoAnnuncio', array(['idFoto', '=', $annunciPagina[$i]->getIdFoto()]));
                }
            } else {
                $foto = $pm::load('FFotoAnnuncio', array(['idFoto', '=', $annunciPagina->getIdFoto()]));
            }
        }

        $view = new VAnnunci();

        $cerca = 'cerca';

        if (isset($data)) {
            if ($data[0] == 'no_categoria' || $data[0] == 'no_ricerca') $view->showAllErr($annunciPagina, $numPagine, $newIndex, $numAnnunci, $foto, $cerca, $data[0], $data[1], $categorie);
            else $view->showAll($annunciPagina, $numPagine, $newIndex, $numAnnunci, $foto, $cerca, $categorie);
        }
        else $view->showAll($annunciPagina, $numPagine, $newIndex, $numAnnunci, $foto, $cerca, $categorie);
    }

    /**
     * Metodo che svuota il cookie che viene attivato nel momento in cui viene fatta una ricerca
     * @return void
     */
    static function searchOff() {
        setcookie('searchOn', 0);
        setcookie('annuncio_ricerca', '');
        header('Location: /localmp/Annunci/esploraAnnunci');
    }

    /**
     * Metodo che permette la visualizzazione della pagina
     * che contiene più informazioni riguardanti l'annuncio
     * in questione
     * @param int $id
     * @return void
     */
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

    /**
     * Metodo che permette la raccolta di tutti gli autori, annunci e foto che
     * saranno poi usati in altri metodi
     * @param $annunci
     * @return array
     */
    static function homeAnnunci($annunci) {
        $pm = USingleton::getInstance('FPersistentManager');
        if($annunci!=null) {
            if(is_array($annunci)) {
                for ($i = 0; $i < count($annunci); $i++) {
                    $annunci_home[$i] = $annunci[$i];
                    $autori_annunci[$i] = $pm::load('FUtente', array(['idUser','=',$annunci[$i]->getAutore()]));
                    $foto_home[$i] = $pm::load('FFotoAnnuncio', array(['idFoto','=',$annunci[$i]->getIdFoto()]));
                    $foto_autore[$i] = $pm::load('FFotoUtente', array(['idFoto','=',$autori_annunci[$i]->getIdFoto()]));
                }
            }
            else{
                $annunci_home = $annunci;
                $autori_annunci = $pm::load('FUtente', array(['idUser','=',$annunci->getAutore()]));
                $foto_home = $pm::load('FFotoAnnuncio', array(['idFoto','=',$annunci->getIdFoto()]));
                $foto_autore = $pm::load('FFotoUtente', array(['idFoto','=',$autori_annunci->getIdFoto()]));
            }
        }
        return array($annunci_home, $autori_annunci, $foto_home, $foto_autore);
    }

    /**
     * Metodo che gestisce la ricerca di un annuncio da parte di un utente
     * @param $categoria
     * @return void
     */
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
            $tuttiAnnunciTitoloId = $pm::loadDefCol('FAnnuncio', array(['nome_annuncio', 'id_annuncio']));
            if (isset($tuttiAnnunciTitoloId[0]) && is_array($tuttiAnnunciTitoloId[0])) {
                for ($i = 0; $i < sizeof($tuttiAnnunciTitoloId); $i++) {
                    if (is_int(strpos($tuttiAnnunciTitoloId[$i]['nome_annuncio'], $parametro))) {
                        $array[$c]['nome_annuncio'] = $tuttiAnnunciTitoloId[$i]['nome_annuncio'];
                        $array[$c]['id_annuncio'] = $tuttiAnnunciTitoloId[$i]['id_annuncio'];
                        $c += 1;
                    }
                }
            }
            elseif (isset($tuttiAnnunciTitoloId['nome_annuncio'])) {
                if (is_int(strpos($tuttiAnnunciTitoloId['nome_annuncio'], $parametro))) {
                    $array = $tuttiAnnunciTitoloId;
                }
            }
            $data = serialize($array);
            if ($array == null) {
                $data = serialize(['no_ricerca', $parametro]);
            }
            setcookie('annuncio_ricerca', $data);
            setcookie('searchOn', 1);
            header('Location: /localmp/Annunci/esploraAnnunci/cerca');
        }
    }


    /**
     * Metodo che reindirizza alla view che permette la creazione di un nuovo annuncio
     * @return void
     */
    static function creaAnnuncio() {
        $view = new VAnnunci();
        $view->showCreaAnnuncio();
    }

    /**
     * Metodo che permette la pubblicazione di un annuncio
     * @return void
     */
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

    /**
     * Metodo che rimanda alla view che permette la modifica di un annuncio
     * @param $idAnnuncio
     * @return void
     */
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

    /**
     * Metodo che invia al DB i dati aggiornati in seguito alla
     * modifica di un annuncio
     * @param $idAnnuncio
     * @param $idFotoVecchia
     * @return void
     */
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

    /**
     * Metodo che permette il caricamento di una foto durante
     * la creazione o modifica di un annuncio
     * @return bool
     */
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

    /**
     * Metodo che permette la cancellazione di un annuncio
     * @param $idAnnuncio
     * @param $idFoto
     * @return void
     */
    static function cancellaAnnuncio($idAnnuncio, $idFoto) {
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        $utente = unserialize($session->readValue("utente"));
        if (CUtente::isLogged()) {
            $annuncio = $pm::load("FAnnuncio", array(['idAnnuncio', '=', $idAnnuncio]));
            if ($annuncio->getIdVenditore() == $utente->getIdUser()){
                $pm::delete('idAnnuncio', $idAnnuncio, "FAnnuncio");
                $pm::delete('idAnnuncio', $idAnnuncio, "FRecensione");
                $pm::delete('idFoto', $idFoto, "FFotoAnnuncio");

                header("Location: /localmp/Utente/profilo");
            } else {
                header("Location: /localmp/Utente/profilo");
            }
        } else {
            header("Location: /localmp/Utente/login");
        }
    }

    /**
     * Metodo che rimanda alla schermata di acquisto di un annuncio
     * @param $idAnnuncio
     * @return void
     */
    static function schermataAcquisto($idAnnuncio) {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if (CUtente::isLogged()) {
            $annuncio = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $idAnnuncio]));
            if ($utente->getIdUser() != $annuncio->getIdVenditore()) {
                $view = new VAnnunci();
                $view->schermataAcquisto();
            } else {
                header('Location: /localmp/Annunci/infoAnnuncio/$idAnnuncio');
            }
        } else {
            header("Location: /localmp/Utente/login");
        }
    }
}