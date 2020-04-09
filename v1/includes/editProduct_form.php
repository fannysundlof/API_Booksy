
<form action="http://localhost/Ind_Up_API/v1/products/editProducts.php?token=<?= $token ?>&action=update&bookId=<?= $book['id'] ?>" method="POST">

<input type="text" name="book_title" value="<?= $book['title'] ?>" maxlength="20"><br>
<textarea name="book_descrip" cols="30" rows="20"><?= $book['descrip']?></textarea><br>
<input type="number" name="price" value="<?= $book['price']?>"><br>
<input type="number" name="quantity" value="<?= $book['quantity']?>"><br>
<input type="submit" value="Update">
</form>