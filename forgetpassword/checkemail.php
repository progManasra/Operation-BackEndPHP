<?php
include "../connect.php";
$email = filterRequest("email");

$verfiycode     = rand(10000, 99999);

$stmt = $con->prepare("SELECT * FROM Employee_Info WHERE Employee_Email = ? ");
$stmt->execute(array($email));
$count = $stmt->rowCount();
result($count);

if ($count > 0) {
    $data = array("Employee_verfiycode" => $verfiycode);
    updateData("Employee_Info", $data, "Employee_Email = '$email'", false);
    sendEmail($email, "Verfiy Code Ecommerce", "Verfiy Code $verfiycode");
}
