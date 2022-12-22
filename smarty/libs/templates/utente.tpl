<!doctype html>
{assign var = 'facebook' value=$facebook|default:''}
{assign var = 'instagram' value=$instagram|default:''}
{assign var = 'luogo' value=$luogo|default:''}
{assign var = 'userLogged' value=$userLogged|default:'nouser'}


<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Marketplace - Profilo Utente Admin</title>
    <link rel="icon" type="image/x-icon" href="/localmp/smarty/libs/images/logomarket.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="/localmp/smarty/libs/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link href="/localmp/smarty/libs/css/recensione.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>
<body style="margin-top: 70px">



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
                    <a class="nav-link active" aria-current="page" href="/localmp/">Home</a>
                </li>
                {if $userLogged == 'admin'}
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/localmp/Admin/homeAdmin">Admin page</a>
                    </li>
                {/if}
                <li class="nav-item">
                    <a class="nav-link active" href="/localmp/Contatti/chiSiamo">Chi siamo?</a>
                </li>
                {if $userLogged =='admin'}
                <li class="nav-item">
                    <a class="nav-link active" methods="POST" href="/localmp/Admin/profiloUtente">Profilo</a>
                </li>
            </ul>

            <img src="/localmp/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
            <a class="nav-link" href="/localmp/Utente/logout">Disconnetti</a>

            {elseif $userLogged != 'nouser'}
            <li class="nav-item">
                <a class="nav-link active" methods="POST" href="/localmp/Utente/profilo">Profilo</a>
            </li>

            </ul>

            <img src="/localmp/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
            <a class="nav-link" href="/localmp/Utente/logout">Disconnetti</a>

            {else}

            </ul>

            <img src="/localmp/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
            <a class="nav-link" href="/localmp/Utente/login">Login/Registrati</a>

            {/if}


            <!-- <form class="d-flex" role="search">
                 <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
                 <button class="btn btn-dark" type="submit" >Search</button>
             </form> -->

        </div>
    </div>
</nav>

<div class="container">
    <div class="main-body">
        <!-- /Breadcrumb -->
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">

                            {if isset($foto_utente)}
                                <img   src="data:{$foto_utente->getTipo()};;base64,{$foto_utente->getFoto()}"  alt="Admin" class="rounded-circle" width="140" >


                            {else}
                                <img src="/localmp/smarty/libs/images/login.png" alt="Admin" class="rounded-circle" width="140">

                            {/if}
                            <div class="mt-3">
                                <h4>{$utente->getNome()}</h4>
                                <p class="text-muted font-size-sm"><form name="form" action="/localmp/Admin/bannaUtente/{$utente->getIdUser()}" method="post">
                                    <p>Banna utente fino al</p>
                                    <input type="date"  name="date" value="">
                                    <button type="submit">Invia</button>
                                </form></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nome</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {$utente->getNome()}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Cognome</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {$utente->getCognome()}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {$utente->getEmail()}
                            </div>
                        </div>
                        <hr>
                        {if $userLogged == 'admin'}

                            <a type="button" href="/localmp/Admin/storico?id={$utente->getIdUser()}" class="btn btn-primary">
                                Storico
                            </a>
                        {/if}

                        {if isset($recensione)}
                            <p>Voto medio utente
                                {$sum =0}
                                {for $j=0;$j<sizeof($recensione);$j++}
                                    {$sum = $sum + $recensione[$j]->getValutazione()}
                                {/for}

                            <div class="rate">
                                {for $j=0; $j<5;$j++}
                                    {if $j<($sum/sizeof($recensione))}
                                        <span class="fa fa-star checked" style="color: orange"></span>
                                    {else}
                                        <span class="fa fa-star"></span>
                                    {/if}
                                {/for}
                            </div>
                        {/if}
                        </p>
                    </div>
                </div>
            </div>
            {if $userLogged == 'admin'}
                {if $utente->getIdUser() == $udp->getIdUser()}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#creaAnnuncio">
                        Crea nuovo annuncio
                    </button>
                {/if}
            {/if}
            <p>

            </p>
            <!--Annunci online-->

            {if $utente->isBan() == 1}
            <p style="font-size: 40px">Utente bannato fino al {$utente->getDataFineBan()}</p>

            {else}
            {if isset($annuncio)}
                <h1>Annunci online</h1>

                <div class="container" style="display: flex; flex-flow: row wrap">
                    {if is_array($annuncio)}
                        {for $i=0; $i<sizeof($annuncio);$i++}
                            <div class="card-wrap" style="flex:0 0 33.333%;display: flex;padding: 10px max-width:100%">
                                <div class="card" style="width: 15rem;height: 22rem padding:10px">
                                    <div class="card-body" style="text-align: center; padding:10px;">
                                        <img  class="card-img-top same" src="data:{$immagini[$i][0]->getTipo()};base64,{$immagini[$i][0]->getFoto()}" style="width: 19rem; height: 13rem; max-width: 100%" >
                                        <h5 class="card-title" style="padding-left: 10px; max-width: 100%">{$annuncio[$i]->getTitolo()}</h5>
                                        <p class="card-text" style="padding-left: 10px; max-width: 100%">{substr($annuncio[$i]->getDescrizione(),0,40)}...</p>
                                        <a href="/localmp/Annunci/infoAnnuncio?idAnnuncio={$annuncio[$i]->getIdAnnuncio()}" class="btn btn-primary">Visita</a>
                                        {if $userLogged=='admin'}
                                            <a href="/localmp/Annunci/cancellaAnnuncio?idAnnuncio={$annuncio[$i]->getIdAnnuncio()}" class="btn btn-danger">Cancella</a>
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        {/for}
                    {/if}
                </div>
            {/if}
        </div>
    </div>
