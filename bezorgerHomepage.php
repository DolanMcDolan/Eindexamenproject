<?php
$rollen = array("bezorger", "admin", "eigenaar");
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Vandaag ophalen</h2>
                </div>
                <div class="col-md-6">
                    <?php

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
                    $sql = "SELECT a.idBestelling, a.videoTitel, b.woonplaats, b.adres FROM bestelling AS a INNER JOIN login AS b ON a.idUser = b.idUser where a.ophaaldatum = CURRENT_DATE";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['idBestelling'];
                            echo "
                        <table class=\"table table - responsive\">
                            <thead>
                            <tr>
                                <th>
                                        ID Bestelling:
                                </th>
                                <th>
                                        Titel:
                                </th>
                                <th>
                                        Adres:
                                </th>
                                <th>
                                        Woonplaats:
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                        " . $row["idBestelling"] . "
                                </td>
                                <td>
                                        " . $row["videoTitel"] . "
                                </td>
                                <td>
                                        " . $row["adres"] . "
                                </td>
                                <td>
                                        " . $row["woonplaats"] . "
                                </td>
                            </tr>
                            </tbody>
                        </table>
                            ";
                        }

                    } else {
                        echo "Geen resultaten<br><br><br><br><br><br><br><br><br><br><br>";
                    }
                    $conn->close();
                    ?>
                    <br><br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Vandaag bezorgen</h2>
                </div>
                <div class="col-md-6">
                    <?php

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
                    $sql = "SELECT a.idBestelling, a.videoTitel, b.woonplaats, b.adres FROM bestelling AS a INNER JOIN login AS b ON a.idUser = b.idUser where a.afleverdatum = CURRENT_DATE ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                        <table class=\"table table - responsive\">
                            <thead>
                            <tr>
                                <th>
                                        ID Bestelling:
                                </th>
                                <th>
                                        Titel:
                                </th>
                                <th>
                                        Adres:
                                </th>
                                <th>
                                        Woonplaats:
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                        " . $row["idBestelling"] . "
                                </td>
                                <td>
                                        " . $row["videoTitel"] . "
                                </td>
                                <td>
                                        " . $row["adres"] . "
                                </td>
                                <td>
                                        " . $row["woonplaats"] . "
                                </td>
                            </tr>
                            </tbody>
                        </table>
                            ";
                        }

                    } else {
                        echo "Geen resultaten<br><br><br><br><br><br><br><br><br><br><br>";
                    }
                    $conn->close();
                    ?>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
</body>
</html>