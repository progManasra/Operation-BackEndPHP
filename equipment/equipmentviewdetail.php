<?php

include "../connect.php";


$alldata = array();
$alldata['status'] = "success";

$EquipIds = filterRequest("EquipCatID");
$EquipIdsList = explode(", ", $EquipIds);
$quiryString = "";


foreach ($EquipIdsList as $item) {
    //print($item . "\n");
    $quiryString = $quiryString . " OR Equipment_Category_ID = $item ";
};
$quiryString = substr($quiryString, 3);
//print($quiryString . "\n");


$stmt = $con->prepare("SELECT * FROM `Equipment` WHERE $quiryString");
$stmt->execute();
$alldata['myData'] = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($alldata);
