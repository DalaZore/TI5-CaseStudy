<?php
$user_req = new userClass();

$stmt = $user_req->runQuery("SELECT * FROM shopping_cart WHERE customer_id =:customer_id");
$stmt->execute(array(':customer_id'=>$_SESSION['user_session']));



?>

<br/><br/>
<div class="card text-center">
    <div class="card-header">
        <br/>
        <?php
        if(isset($message))
        {
            ?>
            <div class="alert alert-danger">
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $message; ?> !
            </div>
            <?php
        }
        ?>
    </div>
    <div class="card-body">
        <p class="card-text">Proceed to Shopping cart or continue shopping?</p>
    </div>
    <div class="card-footer text-muted">
        <a href="shoppingcart.php" class="btn btn-outline-success my-2 my-sm-0" value="">Shopping Cart</a>
        <a href="index.php" class="btn btn-outline-success my-2 my-sm-0" value="">Continue Shopping</a>
    </div>
</div>