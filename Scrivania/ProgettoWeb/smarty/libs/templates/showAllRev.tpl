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

<!-- header -->
<header class="py-5 bg-light border-bottom mb-4">
  <div class="container">
    <div class="text-center my-5">
      <h1 class="fw-bolder">Sezione annunci</h1>
      {if $tipoerr == 'no_categoria'}
      <p>Non è esiste alcun annuncio della categoria: {$input}</p>
      {/if}
      {if $tipoerr == 'no_ricerca'}
      <p>Non è esiste alcun annuncio: {$input}</p>
      {/if}
    </div>
  </div>
</header>

<!-- Page content-->
<div class="container">
  {if !is_array($immagini) && !is_array($annunci)}
  <div class="row">
    <div class="col-lg-8">
      <!-- Featured blog post-->
      <div class="card mb-4">
        <a href="/ProgettoWeb/Annunci/InfoAnnunci/{$annunci->getId()}"><img class="card-img-top" src="data:{$immagini->getTipo()};base64, {$immagini->getImmagine()}" width=900 height=400 alt="..." /></a>
        <div class="card-body">
          <h2 class="card-title">{$annunci->getTitolo()}</h2>
          <p class="card-text">{$annunci->getDescrizione()}...</p>
          <div class="small text-muted">{$annunci->getPrezzo()}
            {/if}
          </div>
        </div>
      </div>
      {else}
      {for $i=0; $i<count($annunci);i++}
      <div class="card mb-4">
        <a href="/ProgettoWeb/Annunci/InfoAnnunci/{$annunci->getId()}"><img class="card-img-top" src="data:{$immagini->getTipo()};base64, {$immagini->getImmagine()}" width=900 height=400 alt="..." /></a>
        <div class="card-body">
          <h2 class="card-title">{$annunci[$i]->getTitolo()}</h2>
          <p class="card-text">{$annunci[$i]->getDescrizione()}...</p>
          <div class="small text-muted">{$annunci[$i]->getPrezzo()}
          </div>
        </div>
      </div>
    {/for}
      <!-- Pagination-->
      <nav aria-label="Pagination">
        <hr class="my-0" />
        <ul class="pagination justify-content-center my-4">
          {if $searchMod == 'searchOff'}
          {if $index == 1}
          <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a></li>
          <li class="page-item active" aria-current="page"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci//{$index}">{$index}</a></li>
          {if $index + 1 < $num_pagine}
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci//{$index + 1}">{$index + 1}</a></li>
          {/if}
          {if $index + 2 < $num_pagine}
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci//{$index + 2}">{$index + 2}</a></li>
          {/if}
          {else}
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci//{$index - 1}" tabindex="-1" aria-disabled="true">Back</a></li>
          <li class="page-item" aria-current="page"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci//{$index - 1}">{$index - 1}</a></li>
          <li class="page-item active"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci//{$index}">{$index}</a></li>
          {if $index + 1 < $num_pagine}
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci//{$index + 1}">{$index + 1}</a></li>
          {/if}
          {/if}
          {if $num_pagine <= $index + 1 && $num_pagine != $index}
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci//{$num_pagine}">{$num_pagine}</a></li>
          {elseif $index < $num_pagine - 1}
          <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci//{$num_pagine}">{$num_pagine}</a></li>
          {/if}
          {if $num_pagine >= $index + 1}
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci//{$index + 1}">Next</a></li>
          {else}
          <li class="page-item disabled"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci//{$index + 1}">Next</a></li>
          {/if}
          {else}
          {if $index == 1}
          <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a></li>
          <li class="page-item active" aria-current="page"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci/cerca/{$index}">{$index}</a></li>
          {if $index + 1 < $num_pagine}
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci/cerca/{$index + 1}">{$index + 1}</a></li>
          {/if}
          {if $index + 2 < $num_pagine}
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci/cerca/{$index + 2}">{$index + 2}</a></li>
          {/if}
          {else}
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci/cerca/{$index - 1}" tabindex="-1" aria-disabled="true">Back</a></li>
          <li class="page-item" aria-current="page"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci/cerca/{$index - 1}">{$index - 1}</a></li>
          <li class="page-item active"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci/cerca/{$index}">{$index}</a></li>
          {if $index + 1 < $num_pagine}
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci/cerca/{$index + 1}">{$index + 1}</a></li>
          {/if}
          {/if}
          {if $num_pagine <= $index + 1 && $num_pagine != $index}
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci/cerca/{$num_pagine}">{$num_pagine}</a></li>
          {elseif $index < $num_pagine - 1}
          <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci/cerca/{$num_pagine}">{$num_pagine}</a></li>
          {/if}
          {if $num_pagine >= $index + 1}
          <li class="page-item"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci/cerca/{$index + 1}">Next</a></li>
          {else}
          <li class="page-item disabled"><a class="page-link" href="/ProgettoWeb/Annunci/EsploraAnnunci/cerca/{$index + 1}">Next</a></li>
          {/if}
          {/if}
        </ul>
      </nav>
    </div>
    
    
    <!-- Side widgets-->
    <div class="col-lg-4">
      <!-- Search widget-->
      <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
          <form method="POST" action="/ProgettoWeb/Annunci/cerca">
            <div class="input-group">
              <input class="form-control" name="text" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
              <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
            </div>
          </form>
        </div>
      </div>
      <!-- Categories widget-->
      <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6">
              <ul class="list-unstyled mb-0">
                {$value = sizeof($categorie)/2}
                {if $categorie != null}
                {if is_array($categorie)}
                {for $i = 0; $i < (int) $value; $i++}
                <li><a href="/ProgettoWeb/Annunci/cerca?categoria={$categorie[$i]->getCategoria()}">{$categorie[$i]->getCategoria()}</a></li>
                {/for}
              </ul>
            </div>
            <div class="col-sm-6">
              <ul class="list-unstyled mb-0">
                {for $i = $value; $i < sizeof($categorie); $i++}
                <li><a href="/ProgettoWeb/Annunci/cerca?categoria={$categorie[$i]->getCategoria()}">{$categorie[$i]->getCategoria()}</a></li>
                {/for}
              </ul>
            </div>
            {else}
            <li><a href="/ProgettoWeb/Annunci/cerca?categoria={$categorie->getCategoria()}">{$categorie->getCategoria()}</a></li>
            </ul>
          </div>
          {/if}
          {/if}
        </div>
      </div>
    
    </div>
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

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>