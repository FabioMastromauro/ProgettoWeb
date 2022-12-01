<?php
/* Smarty version 4.2.0, created on 2022-11-30 16:55:42
  from 'C:\xampp2\htdocs\localmp\smarty\libs\templates\annunci.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_63877cfe7c7cc8_59650618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51fcd5d3d6bd36695a6a1049231a810f050ac22a' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\localmp\\smarty\\libs\\templates\\annunci.tpl',
      1 => 1669822778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63877cfe7c7cc8_59650618 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
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


<body class="d-flex flex-column">

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

<main class="flex-shrink-0">


    <!-- Page Content-->
    <?php if ($_smarty_tpl->tpl_vars['annuncio']->value) {?>
        <?php if (is_array($_smarty_tpl->tpl_vars['annuncio']->value)) {?>
            <section class="py-5">
                <div class="container px-5">
                    <h1 class="fw-bolder fs-5 mb-4">Annuncio nuovo</h1>
                    <div class="card border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row gx-0">
                                <div class="col-lg-6 col-xl-5 py-lg-5">
                                    <div class="p-4 p-md-5">
                                        <div class="h2 fw-bolder"><?php echo $_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['ran_num']->value]->getTitolo();?>
</div>
                                        <p><?php echo substr($_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['ran_num']->value]->getDescrizione(),0,100);?>
</p>
                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['foto']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['foto']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                        <?php if ($_smarty_tpl->tpl_vars['foto']->value[$_smarty_tpl->tpl_vars['i']->value]->getIdAnnuncio() == $_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['ran_num']->value]->getIdAnnuncio()) {?>
                                            <?php $_smarty_tpl->_assignInScope('foto_singola', $_smarty_tpl->tpl_vars['foto']->value[$_smarty_tpl->tpl_vars['i']->value]);?>
                                            <?php break 1;?>
                                        <?php }?>
                                    <?php }
}
?>
                                        <a class="stretched-link text-decoration-none" href="/localmp/Annunci/InfoAnnuncio/<?php echo $_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['ran_num']->value]->getIdAnnuncio();?>
">
                                            Vai all'annuncio
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog"> <img src="data:<?php echo $_smarty_tpl->tpl_vars['foto_singola']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['foto_singola']->value->getFoto();?>
" width=600 height=450></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } else { ?>
            <section class="py-5">
                <div class="container px-5">
                    <h1 class="fw-bolder fs-5 mb-4">Annunci</h1>
                    <div class="card border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row gx-0">
                                <div class="col-lg-6 col-xl-5 py-lg-5">
                                    <div class="p-4 p-md-5">
                                        <div class="h2 fw-bolder"><?php echo $_smarty_tpl->tpl_vars['annuncio']->value->getTitolo();?>
</div>
                                        <p><?php echo substr($_smarty_tpl->tpl_vars['annuncio']->value->getDescrizione(),0,100);?>
</p>
                                        <a class="stretched-link text-decoration-none" href="/localmp/Annunci/InfoAnnuncio/<?php echo $_smarty_tpl->tpl_vars['annuncio']->value->getIdAnnuncio();?>
">
                                            Vai all'annuncio
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog"> <img src="data:<?php echo $_smarty_tpl->tpl_vars['annuncio']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['annuncio']->value->getImmagine();?>
" width=600 height=450></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php }?>
    <?php } else { ?>
        <section class="py-5">
            <div class="container px-5">
                <h1 class="fw-bolder fs-5 mb-4">Ancora nessuna ricetta da vedere!</h1>
            </div>
        </section>
    <?php }?>
    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5">
            <?php if ((isset($_smarty_tpl->tpl_vars['annuncio']->value))) {?>
            <?php if (is_array($_smarty_tpl->tpl_vars['annuncio']->value)) {?>
            <h2 class="fw-bolder fs-5 mb-4">Esplora gli annunci</h2>
            <div class="row gx-5">
                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['annuncio']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['annuncio']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0 ">
                            <div style="text-align:center">
                                <?php
$_smarty_tpl->tpl_vars['j'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['j']->value = 0;
if ($_smarty_tpl->tpl_vars['j']->value < count($_smarty_tpl->tpl_vars['foto']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['j']->value < count($_smarty_tpl->tpl_vars['foto']->value); $_smarty_tpl->tpl_vars['j']->value++) {
?>
                                    <?php if ($_smarty_tpl->tpl_vars['foto']->value[$_smarty_tpl->tpl_vars['j']->value]->getIdAnnuncio() == $_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['i']->value]->getIdAnnuncio()) {?>
                                        <?php $_smarty_tpl->_assignInScope('foto_s', $_smarty_tpl->tpl_vars['foto']->value[$_smarty_tpl->tpl_vars['j']->value]);?>
                                        <?php break 1;?>
                                    <?php }?>
                                   <?php }
}
?>

                                <?php
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['k']->value = 0;
if ($_smarty_tpl->tpl_vars['k']->value < count($_smarty_tpl->tpl_vars['categoria']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['k']->value < count($_smarty_tpl->tpl_vars['categoria']->value); $_smarty_tpl->tpl_vars['k']->value++) {
?>
                                    <?php if ($_smarty_tpl->tpl_vars['categoria']->value[$_smarty_tpl->tpl_vars['k']->value]->getIdCate() == $_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['i']->value]->getCategoria()) {?>
                                        <?php $_smarty_tpl->_assignInScope('categoria_s', $_smarty_tpl->tpl_vars['categoria']->value[$_smarty_tpl->tpl_vars['k']->value]->getCategoria());?>
                                        <?php break 1;?>
                                    <?php }?>
                                <?php }
}
?>

                            <img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['foto_s']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['foto_s']->value->getFoto();?>
" style="width: 350px; height: 400px" alt="" />
                            </div>
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php echo $_smarty_tpl->tpl_vars['categoria_s']->value;?>
</div>
                                <a class="text-decoration-none link-dark stretched-link" href="/localmp/Annunci/InfoAnnuncio/<?php echo $_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['i']->value]->getIdAnnuncio();?>
"><div class="h5 card-title mb-3"><?php echo $_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['i']->value]->getTitolo();?>
</div></a>
                                <p class="card-text mb-0"><?php echo substr($_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['i']->value]->getDescrizione(),0,100);?>
</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <?php echo $_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['i']->value]->getPrezzo();?>
 €
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php }
}
?>
                <?php }?>
                <?php }?>

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



<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
