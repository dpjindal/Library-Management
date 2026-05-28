<?php
// print-barcodes.php

include "db.php";

$result = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Print Barcode Labels</title>

    <style>

        body{
            font-family: Arial;
        }

        .label{
            width:220px;
            height:160px;
            border:1px solid #000;
            text-align:center;
            padding:10px;
            margin:10px;
            float:left;
        }

        .book-name{
            font-size:16px;
            font-weight:bold;
            margin-bottom:10px;
        }

        .barcode{
            margin-top:10px;
        }

        .print-btn{
            padding:10px 20px;
            background:green;
            color:white;
            border:none;
            cursor:pointer;
            margin-bottom:20px;
        }

        @media print{
            .print-btn{
                display:none;
            }
        }

    </style>

</head>

<body>

<button class="print-btn" onclick="window.print()">
    Print Barcode Labels
</button>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<div class="label">

    <div class="book-name">
        <?php echo $row['book_name']; ?>
    </div>

    <div>
        Book ID: <?php echo $row['book_code']; ?>
    </div>

    <div class="barcode">
        <img src="barcode-image.php?code=<?php echo $row['book_code']; ?>">
    </div>

</div>

<?php
}
?>

</body>
</html>

