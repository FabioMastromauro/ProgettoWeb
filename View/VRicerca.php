<?php

class VRicerca
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    public function showHome($annunci_home, $autore_annuncio, $immagini, $post_home, $post_author)
    {
        if (CUtente::isLogged()) $utente = $this->smarty->assign('userlogged', 'loggato');

        $this->smarty->assign('annunci_home', $annunci_home);
        $this->smarty->assign('autori_annuncio', $autore_annuncio);
        $this->smarty->assign('immagini', $immagini);

        $this->smarty->assign('post_home', $post_home);
        $this->smarty->assign('post_author', $post_author);
        // $this->smarty->assign('post_immagine', $post_immagine);
        // $this->smarty->assign('immagini_autore', $immagini_autore);

        $this->smarty->display('./smarty/libs/templates/index.tpl');
    }
}