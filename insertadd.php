<?php
session_start(); 
$servername = "db";
$username = "root";
$password = "test";
$dbname = "tienden";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$mnumber  = $_SESSION['UserID'];
$start = $_POST["start"];
$Type = $_POST["Type"];
$Detail = $_POST["Detail"];
$Time = $_POST["Time"];
$dayofweek = $_POST["dayofweek"];



$sql = "INSERT INTO book (CusID,start,Type,Detail,end,Time,dayofweek)

VALUES ('$mnumber','$start','$Type','$Detail','$start','$Time','$dayofweek')";


if ($conn->query($sql) === TRUE) {
   header( "location: http://52.184.32.252/calendar.php?Customernum=".$mnumber );
} else {
    // echo "Error updating record: " . $conn->error;
}
?>
