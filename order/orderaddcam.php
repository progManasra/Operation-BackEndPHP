<?php

include "../connect.php";


$alldata = array();
$alldata['status'] = "success";

$camera = getAllData("Equipment", "Equipment_Category_ID = 1", null, false);
$alldata['camera'] = $camera;

$Gimbal = getAllData("Equipment", "Equipment_Category_ID = 5", null, false);
$alldata['Gimbal'] = $Gimbal;

$Dron = getAllData("Equipment", "Equipment_Category_ID = 6", null, false);
$alldata['Dron'] = $Dron;

$Crain = getAllData("Equipment", "Equipment_Category_ID = 7", null, false);
$alldata['Crain'] = $Crain;

$Lenses = getAllData("Equipment", "Equipment_Category_ID = 11", null, false);
$alldata['Lenses'] = $Lenses;



echo json_encode($alldata);


//getAllData("Equipment", "Equipment_Category_ID = 1", null, true);
