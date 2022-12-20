<!doctype html>
{assign var = 'userLogged' value=$userLogged|default:'nouser'}

<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"/>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Marketplace - Amministratore</title>
    <link rel="icon" type="image/x-icon" href="/localmp/smarty/libs/images/logomarket.png" />
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


<div class="padding">
    <div class="d-flex">
        <div class="flex-shrink-0"><img class="rounded-circle" src="/localmp/smarty/libs/images/neonmarket.png" width=100 height=100 alt="..." /></div>
        <div class="ms-3">
            <h3 class="m-b-0">{$utente->getNome()} {$utente->getCognome()}</h3>
            <p class="text-muted">Amministratore</p>
        </div>
    </div>
</div>
<h2 class="text-center fw-bolder fs-5 mb-4 padding">Lista membri
    <input type="text" id="SearchTxt" /><input type="button" id="SearchBtn" value="Cerca" onclick="doSearch(document.getElementById('SearchTxt').value)" />
</h2>
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
                                    <a href="/localmp/Admin/profiloUtente?id={$list[$i]->getIdUser()}" >{$list[$i]->getNome()} {$list[$i]->getCognome()}</a>
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