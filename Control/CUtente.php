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
        setcookie("PHPSESSID", ""); // da capire perché
        header("Location: /localmp/login");
    }

    static function profile() {
        $view = new VUtente();
        $session = USingleton::getInstance("USession");
        $pm = USingleton::getInstance("FPersistantManager");
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (CUtente::isLogged()) {
                $utente = unserialize($session->readValue("utente"));
                $foto = $pm::load($utente->getIdFoto, "FFotoUtente");
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
        $ris = false;
        $maxSize = 300000;
        $risultato = is_uploaded_file($_FILES["file"]["tmp_name"]);
        $size = $_FILES["file"]["size"];
        $type = $_FILES["file"]["type"];
        $nome = $_FILES["file"]["nome"];
        if (!$risultato) {
            return $ris; // upload fallito
        } elseif ($size > $maxSize) {
            return $ris; // il file è troppo grande
        }
        $foto = file_get_contents($_FILES["file"]["tmp_name"]);
        $foto = addslashes($foto);
        $newFoto = new EFotoUtente($idFoto, $nomeFoto, $size, $tipo, $foto);
        $pm::storeMedia($newFoto, "file");
        $ris = true;
        return $ris;
    }


}