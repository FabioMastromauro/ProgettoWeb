<!doctype html>
{assign var = 'userLogged' value=$userLogged|default:'nouser'}
{assign var="searchMod" value=$searchMod|default:"searchOff"}

<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"></html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="/localmp/smarty/libs/css/style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light  fixed-top " style="height: 45px">
    <div class="container-fluid">
        <img src="/localmp/smarty/libs/images/logomarket.png" alt="" style="width: 50px" class="d-inline-block align-text-top">
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
                    <a class="nav-link active" methods="POST" href="/localmp/Utente/profilo">Profilo</a>
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
</nav>
<header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Benvenuto negli annunci!</h1>
                    <p class="lead mb-0">Esplora i prodotti che ti interessano!</p>
                </div>
            </div>
        </header>

        {if !is_array($immagini) && !is_array($annunci)}
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="/localmp/Annunci/InfoAnnuncio/{$annunci->getId()}"><img class="card-img-top" src="data:{$immagini->getTipo()};base64, {$immagini->getFoto()}" width=900 height=400 alt="..." /></a>
                        <div class="card-body">
                            <h2 class="card-title">{$annunci->getTitolo()}</h2>
                            <p class="card-text">{$annunci->getPrezzo()}</p>
                            <p class="card-text">{substr($annunci->getDescrizione(), 0, 100)}...</p>
                    </div>
                </div>
        {else}
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="/localmp/Annunci/InfoAnnuncio/{$annunci[0]->getId()}"><img class="card-img-top" src="data:{$immagini->getTipo()};base64, {$immagini->getFoto()}" width=900 height=400 alt="..." /></a>
                        <div class="card-body">
                            <h2 class="card-title">{$annunci[0]->getTitolo()}</h2>
                            <p class="card-text">{$annunci[0]->getPrezzo()}</p>
                            <p class="card-text">{substr($annunci[0]->getDescrizione(), 0, 100)}...</p>
                    </div>
                </div>
                <div class="row">
                <!-- Nested row for non-featured blog posts-->
                <div class="col-lg-6">
                    <!-- Blog post-->
                    {if count($annunci) >= 2}
                    <div class="card mb-4">
                        <a href="/localmp/Annunci/InfoAnnuncio/{$annunci[1]->getId()}"><img class="card-img-top" src="data:{$immagini->getTipo()};base64, {$immagini->getFoto()}" width=900 height=400 alt="..." /></a>
                        <div class="card-body">
                            <h2 class="card-title">{$annunci[1]->getTitolo()}</h2>
                            <p class="card-text">{$annunci[1]->getPrezzo()}</p>
                            <p class="card-text">{substr($annunci[1]->getDescrizione(), 0, 100)}...</p>
                    </div>
                </div>
                    {/if}
                    <!-- Blog post-->
                    {if count($annunci) >= 3}
                        <div class="card mb-4">
                            <a href="/localmp/Annunci/InfoAnnuncio/{$annunci[2]->getId()}"><img class="card-img-top" src="data:{$immagini->getTipo()};base64, {$immagini->getFoto()}" width=900 height=400 alt="..." /></a>
                            <div class="card-body">
                                <h2 class="card-title">{$annunci[2]->getTitolo()}</h2>
                                <p class="card-text">{$annunci[2]->getPrezzo()}</p>
                                <p class="card-text">{substr($annunci[2]->getDescrizione(), 0, 100)}...</p>
                        </div>
                    </div>
                    {/if}

                <div class="col-lg-6">
                    {if count($annunci) >= 4}
                        <div class="card mb-4">
                            <a href="/localmp/Annunci/InfoAnnuncio/{$annunci[3]->getId()}"><img class="card-img-top" src="data:{$immagini->getTipo()};base64, {$immagini->getFoto()}" width=900 height=400 alt="..." /></a>
                            <div class="card-body">
                                <h2 class="card-title">{$annunci[3]->getTitolo()}</h2>
                                <p class="card-text">{$annunci[3]->getPrezzo()}</p>
                                <p class="card-text">{substr($annunci[3]->getDescrizione(), 0, 100)}...</p>
                        </div>
                    </div>
                    {/if}
                    {if count($annunci == 5)}
                        <div class="card mb-4">
                            <a href="/localmp/Annunci/InfoAnnuncio/{$annunci[4]->getId()}"><img class="card-img-top" src="data:{$immagini->getTipo()};base64, {$immagini->getFoto()}" width=900 height=400 alt="..." /></a>
                            <div class="card-body">
                                <h2 class="card-title">{$annunci[4]->getTitolo()}</h2>
                                <p class="card-text">{$annunci[4]->getPrezzo()}</p>
                                <p class="card-text">{substr($annunci[4]->getDescrizione(), 0, 100)}...</p>
                        </div>
                    </div>
                    {/if}
                {/if}
                <!--pagination-->

                <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    {if $searchMod == 'searchOff'}
                        {if $index == 1}
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//{$index}">{$index}</a></li>
                            {if $index + 1 < $num_pagine}
                                <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//{$index + 1}">{$index + 1}</a></li>
                            {/if}
                            {if $index + 2 < $num_pagine}
                                <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//{$index + 2}">{$index + 2}</a></li>
                            {/if}
                        {else}
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//{$index - 1}" tabindex="-1" aria-disabled="true">Back</a></li>
                            <li class="page-item" aria-current="page"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//{$index - 1}">{$index - 1}</a></li>
                            <li class="page-item active"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//{$index}">{$index}</a></li>
                            {if $index + 1 < $num_pagine}
                                <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//{$index + 1}">{$index + 1}</a></li>
                            {/if}
                        {/if}
                        {if $num_pagine <= $index + 1 && $num_pagine != $index}
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//{$num_pagine}">{$num_pagine}</a></li>
                        {elseif $index < $num_pagine - 1}
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//{$num_pagine}">{$num_pagine}</a></li>
                        {/if}
                        {if $num_pagine >= $index + 1}
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//{$index + 1}">Next</a></li>
                        {else}
                            <li class="page-item disabled"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//{$index + 1}">Next</a></li>
                        {/if}
                        {else}
                        {if $index == 1}
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/{$index}">{$index}</a></li>
                            {if $index + 1 < $num_pagine}
                                <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/{$index + 1}">{$index + 1}</a></li>
                            {/if}
                            {if $index + 2 < $num_pagine}
                                <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/{$index + 2}">{$index + 2}</a></li>
                            {/if}
                        {else}
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/{$index - 1}" tabindex="-1" aria-disabled="true">Back</a></li>
                            <li class="page-item" aria-current="page"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/{$index - 1}">{$index - 1}</a></li>
                            <li class="page-item active"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/{$index}">{$index}</a></li>
                            {if $index + 1 < $num_pagine}
                                <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/{$index + 1}">{$index + 1}</a></li>
                            {/if}
                        {/if}
                        {if $num_pagine <= $index + 1 && $num_pagine != $index}
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/{$num_pagine}">{$num_pagine}</a></li>
                        {elseif $index < $num_pagine - 1}
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/{$num_pagine}">{$num_pagine}</a></li>
                        {/if}
                        {if $num_pagine >= $index + 1}
                        <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/{$index + 1}">Next</a></li>
                            {else}
                            <li class="page-item disabled"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/{$index + 1}">Next</a></li>
                        {/if}
                    {/if}
                </ul>
            </nav>
        </div>
        <!-- Categories widget-->
        <div class="card mb-4">
                        <div class="card-header">Categorie</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                    {$value = sizeof($categorie)/2}
                                    {if $categorie != null}
                                        {if is_array($categorie)}
                                            {for $i = 0; $i < (int)$value; $i++}
                                                <li><a href="/localmp/Annunci/cerca?categoria={$categorie[$i]->getCategoria()}">{$categorie[$i]->getCategoria()}</a></li>
                                            {/for}
                                            </ul>
                                        </div>
                                            <div class="col-sm-6">
                                                <ul class="list-unstyled mb-0">
                                                    {for $i = $value; $i < sizeof($categorie); $i++}
                                                        <li><a href="/localmp/Annunci/cerca?categoria={$categorie[$i]->getCategoria()}">{$categorie[$i]->getCategoria()}</a></li>
                                                    {/for}
                                                </ul>
                                            </div>
                                        {else}
                                                    <li><a href="/localmp/Annunci/cerca?categoria={$categorie->getCategoria()}">{$categorie->getCategoria()}</a></li>
                                                </ul>
                                            </div>
                                        {/if}
                                    {/if}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
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
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>