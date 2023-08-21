<?php

include "../connect.php";

$email = filterRequest("email");
$verfiycode = filterRequest("verfiycode");

$stmt = $con->prepare("SELECT * FROM Employee_Info WHERE Employee_Email = '$email' AND Employee_verfiycode = '$verfiycode'");
$stmt->execute();

$count = $stmt->rowCount();

result($count);
