<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
include 'db.php';

$message = "";

// Fetch Students
$students = mysqli_query(
    $conn,
    "SELECT * FROM students ORDER BY student_name ASC"
);

if(isset($_POST['issue'])){

    $student_id = $_POST['student_id'];
    $barcode = $_POST['barcode'];

    // Get Student Details
    $studentQuery = mysqli_query(
        $conn,
        "SELECT * FROM students WHERE id='$student_id'"
    );

    $studentData = mysqli_fetch_assoc($studentQuery);
    $student_name = $studentData['student_name'];

    // Find Book By Barcode
    $bookQuery = mysqli_query(
        $conn,
        "SELECT * FROM books WHERE barcode='$barcode'"
    );

    if(mysqli_num_rows($bookQuery) > 0){

        $bookData = mysqli_fetch_assoc($bookQuery);

        $book_id = $bookData['id'];
        $quantity = $bookData['quantity'];

        if($quantity > 0){

            // Save Issue Entry
            mysqli_query(
                $conn,
                "INSERT INTO issued_books(
				student_id,
                    student_name,
                    book_id,
                    issue_date
                ) VALUES(
				'$student_id',
                    '$student_name',
                    '$book_id',
                    CURDATE()
                )"
            );

            // Update Quantity
            mysqli_query(
                $conn,
                "UPDATE books 
                SET quantity = quantity - 1 
                WHERE id='$book_id'"
            );

            $message = "Book Issued Successfully";

        } else {

            $message = "Book Out of Stock";

        }

    } else {

        $message = "Invalid Barcode";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issue Book</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h3>Issue Book</h3>
        </div>

        <div class="card-body">

            <?php if($message != ""){ ?>
                <div class="alert alert-info">
                    <?php echo $message; ?>
                </div>
            <?php } ?>

         <form method="POST">

    <div class="mb-3">

        <label class="form-label">
            Select Student
        </label>

        <select name="student_id"
        id="student_id"
        class="form-control"
        required>

            <option value="">
                Select Student
            </option>

            <?php
            mysqli_data_seek($students,0);

            while($student = mysqli_fetch_assoc($students)){
            ?>

                <option value="<?php echo $student['id']; ?>">

                    <?php
                    echo $student['student_name'] . " - " . $student['roll_number'];
                    ?>

                </option>

            <?php } ?>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Scan Barcode
        </label>

        <input type="text"
        name="barcode"
        id="barcode"
        class="form-control"
        placeholder="Scan Barcode Here"
        required>

    </div>

    <button type="submit"
    name="issue"
    class="btn btn-primary">

        Issue Book

    </button>

</form>

           

        </div>
    </div>

</div>

<script>



window.onload = function(){
    document.getElementById('barcode').focus();
};

</script>

</body>
</html>