<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Annuncio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="/localmp/smarty/libs/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   <!-- <script src="../javascript/searchbar.js"></script>-->

</head>
<body>

<div class="annunci-home-body inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9">
                <div class="annuncio-set submit-annuncio-set">
                    <h2>Pubblica nuovo annuncio</h2>
                    <div class="submit-annuncio-form">
                        <form action="/localmp/annunci/PubblicaAnnuncio" method="post" enctype="multipart/form-data">
                            <label for="title">Nome annuncio</label>
                            <input type="text" name="title" id="title" required/>
                            <br/>
                            <label for="annuncio-content">Informazioni annuncio</label>
                            <textarea name="content" id="annuncio-content" cols="30" rows="10" required></textarea>
                            <label for="upload-image">Foto annuncio</label>
                            <input type="file" name="file" id="upload-image" required/>
                            <label for="prezzo">Prezzo</label>
                            <input type="text" name="text" id="prezzo" required/>

                            <div class="text-center">
                                <button type="submit" class="annuncio-submit-btn">Pubblica annuncio</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>