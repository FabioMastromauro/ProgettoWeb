<?php

class USession
{
    public function __construct() {
        session_start();
    }

    public function setValue(string $key, $value) {
        $_SESSION[$key] = $value;
    }

    public function destroyValue(string $key) {
        unset($_SESSION[$key]);
    }

    public function readValue(string $key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        else {
            return false;
        }
    }


    public function valueExist(string $key) {
        if (isset($_SESSION[$key])) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function sessionStatus() {
        return session_status();
    }

    public function unsetSession() {
        session_unset();
    }

    public function destroySession() {
       session_destroy();
    }
}