<?php
$userrole = array("1", "baliemedewerker");
require_once("./security.php");
?>

<?php
if (isset($_POST['update'])) {
    echo "<h3 style='text-align: center;' >Film is beschikbaar gezet in database.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    header("refresh:4;url=index.php?content=baliemedewerkerHomepage");
    require_once("./classes/BalieMedewerkerClass.php");
    BalieMedewerkerClass::update_aantal_beschikbaar($_POST);
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
                min-width: 260px;
            }
        </style>
    </head>
    <body>
    <div class="section">
        <div class="container">
            <?php


            require_once("classes/LoginClass.php");
            if (isset($_POST['updateBlock'])) {
                include('connect_db.php');

                $sql = "UPDATE	`video` 
                         SET 		`beschikbaar`		=	1
                         WHERE	    `idvideo`			=	 " . $_POST['idVideo'] . " ";

                // echo $sql;
                $database->fire_query($sql);
                $result = mysqli_query($connection, $sql);

                echo "<h3 style='text-align: center;' >Uw wijzigingen zijn verwerkt.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
                header("refresh:4;url=index.php?content=baliemedewerkerHomepage");

            } else {
            ?>
            <div class="row">
                <div class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12"><h2>Baliemedewerker Pagina</h2></div>
                            <a href="index.php?content=baliemedewerkerVerwerken">
                                <div class="col-md-12"><h4>Binnengekomen Artikelen verwerken</h4></div>
                            </a>
                        </div>
                    </div>
                    </row>
                    <div class="col-md-6">
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


                        $sql = "SELECT * FROM `video` WHERE beschikbaar = 0";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                echo "
                            <table class=\"table table - responsive\">
                                <thead>
                                <tr>
                                    <th>
                                            Video ID:
                                    </th>
                                    <th>
                                            Titel:
                                    </th>
                                    <th>
                                            AantalBeschikbaar:
                                    </th>
                                    <th>
                                            Beschikbaar:
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                            " . $row['idVideo'] . "
                                    </td>
                                    <td>
                                            " . $row['titel'] . "
                                    </td>
                                    <td>
                                            " . $row['aantalBeschikbaar'] . "
                                    </td>
                                    <td>
                                            " . $row['beschikbaar'] . "
                                    </td>
                                    <td>
                                            <form role=\"form\" action='' method='post'>
                                                <input type='hidden' class=\"btn btn-info\" name='idVideo' value='" . $row['idVideo'] . "'/>
                                                <input type='submit' class=\"btn btn-info\" name='updateBlock' value='Maak beschikbaar'>

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
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
    </body>
    </html>

    <?php
}
?>