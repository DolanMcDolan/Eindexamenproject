<?php
require_once('MySqlDatabaseClass.php');
require_once("LoginClass.php");
require_once("SessionClass.php");

class ReserveClass
{
    //Fields
    private $idReservering;
    private $klantid;
    private $titel;


    //Properties
    //getters
    public function getIdReservering()
    {
        return $this->idReservering;
    }

    public function getKlantId()
    {
        return $this->klantid;
    }

    public function getTitel()
    {
        return $this->titel;
    }

    //setters
    public function setIdReservering($value)
    {
        $this->idReservering = $value;
    }

    public function setKlantId($value)
    {
        $this->klantid = $value;
    }

    public function setTitel($value)
    {
        $this->titel = $value;
    }

    //Constuctor
    public function __construct()
    {
    }

    //Methods
    public static function insert_reserveringitem_database($post)
    {
        global $database;
        date_default_timezone_set("Europe/Amsterdam");

        $date = date('Y-m-d');

        $query = "INSERT INTO `reservering` (`idReservering`, `idUser`, `idVideo`, `titel`, `datumReservatie`) 
                      VALUES (NULL, " . $_SESSION['idUser'] . " ,'" . $post['idVideo'] . "','" . $post['titel'] . "',          '" . $date . "')";

//            echo $_SESSION['id'];
//            echo $post['titel'];
//            echo $post['prijs'];


        // echo $query;

        $database->fire_query($query);

        $last_id = mysqli_insert_id($database->getDb_connection());
        self::send_emailAdres($post);

    }

    private static function send_emailAdres($post)
    {
        $to = $_SESSION['emailAdres'];
        $subject = "Bevestigingsmail Reservering Webshop Marklin";
        $message = "Geachte heer/mevrouw<br>";

        $message .= "Hartelijk dank voor het reserveren bij Webshop Marklin" . "<br>";

        $message .= "Check regelmatig in uw account of de video al beschikbaar is." . "<br>";

        $message .= "De gereserveerde video is: " . $post['titel'] . "<br>";

        $message .= "Wij wensen u alvast veel kijkplezier.<br>";
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


    public static function check_if_reservering_exists($post)
    {
        global $database;

        $query = "SELECT * FROM `reservering`
					  WHERE	 `idVideo` = '" . $post['idVideo'] . "'
                      AND `idUser` = '" . $_SESSION['idUser'] . "'";

        $result = $database->fire_query($query);
        // echo $query;
        return (mysqli_num_rows($result) == 1) ? true : false;
    }


    public static function remove_item_reservering($post)
    {
        global $database;


        $query = "DELETE FROM `reservering` WHERE `idUser` = " . $_SESSION['idUser'] . "
                                                    AND `idReservering` = " . $post["idReservering"] . " ";
        //echo $query;


        $database->fire_query($query);
    }

    // <Wijzigingsopdracht>
    public static function remove_reserved_film($post)
    {
        global $database;
        $sql = "SELECT * FROM RESERVERING";
        $result = $database->fire_query($sql);

        $row = $result->fetch_assoc();
        //var_dump($row);
        $query = "DELETE FROM `reservering` WHERE `idUser` = '" . $_SESSION['idUser'] . "' AND `datumVideoBeschikbaar` != '0000-00-00'";
        //echo $query;
        $database->fire_query($query);

    }

    public static function add_reserved_film_to_order($row)
    {
        global $database;

        $query = "INSERT INTO `winkelmand`(`idWinkelmand`, `idVideo`, `titel`, `idUser`, `prijs`) VALUES (null," . $row['idVideo'] . ",'" . $row['titel'] . "', " . $_SESSION['idUser'] . "," . $row['prijs'] . ")";
        echo $query;
        $database->fire_query($query);
        self::lower_amount_Artikelen($row);
    }

    public static function lower_amount_Artikelen($row)
    {
        global $database;
        $idVideo = $row['idVideo'];

        $query = "UPDATE `video`
					  SET `aantalBeschikbaar` = `aantalBeschikbaar` - 1
					  WHERE `idVideo` = '" . $idVideo . "'";
        //echo $query;
        $database->fire_query($query);

    }
    // </Wijzigingsopdracht>
}

?>