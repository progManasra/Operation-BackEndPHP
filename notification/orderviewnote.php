<?php

include "../connect.php";

$myData = array();

$stmt = $con->prepare("SELECT * FROM `Notification` ORDER BY Notification_ID DESC LIMIT 20");
$stmt->execute($values);
$myData['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

$count  = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $myData['data']));
} else {
    echo json_encode(array("status" => "failure"));
}
return $count;
