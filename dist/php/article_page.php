<?php
$user_req = new userClass();
$stmt = $user_req->runQuery("SELECT * FROM article");
$stmt->execute();

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
    <h2>All Articles</h2>
  </div>
  <?php

  while($userReq=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>



    <div class="card-body">
      <h5 class="card-title"><?php echo($userReq['article_name']);  ?></h5>
      <img src="<?php echo($userReq['picture']);?>" class="article_image"/>
      <p class="card-text"><?php echo($userReq['description']);  ?></p>

      <a href="addtocart.php?article=<?php echo($userReq['article_id']);?>" class="btn btn-outline-success my-2 my-sm-0" value="">Add to Shopping Cart</a>
    </div>
    <div class="card-footer text-muted">
      <?php if(($userReq['stock']) <=0)
      {
        echo("not in Stock");
      }
      else
      {
        ?> in Stock (<?php echo($userReq['stock']);?>)

        <?php
      }
      ?>
      <br/> Price: <?php echo($userReq['price']*$rate);?> <?php echo($user_req->getCurrency());?>
    </div>
    <?php
  }
  ?>
</div>
