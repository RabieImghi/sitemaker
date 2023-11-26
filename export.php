<?php
session_start();
if(isset($_SESSION["nav-item1"])){
    require_once "template/header/header1.php";
}
if(isset($_SESSION["nav-item2"])){
    require_once "template/header/header2.php";
}
$_SESSION['fichiCss']="";
$_SESSION['fichiHtml']="<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>";
if(isset($header)){
    echo $header;
    $_SESSION['fichiHtml'].=$header;
    $_SESSION['fichiCss'].=$style1;
} 
$_SESSION['fichiHtml'].="</body>
</html>"; 


















$fileName = 'index.html';
$fileName2 = 'style.css';
$file = fopen($fileName, "w");
$file2 = fopen($fileName2, "w");
fwrite($file,$_SESSION["fichiHtml"]);
fwrite($file2,$_SESSION["fichiCss"]);

$zipArchive = new ZipArchive();
$zipFile = "example-zip-file.zip";
if ($zipArchive->open($zipFile, ZipArchive::CREATE) == TRUE) {
    $zipArchive->addFile($fileName);
    $zipArchive->addFile($fileName2);
    $zipArchive->close();
}
   
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . basename($zipFile) . '"');
header('Content-Length: ' . filesize($zipFile));

readfile($zipFile);
unlink($zipFile);
unlink($fileName);
header("locatio:index.php");
?>
