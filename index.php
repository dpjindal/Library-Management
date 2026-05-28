<?php

require "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Management System</title>

    <style>
        body{
            font-family: Arial;
            background:#f2f2f2;
            padding:20px;
        }

        .menu{
            background:#333;
            padding:15px;
        }

        .menu a{
            color:white;
            text-decoration:none;
            margin-right:20px;
            font-size:18px;
        }

        .container{
            background:white;
            padding:30px;
            margin-top:20px;
            border-radius:10px;
        }
    </style>
</head>
<body>

<div class="menu">
    <a href="index.php">Home</a>
    <a href="add_book.php">Add Book</a>
    
    <a href="view_books.php">View Books (Add/Edit)</a>
    <a href="find_book.php">Find Book</a>
    <a href="issue_book.php">Issue Books</a>
    <a href="return_book.php"> Return Book</a>
    <a href="add_student.php"> Add Student</a>
</div>

<div class="container">
    <h1>Library Management System</h1>

    <p>Welcome to Library Management System using PHP & MySQL.</p>

  <h3>Features</h3>

    <ul>
        <li><a href="add_book.php" title="Add Booka" target="new">Add Book</a></li>
 
        <li><a href="view_books.php" title="View Books" target="new">View Books (Add/Edit)</a></li>
        <li><a href="find_book.php" title="Find Book" target="new">Find Book</a> </li>
        <li><a href="issue-book.php" title="Issue Book" target="new">Issue Book</a></li>
        <li><a href="return_book.php" title="Return Book" target="_parent">Return Book</a></li>
         <li><a href="add_student.php" title="Return Book" target="_parent">Add Student</a></li>
        <li><a href="barcode_system.php" title="Bar Code System" target="new">Barcode System</a></li>
    </ul>
</div>

</body>
</html>