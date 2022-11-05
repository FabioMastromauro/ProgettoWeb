<!doctype html>
{assign var = 'userlogged' value=$userlogged|default:'nouser'}
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Marketplace</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="/smarty/libs/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!--<script src="../javascript/searchbar.js"></script> -->

</head>

<body>
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
</nav>

<div class="container my-15 text-center">
    <h1 class="header_top">AMMINISTRATORE</h1>
</div>
<div class="container">
    <div id = "annunci" class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="data:{$annunci_foto[0]->getTipo()},base64,{$annunci_foto[0]->getFoto()}" width=900 height=500 class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$annunci_home[0]->getTitolo()}</h5>
                    <p class="card-text">{$annunci_home[0]->getDescrizione()}</p>
                    <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[0]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>
                </div>
            </div>
            <p></p>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="data:{$annunci_foto[1]->getTipo()},base64,{$annunci_foto[1]->getFoto()}" width=900 height=500 class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$annunci_home[1]->getTitolo()}</h5>
                    <p class="card-text">{$annunci_home[1]->getDescrizione()}</p>
                    <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[1]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>
                </div>
            </div>
            <p></p>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="data:{$annunci_foto[2]->getTipo()},base64,{$annunci_foto[2]->getFoto()}" width=900 height=500 class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$annunci_home[2]->getTitolo()}</h5>
                    <p class="card-text">{$annunci_home[2]->getDescrizione()}</p>
                    <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[2]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>
                </div>
            </div>
            <p></p>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="data:{$annunci_foto[3]->getTipo()},base64,{$annunci_foto[3]->getFoto()}" width=900 height=500 class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$annunci_home[3]->getTitolo()}</h5>
                    <p class="card-text">{$annunci_home[3]->getDescrizione()}</p>
                    <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[3]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>
                </div>
            </div>
            <p></p>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="data:{$annunci_foto[4]->getTipo()},base64,{$annunci_foto[4]->getFoto()}" width=900 height=500 class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$annunci_home[4]->getTitolo()}</h5>
                    <p class="card-text">{$annunci_home[4]->getDescrizione()}</p>
                    <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[4]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>
                </div>
            </div>
            <p></p>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="data:{$annunci_foto[5]->getTipo()},base64,{$annunci_foto[5]->getFoto()}" width=900 height=500 class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$annunci_home[5]->getTitolo()}</h5>
                    <p class="card-text">{$annunci_home[5]->getDescrizione()}</p>
                    <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[5]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>
                </div>
            </div>
            <p></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="data:{$annunci_foto[6]->getTipo()},base64,{$annunci_foto[6]->getFoto()}" width=900 height=500 class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$annunci_home[6]->getTitolo()}</h5>
                        <p class="card-text">{$annunci_home[6]->getDescrizione()}</p>
                        <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[6]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="data:{$annunci_foto[7]->getTipo()},base64,{$annunci_foto[7]->getFoto()}" width=900 height=500 class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$annunci_home[7]->getTitolo()}</h5>
                        <p class="card-text">{$annunci_home[7]->getDescrizione()}</p>
                        <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[7]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="data:{$annunci_foto[8]->getTipo()},base64,{$annunci_foto[8]->getFoto()}" width=900 height=500 class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$annunci_home[8]->getTitolo()}</h5>
                        <p class="card-text">{$annunci_home[8]->getDescrizione()}</p>
                        <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[8]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="data:{$annunci_foto[9]->getTipo()},base64,{$annunci_foto[9]->getFoto()}" width=900 height=500 class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$annunci_home[9]->getTitolo()}</h5>
                        <p class="card-text">{$annunci_home[9]->getDescrizione()}</p>
                        <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[9]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="data:{$annunci_foto[10]->getTipo()},base64,{$annunci_foto[10]->getFoto()}" width=900 height=500 class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$annunci_home[10]->getTitolo()}</h5>
                        <p class="card-text">{$annunci_home[10]->getDescrizione()}</p>
                        <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[10]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>
                    </div>
                </div>
                <p></p>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="data:{$annunci_foto[11]->getTipo()},base64,{$annunci_foto[11]->getFoto()}" width=900 height=500 class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$annunci_home[11]->getTitolo()}</h5>
                        <p class="card-text">{$annunci_home[11]->getDescrizione()}</p>
                        <a href="/localmp/Annunci/infoAnnuncio/{$annunci_home[11]->getIdAnnuncio()}" class="btn btn-primary">Visita annuncio</a>
                    </div>
                </div>
                <p></p>
            </div>
        </div>

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