<?php
session_start();
require_once("php\db_functions.php");
$login = new userClass();

if($login->is_loggedin()!="")
{
    $login->redirect('index.php');
}

if(isset($_POST['loginBTN']))
{
    $uname = strip_tags($_POST['inputEmail']);
    $umail = strip_tags($_POST['inputEmail']);
    $upass = strip_tags($_POST['inputPassword']);

    if($login->userLogin($uname,$umail,$upass))
    {
        $login->redirect('index.php');
    }
    else
    {
        $error = "Wrong Details!";
    }
}
?>



<!doctype html>
<html id="LoginForm" class="no-js" lang="">

<head>
    <?php include('header.php'); ?>
</head>

<body id="LoginForm">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->


<!-- Content begin -->

<div class="container">
    <br/><br/>
    <div class="login-form">
        <div class="main-div">
            <a href="index.php" class="glyphico"><i class="far fa-arrow-alt-circle-left fa-2x"></i></a>
            <div class="panel">
                <h2>User Login</h2>
                <p>Please enter your email and password</p>
            </div>
            <form id="Login" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" name="inputEmail" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="inputPassword" placeholder="Password">
                </div>
                <div class="forgot">
                    <a href="forgotPW.php">Forgot password?</a>
                    <a id="register-link" href="register.php">Register now</a>
                </div>
                <button type="submit" class="btn btn-primary" name="loginBTN">Login</button>
                <div><br/>
                    <?php
                    if(isset($error))
                    {
                        ?>
                        <div class="alert alert-danger">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


</body>

</html>
