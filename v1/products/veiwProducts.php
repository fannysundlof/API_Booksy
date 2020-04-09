<?php


include("../../objects/users.php"); 
include("../../objects/products.php"); 
include("../../config/database_handler.php");


$user_handler = new User($dbh);
$product_handler = new Product($dbh);
$token = $_GET['token'];


if($user_handler->validateToken($token) === false) {
    echo "Invalid token!";
    die;
} 

if(isset($_GET['action']) && $_GET['action'] == "delete") {

    $bookId = $_GET['bookId'];
    echo $product_handler->deleteBook($bookId);
    
} 

echo '<br><a href="http://localhost/Ind_Up_API/index.php">Home</a>';

if ($user_handler->viewToken($token) ['user_id'] && $user_handler->viewToken($token) ['user_id'] == 1) {

    include("../includes/addProduct_form.php");

}


if(isset($_GET['action']) && $_GET['action'] == "search") {

    $searchQ = $_POST['searchQ'];
    $product_handler->searchBook($searchQ);

    echo "<h2>Search result</h2>";

    foreach ($product_handler->fetchBook() as $book) {
    
        echo "<hr />";
        echo "<b> Title: </b>" . $book['title'];
        echo "<br />";
        echo "<b> Description: </b>" . $book['descrip'] ."<br />";
        echo "<br />";
        echo "<b> Price: </b>" . $book['price'] ."<br />";
        echo "<br />";
        echo "<a href='http://localhost/Ind_Up_API/v1/cart/add2Cart.php?token=". $token ."&action=add&bookId=" . $book['id'] . "'>Add to Cart </a>";
    }

    include("../includes/search_from.php");
   
    
} else {


    echo "<h1>All books</h1>";

    include("../includes/search_from.php");

    $product_handler->fetchAll();

    foreach ($product_handler->fetchBook() as $book) {
        
        echo "<hr />";
        echo "<b> Title: </b>" . $book['title'];
        echo "<br />";
        echo "<b> Description: </b>" . $book['descrip'] ."<br />";
        echo "<br />";
        echo "<b> Price: </b>" . $book['price'] ."<br />";
        echo "<br />";
        // --- Endast Admin(user 1) kan redigera och ta bort produkter --- // 
        if ($user_handler->viewToken($token) ['user_id'] && $user_handler->viewToken($token) ['user_id'] == 1) {
        echo "<b> Quantity: </b>" . $book['quantity'] ."<br />";
        echo "<a href='http://localhost/Ind_Up_API/v1/products/editProducts.php?token=". $token ."&action=edit&bookId=" . $book['id'] . "'> Edit </a>";
        echo "<a href='http://localhost/Ind_Up_API/v1/products/veiwProducts.php?token=". $token ."&action=delete&bookId=" . $book['id'] . "'> Delete </a>";
        } else {

            echo "<a href='http://localhost/Ind_Up_API/v1/cart/add2Cart.php?token=". $token ."&action=add&bookId=" . $book['id'] . "'>Add to Cart </a>";
        }


    }

}
?> 

