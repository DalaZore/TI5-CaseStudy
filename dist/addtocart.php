<?php
$article = $_GET['article'];
$quantity = 1;

session_start();
require_once("php/db_functions.php");
$user_req = new userClass();
require_once("php/dbconnect.php");
if(isset($_SESSION['user_session']))
{
    if($user_req->checkShoppingCart($_SESSION['user_session'],$article))
    {
        if($user_req-> incrementCart($_SESSION['user_session'],$article,$quantity))
        {
            $message="Successfully added to Shopping Cart";
        }
        else
        {
            $message="Error while adding to Shopping Cart";
        }
    }
    else
    {
        if($user_req->addToCart($_SESSION['user_session'],$article,$quantity))
        {
            $message="Successfully added to Shopping Cart";
        }
        else
        {
            $message="Error while adding to Shopping Cart";
        }
    }


}
else
{
    $user_req->redirect("login.php");
}


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


<!-- Navbar begin -->
<?php include('nav.php');?>
<!-- Navbar End -->


<!-- Content begin -->
<?php include('php/addtocart_page.php'); ?>

</body>

<footer>
</footer>
</html>