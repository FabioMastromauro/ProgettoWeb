<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'autoload.php';




class CVerifica
{


    static function send_email()
    {
        if (isset($_POST["register"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            //Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Enable verbose debug output
                $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

                //Send using SMTP
                $mail->isSMTP();

                //Set the SMTP server to send through
                $mail->Host = 'smtp.gmail.com';

                //Enable SMTP authentication
                $mail->SMTPAuth = true;

                //SMTP username
                $mail->Username = 'your_email@gmail.com';

                //SMTP password
                $mail->Password = 'your_password';

                //Enable TLS encryption;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('your_email@gmail.com', 'your_website_name');

                //Add a recipient
                $mail->addAddress($email, $name);

                //Set email format to HTML
                $mail->isHTML(true);

                $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

                $mail->Subject = 'Email verification';
                $mail->Body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

                $mail->send();
                // echo 'Message has been sent';

                $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

                // connect with database
                $conn = mysqli_connect("localhost:8889", "root", "root", "test");

                // insert in users table
                $sql = "INSERT INTO users(name, email, password, verification_code, email_verified_at) VALUES ('" . $name . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";
                mysqli_query($conn, $sql);

                header("Location: email-verification.php?email=" . $email);
                exit();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
    static function verify(){ if (isset($_POST["login"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // connect with database
        $conn = mysqli_connect("localhost:8889", "root", "root", "test");

        // check if credentials are okay, and email is verified
        $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0)
        {
            die("Email not found.");
        }

        $user = mysqli_fetch_object($result);

        if (!password_verify($password, $user->password))
        {
            die("Password is not correct");
        }

        if ($user->email_verified_at == null)
        {
            die("Please verify your email <a href='email-verification.php?email=" . $email . "'>from here</a>");
        }

        echo "<p>Your login logic here</p>";
        exit();
    }

    }

    static function mailOk(){  if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];

        // connect with database
        $conn = mysqli_connect("localhost:8889", "root", "root", "test");

        // mark email as verified
        $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == 0)
        {
            die("Verification code failed.");
        }

        echo "<p>You can login now.</p>";
        exit();
    }
    }

/*
    static function send_mail($recipient,$subject,$message)
    {

        $mail = new PHPMailer();
        $mail->IsSMTP();

        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "your-email@gmail.com";
        $mail->Password   = "your-app-password";

        $mail->IsHTML(true);
        $mail->AddAddress($recipient, "esteemed customer");
        $mail->SetFrom("your-email@gmail.com", "My website");
        $mail->Subject = $subject;
        $content = $message;

        $mail->MsgHTML($content);
        if(!$mail->Send()) {

            return false;
        } else {
            return true;
        }

    }

    static function verifica(){


        $pm=USingleton::getInstance('FPersistentManager');
        $session=USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));


            if($_SERVER['REQUEST_METHOD'] == "GET" && !self::check_verified()){

                        //send email Genera il numero verifica
                    $codice =  rand(10000,99999);

                        //save to database Prende il tempo attuale + il tempo per completare l'operazione
                    $tempo = (time() + (60 * 10));
                    $email =$utente->getEmail();

                    $obj = new EVerifica(null,$codice,$tempo,$email);
                   $pm->store($obj);


                    $message = "Il tuo codice è  " . $codice;
                    $subject = "Verifica mail";
                    $recipient = $email;
                    send_mail($recipient,$subject,$message);
            }

    elseif ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!self::check_verified()) {

           $row = $pm->search('FVerifica',array(['codice','=',$_POST['codice'],['email','=',$utente->getEmail()]]));

            if (is_array($row)) {
                $row = $row[0];
                $time = time();

                if ($row->getTempo() > $time) {

                    $id = $utente->getIdUser();
                    $pm->update('vemail',$utente->getEmail(),'idUser',$id);


                    header("Location: /localmp/");
                    die;
                } else {
                    echo "Code expired";
                }

            } else {
                echo "wrong code";
            }
        } else {
            echo "You're already verified";
        }
    }
    }

//metodo per che verifica se la mail è verificata
    static  function  check_verified($id=null){

            $pm=USingleton::getInstance('FPersistentManager');
            $session=USingleton::getInstance('USession');

            if($id == null){
                $utente = unserialize($session->readValue('utente'));
            } else {
                $utente = $pm::load('FUtente', array(['idUser', '=', $id]));
            }

            if(isset($utente)){
                $utente = $utente['idUser'];
                if($utente->email == $utente->email_verified){

                    return true;
                }
            }
            else  return false;

        }
*/

}