<?php

include "../connect.php";


$alldata = array();
$alldata['status'] = "success";


$stmt = $con->prepare("SELECT * FROM `Department` ");
$stmt->execute();
$alldata['Department'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $con->prepare("SELECT * FROM `Equipment_Cat`");
$stmt->execute();
$alldata['Equipment_Cat'] = $stmt->fetchAll(PDO::FETCH_ASSOC);



echo json_encode($alldata);
