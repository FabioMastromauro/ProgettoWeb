<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Annuncio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="../javascript/searchbar.js"></script>

</head>
<body>
<div id="searchbar"></div>




<div class="container" >
    <section>
        <div class="container text-center" style="display: block;margin-left: 25%;">

            <div class="row">


                <div class="col">
                    <div class="container py-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <div class="card" style="border-radius: 15px;">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            {if is_array($foto_ann}
                                            {for $i=0 to $n_img_ann}
                                            <!-- replica il codice finchè per n argomenti array -->
                                            {$i==0}
                                            <div class="carousel-item active">
                                                <img src="data:{$typeA[0]};base64,{$pic64ann[0]}" class="d-block w-100 same" alt="...">
                                            </div>
                                            {else}
                                            <!-- fine codice -->
                                            <div class="carousel-item active">
                                                <img src="data:{$typeA[$i]};base64,{$pic64ann[$i]}" class="d-block w-100 same" alt="...">
                                            </div>
                                        </div>

                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" >
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p><a href="#!" class="text-dark">{$titolo}</a></p>
                                                <p class="small text-muted">{$categoria}</p>
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
                                            <p><a href="#!" class="text-dark">{$prezzo}</a></p>
                                        </div>
                                    </div>
                                    <hr class="my-0" >
                                    <div class="card-body pb-0">
                                        <div class="justify-content-between">
                                            <p><a href="#!" class="text-dark">Descrizione</a></p>

                                            <p class="text-dark">{$descrizione}</p>
                                        </div>
                                    </div>

                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                                            <a href="purchase.html">
                                                <button type="text" style="margin-left: 135px; " class="btn btn-primary" >Acquista</button>
                                            </a>                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">

                                <!-- venditore -->
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <form class="form-inline" method="POST" action="/ProgettoWeb/smarty/libs/html/profilo_pubblico.html">
                                            <input type="text" hidden name="email" value="?" />
                                            <input type="image" src="data:{$type};base64,{$pic64}" style="border-radius: 50%;" width="90" height="90"/>
                                        </form>
                                        <p class="card-text">{$nome} {$cognome}</p>
                                        <p class="card-text">Contatti: </p>
                                        <h6><img src="https://www.internetmatters.org/wp-content/uploads/2020/01/instagradientlogo-no-background.png" style="float: left;width: 25px;height: 25px;object-fit: cover; margin-right: 100%"> {$instagram}</h6>
                                        <h6><img src="https://www.facebook.com/images/fb_icon_325x325.png" style="float: left;width:  25px;height: 25px;object-fit: cover; margin-right: 100%">{$facebook}</h6>

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