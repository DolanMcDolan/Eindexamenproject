<?php
$userrole = array("2", "bezorger", "1", "baliemedewerker", "eigenaar");
require_once("./security.php");
?>

<?php

require_once("./classes/ActeurClass.php");
if (isset($_POST['submit-acteur'])) {

    ActeurClass::insert_acteur_into_database($_POST['naam']);
    echo "<h3 style='text-align: center;' >U heeft een nieuwe acteur toegevoegd.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    header("refresh:4;url=index.php?content=adminHomepage");

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
                <div class="col-md-12"><h2>Acteur toevoegen</h2></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><a href="index.php?content=adminHomepage">Artikelen beheren</a></li>
                                <li><a href="index.php?content=rolWijzigen">Gebruikerrol veranderen</a></li>
                                <li><a href="index.php?content=blokkeren">Gebruiker Blokkeren</a></li>
                                <li><a href="index.php?content=gebruikerVerwijderen">Gebruiker verwijderen</a></li>
                                <li><a href="index.php?content=verwijderFilm">Film verwijderen</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <form role="form" action="" method="post">
                                <div class="form-group"><input class="form-control" name="naam" placeholder="Acteur"
                                                               type="text"></div>

                                <button type="submit" class="btn btn-primary" name="submit-acteur">Verzend</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
    </body>
    </html>

    <?php
}
?>