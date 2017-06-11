<?php
require_once("classes/LoginClass.php");
require_once("classes/SessionClass.php");

if (!empty($_POST['emailAdres']) && !empty($_POST['wachtwoord'])) {
    // Als emailAdres/wachtwoord combi bestaat en geactiveerd....
    if (LoginClass::check_if_emailAdres_password_exists($_POST['emailAdres'],
        MD5($_POST['wachtwoord']),
        '1')
    ) {
        $session->login(LoginClass::find_login_by_emailAdres_password($_POST['emailAdres'],
            MD5($_POST['wachtwoord'])));

        switch ($_SESSION['rol']) {
            case 'klant':
                header("location:index.php?content=klantHomepage");
                break;
            case 'eigenaar':
                header("location:index.php?content=adminHomepage");
                break;
            case 'geblokkeerd':
                header("location:index.php?content=algemeneHomepage");
                break;
            case 'baliemedewerker':
                header("location:index.php?content=baliemedewerkerHomepage");
                break;
            case 'admin':
                header("location:index.php?content=adminHomepage");
                break;
            case 'bezorger':
                header("location:index.php?content=bezorgerHomepage");
                break;
            default :
                header("location:index.php?content=inloggen_Registreren");
        }
    } else {
        echo "<h3 style='text-align: center;' >Uw emailAdres/wachtwoord combi bestaat niet of uw account is niet geactiveerd.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        header("refresh:5;url=index.php?content=inloggen_Registreren");
    }
} else {
    echo "<h3 style='text-align: center;' >U heeft een van beide velden niet ingevuld, u wordt doorgestuurd naar de inlogpagina.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    header("refresh:5;url=index.php?content=inloggen_Registreren");
}
?>