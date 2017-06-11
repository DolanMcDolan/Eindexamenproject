<!-- <Wijzigingsopdracht> -->
<?php
$rollen = array("admin", "eigenaar");
require_once("./security.php");
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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
        <?php


        require_once("classes/LoginClass.php");
        if (isset($_POST['updateNieuw'])) {
            include('connect_db.php');
            echo $_POST['blockSelect'];
            if ($_POST['blockSelect'] == '1') {
                $sql2 = "UPDATE `video`
                        SET `aantalBeschikbaar` = '10'
                        WHERE `idProduct` = " . $_POST['idProduct'] . "";
                // echo $sql2;
                $database->fire_query($sql2);
                $result = mysqli_query($connection, $sql2);

                $sql3 = "UPDATE `video`
                        SET `prijs` = '7.50'
                        WHERE `idProduct` = " . $_POST['idProduct'] . "";
                echo $sql3;
                $database->fire_query($sql3);
                $result = mysqli_query($connection, $sql3);
            }
            if ($_POST['blockSelect'] == '0') {

                $sql4 = "UPDATE `video`
                        SET `prijs` = '8.00'
                        WHERE `idProduct` = " . $_POST['idProduct'] . "";
                echo $sql4;
                $database->fire_query($sql4);
                $result = mysqli_query($connection, $sql4);

            }
            $sql = "UPDATE	`video` 
                     SET 		`nieuw`		=	'" . $_POST['blockSelect'] . "'
                     WHERE	    `idProduct`			=	 " . $_POST['idProduct'] . " ";


            //echo $sql;
            $database->fire_query($sql);
            $result = mysqli_query($connection, $sql);

            echo "<h3 style='text-align: center;' >Uw wijzigingen zijn verwerkt.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
            header("refresh:10;url=index.php?content=nieuweFilms");

        } else {
        ?>
        <div class="row">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12"><h2>Nieuwe films</h2></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><a href="index.php?content=adminHomepage">Homepage</a></li>
                                <li><a href="index.php?content=videoToevoegen">Artikelen Toevoegen</a></li>
                                <li><a href="index.php?content=ArtikelenBeheren">Artikelen beheren</a></li>
                                <li><a href="index.php?content=verwijderFilm">Artikelen verwijderen</a></li>
                                <li class="list-group-item"><a href="index.php?content=nieuweFilms">Nieuwe Artikelen</a>
                                </li>
                                <li><a href="index.php?content=beschikbaarMaken">Artikelen beschikbaar maken</a></li>
                                <li><a href="index.php?content=rolWijzigen">Gebruikerrol veranderen</a></li>
                                <li><a href="index.php?content=blokkeren">Gebruiker blokkeren</a></li>
                                <li><a href="index.php?content=gebruikerVerwijderen">Gebruiker verwijderen</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <?php
                    require_once("classes/LoginClass.php");
                    require_once("classes/KoopClass.php");
                    require_once("classes/SessionClass.php");

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "examendatabase";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }


                    $sql = "SELECT * FROM `video`";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            echo "
                        <table class=\"table table - responsive\">
                            <thead>
                            <tr>
                                <th>
                                        Titel:
                                </th>
                                <th>
                                        AantalBeschikbaar:
                                </th>
                                <th>
                                        Nieuw:
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                        " . $row['titel'] . "
                                </td>

                                <td>
                                        " . $row['aantalBeschikbaar'] . "
                                </td>
                                <td>
                                        " . $row['nieuw'] . "
                                </td>
                                <td>
                                        <form role=\"form\" action='' method='post'>
                                            <select name='blockSelect'>
                                                <option value='1'>Nieuw ( 1 )</option>
                                                <option value='0'>Niet nieuw ( 0 )</option>
                                                </select>
                                            <input type='hidden' class=\"btn btn-info\" name='idProduct' value='" . $row['idProduct'] . "'/>
                                            <input type='submit' class=\"btn btn-info\" name='updateNieuw' value='Update Nieuwe Artikelen'>
                                            
                                        </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                            ";
                        }
                    } else {
                        echo "Geen resultaten<br><br><br><br><br><br><br>";
                    }
                    $conn->close();
                    ?>

                    <br><br>
                </div>
            </div>
            <?php

            }
            ?>
            </row>
        </div>
    </div>

</body>
</html>
<!-- </Wijzigingsopdracht> -->