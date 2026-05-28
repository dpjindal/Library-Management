<?php
include 'db.php';

if(isset($_POST['submit'])){

    $s_name   = $_POST['s_name'];
    $s_class = $_POST['s_class'];
    $s_rollno = $_POST['s_rollno'];
    $mobile    = $_POST['mobile'];
    $email     = $_POST['email'];
	$address     = $_POST['address'];

    $sql = "INSERT INTO students
            (student_name, class, roll_number, mobile, email, address)
            VALUES
            ('$s_name','$s_class','$s_rollno','$mobile','$email', '$address')";

    if($conn->query($sql) === TRUE){
        echo "Student Added Successfully";
    }else{
        echo "Error : " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

<h2>Add Student</h2>

<form method="post">

   Student Name:<br>
    <input type="text" name="s_name" required><br><br>

    Student Class<br>
    <input type="text" name="s_class" required><br><br>

    Student Roll No.<br>
    <input type="number" name="s_rollno"><br><br>

    Mobile<br>
    <input type="tel" name="mobile"><br><br>
     Email<br>
    <input type="email" name="email"><br><br>
    Address<br>
     <input type="text" name="address"><br><br>

       <input type="submit" name="submit" value="Save Student">

</form>

</body>
</html>