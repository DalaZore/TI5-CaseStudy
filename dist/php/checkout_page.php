<?php
$user_req = new userClass();



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
        <p class="card-text"></p>
    </div>
    <div class="card-footer text-muted">
        <a href="index.php" class="btn btn-outline-success my-2 my-sm-0" value="">go Back</a>
    </div>
</div>
