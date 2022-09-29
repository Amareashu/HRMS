<?php
include("../connection.php");

$action= $_GET["action"];
$email= $_GET["email"];
$page= $_GET["page"];

print "page ".$page;
print "hd ".$action;
print "em ".$email;

if($action=='Active'){
    $update_query_account= "UPDATE `account` SET `status`='deactive' WHERE`email`='$email'";
}else{
    $update_query_account= "UPDATE `account` SET `status`='Active' WHERE`email`='$email'";
}

if (($conn->query($update_query_account))){
    header("Location:http://localhost/hrms/View/account_list.php?page=$page");
}else{
    print $conn->error;
}