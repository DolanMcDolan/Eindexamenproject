<?php
$rollen = array("klant", "bezorger", "admin", "baliemedewerker", "eigenaar");
require_once("./security.php");
?>

<?php

require_once("./classes/KlachtClass.php");
if (isset($_POST['submit-klacht'])) {

    KlachtClass::insert_klacht_into_database($_POST['klacht']);
    echo "<h3 style='text-align: center;' >Uw klacht of opmerking is verzonden.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    header("refresh:4;url=index.php?content=klantHomepage");
} else {
    ?>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript"
                src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
              type="text/css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <style>
            .header {
                font-size: 24px;
                padding: 20px;
            }

            th {
                min-width: 500px;
            }
        </style>
    </head>
    <body>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><h2>Klacht indienen</h2></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php?content=klantHomepage">Winkelmand</a></li>
                        <li><a href="index.php?content=mijnBestellingen">Mijn bestellingen</a></li>
                        <li><a href="index.php?content=reserveringen">Reserveringen</a></li>
                        <li><a href="index.php?content=klachtIndienen">Klacht indienen</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <form role="form" action="" method="post">

                                <div class="form-group"><label class="control-label"
                                                               for="comment">Klacht/Opmerking</label>
                                    <textarea class="form-control" id="klacht" placeholder="Klacht/Opmerking"
                                              type="text" name="klacht" rows="8" required></textarea></div>
                                <button type="submit" class="btn btn-primary" name="submit-klacht">Verzend</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br>
    </body>
    </html>

    <?php
}
?>