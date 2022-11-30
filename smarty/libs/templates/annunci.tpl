<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="/localmp/smarty/libs/css/style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>


<body class="d-flex flex-column">
<main class="flex-shrink-0">


    <!-- Page Content-->
    {if $annuncio}
        {if is_array($annuncio)}
            <section class="py-5">
                <div class="container px-5">
                    <h1 class="fw-bolder fs-5 mb-4">Annuncio nuovo</h1>
                    <div class="card border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row gx-0">
                                <div class="col-lg-6 col-xl-5 py-lg-5">
                                    <div class="p-4 p-md-5">
                                        <div class="h2 fw-bolder">{$annuncio[$ran_num]->getTitolo()}</div>
                                        <p>{substr($annuncio[$ran_num]->getDescrizione(),0,100)}</p>
                                    {for $i=0;$i<sizeof($foto);$i++}
                                        {if $foto[$i]->getIdAnnuncio() == $annuncio[$ran_num]->getIdAnnuncio()}
                                            {$foto_singola=$foto[$i]}
                                        {/if}
                                    {/for}
                                        <a class="stretched-link text-decoration-none" href="/localmp/Annunci/InfoAnnuncio/{$annuncio[$ran_num]->getIdAnnuncio()}">
                                            Vai all'annuncio
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog"> <img src="data:{$foto_singola->getTipo()};base64,{$foto_singola->getFoto()}" width=600 height=450></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        {else}
            <section class="py-5">
                <div class="container px-5">
                    <h1 class="fw-bolder fs-5 mb-4">Annunci</h1>
                    <div class="card border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row gx-0">
                                <div class="col-lg-6 col-xl-5 py-lg-5">
                                    <div class="p-4 p-md-5">
                                        <div class="h2 fw-bolder">{$annuncio->getTitolo()}</div>
                                        <p>{substr($annuncio->getDescrizione(),0,100)}</p>
                                        <a class="stretched-link text-decoration-none" href="/localmp/Annunci/InfoAnnuncio/{$annuncio->getIdAnnuncio()}">
                                            Vai all'annuncio
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog"> <img src="data:{$annuncio->getTipo()};base64,{$annuncio->getImmagine()}" width=600 height=450></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        {/if}
    {else}
        <section class="py-5">
            <div class="container px-5">
                <h1 class="fw-bolder fs-5 mb-4">Ancora nessuna ricetta da vedere!</h1>
            </div>
        </section>
    {/if}
    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5">
            {if isset($annuncio)}
            {if is_array($annuncio)}
            <h2 class="fw-bolder fs-5 mb-4">Esplora gli annunci</h2>
            <div class="row gx-5">
                {for $i = 0; $i < sizeof($annuncio); $i++}
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0 ">
                            <div style="text-align:center">
                                {for $j=0;$j<count($foto);$j++}
                                    {if $foto[$j]->getIdAnnuncio() == $annuncio[$i]->getIdAnnuncio()}
                                        {$foto_s=$foto[$j]}
                                    {/if}
                                   {/for}

                                {for $k=0;$k<count($categoria);$k++}
                                    {if $categoria[$k]->getIdCate()==$annuncio[$i]->getCategoria()}
                                        {$categoria_s = $categoria[$k]->getCategoria()}
                                    {/if}
                                {/for}

                            <img class="card-img-top" src="data:{$foto_s->getTipo()};base64,{$foto_s->getFoto()}" style="width: 350px; height: 400px" alt="" />
                            </div>
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">{$categoria_s}</div>
                                <a class="text-decoration-none link-dark stretched-link" href="/localmp/Annunci/InfoAnnuncio/{$annuncio[$i]->getIdAnnuncio()}"><div class="h5 card-title mb-3">{$annuncio[$i]->getTitolo()}</div></a>
                                <p class="card-text mb-0">{substr($annuncio[$i]->getDescrizione(),0,100)}</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            {$annuncio[$i]->getPrezzo()} €
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                {/for}
                {/if}
                {/if}

                <div class="text-end mb-5 mb-xl-0">
                    <a class="text-decoration-none" href="/chefskiss/Ricette/EsploraLeRicette"> <!--TODO-->
                        Tutte gli annunci
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>