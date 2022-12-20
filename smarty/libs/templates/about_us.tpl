<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="/localmp/smarty/libs/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="/localmp/smarty/libs/css/AboutUs.css"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,800,400' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"/>

</head>




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

<body>
<div class="slider--teams">
    <div class="slider--teams__team">
        <ul id="list" class="cf">

            <li>
                <figure class="active" >
                    <div>
                        <img src="/localmp/smarty/libs/images/fabio.png">

                        <div></div>
                    </div>
                    <figcaption style="height: 300px">
                        <h2>Fabio</h2>
                        <p>CTO Localmp</p>
                        <a href="mailto:fabio.mastromauro@student.univaq.it">fabio.mastromauro@student.univaq.it</a> <br>
                        <a href="https://www.facebook.com/fabio.mastromauro.7">Facebook</a>
                    </figcaption>
                </figure>
            </li>

            <li>
                <figure>
                    <div>
                        <img src="/localmp/smarty/libs/images/federico.png">

                        <div></div>
                    </div>
                    <figcaption style="height: 300px">
                        <h2>Federico</h2>
                        <p>CEO Localmp</p>
                        <a href="mailto:federico.civitareale@student.univaq.it">federico.civitareale@student.univaq.it</a> <br>
                        <a href="https://www.facebook.com/federico.civitareale">Facebook</a>
                    </figcaption>
                </figure>
            </li>

            <li>
                <figure>
                    <div>

                        <div>
                            <img src="/localmp/smarty/libs/images/giorgio.png">
                        </div>
                    </div>
                    <figcaption style="height: 300px">
                        <h2>Giorgio</h2>
                        <p>Employer Localmp</p>
                        <a href="mailto:giorgio.tarquini1@student.univaq.it">giorgio.tarquini1@student.univaq.it</a> <br>
                        <a href="https://www.facebook.com/giorgio.tarquini.5">Facebook</a>
                    </figcaption>
                </figure>
            </li>
        </ul>
    </div>
</div>

<div class="container" style="margin-top: 100px">
    <h1 style="font-size: 30px"><b>Scegli Localmp!</b></h1>
    <p style="font-size: 20px">
        Il nostro progetto ha lo scopo di puntare alla salvaguardia del nostro pianeta allungando il ciclo di vita dei prodotti. Non usi più un oggetto nuovo
        o vecchio che sia? Tuo figlio è cresciuto e non sai dove mettere i suoi vestiti? Piuttosto che riporli in mansarda a prendere polvere inutilmente
        puoi metterli in vendita su <b>Localmp!</b> L'unione fa la forza, quindi coinvolgi anche i tuoi amici e parenti, in modo che sia molto più probabile che trovi
        qualcosa che ti piaccia e viceversa è più probabile che qualcuno acquisti i tuoi oggetti.
    </p>
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
</body>
</html>


<body>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.1.0/velocity.min.js'></script>
<script  src="/localmp/smarty/libs/javascript/AboutUs.js"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.1.0/velocity.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
