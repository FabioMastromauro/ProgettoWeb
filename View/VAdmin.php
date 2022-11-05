<?php

/**
 * La classe VAdmin si occupa dell'input-output per l'Admin
 * @author Gruppo 7
 * @package View
 */

class VAdmin
{
    /**
     * @var Smarty
     */
    private $smarty;

    /**
     * Funzione che inizializza e configura smarty
     */
    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }


    /**
     * Metodo che restituisce la data fino a quando bannare l'utente
     * @return mixed data di iscrizione utente
     */
    function getDate() {
        return $_POST['date'];
    }

    /**
     * Metodo che restituisce l'email dell'utente da bannare/riattivare
     * Inviato con metodo POST
     * @return string contenente l'email dell'utente
     */
    function getEmail() {
        $value = null;
        if (isset($_POST['email']))
            $value = $_POST['email'];
        return $value;
    }

    /**
     * Metodo che restituisce l'id della recensione da eliminare
     * Inviato con il metodo POST
     * @return string contenente l'email dell'utente
     */
    function getId() {
        $value = null;
        if (isset($_POST['valore']))
            $value = $_POST['valore'];
        return $value;
    }

    /**
     * Metodo che permette di visualizzare l'homepage dell'admin
     * @param $utente utente
     * @param $list array degli utenti
     * @param $immagine array delle immagini utente
     * @return void
     * @throws SmartyException
     */
    function homeAdmin($utente, $list, $immagine) {
        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('list', $list);
        $this->smarty->assign('immagine', $immagine);

        $this->smarty->display('admin.tpl');
    }

    /**
     * Metodo che permette di visualizzare il profilo di un utente dall'admin
     * @param $utente utente
     * @param $immagine immagine utente
     * @return void
     * @throws SmartyException
     */
    function profiloUtente($utente, $immagine) {
        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('immagine', $immagine);

        $this->smarty->display('utente.tpl');
    }

}