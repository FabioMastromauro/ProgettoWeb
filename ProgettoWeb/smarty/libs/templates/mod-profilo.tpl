<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container" style = 'background-color: whitesmoke;  border-radius: 25px;'>
    <div class="mb-3 row">
        <label for="nomeutente" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nome' id="nomeutente" value="{$utente->getNome()}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="cognomeutente" class="col-sm-2 col-form-label">Cognome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='cognome' id="cognomeutente" value="{$utente->getCognome()}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="emailutente" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='email' id="emailutente" value="{$utente->getEmail()}">
        </div>
    </div>

        <a href="profilo_privato.tpl">

            <div class="col-12">
                <button class="btn btn-primary" type="submit" style="margin-left: 600px; margin-top: 25px" type="submit">Applica modifiche</button>
            </div>
        </a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>