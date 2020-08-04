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
            echo "window.location='companyinformation.php';";
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
            echo "window.location='companyinformation.php';";
            echo "</script>";
        }
    } elseif (!empty($_FILES['logo'])) {
        $uploaddir = 'img/logo_/';
        $uploadfile = $uploaddir . basename($_FILES['logo']['name']);

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile)) {
            $photo = "img/logo_/" . $_FILES["logo"]["name"];

            $sql = "UPDATE `company_information` SET `logo` ='$photo', `updatedAt` = NOW() WHERE `id` = '$id'";
            mysqli_query($conn, $sql) or die("logo อัพเดทไม่ได้");

            echo "<script>";
            echo "alert('Update Information list successfully');";
            echo "window.location='companyinformation.php';";
            echo "</script>";
        }
    } elseif (!empty($_FILES['img_factory'])) {
        $uploaddir = 'img/logo_/';
        $uploadfile = $uploaddir . basename($_FILES['img_factory']['name']);

        if (move_uploaded_file($_FILES['img_factory']['tmp_name'], $uploadfile)) {
            $photo = "img/logo_/" . $_FILES["img_factory"]["name"];

            $sql = "UPDATE `company_information` SET `img_factory` ='$photo', `updatedAt` = NOW() WHERE `id` = '$id'";
            mysqli_query($conn, $sql) or die("img_factory อัพเดทไม่ได้");

            echo "<script>";
            echo "alert('Update Information list successfully');";
            echo "window.location='companyinformation.php';";
            echo "</script>";
        }
    } elseif (!empty($_FILES['img_production'])) {
        $uploaddir = 'img/logo_/';
        $uploadfile = $uploaddir . basename($_FILES['img_production']['name']);

        if (move_uploaded_file($_FILES['img_production']['tmp_name'], $uploadfile)) {
            $photo = "img/logo_/" . $_FILES["img_production"]["name"];

            $sql = "UPDATE `company_information` SET `img_production` ='$photo', `updatedAt` = NOW() WHERE `id` = '$id'";
            mysqli_query($conn, $sql) or die("img_production อัพเดทไม่ได้");

            echo "<script>";
            echo "alert('Update Information list successfully');";
            echo "window.location='companyinformation.php';";
            echo "</script>";
        }
    } elseif (!empty($_FILES['img_map'])) {
        $uploaddir = 'img/logo_/';
        $uploadfile = $uploaddir . basename($_FILES['img_map']['name']);

        if (move_uploaded_file($_FILES['img_map']['tmp_name'], $uploadfile)) {
            $photo = "img/logo_/" . $_FILES["img_map"]["name"];

            $sql = "UPDATE `company_information` SET `img_map` ='$photo', `updatedAt` = NOW() WHERE `id` = '$id'";
            mysqli_query($conn, $sql) or die("img_map อัพเดทไม่ได้");

            echo "<script>";
            echo "alert('Update Information list successfully');";
            echo "window.location='companyinformation.php';";
            echo "</script>";
        }
    }

    
}
else {
    echo "<script>";
    echo "alert('Update Information list Error');";
    echo "window.location='companyinformation.php';";
    echo "</script>";
}
?>