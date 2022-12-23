<?php

/**
 * La classe CContatti viene utilizzata per legare la home
 * ai nostri contatti, info e all'obiettivo della nostra web app
 * @author Gruppo7
 * @package Control
 */
class CContatti
{

    /**
     * Metodo che porta alla view che richiama la schermata con le nostre info
     * @return void
     * @throws SmartyException
     */
    static function chiSiamo(){
        $view = new VContatti();
        $view->contact();
    }
}