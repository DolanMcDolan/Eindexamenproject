<?php

//session_start();
require_once("./classes/LoginClass.php");
require_once("./classes/SessionClass.php");
// Wijzigingsopdracht

$sql2 = "SELECT * FROM reservering";
$result2 = $database->fire_query($sql2);

if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
        $today2 = date('Y-m-d');
        if ($row2['reactieDatumKlant'] == $today2) {
            $sql2 = "DELETE FROM reservering where `idVideo` = '" . $row2['idVideo'] . "' AND `idUser` = '" . $_SESSION['idUser'] . "'";
            //echo $sql2;
            $database->fire_query($sql2);
        } else {
            // echo $row['titel'];
            // echo "321";
        }
    }
}
$sql3 = "SELECT a.emailAdres FROM login AS a INNER JOIN bestelling AS b ON a.idUser = b.idUser where b.ophaaldatum         = CURRENT_DATE + 1";
$result3 = $database->fire_query($sql3);
$today3 = date('d-m-Y');
if ($result3->num_rows > 0) {
    while ($row3 = $result3->fetch_assoc()) {
        //echo $row3['emailAdres'];
        Hireclass::send_memory_emailAdres_day_before($row3['emailAdres']);
    }
}
// Wijzigingsopdracht


if (!isset($_SESSION['idUser'])) {
    echo "<head><style>body{overflow-y: hidden; overflow-x: hidden;}</style></head><h3 style='text-align: center;' >U bent niet ingelogd en daarom niet bevoegd om deze pagina te bekijken. U wordt teruggestuurd naar de loginpagina.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    header("refresh:5;url=index.php?content=inloggen_Registreren");
} else {

    if (LoginClass::check_if_geblokkeerd($_SESSION['idUser'])) {
        if (!isset($_SESSION['idUser'])) {

            //var_dump($_SESSION);
            echo "<head><style>body{overflow-y: hidden;}</style></head><h3 style='text-align: center;' >U bent niet ingelogd en daarom niet bevoegd om deze pagina te bekijken. U wordt teruggestuurd naar de loginpagina.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
            header("refresh:5;url=index.php?content=inloggen_Registreren");
            exit();

        } else if (!(in_array($_SESSION['userrole'], $userrole))) {

            echo "<h3 style='text-align: center;' >U bent niet gemachtigd en daarom niet bevoegd om deze pagina te bekijken. U wordt teruggestuurd naar uw homepagina.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
            header("refresh:5;url=index.php?content=" . $_SESSION['userrole'] . "Homepage");
            exit();

        } else {

        }
    } else {
        echo "<h3 style='text-align: center;' >U bent geblokkeerd, neem contact op met: beheer@webshopmarklin.nl om de blokkade op te heffen</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        header("refresh:20;url=index.php?content=logout");
        exit();
    }

}
?>