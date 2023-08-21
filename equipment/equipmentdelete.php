<?php

include "../connect.php";



$table   = "Equipment";
$id    = filterRequest("Equipment_ID");
$ImageName = filterRequest("Equipment_Picture");

deleteFile("../upload/equipment", $ImageName);

deleteData($table, "Equipment_ID = $id");
