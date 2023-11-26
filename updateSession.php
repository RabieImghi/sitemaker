<?php
session_start();
if(isset($_SESSION['nav-item1'])){
    $i=$_GET['indice'];
    $v=$_GET['value'];
    $_SESSION['nav-item1'][$i]=$v;
}
if(isset($_SESSION['nav-item2'])){
    $i=$_GET['indice'];
    $v=$_GET['value'];
    $_SESSION['nav-item2'][$i]=$v;
}


?>