<?php

include "../connect.php";


$stmt = $con->prepare("SELECT * FROM `Reservation` ORDER BY `Reserv_ID` DESC");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}


//getAllData("Reservation");