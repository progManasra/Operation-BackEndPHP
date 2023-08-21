<?php

include "../connect.php";


$alldata = array();
$alldata['status'] = "success";

$lighting_unit = getAllData("Equipment", "Equipment_Category_ID = 2", null, false);
$alldata['lighting_unit'] = $lighting_unit;


echo json_encode($alldata);
