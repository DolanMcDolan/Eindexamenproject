<?php
$userrole = array("2", "bezorger", "1", "baliemedewerker", "eigenaar");
require_once("./security.php");
?>

<?php
if (isset($_POST['removeItemReserve'])) {
    echo "<h3 style='text-align: center;' >Item is uit de reserveringen verwijderd.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    header("refresh:4;url=index.php?content=reserveringen");

    require_once("classes/ReserveClass.php");

    ReserveClass::remove_item_reservering($_POST);

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
            <div class="col-md-12"><h2>Reserveringen</h2></div>
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
            <?php
            require_once("classes/LoginClass.php");
            require_once("classes/HireClass.php");
            require_once("classes/SessionClass.php");

            require_once("classes/ReserveClass.php");


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
            $sql = "SELECT * FROM `reservering` WHERE `idUser` = " . $_SESSION['idUser'] . " ";
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
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                        " . $row["titel"] . "
                                </td>
                                <td>
                                        <form role=\"form\" action='' method='post'>
                                            <input type='submit' class=\"btn btn-info\" name='removeItemReserve' value='Verwijder Item'>

                                            <input type='hidden' class=\"btn btn-info\" name='idReservering' value='" . $row['idReservering'] . "'/>

 
                                            <input type='hidden' class=\"btn btn-info\" name='idVideo' value='" . $row['idVideo'] . "'/>
                                        </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                            ";
                }

            } else {
                echo "Geen resultaten<br><br><br><br><br>";
            }
            $conn->close();
            ?>
            <br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
    </div>
    <?php
}
?>