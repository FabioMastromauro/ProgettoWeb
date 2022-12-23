<?php
/**
 * La classe CAdmin permette all'admin di effettuare delle operazioni di ban/riattivazione
 * su utenti e annunci e di eliminare le recensioni
 * @author Gruppo7
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
        if ($utente != null && $utente->getAdmin() == 1) {
            $pm = USingleton::getInstance('FPersistentManager');
            $list = $pm::load('FUtente');
            $immagine = $pm::load('FFotoUtente',  array(['idUser', '=', $utente->getIdUser()]));
            $view->homeAdmin($utente, $list, $immagine);
        } else {
            header('Location: /');
        }
    }

    /**
     * Metodo che visualizza il profilo di un utente strutturato per l'admin
     * @param $id
     * @return void
     */
    static function profiloUtente($id = null)
    {
        $view = new VAdmin();
        $session = USingleton::getInstance('USession');
        $pm = USingleton::getInstance('FPersistentManager');
        if ($id == null) {
            $utente = $utente = unserialize($session->readValue('utente'));

        } else {
            $utente = $pm::load('FUtente', array(['idUser', '=', $id]));
        }
        if (isset($_SESSION['utente'])) $utente_del_profilo = unserialize($_SESSION['utente']);

        if (CAdmin::isLogged() || $id != null) {
            $fotoUtente = $pm::load('FFotoUtente', array(['idUser', '=', $utente->getIdUser()]));
            $annuncio = $pm::load('FAnnuncio', array(['idVenditore', '=', $utente->getIdUser()]));
            $categoria = $pm::loadAll('FCategoria');
            $recensione = $pm::load('FRecensione', array(['idRecensito', '=', $utente->getIdUser()]));
            //recensione
            if ($recensione != null) {
                if (!is_array($recensione)) $recensione = array($recensione);
                if (is_array($recensione)) {
                    for ($i = 0; $i < sizeof($recensione); $i++) {
                        $autori[$i] = $pm::load('FUtente', array(['idUser', '=', $recensione[$i]->getAutore()]));
                        $foto_recensori[$i] = $pm::load('FFotoUtente', array(['idUser', '=', $autori[$i]->getIdUser()]));
                    }
                } else {
                    $autori = $pm::load('FUtente', array(['idUser', '=', $recensione->getAutore()]));
                    $foto_recensori = $pm::load('FFotoUtente', array(['idUser', '=', $autori->getIdUser()]));
                }

            }


            if ($annuncio != null) {
                if (is_array($annuncio)) {
                    for ($i = 0; $i < sizeof($annuncio); $i++) {
                        $foto[$i] = $pm::load('FFotoAnnuncio', array(['idAnnuncio', '=', $annuncio[$i]->getIdAnnuncio()]));
                        if (!is_array($foto[$i])) {
                            $foto[$i] = array($foto[$i]);
                        }
                        $autori_annunci[$i] = $pm::load('FUtente', array(['idUser', '=', $annuncio[$i]->getIdVenditore()]));
                        $foto_autori[$i] = $pm::load('FFotoUtente', array(['idUser', '=', $autori_annunci[$i]->getIdUser()]));
                        if (!is_array($foto_autori[$i])) $foto_autori[$i] = array($foto_autori[$i]);


                    }


                } else {
                    $foto = $pm::load('FFotoAnnuncio', array(['idAnnuncio', '=', $annuncio->getIdAnnuncio()]));
                    if (!is_array($foto)) $foto = array(array($foto));
                    $autori_annunci = $pm::load('FUtente', array(['idUser', '=', $annuncio->getIdVenditore()]));
                    $foto_autori = $pm::load('FFotoUtente', array(['idUser', '=', $autori_annunci->getIdUser()]));
                    if (!is_array($foto_autori)) $foto_autori = array($foto_autori);


                }
                if (!isset($foto)) $foto = null;
                if (!isset($foto_autori)) $foto_autori = null;
                if (!isset($autori)) $autori = null;
                if (!isset($foto_recensori)) $foto_recensori = null;
                if (!is_array($annuncio) && isset($annuncio)) $annuncio = array($annuncio);
                if (!is_array($foto[0])) $foto = array($foto);
                if (!isset($utente_del_profilo)) $utente_del_profilo = null;

                $view->profiloAdmin($annuncio, $utente, $foto, $fotoUtente, $foto_autori, $id, $categoria, $autori, $foto_recensori, $recensione, $utente_del_profilo);
            } else {
                if (!isset($foto)) $foto = null;
                if (!isset($foto_autori)) $foto_autori = null;
                if (!isset($autori)) $autori = null;
                if (!isset($foto_recensori)) $foto_recensori = null;
                if (!isset($utente_del_profilo)) $utente_del_profilo = null;
                $view->profiloAdmin($annuncio, $utente, $foto, $fotoUtente, $foto_autori, $id, $categoria, $autori, $foto_recensori, $recensione, $utente_del_profilo);
            }

        }
        else {
            header('Location: /localmp/Utente/login');
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
                    $pm::update('dataFineBan', $date, 'idUser', $id, 'FUtente');
                    $pm::update('ban', 1, 'idUser', $id, 'FUtente');
                    header('Location: /localmp/Admin/profiloUtente/'.$id);
                }
            } catch (Exception $e) {
                echo ('Data antecedente a quella corrente: '.$e->getMessage());
                header('Location: /localmp/Admin/profiloUtente/'.$id);
            }
        }
        else {
            header('Location: /');
        }
    }

    /**
     * Metodo che permette la riattivazione di un utente da parte dell'admin
     * @param $id
     * @return void
     */
    static function rimuoviBan($id) {
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getAdmin() == 1) {
            $pm = USingleton::getInstance('FPersistentManager');
            $pm::update('ban', 0, 'idUser', $id, 'FUtente');
            $pm::update('dataFineBan', null, 'idUser', $id, 'FUtente');
            header('Location: /localmp/Admin/profiloUtente/'.$id);
        } else {
            header('Location: /');
        }
    }

    /**
     * Metodo che permette il ban di un annuncio da parte dell'admin
     * @param $id
     * @return void
     */

    /**
     * Metodo che permette la riattivazione di un annuncio da parte dell'admin
     * @param $id
     * @return void
     */

    static function cancellaAnnuncio($idAnnuncio, $idUtente) {
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        $utente = unserialize($session->readValue("utente"));
        $foto=$pm::load('FFotoAnnuncio',array(['idAnnuncio','=',$idAnnuncio]));
        if (CAdmin::isLogged()) {
            $annuncio = $pm::load("FAnnuncio", array(['idAnnuncio', '=', $idAnnuncio]));
            if (unserialize($_SESSION['utente'])->getAdmin()==1){
                $pm::delete('idAnnuncio', $idAnnuncio, "FAnnuncio");
                if(is_array($foto)) {
                    for ($i = 0; $i < sizeof($foto); $i++) {
                        $pm::delete('idAnnuncio', $foto[$i]->getIdAnnuncio(), "FFotoAnnuncio");
                    }
                }
                else  $pm::delete('idAnnuncio', $foto->getIdAnnuncio(), "FFotoAnnuncio");



                header("Location: /Admin/profiloUtente?id=".$idUtente);
            } else {
                header("Location: /Admin/profiloUtente?id=".$idUtente);
            }
        }
    }

    /**
     * Metodo che permette l'eliminazione di una recensione scurrile da parte dell'admin
     * @param $id
     * @return void
     */
    /**
     * Funzione invocata quando un utente scrive una recensione su un oggetto acquistato
     * @param $id
     * @return void
     */
    public static function scriviRecensione()
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        if (CAdmin::isLogged()) {
            $utente_recensito = unserialize($session->readValue("utente"));
        }//prende l'utente dell'annuncio

        if ($utente_recensito != null) {

            $commento = VUtente::getCommento();
            $valutazione = VUtente::getValutazione();
            $dataPubblicazione = date('Y-m-d');
            $idRecensito = VUtente::getIdUser();
            $autore = unserialize($_SESSION['utente']);
            $recensione = new ERecensione($commento, $valutazione, $dataPubblicazione, $autore->getIdUser(), null, $idRecensito);
            $pm::store($recensione);
            header('Location: /Admin/profiloUtente?id=' . $idRecensito);
        } else {
            header('Location: /');
        }
    }

    static function isLogged()
    {
        $identified = false;
        if (isset($_COOKIE['PHPSESSID'])) {
            if (USession::sessionStatus() == PHP_SESSION_NONE) {
                USingleton::getInstance("USession");
            }
        }
        if (isset($_SESSION['utente'])) {
            if(unserialize($_SESSION['utente'])->getAdmin()==1) $identified = true;
        }

        return $identified;
    }
    public static function storico($id){
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        $view = new VUtente();
        if(CUtente::isLogged()){
            $utente = $pm::load('FUtente',array(['idUser','=',$id]));
            $annunci= $pm::load('FAnnuncio',array(['idCompratore','=',$utente->getIdUser()]));
            if(isset($annunci)) {

                if (!is_array($annunci)) $annunci = array($annunci);
                for ($i = 0; $i < count($annunci); $i++) {
                    $immagini[] = $pm::load('FFotoAnnuncio', array(['idAnnuncio', '=', $annunci[$i]->getIdAnnuncio()]));
                    if (!is_array($immagini[$i])) $immagini[$i] = array($immagini[$i]);
                }
                $view->storico($annunci,$utente,$immagini);
            }
            else  $view->storico($annunci=null,$utente,$immagini=null);



        }
        else header("Location: /localmp/");

    }
    static function cancellaRecensione($id, $profilo)
    {
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        $utente = unserialize($session->readValue("utente"));
        if ($utente != null) {
            $recensione = $pm::load("FRecensione", array(['idRecensione', '=', $id]));
            if ($recensione != null && $recensione->getAutore() == $utente->getIdUser()) {
                $pm::delete('idRecensione', $id, "FRecensione");
                header("Location: /Admin/profiloUtente?id=" . $profilo);

            } else {
                header("Location: /localmp/Admin/profiloUtente");
            }
        } else {
            header("Location: /localmp/Admin/profiloUtente");
        }
    }
}