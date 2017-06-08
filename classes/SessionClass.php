<?php

//session_start();
class SessionClass
{
    //Fields
    private $idKlant;
    private $emailAdres;
    private $userrole;
    private $geblokkeerd;

    //Properties
    public function getUserrole()
    {
        return $this->userrole;
    }

    //Constructor
    public function ___construct()
    {
    }

    public function login($loginObject)
    {
        // De velden $id, $emailAdres, $userrole een waarde geven.
        //var_dump($loginObject);
        $this->idUser = $_SESSION['idUser'] = $loginObject->getIdKlant();
        $this->emailAdres = $_SESSION['emailAdres'] = $loginObject->getemailAdres();
        $this->userrole = $_SESSION['userrole'] = $loginObject->getRol();
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
        session_unset('userrole');
        session_unset('geblokkeerd');


        session_destroy();
        unset($this->idUser);
        unset($this->emailAdres);
        unset($this->userrole);
        unset($this->geblokkeerd);


    }
}

$session = new SessionClass();
?>