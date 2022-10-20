<?php

class CUtente
{

    static function login () {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (static::isLogged()) {
                $pm = USingleton::getInstance("FPersistentManager"); // da verificare
                $view = new VUtente();
                $view->loginOk();
            }
            else {
                $view = new VUtente();
                $view->showFormLogin();
            }
        }
        elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            static::verifica();
        }
    }

    static function verifica() {
        $view = new VUtente();
        $pm = USingleton::getInstance("FPersistentManager");
        $utente = $pm->loadLogin($_POST["email"], $_POST["password"]);
        if ($utente != null) {
            if ($utente->isBan() != 1) {
                if (USession::sessionStatus() == PHP_SESSION_NONE) {
                    $session = USingleton::getInstance("USession");
                    $dati = serialize($utente);
                    $admin = $utente->isAdmin();
                    $session->setValue("admin", $admin);
                    $session->setValue("utente", $dati);
                    if ($admin == 1) {
                        header("Location: /localmp/Admin/home");
                    } else {
                        header("Location: /localmp/");
                    }
                }
            } else {
                $view->loginError(1, 'bannato', $utente->getDataFineBan());
            }
        }
        else {
            $view->loginError(0, 'errore');
        }
    }

    static function isLogged() {
        $identified = false;
        if (isset($_COOKIE['PHPSESSID'])) {
            if (USession::sessionStatus() == PHP_SESSION_NONE) {
                USingleton::getInstance("USession");
            }
        }
        if (isset($_SESSION['utente'])) {
            $identified = true;
        }
        return $identified;
    }

    static function logout() {
        $session = USingleton::getInstance("USession");
        $session->unsetSession();
        $session->destroySession();
        setcookie("PHPSESSID", "");
        header("Location: /localmp/login");
    }

    static function registration() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $view = new VUtente();
            if (self::isLogged()) {
                $view->loginOk();
            }
        }
        elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            self::verifyRegistration();
        }
    }

    static function verifyRegistration() {
        $pm = USingleton::getInstance("FPersistentManager");
        $verifyEmail = $pm::exist("email", VUtente::getEmail(), "FUtente");
        $view = new VUtente();
        if ($verifyEmail) {
            $view->registrationError("email");
        }
        else {
            $utente = new EUtente(VUtente::getNome(), VUtente::getCognome(), VUtente::getEmail(), VUtente::getPassword(),null, date('d/m/y'), 0, 0);
            $pm::store($utente);
            header("Location: /localmp/Utente/login");
        }
    }

    static function profilo($id=null){
        $view = new VUtente();
        $session = USingleton::getInstance('USession');
        $pm = USingleton::getInstance('FPersistentManager');
        if($id == null){
            $utente = unserialize($session->readValue('utente'));
        } else $utente = $pm::load('FUtente', array(['idUser', '=', $id]));
        if (CUtente::isLogged() || $id!=null){
            $fotoUtente = $pm::load('FFotoUtente', array(['idFoto', '=', $utente->getidFoto()]));
            $annuncio = $pm::load('FAnnuncio', array(['autore', '=', $utente->getIdUser()]));
            if ($annuncio != null) {
                if (is_array($annuncio)) {
                    for ($i = 0; $i < sizeof($annuncio); $i++) {
                        $foto[$i] = $pm::load('FFotoAnnuncio', array(['idFoto', '=', $annuncio[$i]->getIdFoto()]));
                        $autori_annunci[$i] = $pm::load('FUtente', array(['idUser', '=', $annuncio[$i]->getAutore()]));
                        $foto_autori[$i] = $pm::load('FFotoUtente', array(['idFoto', '=', $autori_annunci[$i]->getidFoto()]));
                    }
                } else {
                    $foto = $pm::load('FFotoAnnuncio', array(['idFoto', '=', $annuncio->getIdFoto()]));
                    $autori_annunci = $pm::load('FUtente', array(['idUser', '=', $annuncio->getAutore()]));
                    $foto_autori = $pm::load('FFotoUtente', array(['idFoto', '=', $autori_annunci->getidFoto()]));
                }
                $view->profilo($annuncio, $utente->getNome(), $utente->getCognome(), $utente->getEmail(), $foto, $fotoUtente, $foto_autori, $id);
            }
            else {
                $view->profilo($annuncio, $utente->getNome(), $utente->getCognome(), $utente->getEmail(), $foto = null, $fotoUtente, $foto_autori = null, $id);
            }
        } else {
            header('Location: /chefskiss/Utente/login');
        }
    }


    static function modificaProfilo() {
        $pm = USingleton::getInstance("FPersistentManager");
        $view = new VUtente();
        $session = USingleton::getInstance("USession");
        $utente = unserialize($session->readValue("utente"));
        if (CUtente::isLogged()) {
                $foto = $pm::load("FFotoUtente", array(['idFoto', '=', $utente->getIdFoto()]));
                $view->modificaProfilo($utente, $foto);
            }
            else {
                header("Location: /localmp/Utente/login");
            }
    }

    static function upload() {
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        $ris = false;
        $maxSize = 300000;
        $risultato = is_uploaded_file($_FILES["file"]["tmp_name"]);
        $size = $_FILES["file"]["size"];
        $tipo = $_FILES["file"]["type"];
        $nomeFoto = $_FILES["file"]["nome"];
        if (!$risultato) {
            return $ris; // upload fallito
        } elseif ($size > $maxSize) {
            return $ris; // il file è troppo grande
        }
        $foto = file_get_contents($_FILES["file"]["tmp_name"]);
        $foto = addslashes($foto);
        $fotoCaricata = new EFotoUtente($idFoto = 0, $nomeFoto, $size, $tipo, $foto);
        $pm::storeMedia($fotoCaricata, "file");
        $ris = true;
        return $ris;
    }

    static function confermaModifiche() {
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        if(CUtente::isLogged()) {
            $idFoto = self::upload();
            $utente = unserialize($session->readValue('utente'));
            $nomeUtente = VUtente::getNome();
            $cognomeUtente = VUtente::getCognome();

            $pm::update('nome', $nomeUtente, 'id', $utente->getIdUser(), "FUtente");
            $pm::update('cognome', $cognomeUtente, 'id', $utente->getIdUser(), "FUtente");

            $utente->setNome($nomeUtente);
            $utente->setCognome($cognomeUtente);
            $session->destroyValue('utente');

            if ($idFoto != false) {
                // if ((int) $utente->getIdFoto())
                $pm::update('idFoto', $idFoto, 'idUser', $utente->getIdUser(), "FUtente");
                $utente->setIdFoto($idFoto);
                $session->setValue('utente', serialize($utente));

                header("Location: /localmp/Utente/profilo");
            } else {
                $session->setValue('utente', serialize($utente));

                header("Location: /localmp/Utente/profilo");
            }
        } else {
            header("Location: /localmp/Utente/profilo");
        }
    }
}