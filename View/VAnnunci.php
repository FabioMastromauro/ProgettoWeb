<?php

class VAnnunci
{
    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    static function getTitoloAnnuncio() {
        return strtoupper($_POST['title']);
    }

    static function getDescrizioneAnnuncio() {
        return $_POST['descrizione'];
    }

    static function getPrezzoAnnuncio() {
        return $_POST['prezzo'];
    }

    static function getCategoriaAnnuncio() {
        return $_POST['categoria'];
    }

    // static function get

    function showAnnunci($annunci, $array=null) {
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        if (is_array($annunci)) {
            $numero = rand(0, count($annunci) - 1);
        }
    }
}