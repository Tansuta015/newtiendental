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


$mnumber = $_SESSION['UserID'];
$type = $_POST["type"];
$detail = $_POST["detail"];
$date = $_POST["date"];
$time = $_POST["time"];
// $date = $_POST["datetimepicker"];


// echo $mnumber;
// echo $type;
// echo $detail;
// echo $date;
// echo $time;
// echo $date;

// $currentdate = date('Y-d-m h:i:s', time()); 
$date=date('Y-m-d');

$sql = "INSERT INTO bookueue (CusID,Type,Detail,start,Time)

VALUES ('$mnumber','$type','$detail','$date','$time')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    header( "location: http://52.184.32.252/history.php?Customernum=".$mnumber );
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}   

?>

