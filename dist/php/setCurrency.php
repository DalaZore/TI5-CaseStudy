<?php
session_start();
require("dbconnect.php");
require("db_functions.php");


function processDrpdown($selectedVal) {
    $change=new userClass();
    $stmt = $change->runQuery("UPDATE customer SET currency_id=:currency WHERE customer_id=:customer_id");
    $stmt->execute(array(':customer_id'=>$_SESSION['user_session'],':currency'=>$selectedVal));

}

if ($_POST['dropdownValue']){
    //call the function or execute the code
    processDrpdown($_POST['dropdownValue']);
}