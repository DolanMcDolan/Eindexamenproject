<?php

//session_start();
class SessionClass
{
    //Fields
    private $idUser;
    private $emailAdres;
    private $rol;
    private $geblokkeerd;

    //Properties
    public function getrol()
    {
        return $this->rol;
    }

    //Constructor
    public function ___construct()
    {
    }

    public function login($loginObject)
    {
        // De velden $id, $email, $rol een waarde geven.
        //var_dump($loginObject);
        $this->idUser = $_SESSION['idUser'] = $loginObject->getidUser();
        $this->emailAdres = $_SESSION['emailAdres'] = $loginObject->getEmailAdres();
        $this->rol = $_SESSION['rol'] = $loginObject->getRol();
        $this->geblokkeerd = $_SESSION['geblokkeerd'] = $loginObject->getGeblokkeerd();


        $usersObject = LoginClass::find_info_by_id($_SESSION['idUser']);
        //$_SESSION['username'] = $usersObject->getFirstName()." ".
        //$usersObject->getInfix()." ".
        //$usersObject->getLastname();

    }

    public function logout()
    {
        session_unset('idUser');
        session_unset('emailAdres');
        session_unset('rol');
        session_unset('geblokkeerd');


        session_destroy();
        unset($this->idUser);
        unset($this->emailAdres);
        unset($this->rol);
        unset($this->geblokkeerd);


    }
}

$session = new SessionClass();
?>