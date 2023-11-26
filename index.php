<?php
session_start();
if(isset($_GET["header"])){
    require_once "template/header/header".$_GET['header'].".php";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section style='display: grid; grid-template-column:1fr;'>
        <a href="index.php?header=1">header 1</a>
        <a href="index.php?header=2">header 2</a>
        <a href="index.php?continu=1">continu 1</a>
        <a href="index.php?continu=1">continu 2</a>
    </section>
    <section style='width:80%;'>
        Afichage <a href="export.php">downolad</a><br>
        <div class='htmlCode'>
        <?php
            if(isset($header)){
                echo $header;
            } 
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