<?php
include("../connection.php");

$h_id= $_GET["h_id"];
$email= $_GET["email"];

print "hd ".$h_id;
print "em ".$email;

$update_query_house= "UPDATE `house` SET `status`='Reserved' WHERE`id`='$h_id'";

$update_query_tenant_request= "UPDATE `tenant_requeset` SET `status`='Accepted' 
WHERE `tenant_emial`='$email' AND `house_id`='$h_id'";

if (($conn->query($update_query_house))&&($conn->query($update_query_tenant_request))){
    header("Location:http://localhost/hrms/View/View_request.php?ms=Success");
}else{
    print $conn->error;
}