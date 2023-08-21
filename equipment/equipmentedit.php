<?php

include "../connect.php";



$table   = "Equipment";
$id = filterRequest("Equipment_ID");
$name    = filterRequest("Equipment_Name");
$Disc    = filterRequest("Equipment_Specification");
$SNumber = filterRequest("Equipment_Serial_Number");
$BCode   = filterRequest("Equipment_Barcode");
$MNumber = filterRequest("Equipment_Model_Number");
$DeptID  = filterRequest("Equipment_Department_ID");
$CatID   = filterRequest("Equipment_Category_ID");
$AddedBy = filterRequest("Equipment_Added_By_Emp_ID");

$imageold = filterRequest("imageold");

$EquipImage =  imageUpload("../upload/equipment", "Equipment_Picture");

if ($EquipImage == "empty") {
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
} else {
    deleteFile("../upload/equipment", $imageold);
    $alldata = array(
        "Equipment_Name" => $name,
        "Equipment_Category_ID" => $CatID,
        "Equipment_Picture" => $EquipImage,
        "Equipment_Serial_Number" => $SNumber,
        "Equipment_Department_ID" => $DeptID,
        "Equipment_Barcode" => $BCode,
        "Equipment_Specification" => $Disc,
        "Equipment_Model_Number" => $MNumber,
        "Equipment_Added_By_Emp_ID" => $AddedBy,
    );
}


updateData($table, $alldata, "Equipment_ID = $id");
