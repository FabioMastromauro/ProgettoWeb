<?php

/**
 * La classe USession gestisce tutte le operazioni legate alla gestione delle sessioni
 * @author Gruppo7
 * @package Foundation/Utility
 */
class USession
{

    /**
     * Costruttore
     */
    public function __construct() {
        session_start();
    }

    /**
     * Imposta il valore(value) di un elemento dell'array globale SESSION tramite la
     * chiave identificativa(key)
     * @param string $key
     * @param $value
     * @return void
     */
    public function setValue(string $key, $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * Metodo che elimina un elemento dell'array globale SESSION passando
     * la chiave identificativa(key)
     * @param string $key
     * @return void
     */
    public function destroyValue(string $key) {
        unset($_SESSION[$key]);
    }

    /**
     * Metodo che legge un valore dell'array globale SESSION passando
     * la chiave identificativa(key)
     * @param string $key
     * @return false|mixed
     */
    public function readValue(string $key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        else {
            return false;
        }
    }

    /**
     * Metodo che, passando la chiave identificativa(key), restituisce 0
     * se il valore corrispondente non esiste nell'array globale SESSION
     * e 1 se invece esiste
     * @param string $key
     * @return bool
     */
    public function valueExist(string $key) {
        if (isset($_SESSION[$key])) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Metodo che ritorna 0 se le sessioni sono disabilitate, 1 se sono abilitate
     * ma non ce ne sono e 2 se le sessioni sono attive e ce n'è una esistente
     * @return int
     */
    public static function sessionStatus() {
        return session_status();
    }

    /**
     * Metodo che dealloca la RAM del server, cioè libera tutte le variabili di sessione in uso
     * @return void
     */
    public function unsetSession() {
        session_unset();
    }

    /**
     * Metodo che cancella il file di sessID sul file system del server
     * @return void
     */
    public function destroySession() {
       session_destroy();
    }
}