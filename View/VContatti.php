<?php

/**
 * Classe che porta alla pagina con i nostri contatti
 * e allo scopo di questa web app
 * @author Gruppo 7
 * @package View
 */
class VContatti
{
    /**
     * @var Smarty
     */
    private $smarty;

    /**
     * Costruttore che configura/inizializza smarty
     */
    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Metodo che mostra la schermata con le nostre info e obiettivi
     * @return void
     * @throws SmartyException
     */
    public function contact(){
        $this->smarty->display('about_us.tpl');
    }
}