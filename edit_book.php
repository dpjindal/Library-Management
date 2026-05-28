<?php
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query(
    $conn,
    "SELECT * FROM books WHERE id='$id'"
);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE books SET
            book_name='$book_name',
            author_name='$author_name',
            price='$price',
            quantity='$quantity'
            WHERE id='$id'";

    mysqli_query($conn, $sql);

    header("Location: view_books.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Book</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h2>Edit Book</h2>

<form method="post">

<input type="text"
name="book_name"
value="<?php echo $row['book_name']; ?>"
class="form-control mb-3"
required>

<input type="text"
name="author_name"
value="<?php echo $row['author_name']; ?>"
class="form-control mb-3"
required>

<input type="number"
name="price"
value="<?php echo $row['price']; ?>"
class="form-control mb-3"
required>

<input type="number"
name="quantity"
value="<?php echo $row['quantity']; ?>"
class="form-control mb-3"
required>

<button type="submit"
name="update"
class="btn btn-primary">
Update Book
</button>

</form>

</div> 

</body>
</html>