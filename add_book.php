<?php
include 'db.php';

if(isset($_POST['submit'])){

    $book_name   = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $price       = $_POST['price'];
    $quantity    = $_POST['quantity'];
    $barcode     = $_POST['barcode'];

    $sql = "INSERT INTO books
            (book_name, author_name, price, quantity, barcode)
            VALUES
            ('$book_name','$author_name','$price','$quantity','$barcode')";

    if($conn->query($sql) === TRUE){
        echo "Book Added Successfully";
    }else{
        echo "Error : " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>

<h2>Add Book</h2>

<form method="post">

    Book Name:<br>
    <input type="text" name="book_name" required><br><br>

    Author Name:<br>
    <input type="text" name="author_name" required><br><br>

    Price:<br>
    <input type="text" name="price"><br><br>

    Quantity:<br>
    <input type="number" name="quantity"><br><br>

    Barcode:<br>
    <input type="text" name="barcode"><br><br>

    <input type="submit" name="submit" value="Save Book">

</form>

</body>
</html>