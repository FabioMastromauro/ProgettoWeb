<!DOCTYPE html>
{assign var='userlogged' value=$userlogged|default:'nouser'}
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Local Marketplace</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/localmp/smarty/libs/images/logomarket.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/localmp/smarty/libs/css/profile.css" rel="stylesheet" type="text/css"/>
    <link href="/localmp/smarty/libs/css/boot_styles.css" rel="stylesheet" type="text/css"/>

</head>
<body class="d-flex flex-column">
<main>
    <!-- Navigation-->
</main>
<div class="padding">
    <p></p>
    <div class="col-md-8">
        <!-- Column -->
        <div class="card"> <img class="card-img-top" src="https://i.imgur.com/K7A78We.jpg" alt="Card image cap">
            <div class="card-body little-profile text-center">
                <div class="pro-img"><img src="/localmp/smarty/libs/images/logomarket.png" alt="user"></div><!--./smarty/libs/assets/background_profilo.jpg-->
                <div class="ms-3">
                    <h3 class="m-b-0">{$utente->getNome()} {$utente->getCognome()}</h3>
                    {if $utente->getAdmin() == 0 & $utente->isBan()==0}
                        <p class="text-muted">Membro</p>
                        <form name="form" action="/localmp/Admin/bannaUtente/{$utente->getIdUser()}" method="post">
                            <p>Banna utente fino al</p>
                            <input type="date"  name="date" value="">
                            <button type="submit">Invia</button>
                        </form>


                    {/if}

                    {if $utente->getAdmin() == 1}
                        <p class="text-muted">Amministratore</p>
                    {/if}

                </div>
                {if $utente->isBan() == 1}
                    <p class="text-muted">Utente bannato fino al {$utente->getDataFineBan()}</p>
                    <a class="nav-link" href="/localmp/Admin/rimuoviBan/{$utente->getIdUser()}"> Rimuovi Ban</a>
                {/if}
            </div>
        </div>
    </div>
</div>
</div>
<footer class="bg-light py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Local Mrketplace 2022</div></div>
            <div class="col-auto">
                <!--<a class="link-light small" href="#!">Privacy</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Terms</a>
                <span class="text-white mx-1">&middot;</span>-->
                <a class="link-light small" href="/localmp/Contatti/chiSiamo">Contact</a>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>