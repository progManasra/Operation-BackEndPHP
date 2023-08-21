<?php
include "../connect.php";

$resID = filterRequest("ResID");

$stmt = $con->prepare("DELETE FROM `Reservation` WHERE `Reservation`.`Reserv_ID` = '$resID'");
$stmt->execute();
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}