<?php
$user_req = new userClass();

$stmt = $user_req->runQuery("SELECT * FROM shoppingcart_info WHERE customer_id =:customer_id");
$stmt->execute(array(':customer_id'=>$_SESSION['user_session']));
$total_price = 0;


?>

<br/><br/>
<div class="card text-center">
    <div class="card-header">
        <br/>
        <h2>Shopping Cart</h2>
    </div>
    <?php

    while($userReq=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>



        <div class="card-body">
            <h5 class="card-title"><?php echo($userReq['article_name']);  ?></h5>
            <img src="<?php echo($userReq['picture']);?>" class="article_image"/>
            <p class="card-text"><?php echo($userReq['description']);  ?></p>

        </div>
        <div class="card-footer text-muted">

         Quantity: <?php echo($userReq['quantity']);?>
            <br/>
         Price: <?php echo($userReq['price']);?> CHF.-
        </div>
        <?php
        $total_price +=$userReq['price'];
    }
    ?>
</div>
<div class="card-body">
    Total Price: <?php echo($total_price);?> CHF.-
    <br/>
    <a href="checkout.php" class="btn btn-outline-success my-2 my-sm-0" value="">Checkout</a>

</div>