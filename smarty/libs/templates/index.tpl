<!doctype html>
{assign var = 'userLogged' value=$userLogged|default:'nouser'}

<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"/>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Marketplace - Homepage</title>
    <link rel="icon" type="image/x-icon" href="/localmp/smarty/libs/images/logomarket.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="/localmp/smarty/libs/css/style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


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
                    <a class="nav-link active" aria-current="page" href="">Home</a>
                </li>
                {if $userLogged == 'admin'}
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Admin/homeAdmin">Admin page</a>
                </li>
                {/if}
                <li class="nav-item">
                    <a class="nav-link active" href="Contatti/chiSiamo">Chi siamo?</a>
                </li>
                {if $userLogged =='admin'}
                <li class="nav-item">
                    <a class="nav-link active" methods="POST" href="Admin/profiloUtente">Profilo</a>
                </li>
            </ul>

            <img src="/localmp/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
            <a class="nav-link" href="Utente/logout">Disconnetti</a>

            {elseif $userLogged != 'nouser'}
                <li class="nav-item">
                    <a class="nav-link active" methods="POST" href="Utente/profilo">Profilo</a>
                </li>

            </ul>

            <img src="/localmp/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
            <a class="nav-link" href="Utente/logout">Disconnetti</a>

            {else}

            </ul>

            <img src="/localmp/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
            <a class="nav-link" href="Utente/login">Login/Registrati</a>

            {/if}


            <!-- <form class="d-flex" role="search">
                 <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
                 <button class="btn btn-dark" type="submit" >Search</button>
             </form> -->

        </div>
    </div>
</nav>


<div id="carouselHome" class="carousel slide carousel-fade" data-bs-ride="carousel" style="margin-top: -50px">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/localmp/smarty/libs/images/home3.png" class="d-block w-100" alt="...">

    </div>

</div>

<div class="container my-15 text-center">
    <div class="container"  style="display: compact;align-items: center;" >
        <img src="/localmp/smarty/libs/images/logomarket.png" style="margin-right: 20px;width: 100px;height: 100px">

        <h1 class="header_top">BENVENUTO SU LOCAL MARKETPLACE</h1>
    </div>


    <p class="lead" style="font-size: 30px"> Il tuo mercato locale </p>
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
{if isset($annunci_home)}
                    <p class="lead" style="font-size: 30px">Lasciati ispirare...</p>
                    <a href="Annunci/esploraAnnunci" type="button" class="btn btn-dark">Tutti gli annunci</a>
{/if}
                </div>
            </div>

        </div>
    </div>
</section>
<p></p>
<section class="py-5">
    <div id="shopnow" class="container px-5 my-5">
        <div class="row gx-5 justify-content-around">
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
                        <div class="row" style="width: 15rem; height: 18rem">
                            <div class="card  h-100 shadow border-0"  >
                                <img class="card-img-top same" src="data:{$annunci_foto[$i][0]->getTipo()};base64,{$annunci_foto[$i][0]->getFoto()}" style="width: 200px; height: 150px; align-content: center" />
                                <div class="card-body p-4">
                                    <h5 class="card-title">{$annunci_home[$i]->getTitolo()}</h5>
                                    <a methods="POST"  class="text-decoration-none link-dark stretched-link btn btn-button" href="Annunci/infoAnnuncio?id={$annunci_home[$i]->getIdAnnuncio()}" >Visita annuncio</a>

                                </div>
                            </div>
                            <p></p>

                        </div>
                    </div>
                {/for}
            {/if}
        </div>
    </div>
</section>
    <footer id="footer" class="bg-light py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto"><div class="small m-0">Copyright &copy; Local Marketplace 2022</div></div>
                <div class="col-auto">
                    <a class="small" style="color:black" href="/localmp/Contatti/chiSiamo">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>