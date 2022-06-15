<?php
require "./Utils/autoload.php";



class PersonController{
    public static function update($id, $name, $lastname, $cellphone, $email){
        $person = new ModelPerson($id);
        $person -> Name = $name;
        $person -> LastName = $lastname;
        $person -> Cellphone = $cellphone;
        $person -> Email = $email;
        $person -> save();
    }

    public static function insert($name, $lastname, $cellphone, $email){
        $person = new ModelPerson();
        $person -> Name = $name;
        $person -> LastName = $lastname;
        $person -> Cellphone = $cellphone;
        $person -> Email = $email;
        $person -> save();
    }
    public static function delete($id){
        $person = new ModelPerson($id);
        $person -> delete();
    }
    public function get($id){
        $person = new ModelPerson($id);
        return $person;
    }
    public static function getAll(){
        $person = new ModelPerson();
        $persons = $person -> getAll();

        $result = array();
        foreach($persons as $row){
            $p[] = array(
                "id" => $row["id"],
                "name" => $row["name"],
                "lastname" => $row["lastname"],
                "cellphone" => $row["cellphone"],
                "email" => $row["email"]
            );
            array_push($result, $p);
        }
        return $result;
    }
}