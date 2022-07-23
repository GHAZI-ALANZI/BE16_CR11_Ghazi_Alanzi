<?php


if (isset($_FILES["img"])) {
   


$filepath = $_FILES['img']['tmp_name'];
$fileSize = filesize($filepath);
$fileinfo = finfo_open(FILEINFO_MIME_TYPE);
$filetype = finfo_file($fileinfo, $filepath);

if ($fileSize === 0) {
    die("The file is empty.");
}

if ($fileSize > 5000000) { 
    header("location:reg.php");
    die();
}

$allowedTypes = [
   'image/png' => 'png',
   'image/jpeg' => 'jpg',
   'image/webp' => 'webp'
];

if (!in_array($filetype, array_keys($allowedTypes))) {
    header("location:reg.php");
    die();
}

$filename = basename($filepath); 
$extension = $allowedTypes[$filetype];
$targetDirectory = '../profile_img/'; 

$newFilepath = $targetDirectory . "/" . $filename . "." . $extension;

if (!copy($filepath, $newFilepath)) { 
    header("location:reg.php");
    die();
}
unlink($filepath); // Delete the temp file



}




?>