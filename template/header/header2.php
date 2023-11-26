<?php 
if(empty($_SESSION["nav-item2"])){
    $_SESSION["nav-item2"][0]="Home";
    $_SESSION["nav-item2"][1]="HOM";
    $_SESSION["nav-item2"][2]="EEFF";
    unset($_SESSION['nav-item1']);
}
ob_start();
?>
<nav>
    <ul onclick='update()' id="header-links">
        <?php
        for($i=0;$i<count($_SESSION["nav-item2"]);$i++){
        ?>
        <li><a  class='links' href="#"><?=$_SESSION["nav-item2"][$i]?></a></li>
        <?php 
         }
         ?>
    </ul>
</nav>
<?php
$header=ob_get_clean();
?>
<style>
    <?php ob_start(); ?>
    ul{
        background: yellow;
        display: flex;
        gap: 100px;
        list-style: none;
        border : 1px solid black;
    }
    <?php
        $style1=ob_get_clean();
    ?>
</style>
