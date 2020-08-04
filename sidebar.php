<?php
// Product Count
$sql_productcount = "select count(*) as productcount from product ";
$result_productcount = mysqli_query($conn, $sql_productcount);
$data_productcount = mysqli_fetch_assoc($result_productcount);
// Mybank Count
$sql_mybankcount = "select count(*) as mybankcount from bank ";
$result_mybankcount = mysqli_query($conn, $sql_mybankcount);
$data_mybankcount = mysqli_fetch_assoc($result_mybankcount);
// Payment Count
$sql_paymentcount = "select count(*) as paymentcount from payment ";
$result_paymentcount = mysqli_query($conn, $sql_paymentcount);
$data_paymentcount = mysqli_fetch_assoc($result_paymentcount);

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Echo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="home" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Overview
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"><?php echo $data_productcount['productcount']; ?></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="product" class="nav-link">
                                <i class="nav-icon fas fa-angle-right"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="pages/product.php" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Orders
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">0</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="orders" class="nav-link">
                                <i class="nav-icon fas fa-angle-right"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="pages/product.php" class="nav-link">
                        <i class="nav-icon far fa-credit-card"></i>
                        <p>
                            Payments
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="mybank" class="nav-link">
                                <i class="nav-icon fas fa-angle-right"></i>
                                <p>
                                    My Bank
                                    <span class="badge badge-info right"><?php echo $data_mybankcount['mybankcount']; ?></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="payment" class="nav-link">
                                <i class="nav-icon fas fa-angle-right"></i>
                                <p>Slip</p>
                                <span class="badge badge-info right"><?php echo $data_paymentcount['paymentcount']; ?></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Setting</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="information" class="nav-link">
                                <i class="nav-icon fas fa-angle-right"></i>
                                <p>Company information</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="name_address" class="nav-link">
                                <i class="nav-icon fas fa-angle-right"></i>
                                <p>Name Address</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="background" class="nav-link">
                                <i class="nav-icon fas fa-angle-right"></i>
                                <p>Background image</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<aside class="control-sidebar control-sidebar-dark"></aside>