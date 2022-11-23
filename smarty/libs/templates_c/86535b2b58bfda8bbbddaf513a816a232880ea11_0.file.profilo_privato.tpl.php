<?php
/* Smarty version 4.2.0, created on 2022-11-23 16:24:37
  from 'C:\xampp2\htdocs\localmp\smarty\libs\templates\profilo_privato.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_637e3b354b5c47_56119323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86535b2b58bfda8bbbddaf513a816a232880ea11' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\localmp\\smarty\\libs\\templates\\profilo_privato.tpl',
      1 => 1669217075,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_637e3b354b5c47_56119323 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<?php $_smarty_tpl->_assignInScope('facebook', (($tmp = $_smarty_tpl->tpl_vars['facebook']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp));
$_smarty_tpl->_assignInScope('instagram', (($tmp = $_smarty_tpl->tpl_vars['instagram']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp));
$_smarty_tpl->_assignInScope('luogo', (($tmp = $_smarty_tpl->tpl_vars['luogo']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp));
$_smarty_tpl->_assignInScope('userLogged', (($tmp = $_smarty_tpl->tpl_vars['userLogged']->value ?? null)===null||$tmp==='' ? 'nouser' ?? null : $tmp));?>


<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profilo utente privato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="/localmp/smarty/libs/css/style.css" rel="stylesheet">
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
                    <a class="nav-link active" href="/localmp/Contact/contattaci">Chi siamo?</a>
                </li>
                <?php if ($_smarty_tpl->tpl_vars['userLogged']->value != 'nouser') {?>
                <li class="nav-item">
                    <a class="nav-link active" href="/localmp/Utente/profilo">Profilo</a>
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




<div class="container">
    <div class="main-body">
        <!-- /Breadcrumb -->
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <?php if ($_smarty_tpl->tpl_vars['utente']->value->getIdFoto() == null) {?>
                            <img src="/localmp/smarty/libs/images/login.png" alt="Admin" class="rounded-circle" width="140">
                            <?php } else { ?>
                            <img src="data:<?php echo $_smarty_tpl->tpl_vars['fotoUtente']->value->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['fotoUtente']->value->getFoto();?>
"> <!-- TODO -->
                            <?php }?>
                            <div class="mt-3">
                                <h4><?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
</h4>
                                <p class="text-muted font-size-sm"><?php echo $_smarty_tpl->tpl_vars['luogo']->value;?>
</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nome</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Cognome</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $_smarty_tpl->tpl_vars['utente']->value->getEmail();?>

                            </div>
                        </div>
                        <hr>


                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#modifica">
                            Modifica
                        </button>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#creaAnnuncio">
                Crea nuovo annuncio
            </button>
            <p>

            </p>
            <!--Annunci online-->


                        <?php if ((isset($_smarty_tpl->tpl_vars['annuncio']->value))) {?>
                            <h1>Annunci online</h1>

                            <div class="container" style="display: flex; flex-flow: row wrap">
                        <?php if (is_array($_smarty_tpl->tpl_vars['annuncio']->value)) {?>
                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['annuncio']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['annuncio']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                            <div class="card-wrap" style="flex: 0 0 33.333%;display: flex;padding: 10px">
                        <div class="card" style="width: 18rem;box-shadow: 0 0 4px rgba(0,0,0,0.4);flex: 0 0 100%;">
                            <div class="card-body">
                                <img  class="card-img-top same" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[$_smarty_tpl->tpl_vars['i']->value][0]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[$_smarty_tpl->tpl_vars['i']->value][0]->getFoto();?>
" style="width: 200px; height: 100px" >
                                <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['i']->value]->getTitolo();?>
</h5>
                                <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['i']->value]->getDescrizione();?>
</p>
                                <a  href="/localmp/Annunci/infoAnnuncio/<?php echo $_smarty_tpl->tpl_vars['annuncio']->value[$_smarty_tpl->tpl_vars['i']->value]->getIdAnnuncio();?>
" class="btn btn-primary">Visita annuncio</a>
                            </div>
                        </div>
                        <p></p>
                            </div>
                        <?php }
}
?>
          </div>



                        <?php } else { ?>
                   <div class="container">
                        <div class="col">
                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <img  class="card-img-top same" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[0]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[0]->getFoto();?>
" style="width: 100%;height: 100%; object-fit: contain">
                                        <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['annuncio']->value->getTitolo();?>
</h5>
                                        <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['annuncio']->value->getDescrizione();?>
</p>
                                        <a  href="/localmp/Annunci/infoAnnuncio/<?php echo $_smarty_tpl->tpl_vars['annuncio']->value->getIdAnnuncio();?>
" class="btn btn-primary">Visita annuncio</a>
                                    </div>
                                </div>
                                <p></p>
                            </div>
                        </div>
                   </div>

                    <?php }?>


            <?php }?>
            </div>
        </div>
    </div>
</div>

<!-- About, Information, Contacts -->
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
                        <p>Per tornare all'area pubblica basta cliccare sulla voce <a href="#privatenavbar">Logout</a> in alto a destra. </p>
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
</main>

<!-- crea annuncio -->
<form action="/localmp/Annunci/pubblicaAnnuncio" method="POST" enctype="multipart/form-data">

<div class="modal fade" id="creaAnnuncio" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crea annuncio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                         <div class="col-md-4">
                            <label for="titolo" class="form-label">Titolo</label>
                            <input type="text" class="form-control" id="titolo" name="titolo" required>
                        </div>
                        <div class="mb-3">
                            <label for="descrizione" class="form-label">Descrizione</label>
                            <textarea class="form-control" id="descrizione" name="descrizione" rows="3"></textarea>
                        </div>
                        <div class="col-md-1">
                            <label for="prezzo" class="form-label">Prezzo €</label>
                            <input type="text" class="form-control" id="prezzo" name="prezzo" required>

                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Aggiungi una o più foto</label>
                            <input type="file" class="form-control"  id="file" name="file[]" multiple>
                        </div>
                        <div class="col-1">
                            <label for="categoria">Categoria</label>
                            <select name="categoria" id="categoria" class="form-select">
                                <option value="--Seleziona--">--Seleziona--</option>

                                <?php if (is_array($_smarty_tpl->tpl_vars['categoria']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoria']->value, 'cate');
$_smarty_tpl->tpl_vars['cate']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cate']->value) {
$_smarty_tpl->tpl_vars['cate']->do_else = false;
?>
                                <option id="categoria" name="categoria" value="<?php echo $_smarty_tpl->tpl_vars['cate']->value['idCate'];?>
"><?php echo $_smarty_tpl->tpl_vars['cate']->value['categoria'];?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php }?>

                            </select>
                        </div>
                        <p>
                        </p>

                            <input class="btn btn-primary" type="submit" value="Crea annuncio">

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>


</div>
</form>

<!-- modifica -->

<div class="modal fade" id="modifica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/localmp/Utente/modificaP"  method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modificaLabel">Modifica profilo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-mb-4">
                            <label for="validationCustom01"  class="form-label">Nome</label>
                            <input  type="text" class="form-control" name="nome" id="nome" style="background-color: whitesmoke" value="" >

                        </div>
                        <div class="col-mb-4">
                            <label for="validationCustom02"  class="form-label">Cognome</label>
                            <input type="text"  class="form-control" name="cognome" id="cognome" style="background-color: whitesmoke" value="" >

                        </div>
                        <div class="col-mb-4">
                            <label for="validationCustom03" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" style="background-color: whitesmoke" value="" >
                        </div>

                        <div class="col-mb-4">
                            <label for="validationCustom03" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" style="background-color: whitesmoke" value="" >
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Applica modifiche</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </form>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
