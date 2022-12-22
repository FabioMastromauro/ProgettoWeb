<!DOCTYPE html>
{assign var='userlogged' value=$userlogged|default:'nouser'}
{assign var='searchMod' value=$searchMod|default:'searchOff'}
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Local Marketplace - Annunci</title>
    <link rel="icon" type="image/x-icon" href="/localmp/smarty/libs/images/logomarket.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="/localmp/smarty/libs/css/boot_styles.css" rel="stylesheet" />
</head>

<nav class="navbar navbar-expand-lg bg-light  fixed-top ">
    <div class="container-fluid">
        <img src="/localmp/smarty/libs/images/logomarket.png" alt="" style="width: 50px" class="d-inline-block align-text-top">
        <span class="navbar-brand" >LOCAL MARKETPLACE</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a style="color: black;" class="nav-link active" aria-current="page" href="/localmp/">Home</a>
                </li>
                {if $userLogged == 'admin'}
                    <li class="nav-item">
                        <a style="color: black;" class="nav-link active" aria-current="page" href="/localmp/Admin/homeAdmin">Admin page</a>
                    </li>
                {/if}
                <li class="nav-item">
                    <a style="color: black;" class="nav-link active" href="/localmp/Contatti/chiSiamo">Chi siamo?</a>
                </li>
                {if $userLogged =='admin'}
                <li class="nav-item">
                    <a style="color: black;" class="nav-link active" methods="POST" href="/localmp/Admin/profiloUtente">Profilo</a>
                </li>
            </ul>

            <img src="/localmp/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
            <a style="color: black;" class="nav-link" href="/localmp/Utente/logout">Disconnetti</a>

            {elseif $userLogged != 'nouser'}
            <li class="nav-item">
                <a style="color: black;" class="nav-link active" methods="POST" href="/localmp/Utente/profilo">Profilo</a>
            </li>

            </ul>

            <img src="/localmp/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
            <a style="color: black;" class="nav-link" href="/localmp/Utente/logout">Disconnetti</a>

            {else}

            </ul>

            <img src="/localmp/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
            <a style="color: black;" class="nav-link" href="/localmp/Utente/login">Login/Registrati</a>

            {/if}


            <!-- <form class="d-flex" role="search">
                 <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
                 <button class="btn btn-dark" type="submit" >Search</button>
             </form> -->

        </div>
    </div>
</nav>

