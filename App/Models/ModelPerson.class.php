<?php
require "../Utils/autoload.php";

class ModelPerson extends Model{
    public $ID;
    public $Name;
    public $LastName;
    public $Cellphone;
    public $Email;


    public function __construct($id=""){
        parent::__construct();
        if($id != ""){
            $this -> ID = $id;
            $this -> get();
        }
    }
    public function save(){
        if($this -> ID == null) $this -> insert();
        else $this -> update();
    }
    public function insert(){
        $sql = "INSERT INTO person (name, lastname, cellphone, email) 
        VALUES (
            '" . $this -> Name . "',
            '" . $this -> LastName . "',
            '" . $this -> Cellphone . "',
            '" . $this -> Email . "')"
        );
        $this -> DataBaseConnection -> query($sql);
    }
    public function update(){
        $sql = "UPDATE person SET 
        name = '". $this->Name . "', 
        lastname = '". $this->LastName . "',
        cellphone = '". $this->Cellphone . "',
        email = '". $this->Email . "'
        WHERE id = '". $this->ID . "'";
        $this -> DataBaseConnection -> query($sql);
    }
    public function delete(){
        $sql = "DELETE FROM person WHERE id = '". $this->ID . "'";
        $this -> DataBaseConnection -> query($sql);
    }
    public function get(){
        $sql = "SELECT * FROM person WHERE id = '". $this->ID . "'";
        $result = $this -> DataBaseConnection -> query($sql); -> fetch_all(MYSQLI_ASSOC)[0];
        $this -> ID = $result["id"];
        $this -> Name = $result["name"];
        $this -> LastName = $result["lastname"];
        $this -> Cellphone = $result["cellphone"];
        $this -> Email = $row["email"];
    }
    public function getAll(){
        $sql = "SELECT * FROM person";
        $persons = $this -> DataBaseConnection -> query($sql) -> fetch_all(MYSQLI_ASSOC);
        $result = array();
        foreach($result as $row){
            $person = new ModelPerson();
            $person -> ID = $row["id"];
            $person -> Name = $row["name"];
            $person -> LastName = $row["lastname"];
            $person -> Cellphone = $row["cellphone"];
            $person -> Email = $row["email"];
            array_push($result, $row);
        }
        return $result;
    }
}