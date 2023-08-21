<?php

include "../connect.php";

$resID = filterRequest("ResID");


$alldata = array();

$alldata['status'];
$alldata['Reservation'];
$alldata['Reservation_Car'];
$alldata['Reservation_Employee'];
$alldata['Reservation_Equip'];
$alldata['Reservation_Location'];
$alldata['Reservation_Status'];
$alldata['Reservation_Order_Type'];
$alldata['Reservation_Production_Type'];


//$alldata['Reservation'] = $con->prepare("SELECT * FROM `Reservation`");

$alldata['status'] = "success";
//===Reservation_Order_Type===
//$stmt = $con->prepare("SELECT Order_Type.Order_Type_Name FROM Reservation
$stmt = $con->prepare("SELECT Order_Type.* FROM Reservation
LEFT JOIN Order_Type ON Reservation.Reserv_Order_Type_ID = Order_Type.Order_Type_ID
WHERE Reservation.Reserv_ID  = '$resID'");
$stmt->execute();
$alldata['Reservation_Order_Type'] = $stmt->fetchAll(PDO::FETCH_ASSOC);


//===reservation===
$alldata['Reservation']  = getAllData("Reservation", "Reserv_ID = '$resID'", null, false);

//===Reservation_Location===

//$stmt = $con->prepare("SELECT Location.Location_Name FROM Reservation
$stmt = $con->prepare("SELECT Location.* FROM Reservation
LEFT JOIN Location ON Reservation.Reserv_Location_ID = Location.Location_ID
WHERE Reservation.Reserv_ID  = '$resID'");
$stmt->execute();
$alldata['Reservation_Location'] = $stmt->fetchAll(PDO::FETCH_ASSOC);



//===Reservation_Status===
$stmt = $con->prepare("SELECT Status.Status_Name FROM Reservation
LEFT JOIN Status ON Reservation.Reserv_Status_ID = Status.Status_ID
WHERE Reservation.Reserv_ID  = '$resID'");
$stmt->execute();
$alldata['Reservation_Status'] = $stmt->fetchAll(PDO::FETCH_ASSOC);


//===Reservation_Production_Type===
//$stmt = $con->prepare("SELECT Production_Type.Production_Type_ID ,Production_Type.Production_Type_Name FROM Reservation
$stmt = $con->prepare("SELECT Production_Type.* ,Production_Type.Production_Type_Name FROM Reservation
LEFT JOIN Production_Type ON Reservation.Reserv_Production_Type_ID = Production_Type.Production_Type_ID
WHERE Reservation.Reserv_ID  = '$resID'");
$stmt->execute();
$alldata['Reservation_Production_Type'] = $stmt->fetchAll(PDO::FETCH_ASSOC);


//===car===
$stmt = $con->prepare("SELECT Car.* FROM Reservation LEFT JOIN Reservation_Car ON Reservation_Car.Reservation_Car_Reserv_ID = Reservation.Reserv_ID LEFT JOIN Car ON Car.Car_ID = Reservation_Car.Reservation_Car_Car_ID WHERE Reservation.Reserv_ID = '$resID'");
$stmt->execute();
$alldata['Reservation_Car'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

//===Employee===
$stmt = $con->prepare("SELECT Employee_Info.* 
FROM Reservation
LEFT JOIN Reservation_Employee ON Reservation_Employee.Resrvation_Employee_Reserv_ID = Reservation.Reserv_ID
LEFT JOIN Employee_Info ON Reservation_Employee.Resrvation_Employee_Employee_ID = Employee_Info.Employee_ID
WHERE Reservation.Reserv_ID = '$resID'");
$stmt->execute();
$alldata['Reservation_Employee'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

//===Equipment===
$stmt = $con->prepare("SELECT Equipment.*
FROM Reservation
LEFT JOIN Reservation_Equip ON Reservation_Equip.Reservation_Equip_Reserv_ID = Reservation.Reserv_ID
LEFT JOIN Equipment ON Equipment.Equipment_ID = Reservation_Equip.Reservation_Equip_Equipment_ID
WHERE Reservation.Reserv_ID = '$resID'");
$stmt->execute();
$alldata['Reservation_Equip'] = $stmt->fetchAll(PDO::FETCH_ASSOC);



echo json_encode($alldata);

//echo json_encode($stmt);



//Select Car
// SELECT Car.* FROM Reservation
// LEFT JOIN Reservation_Car ON Reservation_Car.Reservation_Car_Reserv_ID = Reservation.Reserv_ID
// LEFT JOIN Car ON Car.Car_ID = Reservation_Car.Reservation_Car_Car_ID
// WHERE Reservation.Reserv_ID = 230//Select Car


//Select Employee
// SELECT Employee_Info.* 
// FROM Reservation
// LEFT JOIN Reservation_Employee ON Reservation_Employee.Resrvation_Employee_Reserv_ID = Reservation.Reserv_ID
// LEFT JOIN Employee_Info ON Reservation_Employee.Resrvation_Employee_Employee_ID = Employee_Info.Employee_ID
// WHERE Reservation.Reserv_ID = 231

//Select Equipment
// SELECT Equipment.*
// FROM Reservation
// LEFT JOIN Reservation_Equip ON Reservation_Equip.Reservation_Equip_Reserv_ID = Reservation.Reserv_ID
// LEFT JOIN Equipment ON Equipment.Equipment_ID = Reservation_Equip.Reservation_Equip_Equipment_ID
// WHERE Reservation.Reserv_ID = 231