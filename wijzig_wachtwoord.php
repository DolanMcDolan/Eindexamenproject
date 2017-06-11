<?php
$rollen = array("klant",);
require_once("./security.php");

if (isset($_POST['submit'])) {
    require_once("classes/LoginClass.php");

    if (LoginClass::check_old_password($_POST['oude_wachtwoord'])) {
        //echo "Goede wachtwoord";
        if (!strcmp($_POST['nieuw_wachtwoord'], $_POST['controle_wachtwoord'])) {
            LoginClass::update_password($_SESSION['idUser'], $_POST['nieuw_wachtwoord']);

            echo "<h3 style='text-align: center;' >Uw wachtwoord is succesvol gewijzigd.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
            header("refresh:4;url=index.php?content=klantHomepage");
        } else {
            echo "<h3 style='text-align: center;' >U heeft uw nieuwe wachtwoord de tweede keer verkeerd ingevoerd. Probeer het nog een keer.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
            header("refresh:5;url=index.php?content=wijzig_wachtwoord");
        }
    } else {
        echo "<h3 style='text-align: center;' >Uw heeft uw huidige wachtwoord verkeerd ingevoerd. Probeer het opnieuw.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        header("refresh:5;url=index.php?content=wijzig_wachtwoord");
    }
} else {
    ?>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><h1>Wijzig Wachtwoord</h1></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php?content=mijnAccountGegevens">Gegevens Aanpassen</a></li>
                        <li><a href="index.php?content=wijzig_wachtwoord">Wachtwoord Veranderen</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" action="index.php?content=wijzig_wachtwoord" method="post">
                        <div class="form-group"><label class="control-label" for="oude_wachtwoord">Voer het oude
                                wachtwoord in<br></label>
                            <input class="form-control" id="oude_wachtwoord" placeholder="Oude wachtwoord"
                                   type="wachtwoord" name="oude_wachtwoord" required></div>
                        <div class="form-group"><label class="control-label" for="nieuw_wachtwoord">Voer het nieuwe
                                wachtwoord in<br></label>
                            <input class="form-control" id="nieuw_wachtwoord" placeholder="Nieuw wachtwoord"
                                   type="wachtwoord" name="nieuw_wachtwoord"></div>
                        <div class="form-group"><label class="control-label" for="controle_wachtwoord">Voer nogmaals het
                                nieuwe wachtwoord<br></label>
                            <input class="form-control" id="controle_wachtwoord" placeholder="Controle wachtwoord"
                                   type="wachtwoord" name="controle_wachtwoord"></div>

                        <button type="submit" class="btn btn-primary" name="submit">Verzend</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br>
    <?php
}
?>