<?php
session_start();
if(isset($_SESSION["nav-item1"])){
    require_once "template/header/header1.php";
}
if(isset($_SESSION["nav-item2"])){
    require_once "template/header/header2.php";
}
$_SESSION['fichiCss']="";
$_SESSION['fichiHtml']='
<?php
if(isset($_POST["adduser"])){
    require "connect.php";
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conn->query("INSERT INTO utilisateurs SET email = \'$email\', password=\'$password\'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="style.css">
</head>
<body>';
if(isset($_SESSION["header"])){
    echo $_SESSION["header"];
    $_SESSION['fichiHtml'].=$_SESSION["header"];
    $_SESSION['fichiCss'].=$style1;
} 
if(isset($_SESSION["modal"])){
    echo $_SESSION["modal"];
    $_SESSION['fichiHtml'].=$_SESSION["modal"];
    $_SESSION['fichiCss'].=$style1;
} 
$_SESSION['fichiHtml'].="</body>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
</html>"; 
$fichieConnect='
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_name_test";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    ';
$fichieScript="
    CREATE DATABASE IF NOT EXISTS db_name_test;

    USE db_name_test;
    --
    CREATE TABLE IF NOT EXISTS `utilisateurs` (
    `UserID` int NOT NULL AUTO_INCREMENT,
    `email` varchar(50) DEFAULT NULL,
    `password` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`UserID`)
) ENGINE=InnoDB ;";





$fileName = 'index.php';
$scripSql = 'scripSql.sql';
$dbFichie = 'connect.php';
$fileName2 = 'style.css';

$file = fopen($fileName, "w");
$file2 = fopen($fileName2, "w");
$file3 = fopen($scripSql, "w");
$file4 = fopen($dbFichie, "w");
fwrite($file,$_SESSION["fichiHtml"]);
fwrite($file2,$_SESSION["fichiCss"]);
fwrite($file3,$fichieScript);
fwrite($file4,$fichieConnect);

$zipArchive = new ZipArchive();
$zipFile = "example-zip-file.zip";
if ($zipArchive->open($zipFile, ZipArchive::CREATE) == TRUE) {
    $zipArchive->addFile($fileName);
    $zipArchive->addFile($fileName2);
    $zipArchive->addFile($scripSql);
    $zipArchive->addFile($dbFichie);
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
