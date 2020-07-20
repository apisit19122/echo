<meta charset="utf-8">
<?php
$host = "localhost"; // โฮส 
$user = "root"; // User
$pwd = ""; // Password
$db = "echo"; // DatabaseName

$conn = mysqli_connect($host, $user, $pwd) or die("เชื่อมต่อฐานข้อมูลไม่ได้");
mysqli_query($conn, "use $db") or die("กรุณาตรวจสอบ Host User Password และ NameDataBase อีกครั้ง!");
mysqli_query($conn, "SET NAMES UTF8");
?>