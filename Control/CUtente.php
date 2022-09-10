<?php

class CUtente
{

    static function login () {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (static::isLogged()) {
                $pm = USingleton::getInstance("FPersistantManager"); // da verificare
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
        $pm = USingleton::getInstance("FPersistantManager");
        $utente = $pm->loadLogin($_POST["email"], $_POST["password"]);
        if ($utente != null) {
            if (USession::sessionStatus() == PHP_SESSION_NONE) {
                $session = USingleton::getInstance("USession");
                $salvare = serialize($utente);
                $admin = $utente->isAdmin();
                $session->setValue("admin", $admin);
                $session->setValue("utente", $salvare);
                if ($admin == 1) {
                    header("Location: /localmp/Admin/homepage");
                }
                else {
                    header("Location: /localmp");
                }
            }
        }
        else {
            $view->loginError();
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
        $pm = USingleton::getInstance("FPersistantManager");
        $verifyEmail = $pm::exist("email", VUtente::getEmail(), "FUtente");
        $view = new VUtente();
        if ($verifyEmail) {
            $view->registrationError("email");
        }
        else {
            $utente = new EUtente(VUtente::getNome, VUtente::getCognome, VUtente::getUsername, VUtente::getPassword, VUtente::getEmail, VUtente::getIdUser, 0);
            $pm::store($utente);
            header("Location: /localmp/Utente/login");
        }
    }

    static function profile() {
        $view = new VUtente();
        $session = USingleton::getInstance("USession");
        $pm = USingleton::getInstance("FPersistantManager");
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (CUtente::isLogged()) {
                $utente = unserialize($session->readValue("utente")); // $foto = unserialize($session->readValue("fotoUtente"));
                $foto = $pm::load($utente->getIdFoto, "FFotoUtente"); // $fotoUtente = $pm::load($foto->getIdUser, "FFotoUtente");
                $annunci = $pm::load($utente->get);
            }
        }

    }

    static function modificaProfilo() {
        $pm = USingleton::getInstance("FPersistantManager");
        $view = new VUtente();
        $session = USingleton::getInstance("USession");
        // if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (CUtente::isLogged()) {
                $utente = unserialize($session->readValue("utente"));
                $foto = $pm::load($utente->getIdFoto, "FFotoUtente");
                $view->modificaProfilo($utente, $foto);
            }
            else {
                header("Location: /localmp/Utente/login");
        /* }*/}
    }

    static function upload() {
        $pm = USingleton::getInstance("FPersistantManager");
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
        $utente = unserialize($session->readValue("utente"));
        $newFoto = new EFotoUtente($idFoto = 0, $nomeFoto, $size, $tipo, $foto, $utente->getIdUser);
        $pm::storeMedia($newFoto, "file");
        $ris = true;
        return $ris;
    }


}