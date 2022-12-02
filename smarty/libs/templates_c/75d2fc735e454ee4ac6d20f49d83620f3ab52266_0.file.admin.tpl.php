<?php
/* Smarty version 4.2.0, created on 2022-12-02 11:08:21
  from 'C:\xampp2\htdocs\localmp\smarty\libs\templates\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6389ce958e7f32_37393625',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75d2fc735e454ee4ac6d20f49d83620f3ab52266' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\localmp\\smarty\\libs\\templates\\admin.tpl',
      1 => 1669822772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6389ce958e7f32_37393625 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<?php $_smarty_tpl->_assignInScope('userLogged', (($tmp = $_smarty_tpl->tpl_vars['userLogged']->value ?? null)===null||$tmp==='' ? 'nouser' ?? null : $tmp));?>

<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"/>
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
<div class="padding">
    <div class="d-flex">
        <div class="flex-shrink-0"><img class="rounded-circle" src="/localmp/smarty/libs/images/neonmarket.jpg" width=100 height=100 alt="..." /></div>
        <div class="ms-3">
            <h3 class="m-b-0"><?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>
</h3>
            <p class="text-muted">Amministratore</p>
        </div>
    </div>
</div>
<h2 class="text-center fw-bolder fs-5 mb-4 padding">Lista membri
    <input type="text" id="SearchTxt" /><input type="button" id="SearchBtn" value="Cerca" onclick="doSearch(document.getElementById('SearchTxt').value)" />
</h2>
<section class="py-5">
    <div class="container px-5">
        <?php echo '<script'; ?>
>
            function doSearch(text) {
                if (window.find(text)) {
                    console.log(window.find(text));
                }
            }
        <?php echo '</script'; ?>
>

        <div class="row gx-5" id="list">

            <?php if ($_smarty_tpl->tpl_vars['list']->value) {?>
                <?php if (is_array($_smarty_tpl->tpl_vars['list']->value)) {?>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['list']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['list']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <div class="card-body p-4">
                                    <a href="/localmp/Admin/profiloUtente/<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]->getIdUser();?>
" ><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]->getCognome();?>
</a>
                                </div>
                            </div>
                        </div>
                    <?php }
}
?>
                <?php }?>
            <?php } else { ?>
                <h2> Non ci sono membri iscritti </h2>
            <?php }?>
        </div>
    </div>
</section>

</body>
</html><?php }
}
