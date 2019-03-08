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
</div>
