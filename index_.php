<?php
session_start();
if(isset($_GET["header"])){
    require_once "template/header/header".$_GET['header'].".php";
    $_SESSION["header"]=$header;
}
if(isset($_GET["continu"])){
    require_once "template/contenu/contenu".$_GET['continu'].".php";
    $_SESSION["modal"]=$modalAdd;
}
if(isset($_GET["table"])){
    require_once "template/tables/table".$_GET['table'].".php";
    $_SESSION["table"]=$table;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <section style='display: grid; grid-template-column:1fr;'>
        <a href="index_.php?header=1">header 1</a>
        <a href="index_.php?header=2">header 2</a>
        <a href="index_.php?continu=1">continu 1</a>
        <a href="index_.php?table=1">table 1</a>
    </section>
    <section style='width:80%;'>
        Afichage <a href="export.php">downolad</a><br>
        <div class='htmlCode'>
        <?php
            if(isset($_SESSION["header"])){ echo $_SESSION["header"]; } 
            if(isset($_SESSION["modal"])){ echo $_SESSION["modal"]; }
            if(isset($_SESSION["table"])){ echo $_SESSION["table"]; }
        ?>
        </div>
    </section>
    <section id='update'>
        <div id="cont" style="display: none;">
            
        </div>
        <button onclick="updateForm()">Update</button> 
    </section>
</body>
<style>
    body{
        display: flex;
        gap: 20px;
        margin:100px;
    }
    section{
        height : 80vh;
        border : 1px solid black;
    }
    #update{
        width: 400px;
    }
    <?=$style1?>
</style>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>

<script>
    var lastid;
    function updateForm(){
        var linksupdate= document.querySelectorAll(".updateLink");
        var links= document.querySelectorAll(".links");
        var i=0;
        links.forEach(element => {
            element.innerHTML = linksupdate[i].value;
            var updatSession = new XMLHttpRequest();
            var url = "updateSession.php?indice=" + i+"&value=" + encodeURIComponent(linksupdate[i].value);
            updatSession.open("GET", url, true);
            updatSession.send();
            i++;
        });
        document.getElementById("cont").style.display = "none";
    }
    function update(){
        var linkHeader = document.getElementById("header-links");
        var links= document.querySelectorAll(".links");
        document.getElementById("cont").style.display = "block";
        var inputs="";
        links.forEach(element => {
            inputs+="<input type='text' class='updateLink' value='"+element.textContent+"' style='outline:none; border:none; '> <br>";
        });
        linkHeader = document.getElementById("cont").innerHTML=inputs;
        
        
    }
</script>
</html>