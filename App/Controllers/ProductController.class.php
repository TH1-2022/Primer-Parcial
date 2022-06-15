<?php
require "./Utils/autoload.php";

public class ProductController{

    public static function update($id, $name, $price, $description, $image){
        $product = new ModelProduct($id);
        $product -> Name = $name;
        $product -> Price = $price;
        $product -> Description = $description;
        $product -> Image = $image;
        $product -> save();
    }

    public static function insert($name, $price, $description, $image){
        $product = new ModelProduct();
        $product -> Name = $name;
        $product -> Price = $price;
        $product -> Description = $description;
        $product -> Image = $image;
        $product -> save();
    }

    public static function delete($id){
        $product = new ModelProduct($id);
        $product -> delete();
    }
    public static function get($id){
        $product = new ModelProduct($id);
        return $product;
    }
    public static function getAll(){
        $product = new ModelProduct();
        $products = $product -> getAll();

        $result = array();
        foreach($products as $row){
            $p[] = array(
                "id" => $row["id"],
                "name" => $row["name"],
                "price" => $row["price"],
                "description" => $row["description"],
                "image" => $row["image"]
            );
            array_push($result, $p);
        }
        return $result;
    }
}