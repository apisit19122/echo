<meta charset="utf-8">
<?php

// Connect mysqli
$host = "localhost"; 
$user = "root";
$pwd = ""; 
$db = "echo"; 
$conn = mysqli_connect($host, $user, $pwd) or die("เชื่อมต่อฐานข้อมูลไม่ได้");
mysqli_query($conn, "use $db") or die("กรุณาตรวจสอบ Host User Password และ NameDataBase อีกครั้ง!");
mysqli_query($conn, "SET NAMES UTF8");

// // Connect PDO
// $servername = "localhost";
// $username = "root";
// $password = "";
// $pdo = new PDO("mysql:host=$servername;dbname=echo", $username, $password);
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>