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

    static function getRicerca(){
        return $_POST['ricerca'];
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

        $this->smarty->display('annuncio_privato.tpl');
    }

    function showCreaAnnuncio(){
        $this->smarty->display('crea_annuncio.tpl');
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

        $this->smarty->display('annuncio.tpl');
    }

    function showAllErr($annunci, $num_annunci, $num_pagine, $index, $immagini, $cerca, $tipoerr, $input, $categorie){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        if ($cerca != null) $this->smarty->assign('searchMod', 'searchOn');//?

        $this->smarty->assign('immagini', $immagini);
        $this->smarty->assign('annunci', $annunci);
        $this->smarty->assign('index', $index);
        $this->smarty->assign('num_pagine', $num_pagine);
        $this->smarty->assign('num_annunci', $num_annunci);
        $this->smarty->assign('tipoerr', $tipoerr);
        $this->smarty->assign('input', $input);
        $this->smarty->assign('categorie', $categorie);

        $this->smarty->display('showAllRev.tpl');
    }

    function showAll($annunci, $num_pagine,$index, $num_annunci, $immagini, $cerca, $categorie){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        if ($cerca != null) $this->smarty->assign('searchMod', 'searchOn');

        $this->smarty->assign('immagini', $immagini);
        $this->smarty->assign('annunci', $annunci);
        $this->smarty->assign('index', $index);
        $this->smarty->assign('num_pagine', $num_pagine);
        $this->smarty->assign('num_annunci', $num_annunci);
        $this->smarty->assign('categorie', $categorie);

        $this->smarty->display('showAllRev.tpl');
    }
}