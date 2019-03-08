<?php
$user_req = new userClass();

$stmt = $user_req->runQuery("SELECT * FROM customer WHERE customer_id =:customer_id");
$stmt->execute(array(':customer_id'=>$_SESSION['user_session']));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
$total_price = 0;
$stmt = $user_req->runQuery("SELECT * FROM shoppingcart_info WHERE customer_id =:customer_id");
$stmt->execute(array(':customer_id'=>$_SESSION['user_session']));
if($user_req->is_loggedin()){
  $rate = $user_req->getRate();
}
else{
  $rate=1;
}

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
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $message; ?>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="card-body">
        <p class="card-text">The parcel will be sent to</p>
      <p class="card-text"><?php echo($userRow['gname'])?> <?php echo($userRow['surname'])?></p>
      <p class="card-text"><?php echo($userRow['address'])?></p>
      <p class="card-text"><?php echo($userRow['plz'])?> <?php echo($userRow['city'])?></p>
    </div>
  <div class="card-footer text-muted">

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
      <br/> Price: <?php echo($userReq['price']*$rate);?> <?php echo($user_req->getCurrency());?>

    </div>
    <?php
    $total_price +=($userReq['price']*$rate);
  }
  ?>
    <div class="card-footer text-muted">
      Total Price: <?php echo($total_price);?> <?php echo($user_req->getCurrency());?>
      <br/>
        <a href="index.php" class="btn btn-outline-success my-2 my-sm-0" value="">go Back</a>
        <a href="checkout.php" class="btn btn-outline-success my-2 my-sm-0" value="">Checkout</a>
    </div>
</div>
