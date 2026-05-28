<?php
// barcode-image.php
// Generate Barcode Image for Library Management System

header("Content-Type: image/png");

$code = isset($_GET['code']) ? $_GET['code'] : 'LIB001';

$width = 2;
$height = 80;
$font = 5;

$imgWidth = (strlen($code) * 16) + 40;
$image = imagecreate($imgWidth, 140);

$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

imagefill($image, 0, 0, $white);

// Start position
$x = 20;

// Simple barcode generation
for ($i = 0; $i < strlen($code); $i++) {

    $ascii = ord($code[$i]);

    // Convert ASCII to binary
    $binary = str_pad(decbin($ascii), 8, "0", STR_PAD_LEFT);

    for ($j = 0; $j < strlen($binary); $j++) {

        if ($binary[$j] == "1") {
            imagefilledrectangle(
                $image,
                $x,
                20,
                $x + $width,
                20 + $height,
                $black
            );
        }

        $x += $width + 1;
    }

    // Space between characters
    $x += 4;
}

// Print barcode text
imagestring(
    $image,
    $font,
    20,
    110,
    $code,
    $black
);

// Output image
imagepng($image);

imagedestroy($image);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bar Code Image</title>
</head>

<body>
</body>
</html>