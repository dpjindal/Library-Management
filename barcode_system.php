<?php
include 'db.php';

/*
-----------------------------------------
TABLE REQUIRED
-----------------------------------------

CREATE TABLE books(
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_name VARCHAR(255),
    author_name VARCHAR(255),
    barcode_number VARCHAR(100)
);

*/

if(isset($_POST['save'])){

    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];

    // Generate Unique Barcode Number
    $barcode = "LIB" . rand(100000,999999);

    $sql = "INSERT INTO books(
                book_name,
                author_name,
                barcode
            ) VALUES(
                '$book_name',
                '$author_name',
                '$barcode'
            )";

    mysqli_query($conn, $sql);

    echo "<div class='alert alert-success'>
            Book Added Successfully
          </div>";
}

$result = mysqli_query(
    $conn,
    "SELECT * FROM books ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>
<head>

<title>Barcode System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

.barcode-box{
    border:1px solid #000;
    padding:15px;
    margin-top:10px;
    text-align:center;
    background:#fff;
}

.bar-lines{
    font-size:40px;
    letter-spacing:3px;
    font-family:monospace;
    font-weight:bold;
}

</style>

</head>
<body>

<div class="container mt-5">

<h2 class="mb-4">Library Barcode System</h2>

<div class="card p-4 shadow">

<form method="post">

<div class="mb-3">
<label>Book Name</label>

<input type="text"
name="book_name"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Author Name</label>

<input type="text"
name="author_name"
class="form-control"
required>
</div>

<button type="submit"
name="save"
class="btn btn-primary">

Generate Barcode

</button>

</form>

</div>

<hr>

<h3 class="mt-4">Generated Barcodes</h3>

<div class="row">

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="col-md-4">

<div class="barcode-box">

<h5>
<?php echo $row['book_name']; ?>
</h5>

<p>
Author:
<?php echo $row['author_name']; ?>
</p>

<div class="bar-lines">
||||| |||| ||||| ||||
</div>

<h4>
<?php echo $row['barcode']; ?>
</h4>

<button onclick="window.print()"
class="btn btn-success btn-sm">

Print Barcode

</button>

</div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>