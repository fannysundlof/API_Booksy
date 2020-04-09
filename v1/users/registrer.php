<h1>Registrera dig</h1>

<?php

include("../../objects/users.php"); 
include("../../config/database_handler.php");


$username = $_POST["username"];
$password = md5($_POST["password"]);

$users_object = new User($dbh);

if (!empty ($_POST["username"])) {

    if (!empty ($_POST["password"])) {

            echo $users_object->signUp($username, $password);
            
        
    } else {
        echo "Ange lösenord";
    }
} else {
    echo "Ange användarnam";
};