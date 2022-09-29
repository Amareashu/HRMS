<?php
session_start();
session_destroy();
header("Location:http://localhost/hrms/index.php"); 
print "logout";     
?>