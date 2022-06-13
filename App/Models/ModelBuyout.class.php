<?php
require "utils/autoload.php";

class ModelBuyout extends Model{
    public $PersonID;
    public $ProductID;
    public $Date;

    public function __construct($id=""){
        parent::__construct();
    }
    public function newBuyout(){
        $sql = "INSERT INTO buyout (person_id, product_id, date_time) 
        VALUES (
            '" . $this -> PersonID . "',
            '" . $this -> ProductID . "',
            '" . $this -> Date . "')"
        );
        $this -> DataBaseConnection -> query($sql);
        $product = new ModelProduct($this -> ProductID);
        $product -> Stock = $product -> Stock - 1;
        $product -> save();
    }
    public function delete(){
        $sql = "DELETE FROM buyout WHERE id = '". $this->ID . "'";
        $this -> DataBaseConnection -> query($sql);
    }
    public function get(){
        $sql = "SELECT * FROM buyout WHERE id = '". $this->ID . "'";
        $result = $this -> DataBaseConnection -> query($sql); -> fetch_all(MYSQLI_ASSOC)[0];
        $this -> ID = $result["id"];
        $this -> PersonID = $result["person_id"];
        $this -> ProductID = $result["product_id"];
        $this -> Date = $result["date_time"];
    }
    public function getAll(){
        $sql = "SELECT * FROM buyout";
        $result = $this -> DataBaseConnection -> query($sql) -> fetch_all(MYSQLI_ASSOC);
        $buyouts = array();
        foreach($result as $row){
            $buyout = new ModelBuyout();
            $buyout -> PersonID = $row["person_id"];
            $buyout -> ProductID = $row["product_id"];
            $buyout -> Date = $row["date_time"];
            $buyouts[] = $buyout;
        }
        return $buyouts;
    }