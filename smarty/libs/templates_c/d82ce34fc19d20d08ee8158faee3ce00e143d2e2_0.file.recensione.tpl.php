<?php
/* Smarty version 4.2.0, created on 2022-11-24 18:11:17
  from 'C:\xampp2\htdocs\localmp\smarty\libs\templates\recensione.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_637fa5b58631b0_07896056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd82ce34fc19d20d08ee8158faee3ce00e143d2e2' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\localmp\\smarty\\libs\\templates\\recensione.tpl',
      1 => 1669309876,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_637fa5b58631b0_07896056 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - BBBootstrap</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <?php echo '<script'; ?>
 type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'><?php echo '</script'; ?>
>
    <link href="/localmp/smarty/libs/css/recensione.css" rel="stylesheet">

</head>
<body className='snippet-body'>
<!--navbar nostra-->

<!-- Main Body -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-6 col-12 pb-4">
                <?php if ((isset($_smarty_tpl->tpl_vars['recensione']->value))) {?>
                    <h1>recensioni</h1>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['recensione']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['recensione']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                        <div class="comment mt-4 text-justify float-left">
                            <?php if (!(isset($_smarty_tpl->tpl_vars['immagine']->value))) {?>
                                <!-- immagine non settata TODO-->
                                <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">

                            <?php } else { ?>
                                <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">
                            <?php }?>
                            <h4><?php echo $_smarty_tpl->tpl_vars['autori']->value[$_smarty_tpl->tpl_vars['i']->value]->getNome();
echo $_smarty_tpl->tpl_vars['autori']->value[$_smarty_tpl->tpl_vars['i']->value]->getCognome();?>
</h4>
                            <span><?php echo $_smarty_tpl->tpl_vars['recensione']->value[$_smarty_tpl->tpl_vars['i']->value]->getDataPubblicazione();?>
</span>
                            <br>
                            <p><?php echo $_smarty_tpl->tpl_vars['recensione']->value[$_smarty_tpl->tpl_vars['i']->value]->getCommento();?>
</p>
                        </div>
                    <?php }
}
?>
                <?php }?>

            </div>
            <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                <form id="algin-form">
                    <div class="form-group">
                        <h4>Lascia una recensione</h4>
                        <textarea name="msg" id="message" cols="30" rows="5" class="form-control" style="background-color: black;"></textarea>
                    </div>


                    <div class="form-group">
                        <input type="submit" id="post" class="btn" value="pubblica">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php echo '<script'; ?>
 type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='#'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='#'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='#'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript'>#<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    });<?php echo '</script'; ?>
>

</body>
</html><?php }
}
