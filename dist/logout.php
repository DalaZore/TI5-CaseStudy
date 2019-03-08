<?php
session_start();
require_once("php/db_functions.php");
$user_req = new userClass();
require_once("php/dbconnect.php");

if($user_req->is_loggedin())
{
  if($user_req->logout())
  {
    $message="logout Successful";
  }
  else
  {
    $message="Error while logging out!";
  }

}
else
{
  $message="Not logged in!";
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
<?php include('php/logout_page.php'); ?>

</body>

<footer>
</footer>
</html>
