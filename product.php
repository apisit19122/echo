<?php
require_once("config/connect.config.php");

<<<<<<< HEAD
// @error_reporting(E_ALL ^ E_NOTICE);

=======
>>>>>>> ddb1e72d320c8872061007d916abf5d3a13368ff
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
<<<<<<< HEAD
        require 'product_add.php';
=======
>>>>>>> ddb1e72d320c8872061007d916abf5d3a13368ff
        ?>

        <div class="content-wrapper">
            <!-- content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Product</li>
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
<<<<<<< HEAD
                                        <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i> Add</button>
                                        
=======
                                        <button type="button" class="btn btn-primary" style="float: right;"><i class="fas fa-plus-circle"></i> Add</button>
>>>>>>> ddb1e72d320c8872061007d916abf5d3a13368ff
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th>Product #ID</th>
                                                    <th>img</th>
                                                    <th>Name</th>
                                                    <th>Stock</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sql_product = "SELECT * FROM product";
                                                $query_product = mysqli_query($conn, $sql_product);
                                                while ($data_product = mysqli_fetch_array($query_product, MYSQLI_ASSOC)) {
                                                ?>
                                                    <tr>
                                                        <td style="text-align: center; width: 20%;"><?php echo $data_product['product_id']; ?></td>
                                                        <td style="text-align: center; width: 15%;"><img src="<?php echo $data_product['photo']; ?>" width="100px" height="90px" alt=""></td>
                                                        <td style="text-align: center; width: 20%;"><?php echo $data_product['name']; ?></td>
                                                        <td style="text-align: right; width: 5%"><?php echo $data_product['stock']; ?></td>
                                                        <td style="text-align: center; width: 5%;"><a href="/" data-toggle="modal" data-target="#view<?php echo $data_product['id']; ?>"><i class="fas fa-eye"></i></a></td>

                                                        <!-- Model ProductDetail -->
                                                        <div class="modal fade" id="view<?php echo $data_product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <img src="<?php echo $data_product['photo']; ?>" alt="" width="100%">
                                                                            </div>
                                                                            <div class="col">
                                                                                <h2><?php echo $data_product['name']; ?></h2>
                                                                                <hr>
                                                                                <p><?php echo $data_product['detail']; ?></p>
                                                                                <h3>Price <?php echo $data_product['price']; ?>฿</h3>
<<<<<<< HEAD
                                                                                <?php 
                                                                                $active = $data_product['active'];
                                                                                if($active == 0){
                                                                                    echo '<span class="badge badge-pill badge-secondary">ยังไม่อนุมัติ</span>';
                                                                                }else{
                                                                                    echo '<span class="badge badge-pill badge-success">อนุมัติแล้ว</span>';
                                                                                }
                                                                                ?>
=======
>>>>>>> ddb1e72d320c8872061007d916abf5d3a13368ff
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="product_delete.php?id=<?= $data_product['id']; ?>" type="button" class="btn btn-danger">Delete</a>

                                                                        <button type="button" class="btn btn-info">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Model ProductDetail -->

                                                    </tr>
                                                <?php
                                                }
                                                mysqli_close($conn);
<<<<<<< HEAD
                                                
=======
>>>>>>> ddb1e72d320c8872061007d916abf5d3a13368ff
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

<<<<<<< HEAD
=======



<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <img src="./img/product/p1.png" alt="" width="100%">
                    </div>
                    <div class="col">
                        <h2>Product Name</h2><hr>
                        <p>Detailasdasdasfoijsdgfhfspiogjgfpiohjdfjgfdjfpighjiop</p>
                        <h3>Price 100.00฿</h3>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->
>>>>>>> ddb1e72d320c8872061007d916abf5d3a13368ff
