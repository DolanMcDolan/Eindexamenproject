<?php
require_once('MySqlDatabaseClass.php');
require_once("LoginClass.php");
require_once("SessionClass.php");

class ActeurClass
{
    //Fields
    private $idActeurt;
    private $Acteur;


    public function getIdActeur()
    {
        return $this->idKlacht;
    }

    public function getActeur()
    {
        return $this->idUser;
    }


    //setters
    public function setIdActeur($value)
    {
        $this->idKlacht = $value;
    }

    public function setActeur($value)
    {
        $this->klacht = $value;
    }

    public function __construct()
    {
    }

    //Methods


    public static function insert_acteur_into_database($naam)
    {
        global $database;

        $sql = "SELECT idActeur FROM acteur ORDER BY idActeur DESC LIMIT 1";
        $result = $database->fire_query($sql);
        while ($row = $result->fetch_assoc()) {
            $lastActeurID = ($row['idActeur'] + 1);
        }

        $query = "INSERT INTO `Acteur` (`idActeur`, `naam`) 
                      VALUES ($lastActeurID, '" . $naam . "')";
        //echo $query;

        //echo "<br>";
        $database->fire_query($query);
        $last_id = mysqli_insert_id($database->getDb_connection());
    }

}

?>