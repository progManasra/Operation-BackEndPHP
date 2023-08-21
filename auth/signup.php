<?php

include "../connect.php";

$firstname = filterRequest("firstname");
$lastname = filterRequest("lastname");
$password = sha1($_POST['password']);
$email = filterRequest("email");
$phone = filterRequest("phone");
$profile = filterRequest("profile");
$verfiycode = rand(10000, 99999);


$stmt = $con->prepare("SELECT * FROM Employee_Info WHERE Employee_Email = ? OR Employee_Phone = ?");
$stmt->execute(array($email, $phone));


$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("PHONE or EMAIL");
} else {
    $data = array(
        "Employee_First_Name" => $firstname,
        "Employee_Last_Name" => $lastname,
        "Employee_Password" => $password,
        "Employee_Email" => $email,
        "Employee_Phone" => $phone,
        "Employee_Profile_Number" => $profile,
        "Employee_Type_ID" => "99",
        "Employee_Dep_ID" => "99",
        "Employee_Permission_ID" => "99",
        "Employee_verfiycode" => $verfiycode,
    );

    sendEmail($email, "Verfiy Code Ecommerce App", $verfiycode);
    insertData("Employee_Info", $data);
}
