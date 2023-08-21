<?php

include "../connect.php";


$alldata = array();
$alldata['status'] = "success";

$mic = getAllData("Equipment", "Equipment_Category_ID = 4", null, false);
$alldata['mic'] = $mic;

$AirBese = getAllData("Equipment", "Equipment_Category_ID = 8", null, false);
$alldata['AirBese'] = $AirBese;

$AudioMixer = getAllData("Equipment", "Equipment_Category_ID = 9", null, false);
$alldata['AudioMixer'] = $AudioMixer;




echo json_encode($alldata);
