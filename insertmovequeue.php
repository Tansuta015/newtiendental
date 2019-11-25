<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienden";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$BookID = $_REQUEST["BookID"];
echo $BookID ;
$sql = "SELECT * FROM book WHERE BookID=$BookID";


// echo $sql;
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
// $time = $row["Date"];
$time = $row["Time"];

// echo "time" . $time . "<br>";
//$add_min = date("H:i:s", strtotime($time . "+30 minutes"));
//$add_min = date("H:i - H:i", strtotime($time . '+30 minutes'+ $time . '+30 minutes'));
$arr = (explode('-',$time));
//echo $arr[0];
//echo $arr[1];
$add_min1 = date("H:i", strtotime($arr[0] . '+45 minutes'));
$add_min2 = date("H:i", strtotime($arr[1] . '+45 minutes'));
$addresult = $add_min1 . '-' . $add_min2;
echo $add_min1;
echo $add_min2;
echo $addresult;
//$add_min = date("H:i:s", strtotime($time . "+30 minutes"));
// echo $add_min;
$sql = "UPDATE book SET Time = '$addresult',alert = '1' WHERE BookID=$BookID ";


if ($conn->query($sql) === TRUE) {
 header( "location: http://localhost/newdental/movequeue.php");
 //echo "Record updated successfully";
 
} else {
     echo "Error updating record: " . $conn->error;
}
?>
