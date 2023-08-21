<?php

include "../connect.php";


$alldata = array();
$alldata['status'] = "success";

$EquipID = filterRequest("EquipID");


$stmt = $con->prepare("SELECT * FROM `Equipment` WHERE Equipment_ID = $EquipID");
$stmt->execute();
$alldata['myData'] = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($alldata);
