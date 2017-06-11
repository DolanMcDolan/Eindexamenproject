<?php
require_once('MySqlDatabaseClass.php');
require_once("LoginClass.php");
require_once("SessionClass.php");

class KlachtClass
{
    //Fields
    private $idKlacht;
    private $idUser;
    private $klacht;

    public function getIdKlacht()
    {
        return $this->idKlacht;
    }

    public function getidUser()
    {
        return $this->idUser;
    }

    public function getKlacht()
    {
        return $this->klacht;
    }

    //setters
    public function setIdKlacht($value)
    {
        $this->idKlacht = $value;
    }

    public function setidUser($value)
    {
        $this->klacht = $value;
    }

    public function setKlacht($value)
    {
        $this->klacht = $value;
    }

    public function __construct()
    {
    }

    //Methods
    public static function insert_klacht_into_database($klacht)
    {
        global $database;
        $query = "INSERT INTO `klachten` (`idKlacht`, `idUser`, `klacht`, `emailAdresKlant`) 
                      VALUES (NULL, '" . $_SESSION['idUser'] . "', '" . $klacht . "', '" . $_SESSION['emailAdres'] . "')";
        //echo $_SESSION['idUser'];
        //echo $klacht;
        // echo $query;
        $database->fire_query($query);
        $last_id = mysqli_insert_id($database->getDb_connection());
        self::send_emailAdres($klacht);
    }


    private static function send_emailAdres($klacht)
    {
        $to = $_SESSION['emailAdres'];
        $subject = "Bevestigingsmail Klacht Webshop Marklin";
        $message = "Geachte heer/mevrouw<br>";
        $message .= "Bedankt voor het indienen van uw klacht." . "<br><br>";

        $message .= "Uw bericht: " . $klacht . "<br>";

        $message .= "Wij nemen spoedig contact met u op om dit probleem op te lossen.<br>";
        $message .= "Met vriendelijke groet," . "<br>";
        $message .= "Dylan Griffioen" . "<br>";

        $headers = 'From: no-reply@WebshopMarklin.nl' . "\r\n";
        $headers .= 'Reply-To: webmaster@webshopMarklin.nl' . "\r\n";
        $headers .= 'Bcc: accountant@webshopMarklin.nl' . "\r\n";
        //$headers .= "MIME-version: 1.0"."\r\n";
        //$headers .= "Content-type: text/plain; charset=iso-8859-1"."\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();


        mail($to, $subject, $message, $headers);
    }
}

?>