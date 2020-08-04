<?php
require 'config/connect.config.php';
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if(!empty($_FILES['img_promote'])){
        $uploaddir = 'img/logo_/';
        $uploadfile = $uploaddir . basename($_FILES['img_promote']['name']);

        if (move_uploaded_file($_FILES['img_promote']['tmp_name'], $uploadfile)) {
            $photo = "img/logo_/" . $_FILES["img_promote"]["name"];

            $sql = "UPDATE `company_information` SET `img_promote` ='$photo', `updatedAt` = NOW() WHERE `id` = '$id'";
            mysqli_query($conn, $sql) or die("img_promote อัพเดทไม่ได้");

            echo "<script>";
            echo "alert('Update Information list successfully');";
            echo "window.location='information';";
            echo "</script>";
        }

    } elseif (!empty($_FILES['logo_icon'])) {
        $uploaddir = 'img/logo_/';
        $uploadfile = $uploaddir . basename($_FILES['logo_icon']['name']);

        if (move_uploaded_file($_FILES['logo_icon']['tmp_name'], $uploadfile)) {
            $photo = "img/logo_/" . $_FILES["logo_icon"]["name"];

            $sql = "UPDATE `company_information` SET `logo_icon` ='$photo', `updatedAt` = NOW() WHERE `id` = '$id'";
            mysqli_query($conn, $sql) or die("logo_icon อัพเดทไม่ได้");

            echo "<script>";
            echo "alert('Update Information list successfully');";
            echo "window.location='information';";
            echo "</script>";
        }
    }
}
else {
    echo "<script>";
    echo "alert('Update Information list Error');";
    echo "window.location='information';";
    echo "</script>";
}
?>