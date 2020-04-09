<?php

include("../../objects/users.php"); 
include("../../objects/products.php"); 
include("../../config/database_handler.php");


$user_handler = new User($dbh);
$product_handler = new Product($dbh);

$token = $_GET['token'];
$bookid = $_GET['bookId'];


if($user_handler->validateToken($token) === false) {
    echo "Invalid token!";
    die;
} 

if (isset($_GET['action']) && $_GET['action'] == "update") {

    // Varibaler till uppdatering av bok

    $title = (!empty($_POST['book_title'])) ? $_POST['book_title'] : "";
    $descrip = (!empty($_POST['book_descrip'])) ? $_POST['book_descrip'] : "";
    $price = (!empty($_POST['price'])) ? $_POST['price'] : "";
    $qty = (!empty($_POST['quantity'])) ? $_POST['quantity'] : "";
        
    echo $product_handler->editBook($title, $descrip, $price, $qty, $bookid);

    echo '<br><a href="http://localhost/Ind_Up_API/index.php">Home</a>';
        
} 

if (isset($_GET['action']) && $_GET['action'] == "edit") {

    // -- Hämtar bok som skall redigeras

    echo $product_handler->getEditBook($bookid);

    foreach ($product_handler->fetchEditBook() as $book) {

        include("../includes/editProduct_form.php");

    }

}
