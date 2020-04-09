
<?php 

include("../../objects/users.php"); 
include("../../objects/products.php"); 
include("../../config/database_handler.php");

$user_handler = new User($dbh);
$product_handler = new Product($dbh);


$title = (isset($_POST['title']) ? $_POST['title'] : "");
$content = (isset($_POST['descrip']) ? $_POST['descrip'] : "");
$price = (isset($_POST['price']) ? $_POST['price'] : "");
$qty = (isset($_POST['quantity']) ? $_POST['quantity'] : "");


echo $product_handler->addProduct($title, $content, $price, $qty);

echo '<br><a href="http://localhost/Ind_Up_API/index.php">Home</a>';





