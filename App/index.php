<?php
require "/Utils/autoload.php";

if($_SERVER['REQUEST_METHOD'] !== "POST"){
    header('Location: 404.php');
    echo "404 Not found";    
}
$section = $_POST['section'];
$action = $_POST['action'];
$params = $_POST['params'];

if(section == "person"){
    header('Location: Views/person.View.php?action=' . $action . '&params=' . $params);
}
else if(section == "product"){
    header('Location: Views/product.View.php?action=' . $action . '&params=' . $params);
}
else if(section == "buyout"){
    header('Location: Views/buyout.View.php?action=' . $action . '&params=' . $params);
}
else{
    header('Location: 404.php');
}