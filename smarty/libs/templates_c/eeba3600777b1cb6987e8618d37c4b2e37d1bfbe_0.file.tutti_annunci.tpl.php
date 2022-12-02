<?php
/* Smarty version 4.2.0, created on 2022-12-02 10:43:01
  from 'C:\xampp2\htdocs\localmp\smarty\libs\templates\tutti_annunci.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6389c8a5ee3bb2_81362519',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eeba3600777b1cb6987e8618d37c4b2e37d1bfbe' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\localmp\\smarty\\libs\\templates\\tutti_annunci.tpl',
      1 => 1669906084,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6389c8a5ee3bb2_81362519 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<?php $_smarty_tpl->_assignInScope('userLogged', (($tmp = $_smarty_tpl->tpl_vars['userLogged']->value ?? null)===null||$tmp==='' ? 'nouser' ?? null : $tmp));
$_smarty_tpl->_assignInScope('searchMod', (($tmp = $_smarty_tpl->tpl_vars['searchMod']->value ?? null)===null||$tmp==='' ? "searchOff" ?? null : $tmp));?>

<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"></html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="/localmp/smarty/libs/css/style.css" rel="stylesheet" />
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-1.10.2.js"><?php echo '</script'; ?>
>
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
                <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
                <li class="nav-item">
                    <a class="nav-link active" methods="POST" href="/localmp/Utente/profilo">Profilo</a>
                </li>

            </ul>

                <img src="/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
                <a class="nav-link" href="/localmp/Utente/logout">Disconnetti</a>

                <?php } else { ?>

            </ul>

            <img src="/smarty/libs/images/login.png" alt="" style="width: 30px; margin-right: 6px" class="d-inline-block align-text-right">
            <a class="nav-link" href="/localmp/Utente/login">Login/Registrati</a>

                <?php }?>


            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
                <button class="btn btn-dark" type="submit" >Search</button>
            </form>

        </div>
    </div>
</nav>
<header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Benvenuto negli annunci!</h1>
                    <p class="lead mb-0">Esplora i prodotti che ti interessano!</p>
                </div>
            </div>
        </header>

        <?php if (!is_array($_smarty_tpl->tpl_vars['immagini']->value) && !is_array($_smarty_tpl->tpl_vars['annunci']->value)) {?>
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="/localmp/Annunci/InfoAnnuncio/<?php echo $_smarty_tpl->tpl_vars['annunci']->value->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['immagini']->value->getFoto();?>
" width=900 height=400 alt="..." /></a>
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $_smarty_tpl->tpl_vars['annunci']->value->getTitolo();?>
</h2>
                            <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['annunci']->value->getPrezzo();?>
</p>
                            <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['annunci']->value->getDescrizione(),0,100);?>
...</p>
                    </div>
                </div>
        <?php } else { ?>
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="/localmp/Annunci/InfoAnnuncio/<?php echo $_smarty_tpl->tpl_vars['annunci']->value[0]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['immagini']->value->getFoto();?>
" width=900 height=400 alt="..." /></a>
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $_smarty_tpl->tpl_vars['annunci']->value[0]->getTitolo();?>
</h2>
                            <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['annunci']->value[0]->getPrezzo();?>
</p>
                            <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['annunci']->value[0]->getDescrizione(),0,100);?>
...</p>
                    </div>
                </div>
                <div class="row">
                <!-- Nested row for non-featured blog posts-->
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <?php if (count($_smarty_tpl->tpl_vars['annunci']->value) >= 2) {?>
                    <div class="card mb-4">
                        <a href="/localmp/Annunci/InfoAnnuncio/<?php echo $_smarty_tpl->tpl_vars['annunci']->value[1]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['immagini']->value->getFoto();?>
" width=900 height=400 alt="..." /></a>
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $_smarty_tpl->tpl_vars['annunci']->value[1]->getTitolo();?>
</h2>
                            <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['annunci']->value[1]->getPrezzo();?>
</p>
                            <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['annunci']->value[1]->getDescrizione(),0,100);?>
...</p>
                    </div>
                </div>
                    <?php }?>
                    <!-- Blog post-->
                    <?php if (count($_smarty_tpl->tpl_vars['annunci']->value) >= 3) {?>
                        <div class="card mb-4">
                            <a href="/localmp/Annunci/InfoAnnuncio/<?php echo $_smarty_tpl->tpl_vars['annunci']->value[2]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['immagini']->value->getFoto();?>
" width=900 height=400 alt="..." /></a>
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $_smarty_tpl->tpl_vars['annunci']->value[2]->getTitolo();?>
</h2>
                                <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['annunci']->value[2]->getPrezzo();?>
</p>
                                <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['annunci']->value[2]->getDescrizione(),0,100);?>
...</p>
                        </div>
                    </div>
                    <?php }?>

                <div class="col-lg-6">
                    <?php if (count($_smarty_tpl->tpl_vars['annunci']->value) >= 4) {?>
                        <div class="card mb-4">
                            <a href="/localmp/Annunci/InfoAnnuncio/<?php echo $_smarty_tpl->tpl_vars['annunci']->value[3]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['immagini']->value->getFoto();?>
" width=900 height=400 alt="..." /></a>
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $_smarty_tpl->tpl_vars['annunci']->value[3]->getTitolo();?>
</h2>
                                <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['annunci']->value[3]->getPrezzo();?>
</p>
                                <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['annunci']->value[3]->getDescrizione(),0,100);?>
...</p>
                        </div>
                    </div>
                    <?php }?>
                    <?php if (count($_smarty_tpl->tpl_vars['annunci']->value == 5)) {?>
                        <div class="card mb-4">
                            <a href="/localmp/Annunci/InfoAnnuncio/<?php echo $_smarty_tpl->tpl_vars['annunci']->value[4]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['immagini']->value->getFoto();?>
" width=900 height=400 alt="..." /></a>
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $_smarty_tpl->tpl_vars['annunci']->value[4]->getTitolo();?>
</h2>
                                <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['annunci']->value[4]->getPrezzo();?>
</p>
                                <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['annunci']->value[4]->getDescrizione(),0,100);?>
...</p>
                        </div>
                    </div>
                    <?php }?>
                <?php }?>
                <!--pagination-->

                <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <?php if ($_smarty_tpl->tpl_vars['searchMod']->value == 'searchOff') {?>
                        <?php if ($_smarty_tpl->tpl_vars['index']->value == 1) {?>
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                            <?php if ($_smarty_tpl->tpl_vars['index']->value+1 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</a></li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['index']->value+2 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//<?php echo $_smarty_tpl->tpl_vars['index']->value+2;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+2;?>
</a></li>
                            <?php }?>
                        <?php } else { ?>
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//<?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
" tabindex="-1" aria-disabled="true">Back</a></li>
                            <li class="page-item" aria-current="page"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//<?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
</a></li>
                            <li class="page-item active"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                            <?php if ($_smarty_tpl->tpl_vars['index']->value+1 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</a></li>
                            <?php }?>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['num_pagine']->value <= $_smarty_tpl->tpl_vars['index']->value+1 && $_smarty_tpl->tpl_vars['num_pagine']->value != $_smarty_tpl->tpl_vars['index']->value) {?>
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//<?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
</a></li>
                        <?php } elseif ($_smarty_tpl->tpl_vars['index']->value < $_smarty_tpl->tpl_vars['num_pagine']->value-1) {?>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//<?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
</a></li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['num_pagine']->value >= $_smarty_tpl->tpl_vars['index']->value+1) {?>
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
">Next</a></li>
                        <?php } else { ?>
                            <li class="page-item disabled"><a class="page-link" href="/localmp/Annunci/esploraAnnunci//<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
">Next</a></li>
                        <?php }?>
                        <?php } else { ?>
                        <?php if ($_smarty_tpl->tpl_vars['index']->value == 1) {?>
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                            <?php if ($_smarty_tpl->tpl_vars['index']->value+1 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</a></li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['index']->value+2 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value+2;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+2;?>
</a></li>
                            <?php }?>
                        <?php } else { ?>
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
" tabindex="-1" aria-disabled="true">Back</a></li>
                            <li class="page-item" aria-current="page"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
</a></li>
                            <li class="page-item active"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                            <?php if ($_smarty_tpl->tpl_vars['index']->value+1 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</a></li>
                            <?php }?>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['num_pagine']->value <= $_smarty_tpl->tpl_vars['index']->value+1 && $_smarty_tpl->tpl_vars['num_pagine']->value != $_smarty_tpl->tpl_vars['index']->value) {?>
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/<?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
</a></li>
                        <?php } elseif ($_smarty_tpl->tpl_vars['index']->value < $_smarty_tpl->tpl_vars['num_pagine']->value-1) {?>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/<?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
</a></li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['num_pagine']->value >= $_smarty_tpl->tpl_vars['index']->value+1) {?>
                        <li class="page-item"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
">Next</a></li>
                            <?php } else { ?>
                            <li class="page-item disabled"><a class="page-link" href="/localmp/Annunci/esploraAnnunci/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
">Next</a></li>
                        <?php }?>
                    <?php }?>
                </ul>
            </nav>
        </div>
        <!-- Categories widget-->
        <div class="card mb-4">
                        <div class="card-header">Categorie</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                    <?php $_smarty_tpl->_assignInScope('value', sizeof($_smarty_tpl->tpl_vars['categorie']->value)/2);?>
                                    <?php if ($_smarty_tpl->tpl_vars['categorie']->value != null) {?>
                                        <?php if (is_array($_smarty_tpl->tpl_vars['categorie']->value)) {?>
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['value']->value) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['value']->value; $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                <li><a href="/localmp/Annunci/cerca?categoria=<?php echo $_smarty_tpl->tpl_vars['categorie']->value[$_smarty_tpl->tpl_vars['i']->value]->getCategoria();?>
"><?php echo $_smarty_tpl->tpl_vars['categorie']->value[$_smarty_tpl->tpl_vars['i']->value]->getCategoria();?>
</a></li>
                                            <?php }
}
?>
                                            </ul>
                                        </div>
                                            <div class="col-sm-6">
                                                <ul class="list-unstyled mb-0">
                                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['value']->value;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['categorie']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['categorie']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                        <li><a href="/localmp/Annunci/cerca?categoria=<?php echo $_smarty_tpl->tpl_vars['categorie']->value[$_smarty_tpl->tpl_vars['i']->value]->getCategoria();?>
"><?php echo $_smarty_tpl->tpl_vars['categorie']->value[$_smarty_tpl->tpl_vars['i']->value]->getCategoria();?>
</a></li>
                                                    <?php }
}
?>
                                                </ul>
                                            </div>
                                        <?php } else { ?>
                                                    <li><a href="/localmp/Annunci/cerca?categoria=<?php echo $_smarty_tpl->tpl_vars['categorie']->value->getCategoria();?>
"><?php echo $_smarty_tpl->tpl_vars['categorie']->value->getCategoria();?>
</a></li>
                                                </ul>
                                            </div>
                                        <?php }?>
                                    <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
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
    
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
