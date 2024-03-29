<!DOCTYPE html>

{assign var="ban" value=$ban|default:0}
{assign var="error" value=$error|default:''}
{assign var="emailExist" value=$emailExist|default:''}
{assign var="emailRegex" value=$emailRegex|default:''}
{assign var="password" value=$password|default:''}
{assign var="vemail" value=$vemail|default:null}
{assign var="fine_ban" value=$fine_ban|default:''}
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
    <form action="/localmp/Utente/registration" method="POST">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrazione</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">Cognome</label>
                        <input type="text" class="form-control" name="cognome" value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" {literal}pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"{/literal} title="Deve essere inclusa una chiocciola @ per l'email"/>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6">

                        <label for="validationCustom03"  class="form-label">Password</label>

                        <input type="password" class="form-control" id="pswq" name="password" {literal}pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"{/literal} title="La password deve contenere almeno 8 caratteri, di cui almeno una lettera maiuscola"/>
                        <i type="checkbox" class="far fa-eye" id="togglePassword2" style="position: relative; left: 95%;bottom: 30px;cursor: pointer;" onclick="show('pswq')">
                        </i>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <input class="btn btn-primary" type="submit" value="Registrati">
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </form>
    </div>
</div>

{if $ban == 1 && $fine_ban != ''}
    <script>alert("Sei stato bannato fino al {$fine_ban}")</script>
{/if}

{if $error == 'errore'}
    <script>alert("Riprova l'accesso")</script>
{/if}

{if $emailRegex == 'errorRegex'}
    <script>alert("Email non valida")</script>
{/if}
{if $password == 'errorPassword'}
    <script>alert("Password non valida")</script>
{/if}

{if $emailExist == 'errorExist'}
    <script>alert("Email già esistente")</script>
{/if}

<main>

    <form method="POST" action="/localmp/Utente/login">
        <div class="row">
            <div class="colm-form">
                <div class="form-container">
                    <input type="text" name="email" placeholder="Email address" value="">
                    <i type="checkbox" class="far fa-eye" id="togglePassword2" style="position: relative; left: 40%;bottom: -40px;cursor: pointer;" onclick="show('psw')">
                    </i>
                    <input type="password" name="password" id="psw" placeholder="Password" value="">

                    <button  id="index" class="btn-login">Login</button>
                    <a href="#">Forgotten password?</a>
                    <!--<button class="btn-new" onclick="location.href='./register.html'">Create new Account</button>-->
                    <!-- Button trigger modal -->
                   <button type="button" class="btn btn-new" data-bs-toggle="modal" data-bs-target="#exampleModal">
                       Create new Account
                    </button>
              </form>
                    <form style="color: #a94442" action="/localmp/Utente/Ricerca">
                        <input type="submit" value="Indietro" class="btn btn-new">
                    </form>
                </div>
            </div>
        </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="/localmp/smarty/libs/javascript/showpsw.js"></script>
</body>
</html>