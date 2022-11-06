<!doctype html>
{assign var = 'userlogged' value=$userlogged|default:'nouser'}
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="../javascript/searchbar.js"></script>

    <script>
        function ready(){
            if(!navigator.cookieEnabled){
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione')
            }
        }
        document.addEventListener("DOMContentLoaded",ready);
    </script>

</head>
<body>

<div id="searchbar"></div>

<!--
<nav class="navbar navbar-expand-lg bg-light  fixed-top " style="height: 45px">
    <div class="container-fluid">
        <img src="/smarty/libs/images/logomarket.png" alt="" style="width: 50px" class="d-inline-block align-text-top">
        <span class="navbar-brand" >LOCAL MARKETPLACE</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/localmp/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/localmp/Contact/contattaci">Chi siamo?</a>
                </li>
                {if $userlogged != 'nouser'}
                <li class="nav-item">
                    <a class="nav-link active" href="/localmp/Utente/profilo">Profilo</a>
                </li>

            </ul>

                <img src="/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
                <a class="nav-link" href="/localmp/Utente/logout">Disconnetti</a>

                {else}

            </ul>

            <img src="/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
            <a class="nav-link" href="/localmp/Utente/login">Login/Registrati</a>

                {/if}


            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
                <button class="btn btn-dark" type="submit" >Search</button>
            </form>

        </div>
    </div>
</nav> -->

<div class="container my-15 text-center">
    <h1 class="header_top">BENVENUTO SU LOCAL MARKETPLACE</h1>
    <p class="lead"> Il tuo mercato locale </p>
    <!--<button type="button" class="btn btn-dark">News</button> -->
    <button onclick="document.location='#annunci'" type="button" class="btn btn-dark">Annunci</button>
    <!--<button type="button" class="btn btn-dark">Tendenze</button> -->
    <!--<button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
    </button>
    <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Categoria 1</a></li>
            <li><a class="dropdown-item" href="#">Categoria 2</a></li>
            <li><a class="dropdown-item" href="#">Categoria 3</a></li>
    </ul> -->
   <button onclick="document.location='#footer'" type="button" class="btn btn-secondary">Contattaci</button>
</div>
<section class="banner_main" >
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="text-bg">
                    <h1 style="font-family: 'Brush Script MT',cursive;font-size:75px"> <span class="blodark"> Local Marketplace</span> <br>Trends 2022</h1>
                    <p class="lead">Quello che cerchi a 1 click</p>
                    <button onclick="document.location='#annunci'" id = "shopnow" type="button" class="btn btn-dark">Shop Now</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ban_img">
                    <picture><img href="#" src="/smarty/libs/images/neonmarket.jpg" alt="#"/></picture>
                </div>
            </div>
        </div>
    </div>
</section>
<p></p>
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="text-center">
                    <h2 class="fw-bolder mb-5">Annunci</h2>
                </div>
            </div>
        </div>
<div class=" row gx-2 ">
    {if is_array($annunci_home) && is_array($annunci_foto)}
        {for $i = 0; $i < sizeof($annunci_home); $i++}

    <div id = "annunci" class="col-lg-4 mb-5">
        <div class="row" style="width: 18rem">
            <div class="card  h-100 shadow border-0"  >
                <img  class="card-img-top same" src="data:{$annunci_foto[$i]->getTipo()};base64,{$annunci_foto[$i]->getFoto()}" style="width: 200px; height: 100px" alt="pizza margherita"  />

                <div class="card-body p-4">
                    <h5 class="card-title">{$annunci_home[$i]->getTitolo()}</h5>
                    <p class="card-text">{$annunci_home[$i]->getDescrizione()}</p>
                    <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[$i]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>

                </div>
            </div>
             <p></p>

        </div>
    </div>
        {/for}
    {/if}


        <footer id="footer">
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="inror_box">
                                <h3>INFORMAZIONI </h3>
                                <p>Questo è un sito per la compravendita di oggetti di ogni tipo, è necessario registrarsi per pubblicare annunci mentre non è necessario registrarsi per acquistare oggetti. <a href="#shopnow">Shop now</a> </p>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="inror_box">
                                <h3>ACCOUNT </h3>
                                <p>Per registrarsi o loggarsi basta cliccare sulla voce <a href="#searchbar">Login/Registrati</a> in alto a destra. </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="inror_box">
                                <h3>ABOUT US  </h3>
                                <p>Federico Civitareale  cellulare: <a href="tel:+39 3450792613">+39 3450792613</a>  email: <a href="mailto:federico.civitareale@student.univaq.it">federico.civitareale@student.univaq.it</a> </p>
                                <p>Fabio Mastromauro  cellulare: <a href="tel:+39 3890262673">+39 3890262673</a> email: <a href="mailto:fabio.mastromauro@student.univaq.it">fabio.mastromauro@student.univaq.it</a> </p>
                                <p>Giorgio Tarquini cellulare: <a href="tel:+39 3339154764">+39 3339154764</a> email: <a href="mailto:giorgio.tarquini1@student.univaq.it">giorgio.tarquini1@student.univaq.it</a> </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="inror_box">
                                <h3>SOCIAL CONTACTS  </h3>
                                <p>Facebook:</p>
                                <p><a href="https://m.facebook.com/federico.civitareale">Federico Civitareale</a></p>
                                <p><a href="https://www.facebook.com/fabio.mastromauro.7">Fabio Mastromauro</a></p>
                                <p><a href="https://www.facebook.com/giorgio.tarquini.5">Giorgio Tarquini</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p>© 2022 All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>