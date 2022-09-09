<!doctype html>
{assign var='userlogged' value=$userlogged|default:'nouser'}
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Marketplace</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body{
            background-image: url("../images/background.png");
        }
    </style>

    <script>
        function ready(){
            if (!navigator.cookieEnabled) {
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
            }
        }
        document.addEventListener("DOMContentLoaded", ready);
    </script>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
        <img src="logomarket.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
        <a class="navbar-brand" href="#">LOCAL MARKETPLACE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="chi_siamo.html">Chi siamo?</a>
                </li>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
                    <button class="btn btn-dark" type="submit" >Search</button>
                </form>
            </ul>



            <!-- aggiungere path -->
            <li class="nav-item">
                <img src="login.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">

                <a class="nav-link" href="login.html">Login/Registrati</a>
            </li>
            {if $userlogged!='nouser'}
                <li class="nav-item text-light">
                    <a class="nav-link" href="#">Nuovo annuncio</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link" href="#">Profilo</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link" href="#">Disconnetti</a>
                </li>
            {else}
                <li class="nav-item">
                    <a class="nav-link" href="#">Accedi</a>
                </li>
            {/if}

        </div>
    </div>
</nav>
<div class="container my-5 text-center">
    <h1 class="header_top">BENVENUTO SU LOCAL MARKETPLACE</h1>
    <p class="lead"> Il tuo mercato locale </p>
    <button type="button" class="btn btn-dark">News</button>
    <button type="button" class="btn btn-dark">Annunci</button>
    <button type="button" class="btn btn-dark">Tendenze</button>
    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Categorie
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Categoria 1</a></li>
        <li><a class="dropdown-item" href="#">Categoria 2</a></li>
        <li><a class="dropdown-item" href="#">Categoria 3</a></li>
    </ul>
    <button type="button" class="btn btn-secondary">Contattaci</button>
</div>
<section class="banner_main" >
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="text-bg">
                    <h1 style="font-family: 'Brush Script MT',cursive;font-size:75px"> <span class="blodark"> Local Marketplace</span> <br>Trends 2022</h1>
                    <p class="lead">Quello che cerchi a 1 click</p>
                    <button type="button" class="btn btn-dark">Shop Now</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ban_img">
                    <picture><img href="#" src="neonmarket.jpg" alt="#"/></picture>
                </div>
            </div>
        </div>
    </div>
