<?php
session_start();
require_once('php\db_functions.php');
$user = new userClass();

if($user->is_loggedin()!="")
{
    $user->redirect('index.php');
}

if(isset($_POST['signupSubmit']))
{
    $uname = strip_tags($_POST['registerUname']);
    $umail = strip_tags($_POST['registerMail']);
    $upass = strip_tags($_POST['registerPassword']);
    $upassrepeat = strip_tags($_POST['repeatPassword']);
    $ugivename = strip_tags($_POST['registerGivenName']);
    $usurname = strip_tags($_POST['registerName']);
    $address = strip_tags($_POST['registerAddress']);
    $plz = strip_tags($_POST['registerPLZ']);
    $city = strip_tags($_POST['registerCity']);

    if($uname=="")	{
        $error[] = "Please provide a valid Username!";
    }
    else if($umail=="")	{
        $error[] = "Please provide a Mail-Address!";
    }
    else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
        $error[] = 'Please provide a valid Mail-Address!';
    }
    else if($upass=="")	{
        $error[] = "Please provide a Password!";
    }
    else if(strlen($upass) < 8){
        $error[] = "Password must be at least 8 characters";
    }
    else if($upass!=$upassrepeat)	{
        $error[] = "Passwords must match!";
    }
    else if($ugivename=="")	{
        $error[] = "Please provide your given Name!";
    }
    else if($usurname=="")	{
        $error[] = "Please provide your Surname!";
    }
    else if($address=="")	{
        $error[] = "Please provide your address!";
    }
    else if($plz=="")	{
        $error[] = "Please provide a PLZ!";
    }
    else if($city=="")	{
        $error[] = "Please provide a City!";
    }
    else
    {
        try
        {
            $stmt = $user->runQuery("SELECT username, email FROM customer WHERE username=:uname OR email=:umail");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['username']==$uname) {
                $error[] = "sorry username already taken !";
            }
            else if($row['email']==$umail) {
                $error[] = "sorry email id already taken !";
            }
            else
            {
                if($user->userRegistration($uname,$umail,$upass,$ugivename,$usurname,$address,$plz,$city)){
                    $user->redirect('register.php?joined');
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

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
            <form method="post" id="Register">
                <div class="form-group">
                    <input type="text" class="form-control" name="registerUname" placeholder="User name" value="<?php if(isset($error)){echo $uname;}?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="registerMail" placeholder="Email address" value="<?php if(isset($error)){echo $umail;}?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="registerPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="repeatPassword" placeholder="Repeat password">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="registerGivenName" placeholder="Given name" value="<?php if(isset($error)){echo $ugivename;}?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="registerName" placeholder="Name" value="<?php if(isset($error)){echo $usurname;}?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="registerAddress" placeholder="Address" value="<?php if(isset($error)){echo $address;}?>" >
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="registerPLZ" placeholder="PLZ" value="<?php if(isset($error)){echo $plz;}?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="registerCity" placeholder="City" value="<?php if(isset($error)){echo $city;}?>">
                </div>

                <div class="alreadyacc">
                    <a href="login.php">Already have an Account?</a>
                </div>
                <input type="submit" class="btn btn-primary" name="signupSubmit" value="Register">
                <div><br/>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        ?>
                        <div class="alert alert-danger">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                        </div>
                        <?php
                    }
                }
                else if(isset($_GET['joined'])){
                    ?>
                    <div class="alert alert-info">
                        <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='login.php'>login</a> here
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
