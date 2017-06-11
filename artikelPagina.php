<?php
$rollen = array(
    "klant",
    "bezorger",
    "admin",
    "baliemedewerker",
    "eigenaar"
);
require_once("./security.php");
?>

<?php

if (isset($_POST['submit'])) {

    echo "<h3 style='text-align: center;' >Item toegevoegd aan winkelmand.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    header("refresh:4;url=index.php?content=winkelmand");
    require_once("./classes/KoopClass.php");
    KoopClass::insert_winkelmanditem_database($_POST);
} else {
    ?>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript"
                src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript"
                src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
              rel="stylesheet" type="text/css">
        <link href="videoPagina.css" rel="stylesheet" type="text/css">
        <style>
            .header {
                padding: 20px;
            }
        </style>
    </head>
    <body>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><h2>Filmpagina</h2><br><br></div>
            </div>
            <div class="row">
                <?php
                require_once("classes/LoginClass.php");
                require_once("classes/SessionClass.php");

                $artikelen = ArtikelClass::selecteer_specefiek_artikel($_GET['idProduct']);



                if ($artikelen->num_rows > 0) {
                    while ($row = $artikelen->fetch_assoc()) {
                        echo "
                            <div class=\"container\">
                                <div class=\"row\">
                                    <div class=\"col-md-4\">
                                        <img style='height: 400px' src=\"pictures/" . $row["foto"] . "\" class=\"img-responsive\">
                                    </div>
                                    <div class=\"col-md-6\">
                                        <h3>" . $row["naam"] . "</h3>";
                        echo "
                                                            </p><br><b>Beschrijving: </b>
                                                            " . $row["beschrijving"] . "<br><br>";
                        if ($row["aantal"] > 0) {
                            echo "<b>Aantal beschikbaar: </b>" . $row["aantal"] . "<br><br>";
                        } else {

                            echo "<b>Deze video is helaas uitverkocht. Plaats een reservering om de video te kunnen huren als die weer beschikbaar is.<br><br></b>";

                        }
                        echo "
                            <b>Prijs: </b>
                            &euro; " . $row["prijs"] . " </p >
                                           
                                        <p ><form role = \"form\" action='' method='post'>
                                        <input type='hidden' name='idUser' value='" . $_SESSION['idUser'] . "'/>
                                        <input type='hidden' name='idProduct' value='" . $row['idProduct'] . "'/>                                       
                                        
                                    ";
                        if ($row["aantal"] > 0) {

                            echo "
                                  <input type='number' name='aantal' min='1' max='30'>
                                  <button type='submit' name='submit' class='btn btn - info'>Toevoegen aan winkelmand<br></button>
                                </form>
                                </div>
                                </div>
                            </div>";

                        } else {
                            echo "
                                
                                <button type='submit' name='reserveer' class='btn btn - info'>Plaats Reservatie<br></button>
                                </form>
                                </div>
                                </div>
                            </div>";
                        }


                    }
                } else {
                    echo "Geen resultaten<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
                }
                ?>
                <br><br>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
}
?>