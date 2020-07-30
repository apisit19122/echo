<?php
require 'config/connect.config.php';
// @error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  
  <title>Echo</title>
  <?php include 'link.php'; ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <?php
    //Navbar
    require 'navbar.php';
    //sidebar
    require 'sidebar.php';
    //content
    require 'content.php';
    //footer
    require 'footer.php';
    ?>

  </div>

  <!-- script -->
  <?php require 'script.php'; ?>
  <!-- /script -->
</body>

</html>