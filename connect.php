<?php
$dsn = "mysql:host=localhost;dbname=u237337736_shq";
$user = "u237337736_shqadmin";
$pass = "Test@123";
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
);
$countrowinpage = 9;
try {
    $con = new PDO($dsn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
    header("Access-Control-Allow-Methods: POST, OPTIONS , GET");
    include "function.php";
    if (!isset($notAuth)) {
        // checkAuthenticate();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}