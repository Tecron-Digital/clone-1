<?php 
session_start();
include "../classes/DBConnection.php";
include "../functions/functions.php";
include "../classes/user.php";
include "../classes/NewUser.php";
include "../classes/transaction.php";
include "../functions/db_connect.php";

$conn = new DBConnection;
$conn->connect();

if(!isset($_POST['email']) || !isset($_POST['password'])){
    exit("Invalid Request");
}

$email = $_POST['email'];
$password = $_POST['password'];


//Checks
$error = false;
$reason = "";
$user = new NewUser;
$isEmailResult = $conn->selectData(array("email"),"users","email = '$email'","email",0);
$isEmailContained = 0;
foreach($isEmailResult  as $data){
    $isEmailContained +=1;
}
if($isEmailContained > 0){
$error = true;
$reason = "email already exists";
}
    else{
        $password = password_hash($password,PASSWORD_DEFAULT);
       $result = $user->signupUser($email,$password);

        if($result == true){
            $error = false;
            $reason = "registration successful" .$result."";
            }
    }





echo json_encode(array("error" => $error , "reason" => $reason));


