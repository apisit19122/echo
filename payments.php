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
                                        <!-- <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i> Add</button> -->

                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th>Payment #ID</th>
                                                    <th>Paytotal</th>
                                                    <th>CreatedAt</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sql_payment = "SELECT
                                                t1.id,
                                                t1.createdAt AS ONE,
                                                t1.paytotal,
                                                t1.img,
                                                t1.date1,
                                                t1.time1,
                                                t1.orderID,
                                                t1.bankID,
                                                t1.payment_statusID,
                                                t2.runnumber,
                                                t2.createdAt AS createdAtOrder,
                                                t3.namebank,
                                                t4.status_name
                                                FROM
                                                    (
                                                    SELECT
                                                        id AS o_id,
                                                        runnumber,
                                                        createdAt
                                                    FROM
                                                        `order`
                                                ) AS t2
                                                INNER JOIN payment AS t1 ON t2.o_id = t1.orderID
                                                INNER JOIN bank AS t3 ON t3.id = t1.bankID
                                                INNER JOIN payment_status AS t4 ON t4.id = t1.payment_statusID";

                                                $query_payment = mysqli_query($conn, $sql_payment);
                                                while ($data_payment = mysqli_fetch_array($query_payment, MYSQLI_ASSOC)) {

                                                    $statusid = $data_payment['payment_statusID'];
                                                ?>
                                                    <tr>
                                                        <td style="text-align: center; width: 2%;"><?php echo $data_payment['id']; ?></td>
                                                        <td style="text-align: center; width: 5%;"><?php echo $data_payment['paytotal']; ?></td>
                                                        <td style="text-align: center; width: 5%;"><?php echo $data_payment['ONE']; ?></td>

                                                        <td style="text-align: center; width: 5%;">
                                                            <span class="<?php if ($statusid == 1) {
                                                                                echo 'badge badge-secondary';
                                                                            } else if ($statusid == 2) {
                                                                                echo 'badge badge-warning';
                                                                            } else if ($statusid == 3) {
                                                                                echo 'badge badge-success';
                                                                            } ?>
                                                                            ">
                                                                <?php echo $data_payment['status_name']; ?>
                                                            </span>
                                                        </td>

                                                        <td style="text-align: center; width: 5%;"><a href="/" data-toggle="modal" data-target="#view<?php echo $data_payment['id']; ?>">
                                                                <i style="font-size: 40px;" class="fas fa-eye"></i></a>
                                                        </td>

                                                        <!-- Model PaymentDetail -->
                                                        <div class="modal fade" id="view<?php echo $data_payment['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Detail <b>Payment #ID<?php echo $data_payment['id']; ?></b> | Date: <?php echo $data_payment['createdAtOrder']; ?> </h5>
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
                                                                                        <label for="">PayTotal</label>
                                                                                        <input type="text" class="form-control" name="update_paytotal" value="<?php echo $data_payment['paytotal']; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Order</label>
                                                                                        <input type="text" class="form-control" name="update_orderID" value="<?php echo $data_payment['runnumber']; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Bank</label>
                                                                                        <input type="text" class="form-control" name="update_bankID" value="<?php echo $data_payment['namebank']; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Data / Time</label>
                                                                                        <input type="text" class="form-control" name="update_bankID" value="<?php echo $data_payment['date1'];?> | <?php echo $data_payment['time1']; ?>" readonly>
                                                                                    </div>
                                                                                    <label for="">Status</label>
                                                                                    <?php
                                                                                    $status_payM = $data_payment['payment_statusID'];
                                                                                    if ($status_payM == 1) {
                                                                                        echo '
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1" checked>
                                                                                            <label class="form-check-label" for="exampleRadios1">
                                                                                            รอชำระเงิน
                                                                                            </label>
                                                                                        </div>';
                                                                                        echo '
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="2" >
                                                                                            <label class="form-check-label" for="exampleRadios2">
                                                                                            อยู่ระหว่างการดำเนินงาน
                                                                                            </label>
                                                                                        </div>';
                                                                                        echo '
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="3">
                                                                                            <label class="form-check-label" for="exampleRadios3">
                                                                                            จัดส่งสินค้าแล้ว
                                                                                            </label>
                                                                                        </div>';
                                                                                    } else if ($status_payM == 2) {
                                                                                        echo '
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1" >
                                                                                            <label class="form-check-label" for="exampleRadios1">
                                                                                            รอชำระเงิน
                                                                                            </label>
                                                                                        </div>';
                                                                                        echo '
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="2" checked>
                                                                                            <label class="form-check-label" for="exampleRadios2">
                                                                                            อยู่ระหว่างการดำเนินงาน
                                                                                            </label>
                                                                                        </div>';
                                                                                        echo '
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="3">
                                                                                            <label class="form-check-label" for="exampleRadios3">
                                                                                            จัดส่งสินค้าแล้ว
                                                                                            </label>
                                                                                        </div>';
                                                                                    } else if ($status_payM == 3) {
                                                                                        echo '
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1" >
                                                                                            <label class="form-check-label" for="exampleRadios1">
                                                                                            รอชำระเงิน
                                                                                            </label>
                                                                                        </div>';
                                                                                        echo '
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="2" >
                                                                                            <label class="form-check-label" for="exampleRadios2">
                                                                                            อยู่ระหว่างการดำเนินงาน
                                                                                            </label>
                                                                                        </div>';
                                                                                        echo '
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="3" checked>
                                                                                            <label class="form-check-label" for="exampleRadios3">
                                                                                            จัดส่งสินค้าแล้ว
                                                                                            </label>
                                                                                        </div>';
                                                                                    }
                                                                                    ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a href="payM_delete.php?id=<?= $data_payment['id']; ?>" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>

                                                                            <button type="Submit" name="bpayM_update" class="btn btn-info"><i class="fas fa-edit"></i> Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Model PaymentDetail -->
                                                    </tr>
                                                <?php
                                                    if (isset($_POST['bpayM_update'])) {
                                                        //form add_pd
                                                        $credit = $_POST['update_credit'];
                                                        $orderID = $_POST['update_orderID'];
                                                        $bankID = $_POST['update_bankID'];
                                                        $id = $_POST['update_id'];
                                                        $payment_statusID = $_POST['exampleRadios'];

                                                        $sql_updatapayment = "UPDATE `payment` SET `payment_statusID` ='$payment_statusID', `updatedAt` = NOW() WHERE `id` = '$id'";
                                                        mysqli_query($conn, $sql_updatapayment) or die("payment อัพเดทไม่ได้");

                                                        echo '
                                                            <script language="JavaScript">
                                                                swal({
                                                                    title: "Successfully",
                                                                    text: "Update Payment list",
                                                                    icon: "success",
                                                                    button: false,
                                                                });
											                </script>';
                                                        echo '<meta http-equiv="refresh" content="1; url=payments.php" />';
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