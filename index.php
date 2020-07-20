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
    <!-- Navbar -->
    <?php require './pages/navbar.php'; ?>
    <!-- /Navbar -->

    <!-- sidebar -->
    <?php require './pages/sidebar.php'; ?>
    <!-- /sidebar -->

    <!-- content -->
    <?php require './pages/content.php'; ?>
    <!-- /content -->

    <!-- footer -->
    <?php include './pages/footer.php'; ?>
    <!-- /footer -->
  </div>

  <!-- script -->
  <?php require 'script.php'; ?>
  <!-- /script -->
</body>

</html>