<body>
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Benvenuto negli Annunci!</h1>
            <p class="lead mb-0">Esplora gli annunci che ti appassionano di più!</p>
            {if $tipoerr == 'no_categoria'}
                <p>Non è presente alcun annuncio della categoria: {$input}</p>
            {/if}
            {if $tipoerr == 'no_ricerca'}
                <p>Non è presente alcun annuncio come: {$input}</p>
            {/if}
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    {if !is_array($immagini) && !is_array($annunci)}
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="/localmp/Annunci/infoAnnuncio/{$annunci->getIdAnnuncio()}"><img class="card-img-top" src="data:{$immagini[0][0]->getTipo()};base64,{$immagini[0][0]->getFoto()}" width=900 height=400 alt="..." /></a>
                <div class="card-body">
                    <h2 class="card-title">{$annunci->getTitolo()}</h2>
                    <p class="card-text">{substr($annunci->getDescrizione(), 0, 100)}...</p>
                    <div class="small text-muted">{$annunci->getData()} &middot;
                    </div>
                </div>
            </div>
            {else}
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="/localmp/Annunci/infoAnnuncio/{$annunci[0]->getIdAnnuncio()}"><img class="card-img-top" src="data:{$immagini[0][0]->getTipo()};base64,{$immagini[0][0]->getFoto()}" width=900 height=400 alt="..." /></a>
                        <div class="card-body">
                            <h2 class="card-title">{$annunci[0]->getTitolo()}</h2>
                            <p class="card-text">{substr($annunci[0]->getDescrizione(), 0, 100)}...</p>
                            <div class="small text-muted">{$annunci[0]->getData()} &middot;
                            </div>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            {if count($annunci) >= 2}
                                <div class="card mb-4">
                                    <a href="/localmp/Annunci/infoAnnuncio/{$annunci[1]->getIdAnnuncio()}"><img class="card-img-top" src="data:{$immagini[1][0]->getTipo()};base64,{$immagini[1][0]->getFoto()}" width=900 height=400 alt="..." /></a>
                                    <div class="card-body">
                                        <h2 class="card-title h4">{$annunci[1]->getTitolo()}</h2>
                                        <p class="card-text">{substr($annunci[1]->getDescrizione(), 0, 100)}...</p>
                                        <div class="small text-muted">{$annunci[1]->getData()} &middot;
                                        </div>
                                    </div>
                                </div>
                            {/if}
                            <!-- Blog post-->
                            {if count($annunci) >= 3}
                                <div class="card mb-4">
                                    <a href="/localmp/Annunci/infoAnnuncio/{$annunci[2]->getIdAnnuncio()}"><img class="card-img-top" src="data:{$immagini[2][0]->getTipo()};base64,{$immagini[2][0]->getFoto()}" width=900 height=400 alt="..." /></a>
                                    <div class="card-body">
                                        <h2 class="card-title h4">{$annunci[2]->getTitolo()}</h2>
                                        <p class="card-text">{substr($annunci[2]->getDescrizione(), 0, 100)}...</p>
                                        <div class="small text-muted">{$annunci[2]->getData()} &middot;
                                        </div>
                                    </div>
                                </div>
                            {/if}
                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            {if count($annunci) >= 4}
                                <div class="card mb-4">
                                    <a href="/localmp/Annunci/infoAnnuncio/{$annunci[3]->getIdAnnuncio()}"><img class="card-img-top" src="data:{$immagini[3][0]->getTipo()};base64,{$immagini[3][0]->getFoto()}" width=900 height=400 alt="..." /></a>
                                    <div class="card-body">
                                        <h2 class="card-title h4">{$annunci[3]->getTitolo()}</h2>
                                        <p class="card-text">{substr($annunci[3]->getDescrizione(), 0, 100)}...</p>
                                        <div class="small text-muted">{$annunci[3]->getData()} &middot;
                                        </div>
                                    </div>
                                </div>
                            {/if}
                            <!-- Blog post-->
                            {if count($annunci) == 5}
                                <div class="card mb-4">
                                    <a href="/localmp/infoAnnuncio/{$annunci[4]->getIdAnnuncio()}"><img class="card-img-top" src="data:{$immagini[4][0]->getTipo()};base64,{$immagini[4][0]->getFoto()}" width=900 height=400 alt="..." /></a>
                                    <div class="card-body">
                                        <h2 class="card-title h4">{$annunci[4]->getTitolo()}</h2>
                                        <p class="card-text">{substr($annunci[4]->getDescrizione(), 0, 100)}...</p>
                                        <div class="small text-muted">{$annunci[4]->getData()} &middot;
                                        </div>
                                    </div>
                                </div>
                            {/if}
                        </div>
                    </div>
                    {/if}
                    <!-- Pagination-->
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
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Cerca</div>
                        <div class="card-body">
                            <form method="POST" action="/localmp/Annunci/cerca">
                                <div class="input-group">
                                    <input class="form-control" name="text" type="text" placeholder="Inserisci termine di ricerca..." aria-label="Enter search term..." aria-describedby="button-search" />
                                    <button class="btn btn-primary" id="button-search" type="submit">Cerca</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categorie</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</button>
                                    <ul class="dropdown-menu">
                                        {if $categorie != null}
                                        {if is_array($categorie)}
                                        {for $i = 0; $i < sizeof($categorie); $i++}
                                            <li><a class="dropdown-item" href="/localmp/Annunci/cerca?categoria={$categorie[$i]->getIdCate()}">{$categorie[$i]->getCategoria()}</a></li>
                                        {/for}
                                    </ul>
                                </div>
                                {else}
                                <li><a href="/localmp/Annunci/cerca?categoria={$categorie->getIdCate()}">{$categorie->getCategoria()}</a></li>
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
    <footer class="bg-light py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto"><div class="small m-0">Copyright &copy; Local Marketplace 2022</div></div>
                <div class="col-auto">
                    <a class="small" href="Contatti/chiSiamo">Contact</a>
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