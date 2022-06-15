<?php
if($_SERVER['REQUEST_METHOD'] !== "POST"){
    header('Location: 404.php');
    echo "404 Not found";    
}
$action = $_POST['action'];
$params = $_POST['params'];
if($action == "insert"){
    PersonController::insert($params[0], $params[1], $params[2], $params[3]);
}
else if($action == "update"){
    PersonController::update($params[0], $params[1], $params[2], $params[3], $params[4]);
}
else if($action == "delete"){
    PersonController::delete($params[0]);
}
else if($action == "get"){
    echo json_encode(PersonController::get($params[0]));
}
else if($action == "getAll"){
    echo json_encode(PersonController::getAll());
}
else{
    header('Location: 404.php');
}