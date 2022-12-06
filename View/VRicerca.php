<?php

class VRicerca
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    public function showHome($annunci_home, $venditore_annuncio, $annunci_foto)
    {
        if(CAdmin::isLogged())$this->smarty->assign('userLogged', 'admin');
        elseif (CUtente::isLogged())  $this->smarty->assign('userLogged', 'loggato');
        else $this->smarty->assign('userLogged', 'nouser');

        /*  $this->smarty->assign('annunci_home', $annunci_foto);
          $this->smarty->assign('autori_annuncio', $autore_annuncio);
          $this->smarty->assign('immagini', $immagini);
        */
        $this->smarty->assign('annunci_home', $annunci_home);
        $this->smarty->assign('autore_annuncio', $venditore_annuncio);
        $this->smarty->assign('annunci_foto', $annunci_foto);

        $this->smarty->display('./smarty/libs/templates/index.tpl');
    }
}