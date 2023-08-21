<?php

include "../connect.php";


$alldata = array();
$alldata['status'] = "success";

$laptop = getAllData("Equipment", "Equipment_Category_ID = 3", null, false);
$alldata['laptop'] = $laptop;

$AutoCues = getAllData("Equipment", "Equipment_Category_ID = 10", null, false);
$alldata['AutoCues'] = $AutoCues;


echo json_encode($alldata);
