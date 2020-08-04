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
                            <h1 class="m-0 text-dark">Information</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Information</li>
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
                                        $sql_information = "SELECT * FROM company_information";

                                        $query_information = mysqli_query($conn, $sql_information);
                                        while ($row = mysqli_fetch_array($query_information, MYSQLI_ASSOC)) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $name_company = $row['name_company'];
                                            $about = $row['about'];
                                            $vision = $row['vision'];
                                            $history = $row['history'];
                                            $mision = $row['mision'];
                                            $img_promote = $row['img_promote'];
                                            $logo_icon = $row['logo_icon'];
                                            $logo = $row['logo'];
                                            $img_factory = $row['img_factory'];
                                            $img_production = $row['img_production'];
                                            $img_map = $row['img_map'];

                                        ?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="container">
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Company</label>
                                                        <input type="text" class="form-control" name="name_company" value="<?php echo $name_company; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">About</label>
                                                        <input type="text" class="form-control" name="about" value="<?php echo $about; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Vision</label>
                                                        <input type="text" class="form-control" name="vision" value="<?php echo $vision; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">History</label>
                                                        <!-- <input type="text" class="form-control" > -->
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="history" value=""><?php echo $history; ?></textarea>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="Submit" name="btn_update" class="btn btn-info"><i class="fas fa-edit"></i> Update</button>
                                                    </div>
                                                    <hr>

                                                    <div class="form-group" style="text-align: center;">
                                                        <h1>Changes Image</h1>
                                                        <img src="<?php echo $img_promote; ?>" data-toggle="modal" data-target="#img_promote" alt="img_promote" width="15%">
                                                        <img src="<?php echo $logo_icon; ?>" data-toggle="modal" data-target="#logo_icon" alt="logo_icon" width="15%">
                                                        <img src="<?php echo $logo; ?>" data-toggle="modal" data-target="#logo" alt="logo" width="15%">
                                                        <img src="<?php echo $img_factory; ?>" data-toggle="modal" data-target="#img_factory" alt="img_factory" width="15%">
                                                        <img src="<?php echo $img_production; ?>" data-toggle="modal" data-target="#img_production" alt="img_production" width="15%">
                                                        <img src="<?php echo $img_map; ?>" data-toggle="modal" data-target="#img_map" alt="img_map" width="15%">
                                                        <p style="color: red;">* คลิกที่รูป เพื่อแก้ไข</p>
                                                    </div>
                                                </div>
                                            </form>

                                            <?php
                                            if (isset($_POST['btn_update'])) {

                                                $update_name = $_POST['name'];
                                                $update_name_company = $_POST['name_company'];
                                                $update_about = $_POST['about'];
                                                $update_vision = $_POST['vision'];
                                                $update_history = $_POST['history'];


                                                $sql = "UPDATE `company_information` SET `name` ='$update_name', `name_company` ='$update_name_company', `about` ='$update_about', `vision` ='$update_vision', `history` ='$update_history', `updatedAt` = NOW() WHERE `id` = '$id'";
                                                mysqli_query($conn, $sql) or die("Information อัพเดทไม่ได้");

                                                echo '
                                                    <script language="JavaScript">
                                                        swal({
                                                            title: "Successfully",
                                                            text: "Update Information",
                                                            icon: "success",
                                                            button: false,
                                                        });
                                                    </script>';
                                                echo '<meta http-equiv="refresh" content="1; url=companyinformation.php" />';
                                            }
                                            ?>

                                            <!-- Modal img_promote -->
                                            <div class="modal fade" id="img_promote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">img_promote</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="text-align: center;">
                                                            <img src="<?php echo $img_promote; ?>" alt="img_promote" width="60%">
                                                            <hr>
                                                            <form action="update_inform.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">Example file input</label>
                                                                    <input type="file" class="form-control-file" name="img_promote" id="exampleFormControlFile1">
                                                                </div>
                                                                <button type="Submit" name="btn_img_promote" class="btn btn-info"><i class="fas fa-edit"></i> Save changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal logo_icon -->
                                            <div class="modal fade" id="logo_icon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">logo_icon</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="text-align: center;">
                                                            <img src="<?php echo $logo_icon; ?>" alt="logo_icon" width="60%">
                                                            <hr>
                                                            <form action="update_inform.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">Example file input</label>
                                                                    <input type="file" class="form-control-file" name="logo_icon" id="exampleFormControlFile1">
                                                                </div>
                                                                <button type="Submit" name="btn_logo_icon" class="btn btn-info"><i class="fas fa-edit"></i> Save changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal logo -->
                                            <div class="modal fade" id="logo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">logo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="text-align: center;">
                                                            <img src="<?php echo $logo; ?>" alt="logo" width="60%">
                                                            <hr>
                                                            <form action="update_inform.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">Example file input</label>
                                                                    <input type="file" class="form-control-file" name="logo" id="exampleFormControlFile1">
                                                                </div>
                                                                <button type="Submit" name="btn_logo" class="btn btn-info"><i class="fas fa-edit"></i> Save changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal img_factory -->
                                            <div class="modal fade" id="img_factory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">img_factory</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="text-align: center;">
                                                            <img src="<?php echo $img_factory; ?>" alt="img_factory" width="60%">
                                                            <hr>
                                                            <form action="update_inform.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">Example file input</label>
                                                                    <input type="file" class="form-control-file" name="img_factory" id="exampleFormControlFile1">
                                                                </div>
                                                                <button type="Submit" name="btn_img_factory" class="btn btn-info"><i class="fas fa-edit"></i> Save changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal img_production -->
                                            <div class="modal fade" id="img_production" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">img_production</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="text-align: center;">
                                                            <img src="<?php echo $img_production; ?>" alt="img_production" width="60%">
                                                            <hr>
                                                            <form action="update_inform.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">Example file input</label>
                                                                    <input type="file" class="form-control-file" name="img_production" id="exampleFormControlFile1">
                                                                </div>
                                                                <button type="Submit" name="btn_img_production" class="btn btn-info"><i class="fas fa-edit"></i> Save changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal img_map -->
                                            <div class="modal fade" id="img_map" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">img_map</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="text-align: center;">
                                                            <img src="<?php echo $img_map; ?>" alt="img_map" width="60%">
                                                            <hr>
                                                            <form action="update_inform.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">Example file input</label>
                                                                    <input type="file" class="form-control-file" name="img_map" id="exampleFormControlFile1">
                                                                </div>
                                                                <button type="Submit" name="btn_img_map" class="btn btn-info"><i class="fas fa-edit"></i> Save changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

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