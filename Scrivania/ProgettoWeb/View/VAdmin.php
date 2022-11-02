<?php

class VAdmin
{
    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    function getDate() {
        return $_POST['date'];
    }

    function getEmail() {
        $value = null;
        if (isset($_POST['email']))
            $value = $_POST['email'];
        return $value;
    }

    function getId() {
        $value = null;
        if (isset($_POST['valore']))
            $value = $_POST['valore'];
        return $value;
    }

    function homeAdmin($utente, $list, $immagine) {
        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('list', $list);
        $this->smarty->assign('immagine', $immagine);

        $this->smarty->display('admin.tpl');
    }

    function profiloUtente($utente, $immagine) {
        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('immagine', $immagine);

        $this->smarty->display('utente.tpl');
    }

}