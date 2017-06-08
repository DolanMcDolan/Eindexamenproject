<?php
$userrole = array("1", "eigenaar");
require_once("./security.php");
?>

<?php

require_once("classes/LoginClass.php");
if (isset($_POST['submit'])) {

    ArtikelClass::wijzig_gegevens_film($_POST);

    echo "<h3 style='text-align: center;' >Uw wijzigingen zijn verwerkt.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
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
                min-width: 300px;
            }

        </style>

    </head>
<body>
<div class="section">
    <div class="container">
    <div class="row">
        <div class="col-md-12"><h2>Artikelen beheren</h2></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php?content=adminHomepage">Homepage</a></li>
                <li><a href="index.php?content=videoToevoegen">Artikelen Toevoegen</a></li>
                <li><a href="index.php?content=verwijderFilm">Artikelen verwijderen</a></li>
                <li><a href="index.php?content=beschikbaarMaken">Artikelen beschikbaar maken</a></li>
                <!-- <Wijzigingsopdracht>  -->
                <li><a href="index.php?content=nieuweFilms">Nieuwe Artikelen</a></li>
                <!-- </Wijzigingsopdracht> -->
                <li><a href="index.php?content=rolWijzigen">Gebruikerrol veranderen</a></li>
                <li><a href="index.php?content=blokkeren">Gebruiker blokkeren</a></li>
                <li><a href="index.php?content=gebruikerVerwijderen">Gebruiker verwijderen</a></li>
            </ul>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            <?php
            require_once("classes/LoginClass.php");
            require_once("classes/HireClass.php");
            require_once("classes/SessionClass.php");

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "examendatabase";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            $conn2 = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if ($conn2->connect_error) {
                die("Connection failed: " . $conn2->connect_error);
            }
            $sql = "SELECT * FROM video";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <form role=\"form\" action=\"\" method=\"post\">
                        <div class=\"form-group\"><label class=\"control-label\" for=\"titel\">Titel<br></label>
                            <input class=\"form-control\" id=\"titel\" placeholder=\"Titel\" type=\"text\" name=\"titel\" value='" . $row['titel'] . "' required></div>
                        <div class=\"form-group\"><label class=\"control-label\" for=\"beschrijving\">Beschrijving<br></label>
                            <input class=\"form-control\" id=\"beschrijving\" placeholder=\"Beschrijving\" type=\"text\" name=\"beschrijving\" value='" . $row['beschrijving'] . "' required></div>
                        <div class=\"form-group\"><label class=\"control-label\" for=\"fotopad\">Fotopad<br></label>
                            <input class=\"form-control\" id=\"fotopad\" placeholder=\"Fotopad\" type=\"text\" name=\"fotopad\" value='" . $row['fotopad'] . "' required></div>
                        <div class=\"form-group\"><label class=\"control-label\" for=\"prijs\">Prijs<br></label>
                            <input class=\"form-control\" id=\"prijs\" placeholder=\"Prijs\" type=\"text\" name=\"prijs\" value='" . $row['prijs'] . "' required></div>
                        <div class=\"form-group\"><label class=\"control-label\" for=\"aantalBeschikbaar\">Aantal Beschikbaar</label>
                            <input class=\"form-control\" id=\"aantalBeschikbaar\" placeholder=\"Aantal Beschikbaar\" type=\"text\" name=\"aantalBeschikbaar\" value='" . $row['aantalBeschikbaar'] . "' required></div>
                        <!--<select name='acteurSelect'>-->";
//                            $sql2 = "SELECT DISTINCT b.naam, a.idActeur FROM videoacteur AS a INNER JOIN acteur AS b ON a.idActeur = b.idActeur ORDER BY naam ASC";
//                            $result2 = $conn2->query($sql2);
//                            while ($row2 = mysqli_fetch_array($result2)) {
//                                echo "<option value='" . $row2['idActeur'] . "'>" . $row2['naam'] . "</option>";
//                            }
                    echo "
                           <!-- </select> -->
                        <input type='hidden' name='idvanvid' value='" . $row['idVideo'] . "'/>
                        <button type=\"submit\" class=\"btn btn-danger\" name=\"submit\">Verzend</button>
                    </form><br><hr>";

                }
                echo "
                           <br><br><br><br><br><br><br><br>
                            
                            ";


            } else {
                echo "Geen resultaten<br><br><br><br><br><br><br><br><br><br><br>";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <?php
}
?>