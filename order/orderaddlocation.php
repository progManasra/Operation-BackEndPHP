<?php

include "../connect.php";

$alldata = array();
$alldata['status'] = "success";


$Location = getAllData("Location", null, null, false);
$alldata['Location'] = $Location;


$Car = getAllData("Car", null, null, false);
$alldata['Car'] = $Car;


$Driver = getAllData("Employee_Info", "Employee_Type_ID = 13", null, false);
$alldata['Driver'] = $Driver;

echo json_encode($alldata);
