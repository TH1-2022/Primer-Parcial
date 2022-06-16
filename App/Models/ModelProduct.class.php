<?php
require "../Utils/autoload.php";

class ModelProduct extends Model{
    public $ID;
    public $Name;
    public $Description;
    public $Stock;

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
        $sql = "INSERT INTO product (name, description, stock) 
        VALUES (
            '" . $this -> Name . "',
            '" . $this -> Description . "',
            '" . $this -> Stock . "')"
        );
        $this -> DataBaseConnection -> query($sql);
    }
    public function update(){
        $sql = "UPDATE product SET 
        name = '". $this->Name . "', 
        description = '". $this->Description . "',
        stock = '". $this->Stock . "'
        WHERE id = '". $this->ID . "'";
        $this -> DataBaseConnection -> query($sql);
    }
    public function delete(){
        $sql = "DELETE FROM product WHERE id = '". $this->ID . "'";
        $this -> DataBaseConnection -> query($sql);
    }
    public function get(){
        $sql = "SELECT * FROM product WHERE id = '". $this->ID . "'";
        $result = $this -> DataBaseConnection -> query($sql); -> fetch_all(MYSQLI_ASSOC)[0];
        $this -> ID = $result["id"];
        $this -> Name = $result["name"];
        $this -> Description = $result["description"];
    }
    public function getAll(){
        $sql = "SELECT * FROM product";
        $products = $this -> DataBaseConnection -> query($sql) -> fetch_all(MYSQLI_ASSOC);
        $result = array();
        foreach($result as $row){
            $product = new ModelProduct();
            $product -> ID = $row["id"];
            $product -> Name = $row["name"];
            $product -> Description = $row["description"];
            $product -> Stock = $row["stock"];
            array_push($result, $row);
        }
        return $result;
    }

}