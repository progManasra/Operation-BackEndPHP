<?php

include "../connect.php";

$alldata = array();
$alldata['status'] = "success";


$Order_Type = getAllData("Order_Type", null, null, false);
$alldata['Order_Type'] = $Order_Type;

$Production_Type = getAllData("Production_Type", null, null, false);
$alldata['Production_Type'] = $Production_Type;


echo json_encode($alldata);


//getAllData("Order_Type");