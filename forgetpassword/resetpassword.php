<?php

include "../connect.php";

$email = filterRequest("email");
$password = sha1($_POST['password']);

$data = array("Employee_Password" => $password);

updateData("Employee_Info", $data, "Employee_Email = '$email'");
