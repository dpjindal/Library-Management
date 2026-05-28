<?php
session_start();

include 'db.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin
            WHERE username='$username'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['admin'] = $username;

        header("Location: index.php");

    }else{

        echo "Invalid Login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Library Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-4">

<div class="card p-4 shadow">

<h2 class="text-center">Library Login</h2>

<form method="post">

<input type="text"
name="username"
class="form-control mb-3"
placeholder="Username"
required>

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button type="submit"
name="login"
class="btn btn-primary w-100">
Login
</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>