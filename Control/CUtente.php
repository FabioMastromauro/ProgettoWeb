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
    }
}