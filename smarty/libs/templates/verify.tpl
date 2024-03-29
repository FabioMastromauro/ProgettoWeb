<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Local Marketplace - Login or Sign up</title>
    <link rel="icon" type="image/x-icon" href="/localmp/smarty/libs/images/logomarket.png" />
    <link rel="stylesheet" href="/localmp/smarty/libs/css/login.css">
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="/localmp/smarty/libs/css/style.css" rel="stylesheet">

    <script>
        function ready(){
            if(!navigator.cookieEnabled){
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
            }
        }
    </script>


</head>
<body style="margin:0">
<form method="POST" action="/localmp/Utente/confermaMail" enctype="multipart/form-data">

        <div class="row">
            <div class="colm-form">
                <div class="form-container">
                    <p>Controlla il codice di verifica sulla tua email!</p>
                    <input  type="text" name="email" id="email" placeholder="Email address" value="{$email}" hidden>
                    <input  type="password" name="password" id="password" placeholder="Password" value="{$password}" hidden>
                    <input type="text" name="codice" id="codice" placeholder="Codice di verifica" value="" >
                    <input type="submit"   class="btn btn-login" value="Verifica">
                </div>
                <form action="/localmp/Utente/Ricerca">
                    <input type="submit" value="Indietro" class="btn btn-new">
                </form>
            </div>
        </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="/localmp/smarty/libs/javascript/showpsw.js"></script>
</body>
</html>