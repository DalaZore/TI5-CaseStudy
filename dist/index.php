<?php
session_start();
require_once("php/dbconnect.php");

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


<!--TODO TUESDAY - Login & Register-->
<!--TODO WEDNESDAY - Display Data from articles-->
<!--TODO THURSDAY - implement Search function-->
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
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-outline-success my-2 my-sm-0">Go somewhere</a>
    </div>
    <div class="card-footer text-muted">
        2 days ago
    </div>
</div>

<br>

<div class="card text-center">
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-outline-success my-2 my-sm-0">Go somewhere</a>
    </div>
    <div class="card-footer text-muted">
        2 days ago
    </div>
</div>

</body>

<footer>
</footer>
</html>
