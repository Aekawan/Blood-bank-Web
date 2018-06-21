<?php
//ข้อมูลที่ใช้ติดต่อ database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodforlife";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
