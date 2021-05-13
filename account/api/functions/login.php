<?php 
session_start();

include "../classes/DBConnection.php";
include "../functions/functions.php";
include "../classes/user.php";
include "../functions/db_connect.php";
$conn = new DBConnection;
$conn->connect();



    $email = $_POST['email'];
    $password = $_POST['password'];



$user = new User;
$result = $user->loginUser($email,$password);
if($result['error'] != true){
if(isset($_POST['client'])){
$result['userId'] = $user->id;
}
else{

$_SESSION['id'] = $result['userId'];
$_SESSION['Logged In'] = true;
}
}


echo json_encode($result);


