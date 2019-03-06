<?php
$user_req = new userClass();
$stmt = $user_req->runQuery("SELECT * FROM article");
$stmt->execute();
?>
    <br>
    <div class="card text-center">
        <div class="card-header">
            Featured
        </div>
<?php

while($userReq=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>



        <div class="card-body">
            <h5 class="card-title"><?php echo($userReq['article_name']);  ?></h5>
            <p class="card-text"><?php echo($userReq['description']);  ?></p>
            <a href="#" class="btn btn-outline-success my-2 my-sm-0">Go somewhere</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>


    <?php
}
?>