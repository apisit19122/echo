
<meta charset="utf-8">

<?php
require_once("config/connect.config.php");
?>
<?php

$getid = $_GET['id'];
if (isset($_GET['id'])) {

    $sql = "delete from payment where id='" . $_GET['id'] . "'";
    mysqli_query($conn, $sql) or die("ลบข้อมูลไม่สำเร็จ");

    echo "<script>";
    echo "alert('Delete payment list successfully');";
    echo "window.location='payment'";
    echo "</script>";
}

?>