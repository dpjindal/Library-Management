<?php
include 'db.php';

if(isset($_POST['return'])){

    $issue_id = $_POST['issue_id'];

    $result = mysqli_query(
        $conn,
        "SELECT * FROM issued_books WHERE id='$issue_id'"
    );

    $data = mysqli_fetch_assoc($result);

    $book_id = $data['book_id'];

    mysqli_query(
        $conn,
        "UPDATE books
        SET quantity = quantity + 1
        WHERE id='$book_id'"
    );

    mysqli_query(
        $conn,
        "DELETE FROM issued_books WHERE id='$issue_id'"
    );

    echo "Book Returned Successfully";
}

$issues = mysqli_query(
    $conn,
    "SELECT issued_books.*, books.book_name
    FROM issued_books
    INNER JOIN books
    ON issued_books.book_id = books.id"
);
?>

<!DOCTYPE html>
<html>
<head>
<title>Return Book</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h2>Return Book</h2>

<form method="post">

<select name="issue_id" class="form-control mb-3">

<?php while($row=mysqli_fetch_assoc($issues)){ ?>

<option value="<?php echo $row['id']; ?>">

<?php echo $row['student_name']; ?> -
<?php echo $row['book_name']; ?>

</option>

<?php } ?>

</select>

<button type="submit"
name="return"
class="btn btn-primary">
Return Book
</button>

</form>

</div>

</body>
</html>