</div>
</div>

<!-- recensione -->

<section>
    <div class="container">
        <div class="row">
            {if isset($recensione)}
                <h1>Recensioni</h1>
                {for $i=0; $i<sizeof($recensione);$i++}

                    <div class="comment mt-4 text-justify float-left">
                        {if isset($foto_recensori[$i])}
                            <img   src="data:{$foto_recensori[$i]->getTipo()};base64,{$foto_recensori[$i]->getFoto()}"  alt="Admin" class="rounded-circle" width="40" >


                        {else}
                            <img src="/localmp/smarty/libs/images/login.png" alt="Admin" class="rounded-circle" width="40">

                        {/if}
                        <h4>{$autori[$i]->getNome()} {$autori[$i]->getCognome()}</h4>
                        {if $userLogged=='admin'}
                            <form action="/localmp/Admin/cancellaRecensione?id={$recensione[$i]->getIdRecensione()}&profilo={$utente->getIdUser()}" method="post">
                                <input type="submit" value="cancella">
                            </form>
                        {/if}
                        <span>{$recensione[$i]->getDataPubblicazione()}</span>
                        <br>
                        <p></p>
                        <div class="rate">
                            {for $j=0; $j<5;$j++}
                                {if $j<$recensione[$i]->getValutazione()}
                                    <span class="fa fa-star checked" style="color: orange"></span>
                                {else}
                                    <span class="fa fa-star"></span>
                                {/if}
                            {/for}
                        </div>

                        <br>
                        <p>{$recensione[$i]->getCommento()}</p>
                    </div>
                {/for}
            {/if}

        </div>
        {if $userLogged=='admin'}

        <form  action="/localmp/Admin/scriviRecensione" method="POST">

            <div >
                <form id="algin-form">
                    <div class="form-group">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <input name="idUser" value="{$utente->getIdUser()}" hidden>
                        <h4>Lascia una recensione</h4>
                        <textarea name="commento" id="commento" cols="30" rows="5" class="form-control" style="background-color: whitesmoke;"></textarea>

                    </div>


                    <div class="form-group">
                        <input type="submit"  class="btn" value="pubblica">
                    </div>
                </form>
            </div>
        </form>

    </div>
    </div>

</section>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript'>#</script>
<script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    });</script>
{else}
</div>
</div>
</section>
{/if}
<!-- About, Information, Contacts
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
                        <p>Per tornare all'area pubblica basta cliccare sulla voce <a href="#privatenavbar">Logout</a> in alto a destra. </p>
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
-->
{/if}
</main>


<!-- crea annuncio -->
<form action="/localmp/Annunci/pubblicaAnnuncio" method="POST" enctype="multipart/form-data">

    <div class="modal fade" id="creaAnnuncio" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crea annuncio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-4">
                        <label for="titolo" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="titolo" name="titolo" required>
                    </div>
                    <div class="mb-3">
                        <label for="descrizione" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="descrizione" name="descrizione" rows="3"></textarea>
                    </div>
                    <div class="col-md-1">
                        <label for="prezzo" class="form-label">Prezzo €</label>
                        <input type="text" class="form-control" id="prezzo" name="prezzo" required>

                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Aggiungi una o più foto</label>
                        <input type="file" class="form-control"  id="file" name="file[]" multiple>
                    </div>
                    <div class="col-1">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" id="categoria" class="form-select">
                            <option value="--Seleziona--">--Seleziona--</option>

                            {if is_array($categoria)}
                                {foreach from=$categoria item=cate}
                                    <option id="categoria" name="categoria" value="{$cate.idCate}">{$cate.categoria}</option>
                                {/foreach}
                            {/if}

                        </select>
                    </div>
                    <p>
                    </p>

                    <input class="btn btn-primary" type="submit" value="Crea annuncio">

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>


    </div>
</form>


<!-- modifica -->

<div class="modal fade" id="modifica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/localmp/Utente/modificaP?id={$utente->getIdUser()}"  method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modificaLabel">Modifica profilo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-mb-4">
                            <label for="validationCustom01"  class="form-label">Nome</label>
                            <input  type="text" class="form-control" name="nome" id="nome" style="background-color: whitesmoke" value="{$utente->getNome()}" >

                        </div>
                        <div class="col-mb-4">
                            <label for="validationCustom02"  class="form-label">Cognome</label>
                            <input type="text"  class="form-control" name="cognome" id="cognome" style="background-color: whitesmoke" value="{$utente->getCognome()}" >

                        </div>
                        <div class="col-mb-4">
                            <label for="validationCustom03" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" style="background-color: whitesmoke" value="{$utente->getEmail()}" >
                        </div>

                        <div class="col-mb-4">
                            <label for="validationCustom03" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" style="background-color: whitesmoke" value="{$utente->getPassword()}" >
                        </div>

                        <div class="col-mb-4">
                            <label for="file" class="form-label">Carica una nuova foto</label>
                            <input type="file" class="form-control"  id="file" name="file" >
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Applica modifiche</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>