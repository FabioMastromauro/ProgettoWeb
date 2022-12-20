<?php

/**
 * La classe CAnnunci viene utilizzata per eseguire tutte le operazioni
 * CRUD (create/read/delete/update) sugli annunci
 * @author Gruppo7
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
     * Metodo che carica la schermata ricerca degli annunci dove si può impostare la ricerca
     * in base ad una parola chiave o categoria
     * @return void
     * @throws SmartyException
     */
    static function annunciHome(){
        $view = new VAnnunci();
        $pm = USingleton::getInstance('FPersistentManager');

        $annunci = $pm::load('FAnnuncio');
        $foto=$pm::load('FFotoAnnuncio');
        $categorie=$pm::load('FCategoria');


        $view->showAnnunci($annunci,$foto,$categorie);

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
    static function esploraAnnunci($cerca=null, $index=null){


        $annunci_per_pagina = 5;
        if ($cerca == null && isset($_COOKIE['searchOn'])) {
            if ($_COOKIE['searchOn'] == 1) self::searchOff();
        }

        if ($index == null) $new_index = 1;
        else $new_index = $index;

        $pm = USingleton::getInstance('FPersistentManager');
        if (isset($_COOKIE['annuncio_ricerca'])) $data = unserialize($_COOKIE['annuncio_ricerca']);

        if (!isset($_COOKIE['annuncio_ricerca']) || !is_array($data)) {
            $num_annunci = $pm::getRows('FAnnuncio');
        } elseif($data[0] == 'no_categoria' || $data[0] == 'no_ricerca'){
            $num_annunci = $pm::getRows('FAnnuncio');
        } else {
            if (isset($data['titolo']) || isset($data['idAnnuncio'])){
                $num_annunci = 1;
            } elseif (is_array($data[0])){
                $num_annunci = sizeof($data);
            }
        }

        $immagini = array();

        $categorie = $pm::load('FCategoria');

        if ($num_annunci % $annunci_per_pagina != 0){
            $page_number = floor($num_annunci / $annunci_per_pagina + 1);
        } else {
            $page_number = $num_annunci / $annunci_per_pagina;
        }
        if (!isset($_COOKIE['annuncio_ricerca']) || $data[0] == 'no_categoria' || $data[0] == 'no_ricerca') {
            if ($new_index * $annunci_per_pagina <= $num_annunci) {
                $annunci = $pm::load('FAnnuncio');
                if ($annunci_per_pagina * $new_index > count($annunci)) $annPag = (count($annunci) % $annunci_per_pagina) + $annunci_per_pagina*($new_index-1);
                else $annPag = $annunci_per_pagina * $new_index;
                for ($i = ($new_index - 1) * $annunci_per_pagina; $i < $annPag; $i++) {
                    $annunci_pag[] = $annunci[$i];


                }
            } else {
                $limite = $num_annunci % $annunci_per_pagina + ($new_index-1)  * $annunci_per_pagina;
                $annunci = $pm::load('FAnnuncio');
                if(!is_array($annunci)) $annunci=array($annunci);
                for ($i = ($new_index - 1) * $annunci_per_pagina; $i < $limite; $i++) {
                    $annunci_pag[] = $annunci[$i];


                }
            }

            if (is_array($annunci_pag)) {
                for ($i = 0; $i < sizeof($annunci_pag); $i++) {
                    $immagini[$i] = $pm::load('FFotoAnnuncio', array(['idAnnuncio', '=', $annunci_pag[$i]->getIdAnnuncio()]));
                    if(!is_array($immagini[$i])) $immagini[$i]=array($immagini[$i]);

                }
            } else {
                $immagini = $pm::load('FFotoAnnuncio', array(['idAnnuncio', '=', $annunci_pag->getIdAnnuncio()]));
                if(!is_array($immagini)) $immagini=array($immagini);

            }
        }
        //con categori o ricerca
        else {
            if ($new_index * 5 <= $num_annunci){
                for ($i = ($new_index - 1)*$annunci_per_pagina; $i <$annunci_per_pagina * $new_index ; $i++) {
                    $annunci_pag[] = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $data[$i]['idAnnuncio']]));
                }
            } else {
                if (isset($data['titolo'])){
                    $annunci_pag = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $data['idAnnuncio']]));
                } else if (is_array($data[0])){
                    $limite= (count($data) % $annunci_per_pagina) + $annunci_per_pagina * ($new_index-1);
                    for ($i =($new_index - 1)*$annunci_per_pagina; $i <$limite ; $i++) {
                        $annunci_pag[] = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $data[$i]['idAnnuncio']]));
                    }
                }
            }
            if (is_array($annunci_pag)) {
                for ($i = 0; $i < sizeof($annunci_pag); $i++) {
                    $immagini[$i] = $pm::load('FFotoAnnuncio', array(['idAnnuncio', '=', $annunci_pag[$i]->getIdAnnuncio()]));
                    if(!is_array($immagini[$i])) $immagini[$i]=array($immagini[$i]);
                }
            } else {
                $immagini = $pm::load('FFotoAnnuncio', array(['idAnnuncio', '=', $annunci_pag->getIdAnnuncio()]));
                if(!is_array($immagini)) $immagini=array($immagini);

            }
        }
        $view = new VAnnunci();

        $cerca = 'cerca';
        if(isset($data)){
            if($data[0] == 'no_categoria' || $data[0] == 'no_ricerca') $view->showAllErr($annunci_pag, $page_number, $new_index, $num_annunci, $immagini, $cerca, $data[0], $data[1], $categorie);
            else $view->showAll($annunci_pag, $page_number, $new_index, $num_annunci, $immagini, $cerca, $categorie);
        }
        else $view->showAll($annunci_pag, $page_number, $new_index, $num_annunci, $immagini, $cerca, $categorie);
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
    static function infoAnnuncio($id) {

        $view = new VAnnunci();
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $mod = unserialize($session->readValue('utente'));
        if(!isset($mod)) $mod=null;
        $session->setValue('idAnnuncio', $id);
        $annuncio = $pm::load('FAnnuncio', array(['idAnnuncio','=',$id]));
        $autore = $pm::load('FUtente', array(['idUser','=',$annuncio->getIdVenditore()]));
        $foto = $pm::load('FFotoAnnuncio', array(['idAnnuncio','=',$id]));
        if(!is_array($foto)) $foto= array($foto);
        $fotoUtente = $pm::load('FFotoUtente', array(['idUser','=',$autore->getIdUser()]));
        $categoria = $pm::load('FCategoria',array(['idCate','=',$annuncio->getCategoria()]));
        $tutteCategorie = $pm::loadAll('FCategoria');
        $view->showInfo($annuncio, $autore, $mod, $foto, $fotoUtente,$categoria,$tutteCategorie);
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
    static function cerca($categoria=null){
        $pm = USingleton::getInstance('FPersistentManager');
        if(isset($categoria)) $categoria=$pm::load('FCategoria',array(['idCate','=',$categoria]));
        if($categoria != null){
            $annunci = $pm::load('FAnnuncio', array(['categoria', '=', $categoria->getIdCate()]));
            if($annunci != null){
                if (is_array($annunci)){
                    for($i = 0; $i < sizeof($annunci); $i++){
                        $array[$i]['titolo'] = $annunci[$i]->getTitolo();
                        $array[$i]['idAnnuncio'] = $annunci[$i]->getIdAnnuncio();
                    }
                }
                else {
                    $array['titolo'] = $annunci->getTitolo();
                    $array['idAnnuncio'] = $annunci->getIdAnnuncio();
                }
                $data = serialize($array);
                setcookie('annuncio_ricerca', $data);
                setcookie('searchOn', 1);
            }
            else{
                $data = serialize(['no_categoria', $categoria->getCategoria()]);
                setcookie('annuncio_ricerca', $data);
                setcookie('searchOn', 1);
            }
            header('Location: /localmp/Annunci/esploraAnnunci/cerca');
        }
        else {
            $j = 0;
            $array = null;
            $parametro = VAnnunci::getTestoRicerca();
            $parametro = strtoupper($parametro);
            $allPostTitleAndId = $pm::loadDefCol('FAnnuncio', array('titolo', 'idAnnuncio'));
            if (isset($allPostTitleAndId[0]) && is_array($allPostTitleAndId[0])) {
                for ($i = 0; $i < sizeof($allPostTitleAndId); $i++) {
                    if (is_int(strpos($allPostTitleAndId[$i]['titolo'], $parametro))){
                        $array[$j]['titolo'] = $allPostTitleAndId[$i]['titolo'];
                        $array[$j]['idAnnuncio'] = $allPostTitleAndId[$i]['idAnnuncio'];
                        $j += 1;
                    }
                }
            } elseif (isset($allPostTitleAndId['titolo'])){
                if (is_int(strpos($allPostTitleAndId['titolo'], $parametro))){
                    $array = $allPostTitleAndId;
                }
            }
            $data = serialize($array);
            if($array == null){
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

    //Inutile, usiamo il modal che esiste sul profilo
    static function creaAnnuncio() {
        $view = new VAnnunci();
        $view->showCreaAnnuncio();
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
            $foto = $pm::load('FFotoAnnuncio', array(['idAnnuncio', '=', $annuncio->getIdAnnuncio()]));
            $categoria = $pm::load('FCategoria', array(['idCate', '=', $annuncio->getCategoria()]));
            $view = new VAnnunci();
            $view->modificaAnnuncio($annuncio, $foto,$categoria);
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
    static function confermaModifiche($idAnnuncio) {
        $pm=USingleton::getInstance('FPersistentManager');
        if (CUtente::isLogged()) {
            $titolo = VAnnunci::getTitoloAnnuncio();
            $descrizione = VAnnunci::getDescrizioneAnnuncio();
            $categoria = VAnnunci::getCategoriaAnnuncio();
            $prezzo = VAnnunci::getPrezzoAnnuncio();

            $pm::update('titolo', $titolo, 'idAnnuncio', $idAnnuncio, 'FAnnuncio');
            $pm::update('descrizione', $descrizione, 'idAnnuncio', $idAnnuncio, 'FAnnuncio');
            $pm::update('categoria', $categoria, 'idAnnuncio', $idAnnuncio, 'FAnnuncio');
            $pm::update('prezzo', $prezzo, 'idAnnuncio', $idAnnuncio, 'FAnnuncio');
            header('Location: /localmp/Annunci/infoAnnuncio?idAnnuncio=' . $idAnnuncio);
        } else {
            header('Location: /localmp/Utente/login');
        }
    }


    /**
     * Metodo che permette la pubblicazione di un annuncio
     * @return void
     */
    static function pubblicaAnnuncio() {
        $pm=USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        if (CUtente::isLogged()) {

            $utente = unserialize($session->readValue('utente'));
            $annuncio = new EAnnuncio(VAnnunci::getTitoloAnnuncio(),  VAnnunci::getDescrizioneAnnuncio(),  VAnnunci::getPrezzoAnnuncio(), date('Y/m/d'),$utente->getIdUser(),  null,  VAnnunci::getCategoriaAnnuncio(),  0,null, 0);
            $pm::store($annuncio);
            self::upload($annuncio->getIdAnnuncio());
            header('Location: /localmp/Annunci/infoAnnuncio?idAnnuncio=' . $annuncio->getIdAnnuncio());
        }
        else {
            header('Location: /localmp/Utente/login');
        }
    }


    /**
     * Metodo che permette il caricamento di una foto durante
     * la creazione o modifica di un annuncio
     *
     */
    static function upload($idAnnuncio) {
        $pm = USingleton::getInstance('FPersistentManager');
        for($i=0;$i<count($_FILES['file']['name']);$i++) {
            $result = false;
            $maxSize = 600000;
            $result = is_uploaded_file($_FILES['file']['tmp_name'][$i]);
            if (!$result) {
                return false;
            } else {
                $size = $_FILES['file']['size'][$i];
                if ($size > $maxSize) {
                    return false;
                }
                $type = $_FILES['file']['type'][$i];
                $nome = $_FILES['file']['name'][$i];
                $foto = file_get_contents($_FILES['file']['tmp_name'][$i]);
                $foto = addslashes($foto);
                $fotoCaricata = new EFotoAnnuncio($idFoto = null, $nome, $size, $type, $foto, $idAnnuncio);
                $pm::storeMedia($fotoCaricata, $_FILES['file']['tmp_name'][$i]);
            }
        }
    }



    /**
     * Metodo che permette la cancellazione di un annuncio
     * @param $idAnnuncio
     * @param $idFoto
     * @return void
     */
    static function cancellaAnnuncio($idAnnuncio) {
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        $utente = unserialize($session->readValue("utente"));
        $foto=$pm::load('FFotoAnnuncio',array(['idAnnuncio','=',$idAnnuncio]));
        if (CUtente::isLogged()) {
            $annuncio = $pm::load("FAnnuncio", array(['idAnnuncio', '=', $idAnnuncio]));
            if ($annuncio->getIdVenditore() == $utente->getIdUser()){
                $pm::delete('idAnnuncio', $idAnnuncio, "FAnnuncio");
                $pm::delete('idAnnuncio', $idAnnuncio, "FRecensione");
                if(is_array($foto)) {
                    for ($i = 0; $i < sizeof($foto); $i++) {
                        $pm::delete('idAnnuncio', $foto[$i]->getIdAnnuncio(), "FFotoAnnuncio");
                    }
                }
                else  $pm::delete('idAnnuncio', $foto->getIdAnnuncio(), "FFotoAnnuncio");



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
                $view->schermataAcquisto($utente, $annuncio);
            } else {
                header('Location: /localmp/Annunci/infoAnnuncio?idAnnuncio=' . $idAnnuncio);
            }
        } else {
            header("Location: /localmp/Utente/login");
        }
    }

    static function acquistoCompletato($idAnnuncio, $idCompratore) {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if (CUtente::isLogged()) {
            $annuncio = $pm::load('FAnnuncio', array(['idAnnuncio', '=', $idAnnuncio]));
            $foto = $pm::load('FFotoAnnuncio', array(['idAnnuncio', '=', $idAnnuncio]));
            if (!is_array($foto)) $foto = array($foto);
            $foto = $foto[0];
            if ($utente->getIdUser() != $annuncio->getIdVenditore()) {
                $pm::update('acquistato', 1, 'idAnnuncio', $idAnnuncio, 'FAnnuncio');
                $pm::update('idCompratore', $idCompratore,'idAnnuncio', $idAnnuncio,'FAnnuncio');
                $view = new VAnnunci();
                $view->acquistoCompletato($utente->getNome(), $annuncio->getTitolo(), $foto);
            } else {
                header('Location to: /localmp/Annunci/infoAnnuncio?idAnnuncio=' . $idAnnuncio);
            }
        } else {
            header("Location: /localmp/Utente/login");
        }
    }
}