<?php

include("../../objects/users.php"); 
include("../../objects/cart.php"); 
include("../../objects/order.php"); 
include("../../config/database_handler.php");

$user_handler = new User($dbh);
$cart_handler = new Cart($dbh);
$order_handler = new Order($dbh);

$token = $_GET['token'];

// Hämtar token_id
$returnToken = $user_handler->viewToken($token);
$token_id = $returnToken['id'];

// Hämtar user_id
$returnUser = $user_handler->viewToken($token);
$user_id = $returnUser['user_id'];

$cart_handler->viewCart($token_id);

foreach ($cart_handler->fetchCart() as $item) {

    $cart_handler->setCartId($item['id']);
    $order_array = $cart_handler->fetchCartID();
    $product_id = $order_array['product_id'];
    
    echo $order_handler->addOrder($product_id, $user_id);

    //Tar bort utchekade produkter från kunds cart
    $cart_handler->removeFromCart($order_array['id']);

};


echo '<br><a href="http://localhost/Ind_Up_API/index.php">Home</a>';




