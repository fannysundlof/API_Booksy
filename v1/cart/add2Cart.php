<?php

include("../../objects/users.php"); 
include("../../objects/cart.php"); 
include("../../config/database_handler.php");

$user_handler = new User($dbh);
$cart_handler = new Cart($dbh);

$token = $_GET['token'];
$bookid = $_GET['bookId'];


if($user_handler->validateToken($token) === false) {
    echo "Invalid token!";
    die;
} else {

    //För att få fram token ID 
    $return = $user_handler->viewToken($token);
    $token_id = $return['id'];

}

 if (isset($_GET['action']) && $_GET['action'] == "add") {

   echo $cart_handler->addProduct2Cart($token_id, $bookid);
   echo "<br><a href='http://localhost/Ind_Up_API/v1/products/veiwProducts.php?token=". $token ."'>Continue shopping</a>";
        
}  else {
    echo '<br><a href="http://localhost/Ind_Up_API/index.php">Home</a>';
};


