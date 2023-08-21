<?php

include "../connect.php";

$email = filterRequest("email");
$password = sha1($_POST['password']);

// $stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? OR users_password = ? AND users_approve = 1");
// $stmt->execute(array($email, $password));
// $count = $stmt->rowCount();
//result($count);
//or

getData("Employee_Info", "Employee_Email = ? AND Employee_Password = ? AND Employee_approve = 1", array($email, $password));
