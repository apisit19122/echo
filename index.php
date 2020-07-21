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
    require_once 'navbar.php';
    //sidebar
    require_once 'sidebar.php';
    //content
    require_once 'content.php';
    //footer
    require_once 'footer.php';
    ?>

  </div>

  <!-- script -->
  <?php require 'script.php'; ?>
  <!-- /script -->
</body>

</html>