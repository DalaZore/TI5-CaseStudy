<?php
session_start();
require_once("php/db_functions.php");
$user_req = new userClass();
require_once("php/dbconnect.php");
$stmt = $user_req->runQuery("SELECT * FROM article");
$stmt->execute();

?>

<!doctype html>
<html class="no-js" lang="" xmlns="http://www.w3.org/1999/html">

<head>
    <?php include('header.php'); ?>
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->



<!--TODO FRIDAY - OPEN,THINK OF SOMETHING-->


<!-- Navbar begin -->
<?php include('nav.php');?>
<!-- Navbar End -->


<!-- Content begin -->

<br>
<div class="card text-center">
    <div class="card-header">
        Featured
    </div>
    <?php

    while($userReq=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>



    <div class="card-body">
        <h5 class="card-title"><?php echo($userReq['article_name']);  ?></h5>
        <img src="<?php echo($userReq['picture']);?>" class="article_image"/>
        <p class="card-text"><?php echo($userReq['description']);  ?></p>

        <a href="#" class="btn btn-outline-success my-2 my-sm-0">Go somewhere</a>
    </div>
    <div class="card-footer text-muted">
        2 days ago
    </div>
</div>


<?php
}
?>

</body>

<footer>
</footer>
</html>
