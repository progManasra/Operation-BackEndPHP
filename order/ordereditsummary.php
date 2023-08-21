<?php

include "../connect.php";

$resID = filterRequest("resID");
$Reserv_Start_DateTime = filterRequest("OrderStartDateTime");
$Reserv_End_DateTime = filterRequest("OrderEndDateTime");
$Reserv_Title = filterRequest("OrderTitle");
$Reserv_Descriptions = filterRequest("OrderDisc");
$Reserv_Location_ID = filterRequest("Location_ID");
$Reserv_Status_ID = '1';
$Reserv_Order_Type_ID = filterRequest("data_Order");
$Reserv_By_Employee_ID = filterRequest("AddByEmp");
$Reserv_By_Employee_Email = filterRequest("email");
$Reserv_Estimated_Time = '1';
$Reserv_Created_Date = '';
$Reserv_Production_Type_ID = filterRequest("data_Production");
$Reservation_Note_Cam = filterRequest("CameraNote");
$Reservation_Note_Audio = filterRequest("AudioNote");
$Reservation_Note_Light = filterRequest("LightNote");
$Reservation_Note_Equip = filterRequest("EquipmentNote");
$Reservation_Note_Emp = filterRequest("EmployeeNote");
$Reservation_Note_Location = filterRequest("LocationNote");
$Equipment_ID = filterRequest("EquipmentsList");
$Employee_ID = filterRequest("EmployeesList");
$CarID = filterRequest("CarList");
$EmployeesListStringDepID = filterRequest("EmployeesListStringDepID");

$Reservation_Equip_Equipment_ID = filterRequest("EquipmentsListString");

$Employee_Permission_ID = filterRequest("Employee_Permission_ID");
//deleteData("Reservation", " = $Reserv_ID", false);


$stmt = $con->prepare("DELETE FROM `Reservation` WHERE `Reservation`.`Reserv_ID` = '$resID'");
$stmt->execute();



$stmt = $con->prepare("SELECT * FROM Employee_Info WHERE Employee_Permission_ID = 1 OR Employee_Permission_ID = 3 OR Employee_Permission_ID = 4");
$stmt->execute();
$stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

if ($count > 0) {
    $data = array(
        "Reserv_ID" => $resID,
        "Reserv_Start_DateTime" => $Reserv_Start_DateTime,
        "Reserv_End_DateTime" => $Reserv_End_DateTime,
        "Reserv_Title" => $Reserv_Title,
        "Reserv_Descriptions" => $Reserv_Descriptions,
        "Reserv_Location_ID" => $Reserv_Location_ID,
        "Reserv_Status_ID" => $Reserv_Status_ID,
        "Reserv_Order_Type_ID" => $Reserv_Order_Type_ID,
        "Reserv_By_Employee_ID" => $Reserv_By_Employee_ID,
        "Reserv_Estimated_Time" => $Reserv_Estimated_Time,
        //"Reserv_Created_Date" => $Reserv_Created_Date,
        "Reserv_Production_Type_ID" => $Reserv_Production_Type_ID,
        "Reservation_Note_Cam" => $Reservation_Note_Cam,
        "Reservation_Note_Audio" => $Reservation_Note_Audio,
        "Reservation_Note_Light" => $Reservation_Note_Light,
        "Reservation_Note_Equip" => $Reservation_Note_Equip,
        "Reservation_Note_Emp" => $Reservation_Note_Emp,
        "Reservation_Note_Location" => $Reservation_Note_Location,
    );

    insertData("Reservation", $data);
    //===========Retreave Last Reservation ID ==============
    $data = array();
    $lastID;
    $stmt = $con->prepare("SELECT max(Reserv_ID) as lastID FROM Reservation");
    $stmt->execute();
    $data['LastID'] = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($data['LastID']);    //for Testing
    foreach ($data['LastID'] as $key => $value) {
        $lastID = $value;
    }
    //echo $lastID;  //for Testing
    //===========RetreaveLast Last Reservation ID ---End ==============  
    //===========Equipments ID List--->
    $EquipmentsListString1 = explode(", ", $Equipment_ID);
    //print_r($EquipmentsListString1);
    if (($EquipmentsListString1) != '') {
        foreach ($EquipmentsListString1 as $item) {
            if ($item != '') {
                $stmt = $con->prepare("INSERT INTO `Reservation_Equip`(`Reservation_Equip_ID`, `Reservation_Equip_Equipment_ID`, `Reservation_Equip_Reserv_ID`) 
        VALUES (' ','$item','$lastID')");
                $stmt->execute();
            }
        }
    }
    //===========Employees ID List--->
    $EmployeesListString1 = explode(", ", $Employee_ID);
    $EmployeesListDepID = explode(", ", $EmployeesListStringDepID);

    $ArrayCombine = array_combine($EmployeesListString1, $EmployeesListDepID);
    foreach ($ArrayCombine as $key => $value) {
        if ($key != '') {
            $stmt = $con->prepare("INSERT INTO `Reservation_Employee`(`Resrvation_Employee_ID`, `Resrvation_Employee_Employee_ID`, `Resrvation_Employee_Reserv_ID`, `Resrvation_Employee_Dep_ID`) 
        VALUES (' ','$key','$lastID','$value')");
            $stmt->execute();
        }
    }
    //===========Cars ID List--->
    $CARsListString1 = explode(", ", $CarID);
    //print_r($CARsListString1);
    foreach ($CARsListString1 as $item) {
        if ($item != '') {
            $stmt = $con->prepare("INSERT INTO `Reservation_Car`(`Reservation_Car_ID`, `Reservation_Car_Car_ID`, `Reservation_Car_Reserv_ID`) 
        VALUES (' ','$item','$lastID')");
            $stmt->execute();
        }
    }
} else {
    printFailure("Don't Have Permissions");
}

sendGCM("Edit order $Reserv_Title", "Edit order $Reserv_Descriptions", "users", "", "");

$stmt = $con->prepare("INSERT INTO `Notification` (`Notification_Reserv_ID`, `Notification_Emp_ID`, `Notification_Emp_Email`, `Notification_Title`, `Notification_Disc`, `Notification_DateTime`) 
VALUES ('$resID', '$Reserv_By_Employee_ID','$Reserv_By_Employee_Email', 'Edit order $Reserv_Title', 'Edit order $Reserv_Descriptions', current_timestamp())");
$stmt->execute();
