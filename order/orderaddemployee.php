<?php

include "../connect.php";


$alldata = array();
$alldata['status'] = "success";

$studio = getAllData("Employee_Info", "Employee_Type_ID = 1", null, false);
$alldata['studio'] = $studio;

$director = getAllData("Employee_Info", "Employee_Type_ID = 3 OR Employee_Type_ID = 16", null, false);
$alldata['director'] = $director;

// $director_assist = getAllData("Employee_Info", "Employee_Type_ID = 16", null, false);
// $alldata['director_assist'] = $director_assist;


$cameraman = getAllData("Employee_Info", "Employee_Type_ID = 4 OR Employee_Type_ID = 5", null, false);
$alldata['cameraman'] = $cameraman;

// $cameraman_assist = getAllData("Employee_Info", "Employee_Type_ID = 5", null, false);
// $alldata['cameraman_assist'] = $cameraman_assist;

$audio = getAllData("Employee_Info", "Employee_Type_ID = 6 OR Employee_Type_ID = 7", null, false);
$alldata['audio'] = $audio;

// $audio_assist = getAllData("Employee_Info", "Employee_Type_ID = 7", null, false);
// $alldata['audio_assist'] = $audio_assist;

$lighting = getAllData("Employee_Info", "Employee_Type_ID = 8 OR Employee_Type_ID = 9", null, false);
$alldata['lighting'] = $lighting;

// $lighting_assist = getAllData("Employee_Info", "Employee_Type_ID = 9", null, false);
// $alldata['lighting_assist'] = $lighting_assist;

$transportat = getAllData("Employee_Info", "Employee_Type_ID = 13", null, false);
$alldata['transportat'] = $transportat;

$program = getAllData("Employee_Info", "Employee_Type_ID = 14 OR Employee_Type_ID = 21 OR Employee_Type_ID = 22", null, false);
$alldata['program'] = $program;

$reporter = getAllData("Employee_Info", "Employee_Type_ID = 15", null, false);
$alldata['reporter'] = $reporter;

$office_boy = getAllData("Employee_Info", "Employee_Type_ID = 17", null, false);
$alldata['office_boy'] = $office_boy;

$creative = getAllData("Employee_Info", "Employee_Type_ID = 19", null, false);
$alldata['creative'] = $creative;

$cg = getAllData("Employee_Info", "Employee_Type_ID = 20", null, false);
$alldata['cg'] = $cg;

// $producer = getAllData("Employee_Info", "Employee_Type_ID = 21 OR Employee_Type_ID = 22", null, false);
// $alldata['producer'] = $producer;

// $producer_assistant = getAllData("Employee_Info", "Employee_Type_ID = 22", null, false);
// $alldata['producer_assistant'] = $producer_assistant;

$production = getAllData("Employee_Info", "Employee_Type_ID = 23", null, false);
$alldata['production'] = $production;

$presenter = getAllData("Employee_Info", "Employee_Type_ID = 24", null, false);
$alldata['presenter'] = $presenter;


echo json_encode($alldata);


//getAllData("Employee_Info");



//////////////////////////
// <?php

// include "../connect.php";


// $alldata = array();
// $alldata['status'] = "success";

// $studio = getAllData("Employee_Info", "Employee_Type_ID = 1", null, false);
// $alldata['studio'] = $studio;

// $director = getAllData("Employee_Info", "Employee_Type_ID = 3", null, false);
// $alldata['director'] = $director;

// $director_assist = getAllData("Employee_Info", "Employee_Type_ID = 16", null, false);
// $alldata['director_assist'] = $director_assist;


// $cameraman = getAllData("Employee_Info", "Employee_Type_ID = 4", null, false);
// $alldata['cameraman'] = $cameraman;

// $cameraman_assist = getAllData("Employee_Info", "Employee_Type_ID = 5", null, false);
// $alldata['cameraman_assist'] = $cameraman_assist;

// $audio = getAllData("Employee_Info", "Employee_Type_ID = 6", null, false);
// $alldata['audio'] = $audio;

// $audio_assist = getAllData("Employee_Info", "Employee_Type_ID = 7", null, false);
// $alldata['audio_assist'] = $audio_assist;

// $lighting = getAllData("Employee_Info", "Employee_Type_ID = 8", null, false);
// $alldata['lighting'] = $lighting;

// $lighting_assist = getAllData("Employee_Info", "Employee_Type_ID = 9", null, false);
// $alldata['lighting_assist'] = $lighting_assist;

// $transportat = getAllData("Employee_Info", "Employee_Type_ID = 13", null, false);
// $alldata['transportat'] = $transportat;

// $program = getAllData("Employee_Info", "Employee_Type_ID = 14", null, false);
// $alldata['program'] = $program;

// $reporter = getAllData("Employee_Info", "Employee_Type_ID = 15", null, false);
// $alldata['reporter'] = $reporter;

// $office_boy = getAllData("Employee_Info", "Employee_Type_ID = 17", null, false);
// $alldata['office_boy'] = $office_boy;

// $creative = getAllData("Employee_Info", "Employee_Type_ID = 19", null, false);
// $alldata['creative'] = $creative;

// $cg = getAllData("Employee_Info", "Employee_Type_ID = 20", null, false);
// $alldata['cg'] = $cg;

// $producer = getAllData("Employee_Info", "Employee_Type_ID = 21", null, false);
// $alldata['producer'] = $producer;

// $producer_assistant = getAllData("Employee_Info", "Employee_Type_ID = 22", null, false);
// $alldata['producer_assistant'] = $producer_assistant;

// $production = getAllData("Employee_Info", "Employee_Type_ID = 23", null, false);
// $alldata['production'] = $production;

// $presenter = getAllData("Employee_Info", "Employee_Type_ID = 24", null, false);
// $alldata['presenter'] = $presenter;


// echo json_encode($alldata);
