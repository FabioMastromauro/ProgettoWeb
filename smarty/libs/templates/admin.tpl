<!doctype html>
{assign var = 'userlogged' value=$userlogged|default:'nouser'}
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Marketplace</title>
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

<div class="container-fluid">
    <h3 class="text-center">AMMINISTRATORE</h3>
    <h5 class=text-center>{$utente->getNome()} {$utente->getCognome()}</h5>
    <h2 class="fw-bolder fs-5 mb-4 padding text-center">Lista membri
        <input type="text" id="SearchTxt" /><input type="button" id="SearchBtn" value="Cerca" onclick="doSearch(document.getElementById('SearchTxt').value)" />
    </h2>
</div>

<section class="py-5">
    <div class="container px-5">
        <script>
            function doSearch(text) {
                if (window.find(text)) {
                    console.log(window.find(text));
                }
            }
        </script>

        <div class="row gx-5" id="list">

            {if $list}
                {if is_array($list)}
                    {for $i = 0; $i < sizeof($list); $i++}
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <div class="card-body p-4">
                                    <a href="/localmp/Admin/profiloUtente/{$list[$i]->getId()}" >{$list[$i]->getNome()} {$list[$i]->getCognome()}</a>
                                </div>
                            </div>
                        </div>
                    {/for}
                {/if}
            {else}
                <h2> Non ci sono membri iscritti </h2>
            {/if}
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>