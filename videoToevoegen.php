<?php
$userrole = array("1", "eigenaar");
require_once("./security.php");
?>

<?php
require_once("classes/LoginClass.php");
require_once("classes/HireClass.php");
require_once("classes/SessionClass.php");


$servername = "localhost";
$username = "root";
$password = "";
// <Wijzigingsopdracht>
$dbname = "examendatabase";
// </Wijzigingsopdracht>


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
if (isset($_POST['create'])) {
    echo "<h3 style='text-align: center;' >Film is toegevoegd aan database.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    header("refresh:4;url=index.php?content=adminHomepage");
    require_once("./classes/ArtikelClass.php");
    ArtikelClass::insert_film_database($_POST);

    $OptionGenre = $_POST['genreSelect'];
    $OptionGenre2 = $_POST['genreSelect2'];
    $OptionGenre3 = $_POST['genreSelect3'];
    $OptionActeur = $_POST['acteurSelect'];
    $OptionActeur2 = $_POST['acteurSelect2'];
    $OptionActeur3 = $_POST['acteurSelect3'];
    $OptionActeur4 = $_POST['acteurSelect4'];
    $OptionActeur5 = $_POST['acteurSelect5'];

    if (!($OptionGenre == "")) {
        $_POST['genreSelect'] = $_POST['genreSelect'];
        ArtikelClass::insert_genre_film($_POST);
    }
    if (!($OptionGenre2 == "")) {
        $_POST['genreSelect'] = $_POST['genreSelect2'];
        ArtikelClass::insert_genre_film($_POST);
    }
    if (!($OptionGenre3 == "")) {
        $_POST['genreSelect'] = $_POST['genreSelect3'];
        ArtikelClass::insert_genre_film($_POST);
    }

    if (!($OptionActeur == "")) {
        $_POST['acteurSelect'] = $_POST['acteurSelect'];
        ArtikelClass::insert_acteur_film($_POST);
    }
    if (!($OptionActeur2 == "")) {
        $_POST['acteurSelect'] = $_POST['acteurSelect2'];
        ArtikelClass::insert_acteur_film($_POST);
    }
    if (!($OptionActeur3 == "")) {
        $_POST['acteurSelect'] = $_POST['acteurSelect3'];
        ArtikelClass::insert_acteur_film($_POST);
    }
    if (!($OptionActeur4 == "")) {
        $_POST['acteurSelect'] = $_POST['acteurSelect4'];
        ArtikelClass::insert_acteur_film($_POST);
    }
    if (!($OptionActeur5 == "")) {
        $_POST['acteurSelect'] = $_POST['acteurSelect5'];
        ArtikelClass::insert_acteur_film($_POST);
    }


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
        <div class="col-md-12"><h2>Video Toevoegen</h2></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php?content=adminHomepage">Homepage</a></li>
                <li><a href="index.php?content=ArtikelenBeheren">Artikelen beheren</a></li>
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
    <form role='form' action='' method='post'>
        <div class='form-group'>
            <label for='titel'>Titel:</label>
            <input type='text' class='form-control' name='titel' placeholder='Voer titel in.'>
        </div>
        <div class='form-group'>
            <label for='beschrijving'>Beschrijving:</label>
            <input type='text' class='form-control' name='beschrijving' placeholder='Voer beschrijving in.'>
        </div>
        <div class='form-group'>
            <label for='genres'>Genres:</label><br>
            <select name='genreSelect' required>
                <option value=""></option>
                <?php

                $sql = "SELECT DISTINCT b.Genre, a.idGenre FROM videogenre AS a INNER JOIN genre AS b ON a.idGenre = b.idGenre ORDER BY Genre ASC";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['idGenre'] . "'>" . $row['Genre'] . "</option>";
                }

                ?>
            </select>
            &nbsp;&nbsp;
            <select name='genreSelect2'>
                <option value=""></option>
                <?php

                $sql = "SELECT DISTINCT b.Genre, a.idGenre FROM videogenre AS a INNER JOIN genre AS b ON a.idGenre = b.idGenre ORDER BY Genre ASC";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['idGenre'] . "'>" . $row['Genre'] . "</option>";
                }

                ?>
            </select>
            &nbsp;&nbsp;
            <select name='genreSelect3'>
                <option value=""></option>
                <?php

                $sql = "SELECT DISTINCT b.Genre, a.idGenre FROM videogenre AS a INNER JOIN genre AS b ON a.idGenre = b.idGenre ORDER BY Genre ASC";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['idGenre'] . "'>" . $row['Genre'] . "</option>";
                }

                ?>
            </select>
            &nbsp;&nbsp;
        </div>
        <div class='form-group'>
            <label for='acteurs'>Acteurs:</label><br>
            <select name='acteurSelect' required>
                <option value=""></option>
                <?php

                $sql = "SELECT DISTINCT b.naam, a.idActeur FROM videoacteur AS a INNER JOIN acteur AS b ON a.idActeur = b.idActeur ORDER BY naam ASC";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['idActeur'] . "'>" . $row['naam'] . "</option>";
                }

                ?>
            </select>
            &nbsp;&nbsp;
            <select name='acteurSelect2'>
                <option value=""></option>
                <?php

                $sql = "SELECT DISTINCT b.naam, a.idActeur FROM videoacteur AS a INNER JOIN acteur AS b ON a.idActeur = b.idActeur ORDER BY naam ASC";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['idActeur'] . "'>" . $row['naam'] . "</option>";
                }

                ?>
            </select>
            &nbsp;&nbsp;
            <select name='acteurSelect3'>
                <option value=""></option>
                <?php

                $sql = "SELECT DISTINCT b.naam, a.idActeur FROM videoacteur AS a INNER JOIN acteur AS b ON a.idActeur = b.idActeur ORDER BY naam ASC";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['idActeur'] . "'>" . $row['naam'] . "</option>";
                }

                ?>
            </select>
            &nbsp;&nbsp;
            <select name='acteurSelect4'>
                <option value=""></option>
                <?php

                $sql = "SELECT DISTINCT b.naam, a.idActeur FROM videoacteur AS a INNER JOIN acteur AS b ON a.idActeur = b.idActeur ORDER BY naam ASC";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['idActeur'] . "'>" . $row['naam'] . "</option>";
                }

                ?>
            </select>
            &nbsp;&nbsp;
            <select name='acteurSelect5'>
                <option value=""></option>
                <?php

                $sql = "SELECT DISTINCT b.naam, a.idActeur FROM videoacteur AS a INNER JOIN acteur AS b ON a.idActeur = b.idActeur ORDER BY naam ASC";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['idActeur'] . "'>" . $row['naam'] . "</option>";
                }

                ?>
            </select>
            <?php
            ?>
        </div>
        <div class='form-group'>
            <label for='fotopad'>Fotopad:</label>
            <input type='text' class='form-control' name='fotopad' placeholder='Voer fotopad in.'>
        </div>
        <div class='form-group'>
            <label for='aantalBeschikbaar'>Aantal Beschikbare kopieën:</label>
            <input type='text' class='form-control' name='aantalBeschikbaar' placeholder='Voer aantal beschikbaar in.'>
        </div>

        <button type='submit' name='create' class='btn btn-danger'>Submit</button>

    </form>
    <br>
    <?php
}
?>