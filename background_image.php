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
                            <h1 class="m-0 text-dark">Background Image</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">BackgroundImage</li>
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
                                        $sql_background_image = "SELECT * FROM background_image";

                                        $query_background_image = mysqli_query($conn, $sql_background_image);
                                        while ($data_background_image = mysqli_fetch_array($query_background_image, MYSQLI_ASSOC)) {

                                        ?>
                                            <center>
                                                <div class="container">
                                                    <img src="<?php echo $data_background_image['img_name']; ?>" alt="img" width='60%'>
                                                    <p></p>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#view<?php echo $data_background_image['id']; ?>"><i class="fas fa-edit"></i> Change background image</button>
                                                </div>
                                            </center>


                                            <!-- Model PaymentDetail -->
                                            <div class="modal fade" id="view<?php echo $data_background_image['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Change background image </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">

                                                                        <div class="form-group">
                                                                            <label for="exampleInputFile">Image File</label>
                                                                            <div class="input-group">
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="backgroundimage" class="custom-file-input" id="exampleInputFile">
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
                                                                <button type="Submit" name="bpayM_update" class="btn btn-info"><i class="fas fa-edit"></i> Update</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Model PaymentDetail -->

                                        <?php
                                            if (isset($_POST['bpayM_update'])) {
                                                $id = $data_background_image['id'];

                                                $uploaddir = 'img/bg_img/';
                                                $uploadfile = $uploaddir . basename($_FILES['backgroundimage']['name']);

                                                if (move_uploaded_file($_FILES['backgroundimage']['tmp_name'], $uploadfile)) {

                                                    $backgroundimage = "img/bg_img/" . $_FILES["backgroundimage"]["name"];

                                                    $sql_backgroundimage = "UPDATE `background_image` SET `img_name` ='$backgroundimage', `updatedAt` = NOW() WHERE `id` = '$id'";
                                                    mysqli_query($conn, $sql_backgroundimage) or die("Background_Image อัพเดทไม่ได้");

                                                    echo '
                                                            <script language="JavaScript">
                                                                swal({
                                                                    title: "Successfully",
                                                                    text: "Update backgroundimage",
                                                                    icon: "success",
                                                                    button: false,
                                                                });
											                </script>';
                                                    echo '<meta http-equiv="refresh" content="1; url=background_image.php" />';
                                                }
                                            }
                                        } //end while
                                        mysqli_close($conn);
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