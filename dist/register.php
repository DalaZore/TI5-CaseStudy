<?php

//require_once("php/func.php");
//$auth_user = new USER();
//$user_req = new USER();
//
//$user_id = $_SESSION['user_session'];
//
//$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
//$stmt->execute(array(":id"=>$user_id));
//
//$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
//
?>

<!doctype html>
<html id="RegisterForm" class="no-js" lang="">

<head>
    <?php include('header.php'); ?>
    <link rel="stylesheet" href="css/register.css">
</head>

<body id="RegisterForm">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->


<!-- Content begin -->

<div class="container">
    <br/><br/>
    <div class="register-form">

        <div class="main-div">
            <a href="index.php" class="glyphico"><i class="far fa-arrow-alt-circle-left fa-2x"></i></a>
            <div class="panel">
                <h2>Register</h2>
                <p>Please fill everything in</p>
            </div>
            <form id="Register">
                <div class="form-group">
                    <input type="text" class="form-control" id="registerUname" placeholder="User name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="registerMail" placeholder="Email address">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="registerPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="repeatPassword" placeholder="Repeat password">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="registerGivenName" placeholder="Given name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="registerName" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="registerAddress" placeholder="Address">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="registerPLZ" placeholder="PLZ">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="registerCity" placeholder="City">
                </div>

                <div class="alreadyacc">
                    <a href="login.php">Already have an Account?</a>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>
</div>

</body>

</html>
