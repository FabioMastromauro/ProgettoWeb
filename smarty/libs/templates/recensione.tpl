<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - BBBootstrap</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link href="/localmp/smarty/libs/css/recensione.css" rel="stylesheet">

</head>
<!--navbar nostra-->

<!-- Main Body -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-6 col-12 pb-4">
                {if isset($recensione)}
                    <h1>recensioni</h1>
                    {for $i=0; $i<sizeof($recensione);$i++}
                        <div class="comment mt-4 text-justify float-left">
                            {if !isset($immagine)}
                                <!-- immagine non settata TODO-->
                                <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">

                            {else}
                                <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">
                            {/if}
                            <h4>{$autori[$i]->getNome()}{$autori[$i]->getCognome()}</h4>
                            <span>{$recensione[$i]->getDataPubblicazione()}</span>
                            <br>
                            <br>
                            <p>{$recensione[$i]->getCommento()}</p>
                        </div>
                    {/for}
                {/if}

            </div>
            <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                <form id="algin-form">
                    <div class="form-group">
                        <h4>Lascia una recensione</h4>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
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
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript'>#</script>
<script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    });</script>

</body>
</html>