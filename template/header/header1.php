<?php 
if(empty($_SESSION["nav-item1"])){
    $_SESSION["nav-item1"][0]="Home";
    $_SESSION["nav-item1"][1]="About";
    $_SESSION["nav-item1"][2]="Service";
    unset($_SESSION['nav-item2']);
}
ob_start();
?>
<nav>
    <ul onclick='update()' id="header-links">
        <?php
        for($i=0;$i<count($_SESSION["nav-item1"]);$i++){
        ?>
        <li><a  class='links' href="#"><?=$_SESSION["nav-item1"][$i]?></a></li>
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
        display: flex;
        gap: 100px;
        list-style: none;
        border : 1px solid black;
    }
    <?php
        $style1=ob_get_clean();
    ?>
</style>
