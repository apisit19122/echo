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
        // require 'bank_add.php';
        ?>

        <div class="content-wrapper">
            <!-- content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Payments</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Payments</li>
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
                                                    <th>Payment #ID</th>
                                                    <th>Credit</th>
                                                    <th>CreatedAt</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sql_payment = "SELECT * FROM payment AS t1 INNER JOIN `order` AS t2 ON (t1.orderID = `t2`.id) INNER JOIN `bank` AS t3 ON (t1.bankID = `t3`.id) INNER JOIN `payment_status` AS t4 ON (t1.payment_statusID = `t4`.id)";
                                                $query_payment = mysqli_query($conn, $sql_payment);
                                                while ($data_payment = mysqli_fetch_array($query_payment, MYSQLI_ASSOC)) {
                                                ?>
                                                    <tr>
                                                        <td style="text-align: center; width: 2%;"><?php echo $data_payment['id']; ?></td>
                                                        <td style="text-align: center; width: 5%;"><?php echo $data_payment['credit']; ?></td>
                                                        <td style="text-align: center; width: 5%;"><?php echo $data_payment['createdAt']; ?></td>



                                                        <td style="text-align: center; width: 5%;"><a href="/" data-toggle="modal" data-target="#view<?php echo $data_payment['id']; ?>">
                                                                <i style="font-size: 40px;" class="fas fa-eye"></i></a>
                                                        </td>

                                                        <!-- Model PaymentDetail -->
                                                        <div class="modal fade" id="view<?php echo $data_payment['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Detail <b>Payment #ID<?php echo $data_payment['id']; ?></b> </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <form action="" method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-4">

                                                                                    <?php
                                                                                    $img = $data_payment['img'];
                                                                                    if (!empty($img)) {
                                                                                        echo "<img src='$img' alt='' width='100%' >";
                                                                                    }
                                                                                    ?>

                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <input type="hidden" class="form-control" name="update_id" value="<?php echo $data_payment['id']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Credit</label>
                                                                                        <input type="text" class="form-control" name="update_credit" value="<?php echo $data_payment['credit']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Order</label>
                                                                                        <input type="text" class="form-control" name="update_orderID" value="<?php echo $data_payment['order_code']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Bank</label>
                                                                                        <input type="text" class="form-control" name="update_bankID" value="<?php echo $data_payment['namebank']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Paymentstatus</label>
                                                                                        <input type="text" class="form-control" name="update_payment_statusID" value="<?php echo $data_payment['status_name']; ?>">
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
                                                                            <a href="bank_delete.php?id=<?= $data_bank['id']; ?>" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>

                                                                            <button type="Submit" name="bank_update" class="btn btn-info"><i class="fas fa-edit"></i> Update</button>
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
                                                        $active = $_POST['exampleRadios'];
                                                        $id = $_POST['update_id'];

                                                        $uploaddir = 'img/money/';
                                                        $uploadfile = $uploaddir . basename($_FILES['update_img']['name']);

                                                        if (move_uploaded_file($_FILES['update_img']['tmp_name'], $uploadfile)) {

                                                            $photo = "img/money/" . $_FILES["update_img"]["name"];

                                                            $sql_updatabank = "UPDATE `bank` SET `name` ='$name', `namebank` ='$namebank', `account` ='$account', 
                                                          `promptpay` ='$promptpay', `active` = '$active', `photo` = '$photo', `updatedAt` = NOW()
                                                          WHERE `id` = '$id'";
                                                            mysqli_query($conn, $sql_updatabank) or die("อัพเดท ไม่ได้");

                                                            echo '
                                                            <script language="JavaScript">
                                                                swal({
                                                                    title: "Successfully",
                                                                    text: "Update bank list",
                                                                    icon: "success",
                                                                    button: false,
                                                                });
											                </script>';
                                                            echo '<meta http-equiv="refresh" content="2; url=mybank" />';
                                                        } else {
                                                            $sql_updatabank = "UPDATE `bank` SET `name` ='$name', `namebank` ='$namebank', `account` ='$account', 
                                                          `promptpay` ='$promptpay', `active` = '$active', `updatedAt` = NOW()
                                                          WHERE `id` = '$id'";
                                                            mysqli_query($conn, $sql_updatabank) or die("อัพเดท ไม่ได้1");

                                                            // echo "<script>";
                                                            // echo "alert('Update bank list successfully');";
                                                            // echo "window.location='mybank';";
                                                            // echo "</script>";
                                                            echo '
                                                            <script language="JavaScript">
                                                                swal({
                                                                    title: "Successfully",
                                                                    text: "Update bank list",
                                                                    icon: "success",
                                                                    button: false,
                                                                });
											                </script>';
                                                            echo '<meta http-equiv="refresh" content="2; url=mybank" />';
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