<?php
/*
    Inportant query 

    Copy table -> CREATE TABLE new_table AS SELECT * FROM original_table;
    Alter table name -> RENAME TABLE old_table TO new_table;
    Rename table name-> ALTER TABLE table_name RENAME TO new_table_name;
    
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HRMS";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
//$conn->set_charset('utf-8');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>