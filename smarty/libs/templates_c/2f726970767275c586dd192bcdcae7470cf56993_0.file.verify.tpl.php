<?php
/* Smarty version 4.2.0, created on 2022-11-14 23:32:04
  from 'C:\xampp2\htdocs\ProgettoProgWeb\smarty\libs\templates\verify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6372c1e45ff6b1_92018155',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f726970767275c586dd192bcdcae7470cf56993' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\ProgettoProgWeb\\smarty\\libs\\templates\\verify.tpl',
      1 => 1668465122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6372c1e45ff6b1_92018155 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Local Market Place-Login or Sign up</title>
    <link rel="stylesheet" href="/localmp/smarty/libs/css/login.css">
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="/localmp/smarty/libs/css/style.css" rel="stylesheet">

    <?php echo '<script'; ?>
>
        function ready(){
            if(!navigator.cookieEnabled){
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
            }
        }
    <?php echo '</script'; ?>
>


</head>
<body style="margin:0">
<form method="POST" action="/localmp/Utente/confermaMail" enctype="multipart/form-data">

        <div class="row">
            <div class="colm-form">
                <div class="form-container">

                    <input  type="text" name="email" id="email" placeholder="Email address" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" readonly>
                    <input  type="password" name="password" id="password" placeholder="Password" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" readonly>
                    <input type="text" name="codice" id="codice" placeholder="Codice di verifica" value="" >
                    <input type="submit"   class="btn btn-login" value="Verifica">
                </div>
                <form action="/localmp/Utente/Ricerca">
                    <input type="submit" value="Indietro" class="btn btn-new">
                </form>
            </div>
        </div>
</form>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/localmp/smarty/libs/javascript/showpsw.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
