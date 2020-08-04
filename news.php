<?php
require_once("config/connect.config.php");

// @error_reporting(E_ALL ^ E_NOTICE);

function table()
{
    echo '';
}
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
        require 'product_add.php';
        ?>

        <div class="content-wrapper">
            <!-- content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">News</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">News</li>

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
                                                    <th>News #ID</th>
                                                    <th>Image</th>
                                                    <th>Category</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sql_news = "SELECT * FROM news";
                                                $query_news = mysqli_query($conn, $sql_news);
                                                while ($row = mysqli_fetch_array($query_news, MYSQLI_ASSOC)) {
                                                ?>
                                                    <tr>
                                                        <td style="text-align: center; width: 20%;"><?php echo $row['topic']; ?></td>
                                                        <td style="text-align: center; width: 15%;"><img src="<?php echo $row['img']; ?>" width="100px" height="90px" alt=""></td>
                                                        <td style="text-align: center; width: 20%;"><?php echo $row['status']; ?></td>

                                                        <td style="text-align: center; width: 5%;"><a href="/" data-toggle="modal" data-target="#view<?php echo $row['id']; ?>"><i style="font-size: 40px;" class="fas fa-eye"></i></a></td>

                                                        <!-- Model ProductDetail -->
                                                        <div class="modal fade" id="view<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <form action="" method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-4">

                                                                                    <?php
                                                                                    $photo = $data_product['photo'];
                                                                                    if (!empty($photo)) {
                                                                                        echo "<img src='$photo' alt='' width='100%' >";
                                                                                    }
                                                                                    ?>

                                                                                    <?php
                                                                                    $photo1 = $data_product['photo1'];
                                                                                    if (!empty($photo1)) {
                                                                                        echo "<img src='$photo1' alt='' width='100%' >";
                                                                                    }
                                                                                    ?>

                                                                                    <?php
                                                                                    $photo2 = $data_product['photo2'];
                                                                                    if (!empty($photo2)) {
                                                                                        echo "<img src='$photo2' alt='' width='100%' >";
                                                                                    }
                                                                                    ?>

                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <input type="hidden" class="form-control" name="update_id" value="<?php echo $data_product['id']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Product #ID</label>
                                                                                        <input type="text" class="form-control" name="update_productid" value="<?php echo $data_product['product_id']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Product Name</label>
                                                                                        <input type="text" class="form-control" name="update_name" value="<?php echo $data_product['name']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Product Detail</label>
                                                                                        <input type="text" class="form-control" name="update_detail" value="<?php echo $data_product['detail']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Product Price</label>
                                                                                        <input type="text" class="form-control" name="update_price" value="<?php echo $data_product['price']; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Product Stock</label>
                                                                                        <input type="text" class="form-control" name="update_stock" value="<?php echo $data_product['stock']; ?>">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputFile">Product Image File</label>
                                                                                        <div class="input-group">
                                                                                            <div class="custom-file">
                                                                                                <input type="file" name="update_img" class="custom-file-input" id="exampleInputFile">
                                                                                                <label class="custom-file-label" for="exampleInputFile">Choose Imagefile</label>
                                                                                            </div>
                                                                                            <div class="input-group-append">
                                                                                                <span class="input-group-text" id="">Upload</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <p style="color: red;">* ภาพหลัก</p>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a href="product_delete.php?id=<?= $data_product['id']; ?>" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>

                                                                            <button type="Submit" name="product_update" class="btn btn-info"><i class="fas fa-edit"></i> Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Model ProductDetail -->

                                                    </tr>
                                                <?php


                                                    if (isset($_POST['product_update'])) {
                                                        //form add_pd
                                                        $product_id = $_POST['update_productid'];
                                                        $name = $_POST['update_name'];
                                                        $detail = $_POST['update_detail'];
                                                        $price = $_POST['update_price'];
                                                        $stock = $_POST['update_stock'];
                                                        $id = $_POST['update_id'];

                                                        $uploaddir = 'img/product';
                                                        $uploadfile = $uploaddir . basename($_FILES['update_img']['name']);

                                                        if (move_uploaded_file($_FILES['update_img']['tmp_name'], $uploadfile)) {

                                                            $photo = "img/product" . $_FILES["update_img"]["name"];

                                                            $sql_updataproduct = "UPDATE `product` SET `product_id` ='$product_id', `name` ='$name', `price` ='$price', 
                                                          `detail` ='$detail', `stock` ='$stock', `photo` = '$photo', `updatedAt` = NOW()
                                                          WHERE `id` = '$id'";
                                                            mysqli_query($conn, $sql_updataproduct) or die("อัพเดท ไม่ได้");

                                                            echo '
                                                            <script language="JavaScript">
                                                                swal({
                                                                    title: "Successfully",
                                                                    text: "Update product list",
                                                                    icon: "success",
                                                                    button: false,
                                                                });
                                                            </script>';
                                                            echo '<meta http-equiv="refresh" content="2; url=product" />';
                                                        } else {
                                                            $sql_updataproduct = "UPDATE `product` SET `product_id` ='$product_id', `name` ='$name', `price` ='$price', 
                                                          `detail` ='$detail', `stock` ='$stock', `updatedAt` = NOW()
                                                          WHERE `id` = '$id'";
                                                            mysqli_query($conn, $sql_updataproduct) or die("อัพเดท ไม่ได้1");
                                                            // echo "<script>";
                                                            // echo "alert('Update product list successfully');";
                                                            // echo "window.location='product';";
                                                            // echo "</script>";
                                                            echo '
                                                            <script language="JavaScript">
                                                                swal({
                                                                    title: "Successfully",
                                                                    text: "Update product list",
                                                                    icon: "success",
                                                                    button: false,
                                                                });
                                                            </script>';
                                                            echo '<meta http-equiv="refresh" content="2; url=product" />';
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