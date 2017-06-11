<?php
// session_start();]
//echo $_SESSION['rol'];
require_once("./classes/LoginClass.php");
require_once("./classes/SessionClass.php");
if (!isset($_SESSION['idUser'])) {
    echo "<head><style>body{overflow-y: hidden; overflow-x: hidden;}</style></head><h3 style='text-align: center;' >U bent niet ingelogd en daarom niet bevoegd om deze pagina te bekijken. U wordt teruggestuurd naar de loginpagina.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    header("refresh:5;url=index.php?content=inloggen_Registreren");
} else {

    if (LoginClass::check_if_geblokkeerd($_SESSION['idUser'])) {
        $sessieRol = LoginClass::check_rol($_POST);
        if (!isset($_SESSION['idUser'])) {
            echo "<head><style>body{overflow-y: hidden;}</style></head><h3 style='text-align: center;' >U bent niet ingelogd en daarom niet bevoegd om deze pagina te bekijken. U wordt teruggestuurd naar de loginpagina.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
            header("refresh:5;url=index.php?content=inloggen_Registreren");

        } else if (!(in_array($sessieRol, $rollen))) {
            echo "<h3 style='text-align: center;' >U bent niet gemachtigd en daarom niet bevoegd om deze pagina te bekijken. U wordt teruggestuurd naar uw homepagina.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
            // echo $sessieRol;
            header("refresh:5;url=index.php?content=" . $sessieRol . "Homepage");

        } else {

        }
    } else {
        echo "<h3 style='text-align: center;' >U bent geblokkeerd, neem contact op met: beheer@videotheekMaurik.nl om de blokkade op te heffen</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        header("refresh:20;url=index.php?content=logout");
        exit();
    }

}

?>