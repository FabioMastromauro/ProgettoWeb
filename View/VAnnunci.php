<?php

class VAnnunci
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    static function getTitoloAnnuncio()
    {
        return strtoupper($_POST['title']);
    }

    static function getDescrizioneAnnuncio()
    {
        return $_POST['descrizione'];
    }

    static function getPrezzoAnnuncio()
    {
        return $_POST['prezzo'];
    }

    static function getCategoriaAnnuncio()
    {
        return $_POST['categoria'];
    }

    // static function get

    function showAnnunci($annunci, $array = null) {
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        if (is_array($annunci)) {
            $numero = rand(0, count($annunci) - 1);
            $this->smarty->assign('ran_num', $numero);
        }
        $this->smarty->assign('annunci', $annunci);
        $this->smarty->assign('array', $array);

        $this->smarty->display('annunci.tpl');
    }
    public function modificaAnnuncio($annuncio, $foto, $descrizione, $categoria, $prezzo) {
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $this->smarty->assign('annuncio', $annuncio);
        $this->smarty->assign('foto', $foto);
        $this->smarty->assign('descrizione', $descrizione);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('prezzo', $prezzo);

        $this->smarty->display('annuncio_privato.tpl'); //da aggiungere
    }


    function showInfo(EAnnuncio $annuncio, $user, $mod, $foto, $immagine_autore) {
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $descrizione = explode('.', $annuncio->getDescrizione());

        $this->smarty->assign('mod', $mod);
        $this->smarty->assign('utente', $user);
        $this->smarty->assign('annuncio', $annuncio);
        $this->smarty->assign('foto', $foto);
        $this->smarty->assign('descrizione', $descrizione);
        $this->smarty->assign('immagine_autore', $immagine_autore);

        $this->smarty->display('annuncio_info.tpl'); // bisogna creare il template
    }
}