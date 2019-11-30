<?php
session_start(); 
$servername = "db";
$username = "root";
$password = "test";
$dbname = "tienden";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// $conn2 = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$num = $_SESSION['UserID'];
$start= $_POST['start'];
$Time = $_POST["Time"];
$type = $_POST["type"];
$detail = $_POST["detail"];
$dayofweek = $_POST["days"];


// $date_old = '23-5-2016 23:15:23'; 
// //Date for database
// $date_for_database = date ("Y-m-d H:i:s", strtotime($date_old));
// $start=date('Y-m-d');

$sql = "INSERT INTO book (start,Time,Type,Detail,CusID,end,dayofweek)

VALUES ('$start','$Time','$type','$detail','$num','$start','$dayofweek')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    header( "location: http://52.184.32.252/appoints.php?Customernum=".$mnumber );
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}   

?>
