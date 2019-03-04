<?php
//
//require_once("php/session.php");
//
//require_once("php/func.php");
//$auth_user = new USER();
//$user_req = new USER();
////
//$user_id = $_SESSION['user_session'];
////
//$stmt = $auth_user->runQuery("SELECT * FROM users WHERE userID=:userID");
//$stmt->execute(array(":userID"=>$user_id));
////
//$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
////
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
                <h2>Reset password</h2>
                <p>Please enter your email</p>
            </div>
            <form id="Login">
                <div class="form-group">
                    <input type="email" class="form-control" id="resetEmail" placeholder="Email Address">
                </div>
                <button type="submit" class="btn btn-primary">Reset password</button>
            </form>
        </div>
    </div>
</div>
</div>
</body>

</html>
