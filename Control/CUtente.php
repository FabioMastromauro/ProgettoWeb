<?php

/**
 * La classe CUtente gestisce le interazioni dell'utente con la web app
 * e permette la personalizzazione dei dati personali
 * @author Gruppo7
 * @package Control
 */
class CUtente
{

    /**
     * Metodo che gestisce il login da parte di un utente
     * @return void
     */

    static function confermaMail(){
        $view = new VUtente();
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        $utente = $pm->load('FUtente',array(['idUser','=',$_GET['idUser']]));

        if($utente->getCodice() == $_POST['codice']){

            $pm->update('vemail', date('Y-m-d'), 'idUSer', $utente->getIdUser(), 'FUtente');
            $session->setValue('vemail', $utente->getVemail());
            header('Location: /localmp/Utente/login');

        } else {$view->loginError(0, 'Codice errato');}

    }


    static function login() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (static::isLogged()) {
                $pm = USingleton::getInstance("FPersistentManager");
                $view = new VUtente();
                $view->loginOk();

            }
            else {
                $view = new VUtente();
                $view->showFormLogin();

            }
        }
        elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            static::verifica();

        }
    }



    /**
     * Metodo che verifica se un utente è bannato oppure è un admin
     * @return void
     */
    static function verifica() {
        $view = new VUtente();
        $pm = USingleton::getInstance("FPersistentManager");
        $utente = $pm->loadLogin(VUtente::getEmail(), VUtente::getPassword());
        $_POST['idUser']=$utente->getIdUser();
        if($utente->getVemail()!=null) {
            if ($utente != null) {
                if ($utente->isBan() != 1) {
                        if (USession::sessionStatus() == PHP_SESSION_NONE) {
                            $session = USingleton::getInstance("USession");
                          //  $pm->update('vemail', date('Y-m-d'), 'idUSer', $utente->getIdUser(), 'FUtente');
                            $dati = serialize($utente);
                            $admin = $utente->getAdmin();
                            $session->setValue("admin", $admin);
                            $session->setValue("utente", $dati);
                          //  $session->setValue('vemail', $utente->getVemail());
                            if ($admin == 1) {
                                header("Location: /localmp/Admin/home");
                            } else {
                                header("Location: /localmp/");
                            }
                        }


                } else {
                    $view->loginError(1, 'bannato', $utente->getDataFineBan());
                }

            } else {
                $view->loginError(0, 'errore');
            }

        } else{
                $view->verifyPage();
        }
    }



    /**
     * Metodo che verifica se un utente è loggato
     * @return bool
     */
    static function isLogged() {
        $identified = false;
        if (isset($_COOKIE['PHPSESSID'])) {
            if (USession::sessionStatus() == PHP_SESSION_NONE) {
                USingleton::getInstance("USession");
            }
        }
        if (isset($_SESSION['utente'])) {
            $identified = true;
        }

        return $identified;
    }

    /**
     * Metodo cbe distrugge tutti i cookie o sessID legati ad un utente
     * al momento del logout
     * @return void
     */
    static function logout() {
        $session = USingleton::getInstance("USession");
        $session->unsetSession();
        $session->destroySession();
        setcookie('PHPSESSID', ''); //elimina il cookie lato client
        header('Location: /localmp/');
    }

    /**
     * Metodo che gestisce la registrazione di un utente
     * @return void
     */
    static function registration() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $view = new VUtente();
            if (self::isLogged()) {
                $view->loginOk();
            }
        }
        elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            self::verifyRegistration();
        }
    }

    /**
     * Metodo che, dopo aver verificato l'esistenza da parte di un utente,
     * registra i suoi dati sul DB
     * @return void
     */
    static function verifyRegistration() {
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        $utente = unserialize($session->readValue('utente'));
        $verifyEmail = $pm::exist("email", VUtente::getEmail(), "FUtente");
        $view = new VUtente();
        if ($verifyEmail) {
            $view->registrationError("email");
        }
        else {
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
                $mail->addAddress($_POST['email'], $_POST['nome']);
                //Set email format to HTML
                $mail->isHTML(true);

                $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

                $mail->Subject = 'Email verification';
                $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

                $mail->send();

                $utente = new EUtente(VUtente::getNome(),VUtente::getCognome(),VUtente::getEmail(),null,date("Y/m/d"),null,0,VUtente::getPassword(),0,null,null,$verification_code);
                $pm::store($utente);
                header("Location: /localmp/Utente/login");
            }

        }



    /**
     * Metodo che rimanda alla view col template riguardante il profilo
     * dell'utente e la modifica dei suoi dati
     * @param $id
     * @return void
     */
    static function profilo($id=null){
        $view = new VUtente();
        $session = USingleton::getInstance('USession');
        $pm = USingleton::getInstance('FPersistentManager');
        if($id == null){
                $utente = unserialize($session->readValue('utente'));
            } else {
                $utente = $pm::load('FUtente', array(['idUser', '=', $id]));
            }
        if (CUtente::isLogged() || $id!=null){
            $fotoUtente = $pm::load('FFotoUtente', array(['idFoto', '=', $utente->getidFoto()]));
            $annuncio = $pm::load('FAnnuncio', array(['idVenditore', '=', $utente->getIdUser()]));
            if ($annuncio != null) {
                if (is_array($annuncio)) {
                    for ($i = 0; $i < sizeof($annuncio); $i++) {
                        $foto[$i] = $pm::load('FFotoAnnuncio', array(['idFoto', '=', $annuncio[$i]->getIdFoto()]));
                        $autori_annunci[$i] = $pm::load('FUtente', array(['idUser', '=', $annuncio[$i]->getAutore()]));
                        $foto_autori[$i] = $pm::load('FFotoUtente', array(['idFoto', '=', $autori_annunci[$i]->getidFoto()]));
                    }
                } else {
                    $foto = $pm::load('FFotoAnnuncio', array(['idFoto', '=', $annuncio->getIdFoto()]));
                    $autori_annunci = $pm::load('FUtente', array(['idUser', '=', $annuncio->getAutore()]));
                    $foto_autori = $pm::load('FFotoUtente', array(['idFoto', '=', $autori_annunci->getidFoto()]));
                }
                $view->profilo($annuncio, $utente->getNome(), $utente->getCognome(), $utente->getEmail(), $foto, $fotoUtente, $foto_autori, $id,$utente->getVemail());
            }
            else {
                $view->profilo($annuncio, $utente->getNome(), $utente->getCognome(), $utente->getEmail(), $foto = null, $fotoUtente, $foto_autori = null, $id,$utente->getVemail());
            }
        } else {
            header('Location: /localmp/Utente/login');
        }
    }


    /**
     * Metodo che rimanda alla view che permette la modifica
     * dei dati personali dell'utente
     * @return void
     */
    static function modificaProfilo() {
        $pm = USingleton::getInstance("FPersistentManager");
        $view = new VUtente();
        $session = USingleton::getInstance("USession");
        $utente = unserialize($session->readValue("utente"));
        if (CUtente::isLogged()) {
        $view->modificaProfilo($utente);
        }
        else {
            header("Location: /localmp/Utente/login");
        }
    }

    /**
     * Metodo che permette l'upload di una foto al momento della
     * creazione dell'utente o modifica del profilo
     * @return bool
     */
    static function upload() {
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        $ris = false;
        $maxSize = 300000;
        $risultato = is_uploaded_file($_FILES["file"]["tmp_name"]);
        $size = $_FILES["file"]["size"];
        $tipo = $_FILES["file"]["type"];
        $nomeFoto = $_FILES["file"]["nome"];
        if (!$risultato) {
            return $ris; // upload fallito
        } elseif ($size > $maxSize) {
            return $ris; // il file è troppo grande
        }
        $foto = file_get_contents($_FILES["file"]["tmp_name"]);
        $foto = addslashes($foto);
        $fotoCaricata = new EFotoUtente($idFoto = 0, $nomeFoto, $size, $tipo, $foto);
        $pm::storeMedia($fotoCaricata, "file");
        $ris = true;
        return $ris;
    }

    /**
     * Metodo che aggiorna il DB con i nuovi dati dell'utente
     * forniti a seguito delle modifiche
     * @return void
     */
    static function modificaP() {
        $pm = USingleton::getInstance("FPersistentManager");
        $session = USingleton::getInstance("USession");
        if(CUtente::isLogged()) {
            $idFoto = self::upload();
            $utente = unserialize($session->readValue('utente'));
            $nome = VUtente::getNome();
            $cognome = VUtente::getCognome();
            $email = VUtente::getEmail();
            $password = VUtente::getPassword();

            if($nome !=''){
                $pm::update('nome', $nome, 'idUser', $utente->getIdUser(), "FUtente");
                $utente->setNome($nome);
            }

            if($cognome!=''){
                $pm::update('cognome', $cognome, 'idUser', $utente->getIdUser(), "FUtente");
                $utente->setCognome($cognome);
            }

            if($email!=''){
                $pm::update('email', $email, 'idUser', $utente->getIdUser(), "FUtente");
                $utente->setEmail($email);
                }
            if($password!=''){
                $pm::update('password', $password, 'idUser', $utente->getIdUser(), "FUtente");
                $utente->setPassword($password);
             }


            $session->destroyValue('utente');

          if ($idFoto != false) {
                // if ((int) $utente->getIdFoto())
                $pm::update('idFoto', $idFoto, 'idUser', $utente->getIdUser(), "FUtente");
                $utente->setIdFoto($idFoto);
                $session->setValue('utente', serialize($utente));

                header("Location: /localmp/Utente/profilo");
            } else {
                $session->setValue('utente', serialize($utente));

                header("Location: /localmp/Utente/profilo");
            }
        } else {
            header("Location: /localmp/Utente/profilo");
        }
    }





}
