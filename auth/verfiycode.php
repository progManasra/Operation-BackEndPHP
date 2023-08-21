<?php

include "../connect.php";


$email = filterRequest("email");
$verfiy = filterRequest("verfiycode");

$stmt = $con->prepare("SELECT * FROM Employee_Info WHERE Employee_Email = '$email' AND Employee_verfiycode = '$verfiy'");

$stmt->execute();

$count = $stmt->rowCount();

if ($count > 0) {
    $data  = array("Employee_approve" => "1");
    updateData("Employee_Info", $data, "Employee_Email = $email");
} else {
    printFailure("Verifycode not Correct");
}
