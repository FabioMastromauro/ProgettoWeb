<!doctype html>
{assign var = 'userLogged' value=$userLogged|default:'nouser'}

<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"/>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="/localmp/smarty/libs/css/style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
<div class="padding">
    <div class="d-flex">
        <div class="flex-shrink-0"><img class="rounded-circle" src="/localmp/smarty/libs/images/neonmarket.jpg" width=100 height=100 alt="..." /></div>
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
                                    <a href="/localmp/Admin/profiloUtente/{$list[$i]->getIdUser()}" >{$list[$i]->getNome()} {$list[$i]->getCognome()}</a>
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

</body>
</html>