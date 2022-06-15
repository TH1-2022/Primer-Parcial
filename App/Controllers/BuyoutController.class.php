<?php
require "./Utils/autoload.php";

public class BuyoutController{
    public static function insert($idProduct, $idPerson, $date){
        $buyout = new ModelBuyout();
        $buyout -> IdProduct = $idProduct;
        $buyout -> IdPerson = $idPerson;
        $buyout -> Date = $date;
        $buyout -> save();
    }
    
    public static function delete($id){
        $buyout = new ModelBuyout($id);
        $buyout -> delete();
    }
    public function get($id){
        $buyout = new ModelBuyout($id);
        return $buyout;
    }
    public static function getAll(){
        $buyout = new ModelBuyout();
        $buyouts = $buyout -> getAll();
        $result = array();
        foreach($result as $row){
            $b[] = array(
                "id" => $row["id"],
                "idProduct" => $row["idProduct"],
                "idPerson" => $row["idPerson"],
                "date" => $row["date"]
            );
            array_push($result, $b);
        }
        return $result;
    }
}