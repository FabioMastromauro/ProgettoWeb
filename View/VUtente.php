<?php

require_once 'C:\xampp\htdocs\ProgettoWeb\StartSmarty.php';

class VUtente
{
    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }
    static function getEmail(){
        return $_POST['email'];
    }
    static function getPassword(){
        return md5($_POST['password']);
    }
    static function getNome(){
        return $_POST['nome'];
    }
    static function getCognome(){
        return $_POST['cognome'];
    }
    static function getUsername(){
        return $_POST['username'];
    }

    public function showFormLogin(){
        $this->smarty->display('./smarty/libs/templates/login.tpl');
    }

    public function loginOk(){
        $this->smarty->display('.smarty/libs/templates/index.tpl');
    }

    public function loginError($ban=0, $error='', $fine_ban=''){
        $this->smarty->assign('ban', $ban);
        $this->smarty->assign('fine_ban', $fine_ban);
        $this->smarty->assign('error', $error);

        $this->smarty->display('./smarty/libs/templates/login.tpl');
    }

    public function registrationError($error){
        switch ($error){
            case 'email':
                $this->smarty->assign('emailError', "errore");
                break;
        }
        $this->smarty->display('.smarty/libs/templates/login.tpl');
    }

    public function profilo($annunci, $nome, $cognome, $email, $immagini, $fotoUtente, $fotoAutori, $idutente){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $this->smarty->assign('nome', $nome);
        $this->smarty->assign('cognome', $cognome);
        $this->smarty->assign('email', $email);
        $this->smarty->assign('annuncio', $annunci);
        $this->smarty->assign('immagini', $immagini);
        $this->smarty->assign('foto_utente', $fotoUtente);
        $this->smarty->assign('foto_autori', $fotoAutori);
        //$this->smarty->assign('facebook', $facebook);
        //$this->smarty->assign('instagram', $instagram);
        $this->smarty->assign('idutente', $idutente);

        $this->smarty->display('profilo_privato.tpl');
    }

    public function modificaProfilo($utente, $immagine_utente){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('immagine_utente', $immagine_utente);
        $this->smarty->display('edit-profile.tpl');
    }

}