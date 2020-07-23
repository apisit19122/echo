<?php
require_once("config/connect.config.php");
// @error_reporting(E_ALL ^ E_NOTICE);

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Echo</title>
    <?php require 'link.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <?php
        require 'navbar.php'; //Navbar
        require 'sidebar.php'; //sidebar
        require 'bank_add.php';
        ?>

        <div class="content-wrapper">
            <!-- content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">My Bank</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">MyBank</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content-header -->
            <section class="content">
                <div class="row">
                    <section class="col-lg-12 connectedSortable">
                        <!-- table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="card-title" style="font-size: 2rem;">List</h1>
                                        <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i> Add</button>

                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th>Bank #ID</th>
                                                    <th>Photo</th>
                                                    <th>NameBank</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sql_bank = "SELECT * FROM bank";
                                                $query_bank = mysqli_query($conn, $sql_bank);
                                                while ($data_bank = mysqli_fetch_array($query_bank, MYSQLI_ASSOC)) {
                                                ?>
                                                    <tr>
                                                        <td style="text-align: center; width: 2%;"><?php echo $data_bank['id']; ?></td>
                                                        <td style="text-align: center; width: 15%;"><img src="<?php echo $data_bank['photo']; ?>" width="100px" height="90px" alt=""></td>
                                                        <td style="text-align: center; width: 5%;"><?php echo $data_bank['namebank']; ?></td>


                                                        <td style="text-align: center; width: 5%;"><a href="/" data-toggle="modal" data-target="#view<?php echo $data_bank['id']; ?>">
                                                                <i style="font-size: 40px;" class="fas fa-eye"></i></a>
                                                        </td>

                                                        <!-- Model BankDetail -->
                                                        <div class="modal fade" id="view<?php echo $data_bank['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Detail <b>Bank #ID<?php echo $data_bank['id']; ?></b> </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <form action="" method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-4">

                                                                                    <?php
                                                                                    $photo = $data_bank['photo'];
                                                                                    if (!empty($photo)) {
                                                                                        echo "<img src='$photo' alt='' width='100%' >";
                                                                                    }
                                                                                    ?>

                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <input type="hidden" class="form-control" name="update_id" value="<?php echo $data_bank['id']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Name</label>
                                                                                        <input type="text" class="form-control" name="update_name" value="<?php echo $data_bank['name']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">NameBank</label>
                                                                                        <input type="text" class="form-control" name="update_namebank" value="<?php echo $data_bank['namebank']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Account</label>
                                                                                        <input type="text" class="form-control" name="update_account" value="<?php echo $data_bank['account']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Promptpay</label>
                                                                                        <input type="text" class="form-control" name="update_promptpay" value="<?php echo $data_bank['promptpay']; ?>">
                                                                                    </div>


                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputFile">Bank Image File</label>
                                                                                        <div class="input-group">
                                                                                            <div class="custom-file">
                                                                                                <input type="file" name="update_img" class="custom-file-input" id="exampleInputFile">
                                                                                                <label class="custom-file-label" for="exampleInputFile">Choose Imagefile</label>
                                                                                            </div>
                                                                                            <div class="input-group-append">
                                                                                                <span class="input-group-text" id="">Upload</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a href="bank_delete.php?id=<?= $data_bank['id']; ?>" type="button" class="btn btn-danger">Delete</a>

                                                                            <button type="Submit" name="bank_update" class="btn btn-info">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Model BankDetail -->

                                                    </tr>
                                                <?php


                                                    if (isset($_POST['bank_update'])) {
                                                        //form add_pd
                                                        $name = $_POST['update_name'];
                                                        $namebank = $_POST['update_namebank'];
                                                        $account = $_POST['update_account'];
                                                        $promptpay = $_POST['update_promptpay'];
                                                        $id = $_POST['update_id'];

                                                        $uploaddir = 'img/money/';
                                                        $uploadfile = $uploaddir . basename($_FILES['update_img']['name']);

                                                        if (move_uploaded_file($_FILES['update_img']['tmp_name'], $uploadfile)) {

                                                            $photo = "img/money/" . $_FILES["update_img"]["name"];

                                                            $sql_updatabank = "UPDATE `bank` SET `name` ='$name', `namebank` ='$namebank', `account` ='$account', 
                                                          `promptpay` ='$promptpay', `photo` = '$photo', `updatedAt` = NOW()
                                                          WHERE `id` = '$id'";
                                                            mysqli_query($conn, $sql_updatabank) or die("อัพเดท ไม่ได้");

                                                            echo "<script>";
                                                            echo "alert('Update product successfully');";
                                                            echo "window.location='product';";
                                                            echo "</script>";
                                                        } else {
                                                            $sql_updatabank = "UPDATE `bank` SET `name` ='$name', `namebank` ='$namebank', `account` ='$account', 
                                                          `promptpay` ='$promptpay', `updatedAt` = NOW()
                                                          WHERE `id` = '$id'";
                                                            mysqli_query($conn, $sql_updatabank) or die("อัพเดท ไม่ได้1");

                                                            echo "<script>";
                                                            echo "alert('Update bank list successfully');";
                                                            echo "window.location='mybank';";
                                                            echo "</script>";
                                                        }
                                                    }
                                                } //end while
                                                mysqli_close($conn);
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /table -->
                    </section>
                </div>
            </section>
        </div>

        <?php require_once 'footer.php';  //footer 
        ?>

    </div>

    <?php require_once 'script.php'; // script
    ?>

</body>

</html>