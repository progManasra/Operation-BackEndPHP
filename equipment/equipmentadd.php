<?php

include "../connect.php";



$table   = "Equipment";
$name    = filterRequest("Equipment_Name");
$Disc    = filterRequest("Equipment_Specification");
$SNumber = filterRequest("Equipment_Serial_Number");
$BCode   = filterRequest("Equipment_Barcode");
$MNumber = filterRequest("Equipment_Model_Number");
$DeptID  = filterRequest("Equipment_Department_ID");
$CatID   = filterRequest("Equipment_Category_ID");
$AddedBy = filterRequest("Equipment_Added_By_Emp_ID");

$EquipImage =  imageUpload("../upload/equipment/", "files");

$alldata = array(
    "Equipment_Name" => $name,
    "Equipment_Category_ID" => $CatID,
    "Equipment_Serial_Number" => $SNumber,
    "Equipment_Department_ID" => $DeptID,
    "Equipment_Barcode" => $BCode,
    "Equipment_Specification" => $Disc,
    "Equipment_Model_Number" => $MNumber,
    "Equipment_Added_By_Emp_ID" => $AddedBy,
);


insertData($table, $alldata);


// $alldata = array(
//     "Equipment_Name" => $name,
//     "Equipment_Category_ID" => $CatID,
//     "Equipment_Picture" => $EquipImage,
//     "Equipment_Serial_Number" => $SNumber,
//     "Equipment_Department_ID" => $DeptID,
//     "Equipment_Barcode" => $BCode,
//     "Equipment_Specification" => $Disc,
//     "Equipment_Model_Number" => $MNumber,
//     "Equipment_Added_By_Emp_ID" => $AddedBy,
// );