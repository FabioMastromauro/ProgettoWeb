<?php

require_once 'StartSmarty.php';
require_once 'PhpMailerStart.php';

class VUtente
{
    private $smarty;
    private $phpmailer;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
        $this->phpmailer=PhpMailerStart::configuration();
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



    public function showFormLogin(){
        $this->smarty->display('./smarty/libs/templates/login.tpl');
    }

    public function verifyPage($email,$password){
        $this->smarty->assign('email',$email);
        $this->smarty->assign('password',$password);
        $this->smarty->display('./smarty/libs/templates/verify.tpl');
    }

    public function loginOk(){
        $this->smarty->display('./smarty/libs/templates/index.tpl');
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

    static function mailer($email, $nome, $verification_code){
          $mail = new PHPMailer\PHPMailer\PHPMailer();

                //Enable verbose debug output
                $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

                //Send using SMTP
                $mail->isSMTP();

                //Set the SMTP server to send through
                $mail->Host = 'smtp.gmail.com';

                //Enable SMTP authentication
                $mail->SMTPAuth = true;

                //SMTP username
                $mail->Username = 'Spacco280@gmail.com';

                //SMTP password
                $mail->Password = 'usnguuwlyasusgnz';

                //Enable TLS encryption;
                $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;

                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('Spacco280@gmail.com', 'localmp');

                //Add a recipient
                $mail->addAddress($email, $nome);
                //Set email format to HTML
                $mail->isHTML(true);


                $mail->Subject = 'Email verification';
                $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

                $mail->send();
}

    public function profilo($annunci, $nome, $cognome, $email, $immagini, $fotoUtente, $fotoAutori, $idutente,$vemail){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $this->smarty->assign('nome', $nome);
        $this->smarty->assign('cognome', $cognome);
        $this->smarty->assign('email', $email);
        $this->smarty->assign('annuncio', $annunci);
        $this->smarty->assign('immagini', $immagini);
        $this->smarty->assign('foto_utente', $fotoUtente);
        $this->smarty->assign('foto_autori', $fotoAutori);
        $this->smarty->assign('vemail',$vemail);
        //$this->smarty->assign('facebook', $facebook);
        //$this->smarty->assign('instagram', $instagram);
        $this->smarty->assign('idutente', $idutente);

        $this->smarty->display('profilo_privato.tpl');
    }

    public function modificaProfilo($utente){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('nome', $utente->getNome());
        $this->smarty->assign('cognome', $utente->getCognome());
        $this->smarty->assign('password', $utente->getPassword());
        $this->smarty->assign('email', $utente->getEmail());

        //  $this->smarty->assign('immagine_utente', $foto);


        $this->smarty->display('profilo_privato.tpl');
    }

}