<?php 
if(empty($_SESSION["nav-item1"])){
    $_SESSION["nav-item1"][0]="Home";
    $_SESSION["nav-item1"][1]="About";
    $_SESSION["nav-item1"][2]="Service";
    unset($_SESSION['nav-item2']);
}
ob_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul onclick='update()' class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php
            for($i=0;$i<count($_SESSION["nav-item1"]);$i++){
            ?>
            <li class="nav-item">
            <a class="nav-link active links" aria-current="page" href="#"><?=$_SESSION["nav-item1"][$i]?></a>
            </li>
            <?php 
            }
            ?>
        </ul>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success">Search</button> 
    </div>
  </div>
</nav>
<?php
$header=ob_get_clean();
?>
<style>
    <?php ob_start(); ?>
   
    <?php
        $style1=ob_get_clean();
    ?>
</style>