</section>
<p></p>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-5" style="width: 18rem;">
                <img src="logo.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$anuunci[0]->getNomeAnnuncio()}</h5>
                    <p class="card-text">{substr($annunci_home[0]->getDescrizione(), 0, 100)}...</p>
                    <a href="#/{$annunci_home[0]->getId()}"><img src="data:{$immagini[0]->getTipo()};base64,{$immagini[0]->getImmagine()}" width=900 height=500 class="d-block w-100" alt="..."></a>
                </div>
            </div>
            <p></p>
        </div>
        <div class="col">
            <div class="card mb-5" style="width: 18rem;">
                <img src="logo.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$anuunci[1]->getNomeAnnuncio()}</h5>
                    <p class="card-text">{substr($annunci_home[1]->getDescrizione(), 0, 100)}...</p>
                    <a href="#/{$annunci_home[1]->getId()}"><img src="data:{$immagini[1]->getTipo()};base64,{$immagini[1]->getImmagine()}" width=900 height=500 class="d-block w-100" alt="..."></a>
                </div>
            </div>
            <p></p>
        </div>
        <div class="col">
            <div class="card mb-5" style="width: 18rem;">
                <img src="logo.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$anuunci[2]->getNomeAnnuncio()}</h5>
                    <p class="card-text">{substr($annunci_home[2]->getDescrizione(), 0, 100)}...</p>
                    <a href="#/{$annunci_home[2]->getId()}"><img src="data:{$immagini[2]->getTipo()};base64,{$immagini[2]->getImmagine()}" width=900 height=500 class="d-block w-100" alt="..."></a>
                </div>
            </div>
            <p></p>
        </div>
        <div class="col">
            <div class="card mb-5" style="width: 18rem;">
                <img src="banner.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$anuunci[3]->getNomeAnnuncio()}</h5>
                    <p class="card-text">{substr($annunci_home[3]->getDescrizione(), 0, 100)}...</p>
                    <a href="#/{$annunci_home[3]->getId()}"><img src="data:{$immagini[3]->getTipo()};base64,{$immagini[3]->getImmagine()}" width=900 height=500 class="d-block w-100" alt="..."></a>
                </div>
            </div>
            <p></p>
        </div>
        <div class="col">
            <div class="card mb-5" style="width: 18rem;">
                <img src="banner.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$anuunci[4]->getNomeAnnuncio()}</h5>
                    <p class="card-text">{substr($annunci_home[4]->getDescrizione(), 0, 100)}...</p>
                    <a href="#/{$annunci_home[4]->getId()}"><img src="data:{$immagini[4]->getTipo()};base64,{$immagini[4]->getImmagine()}" width=900 height=500 class="d-block w-100" alt="..."></a>
                </div>
            </div>
            <p></p>
        </div>
        <div class="col">
            <div class="card mb-5" style="width: 18rem;">
                <img src="banner.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$anuunci[5]->getNomeAnnuncio()}</h5>
                    <p class="card-text">{substr($annunci_home[5]->getDescrizione(), 0, 100)}...</p>
                    <a href="#/{$annunci_home[5]->getId()}"><img src="data:{$immagini[5]->getTipo()};base64,{$immagini[5]->getImmagine()}" width=900 height=500 class="d-block w-100" alt="..."></a>
                </div>
            </div>
            <p></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mb-5" style="width: 18rem;">
                    <img src="logo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$anuunci[6]->getNomeAnnuncio()}</h5>
                        <p class="card-text">{substr($annunci_home[6]->getDescrizione(), 0, 100)}...</p>
                        <a href="#/{$annunci_home[6]->getId()}"><img src="data:{$immagini[6]->getTipo()};base64,{$immagini[6]->getImmagine()}" width=900 height=500 class="d-block w-100" alt="..."></a>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col">
                <div class="card mb-5" style="width: 18rem;">
                    <img src="logo.png" class="card-img-top" alt="...">
                    <di  <h5 class="card-title">{$anuunci[7]->getNomeAnnuncio()}</h5>
                    <p class="card-text">{substr($annunci_home[7]->getDescrizione(), 0, 100)}...</p>
                    <a href="#/{$annunci_home[7]->getId()}"><img src="data:{$immagini[7]->getTipo()};base64,{$immagini[7]->getImmagine()}" width=900 height=500 class="d-block w-100" alt="..."></a>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col">
                <div class="card mb-5" style="width: 18rem;">
                    <img src="logo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$anuunci[8]->getNomeAnnuncio()}</h5>
                        <p class="card-text">{substr($annunci_home[8]->getDescrizione(), 0, 100)}...</p>
                        <a href="#/{$annunci_home[8]->getId()}"><img src="data:{$immagini[8]->getTipo()};base64,{$immagini[8]->getImmagine()}" width=900 height=500 class="d-block w-100" alt="..."></a>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col">
                <div class="card mb-5" style="width: 18rem;">
                    <img src="banner.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$anuunci[9]->getNomeAnnuncio()}</h5>
                        <p class="card-text">{substr($annunci_home[9]->getDescrizione(), 0, 100)}...</p>
                        <a href="#/{$annunci_home[9]->getId()}"><img src="data:{$immagini[9]->getTipo()};base64,{$immagini[9]->getImmagine()}" width=900 height=500 class="d-block w-100" alt="..."></a>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col">
                <div class="card mb-5" style="width: 18rem;">
                    <img src="banner.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$anuunci[10]->getNomeAnnuncio()}</h5>
                        <p class="card-text">{substr($annunci_home[10]->getDescrizione(), 0, 100)}...</p>
                        <a href="#/{$annunci_home[10]->getId()}"><img src="data:{$immagini[10]->getTipo()};base64,{$immagini[10]->getImmagine()}" width=900 height=500 class="d-block w-100" alt="..."></a>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col">
                <div class="card mb-5" style="width: 18rem;">
                    <img src="banner.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$anuunci[11]->getNomeAnnuncio()}</h5>
                        <p class="card-text">{substr($annunci_home[11]->getDescrizione(), 0, 100)}...</p>
                        <a href="#/{$annunci_home[11]->getId()}"><img src="data:{$immagini[11]->getTipo()};base64,{$immagini[11]->getImmagine()}" width=900 height=500 class="d-block w-100" alt="..."></a>
                    </div>
                </div>
                <p></p>
            </div>
        </div>
        <footer>
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="inror_box">
                                <h3>INFORMATION </h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="inror_box">
                                <h3>MY ACCOUNT </h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="inror_box">
                                <h3>ABOUT  </h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="inror_box">
                                <h3>CONTACTS  </h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p>© 2019 All Rights Reserved. Design by<a href=https://www.facebook.com/giorgio.tarquini.5> Big boy</a></p>
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