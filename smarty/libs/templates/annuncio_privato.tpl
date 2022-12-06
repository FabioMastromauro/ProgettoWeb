<!doctype html>
{assign var = 'userLogged' value=$userLogged|default:'nouser'}

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Annuncio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="/localmp/smarty/libs/css/style.css" rel="stylesheet">
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
                    <a class="nav-link active" href="/localmp/Contatti/chiSiamo">Chi siamo?</a>
                </li>
                {if $userLogged!='nouser'}
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


<div class="container" >
    <section>
        <div class="container text-center" style="display: block;margin-left: 25%;">

            <div class="row">


                <div class="col">
                    <div class="container py-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <div class="card" style="border-radius: 15px;">
                                            <!-- replica il codice finchè per n argomenti array -->
                                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">

                                                    {if is_array($foto)}
                                                    <div class="carousel-inner">

                                                        <div class="carousel-item active">
                                                            <img  class="card-img-top " src="data:{$foto[0]->getTipo()};base64,{$foto[0]->getFoto()}" style="width: 300px;height: 300px;object-fit: contain"   />

                                                        </div>
                                                        {for $i = 1; $i < sizeof($foto); $i++}
                                                        <div class="carousel-item ">
                                                            <img  class="card-img-top " src="data:{$foto[$i]->getTipo()};base64,{$foto[$i]->getFoto()}" style="width: 300px;height: 300px;object-fit: contain"   />

                                                        </div>
                                                        {/for}

                                                    </div>
                                                    <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>


                                            {/if}




                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" >
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>

                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p><a href="#!" class="text-dark">{$annuncio->getTitolo()}</a></p>
                                                <p class="small text-muted">{$categoria->getCategoria()}</p>
                                            </div>
                                            <div>
                                                <div class="d-flex flex-row justify-content-end mt-1 mb-4 text-danger">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-between">
                                            <p><a href="#!" class="text-dark">Prezzo {$annuncio->getPrezzo()}€</a></p>
                                        </div>
                                    </div>
                                    <hr class="my-0" >
                                    <div class="card-body pb-0">
                                        <div class="justify-content-between">
                                            <p><a href="#!" class="text-dark">Descrizione</a></p>

                                            <p class="text-dark">{$annuncio->getDescrizione()}</p>
                                        </div>
                                    </div>

                                    <hr class="my-0" />
                                    <div class="card-body">
                                        {if $mod==null}

                                            <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                                                <a  href="/localmp/Utente/login" class="btn btn-primary" style="margin: auto; width: 50%">Iscriviti</a>

                                            </div>

                                        {elseif $mod->getIdUser() != $annuncio->getIdVenditore()}
                                        <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="" style="margin: auto; width: 50%" class="btn btn-primary">Acquista</button>
                                        </div>
                                            {else}
                                            <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#modifica" style="margin: auto; width: 50%" class="btn btn-primary">Modifica</button>
                                            </div>
                                        {/if}

                                    </div>
                                </div>
                            </div>
                            <div class="col">

                                <!-- venditore -->
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <form class="form-inline" method="POST" action="/localmp/Utente/profilo?id={$utente->getIdUser()}">
                                            <input type="text" hidden name="email" value="?" />
                                            {if $fotoUtente->getIdFoto()!=null}
                                            <input type="image" src="data:{$fotoUtente->getTipo()};base64,{$fotoUtente->getFoto()}" style="border-radius: 50%;" width="90" height="90"/>
                                                </form>
                                            {else}
                                                <input type="image" src="/localmp/smarty/libs/images/login.png" style="border-radius: 50%;" width="90" height="90"/>
                                            {/if}
                                        </form>

                                        <p class="card-text">{$utente->getNome()} {$utente->getCognome()}</p>

                                        <p class="card-text">Contatti: {$utente->getEmail()}</p>
                                      <!--  <h6><img src="https://www.internetmatters.org/wp-content/uploads/2020/01/instagradientlogo-no-background.png" style="float: left;width: 25px;height: 25px;object-fit: cover; margin-right: 100%"> {$instagram}</h6>
                                        <h6><img src="https://www.facebook.com/images/fb_icon_325x325.png" style="float: left;width:  25px;height: 25px;object-fit: cover; margin-right: 100%">{$facebook}</h6>-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<!-- modal -->
<div class="modal fade" id="modifica" tabindex="-1" aria-labelledby="modificaLabel" role="dialog" aria-hidden="true">
    <form action="/localmp/Annunci/confermaModifiche?idAnnuncio={$annuncio->getIdAnnuncio()}" method="POST">

    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modificaLabel">Modifica profilo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-mb-4">
                        <label for="validationCustom01" class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="titolo" id="validationCustom02" style="background-color: whitesmoke" value="{$annuncio->getTitolo()}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-1">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" id="categoria" class="form-select">
                            <option value="--Seleziona--">--Seleziona--</option>

                            {if is_array($tutteCategorie)}
                                {foreach from=$tutteCategorie item=cate}
                                    <option id="categoria" name="categoria" value="{$cate.idCate}">{$cate.categoria}</option>
                                {/foreach}
                            {/if}


                        </select>
                    </div>
                    <div class="col-mb-4">
                        <label for="validationCustom03" class="form-label">Prezzo</label>
                        <input type="text" class="form-control" name="prezzo" id="validationCustom04" style="background-color: whitesmoke" value="{$annuncio->getPrezzo()}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="col-mb-4">
                            <label for="validationCustom04" class="form-label">Descrizione</label>
                            <input type="text" class="form-control" name="descrizione" id="validationCustom05" style="background-color: whitesmoke" value="{$annuncio->getDescrizione()}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <input  class="btn btn-primary" type="submit" value="Applica modifica">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    </form>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>