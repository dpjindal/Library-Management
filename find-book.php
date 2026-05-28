<?php
include 'db.php';

$books = "";

if(isset($_POST['search'])){

    $keyword = $_POST['keyword'];

    $books = mysqli_query(
        $conn,
        "SELECT * FROM books
        WHERE book_name LIKE '%$keyword%'
        OR author_name LIKE '%$keyword%'
        OR barcode LIKE '%$keyword%'
        ORDER BY book_name ASC"
    );
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Find Book</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <h3>Find Book</h3>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="row">

                    <div class="col-md-10">

                        <input type="text"
                        name="keyword"
                        class="form-control"
                        placeholder="Enter Book Name, author_name or Barcode"
                        required>

                    </div>

                    <div class="col-md-2">

                        <button type="submit"
                        name="search"
                        class="btn btn-primary w-100">

                            Search

                        </button>

                    </div>

                </div>

            </form>

            <hr>

            <?php
            if($books != ""){
            ?>

            <table class="table table-bordered">

                <tr>

                    <th>ID</th>
                    <th>Book Name</th>
                    <th>author_name</th>
                    <th>Barcode</th>
                    <th>Quantity</th>

                </tr>

                <?php
                while($row = mysqli_fetch_assoc($books)){
                ?>

                <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['book_name']; ?></td>

                    <td><?php echo $row['author_name']; ?></td>

                    <td><?php echo $row['barcode']; ?></td>

                    <td><?php echo $row['quantity']; ?></td>

                </tr>

                <?php } ?>

            </table>

            <?php } ?>

        </div>

    </div>

</div>

</body>
</html>