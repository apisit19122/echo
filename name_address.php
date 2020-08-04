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
                            <h1 class="m-0 text-dark">Name website</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Name website</li>
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
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <?php
                                        $sql_namewebsite = "SELECT * FROM namewebsite";

                                        $query_namewebsite = mysqli_query($conn, $sql_namewebsite);
                                        while ($row = mysqli_fetch_array($query_namewebsite, MYSQLI_ASSOC)) {
                                            $id = $row['nw_id'];
                                            $nw_name = $row['nw_name'];
                                            $address = $row['address'];
                                            $email = $row['email'];
                                            $tel = $row['tel'];

                                        ?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="container">
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" class="form-control" name="update_name" value="<?php echo $nw_name; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Address</label>
                                                        <input type="text" class="form-control" name="update_address" value="<?php echo $address; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="text" class="form-control" name="update_email" value="<?php echo $email; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tel</label>
                                                        <input type="text" class="form-control" name="update_tel" value="<?php echo $tel; ?>">
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="Submit" name="btn_update" class="btn btn-info"><i class="fas fa-edit"></i> Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php } ?>

                                        <?php
                                        if (isset($_POST['btn_update'])) {
                                            
                                            $update_name = $_POST['update_name'];
                                            $update_address = $_POST['update_address'];
                                            $update_email = $_POST['update_email'];
                                            $update_tel = $_POST['update_tel'];


                                                $sql_namewebsite = "UPDATE `namewebsite` SET `nw_name` ='$update_name', `address` ='$update_address', `email` ='$update_email', `tel` ='$update_tel', `updatedAt` = NOW() WHERE `nw_id` = '$id'";
                                                mysqli_query($conn, $sql_namewebsite) or die("Namewebsite อัพเดทไม่ได้");

                                                echo '
                                                    <script language="JavaScript">
                                                        swal({
                                                            title: "Successfully",
                                                            text: "Update Namewebsite",
                                                            icon: "success",
                                                            button: false,
                                                        });
                                                    </script>';
                                                echo '<meta http-equiv="refresh" content="1; url=name_address.php" />';
                                            
                                        }
                                        ?>

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