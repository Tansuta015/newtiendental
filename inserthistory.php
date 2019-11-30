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
$type = $_POST["type"];
$detail = $_POST["detail"];
$start = $_SESSION['start'];
$Time = $_POST["Time"];
$room = $_POST["room"];
$phone = $_POST["phone"];



//$date = date('Y-d-m h:i:s', time()); 
// $date=date('Y-m-d');
$sql = "INSERT INTO history (Type,Detail,start,Time,Room,Phone,CusID)

VALUES ('$type','$detail','$start','$Time','$room','$phone','$num')";

if ($conn->query($sql) === TRUE) {
    header( "location: http://52.184.32.252/history.php?Customernum=".$mnumber );
   // echo "New record created successfully";
} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
}   

?>
