<?php 
class NewUser extends User{




function addReferral($id){
    global $conn;
    $result = $conn->updateData("current_referrals = current_referrals + 1,total_referrals = total_referrals + 1","user_details","owner_id = $id");

}

}