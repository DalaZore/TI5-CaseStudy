<?php
$host='localhost';
$db = 'ti5-';
$username = 'root';
$password = '';
$dsn= "mysql:host=$host;dbname=$db";

Try{
    // create a PDO connection with the configuration data
    $conn = new PDO($dsn, $username, $password);

    // display a message if connected to database successfully
    if($conn){

    }
}catch (PDOException $e){
    $e->getMessage();
    // report error message
}