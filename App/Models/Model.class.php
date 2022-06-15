<?php
require "./Utils/autoload.php";

class Model
{
    public $DataBaseIP;
    public $DataBaseName;
    public $DataBaseUser;
    public $DataBasePassword;
    public $DataBasePort;
    public $DataBaseName;
    public $DataBaseConnection;

    public function __construct(){
        $this -> initializeParameters();
        $this -> DataBaseConnectiion = new mysqli(
            $this -> DataBaseIP, 
            $this -> DataBaseUser, 
            $this -> DataBasePassword, 
            $this -> DataBaseName, 
            $this -> DataBasePort
        );
    }
    public function initializeParameters(){
        $this -> DataBaseIP = DATABASE_IP;
        $this -> DataBaseName = DATABASE_NAME;
        $this -> DataBaseUser = DATABASE_USER;
        $this -> DataBasePassword = DATABASE_PASSWORD;
        $this -> DataBasePort = DATABASE_PORT;
    }
}