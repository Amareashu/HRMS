<?php
include("../connection.php");

$h_id = $_GET["h_id"];
$email = $_GET["tenant_email"];
$page = $_GET["page"];

$ms1 = "Success";
$ms2 = "Error";


$result = $conn->query("SELECT * FROM `tenant_requeset` WHERE `tenant_emial`='$email' AND `house_id`='$h_id'");
if (!$result->num_rows > 0) {

    $sql = "INSERT INTO `tenant_requeset`(`tenant_emial`, `house_id`) VALUES ('$email','$h_id')";

    if ($conn->query($sql)) {
        header("Location:http://localhost/hrms/Process/reserve.php?h_id=$h_id&page=$page&ms=$ms1");
    } else {
        print $conn->error;
    }
} else {
    header("Location:http://localhost/hrms/Process/reserve.php?h_id=$h_id&page=$page&mss=$ms2");
}
