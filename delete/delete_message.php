<?php

include("..//connection.php");

$sql2 = "DELETE FROM `feedback` WHERE id = '$_GET[c_id]'";

$result = $conn->query($sql2);
if ($result) {
    header("Location:http://localhost:8080/hrms/View/message.php#");
} else {
    print "Error " . $conn->error;
}
