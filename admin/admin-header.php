<?php
$env = parse_ini_file('../.env');

if($_SERVER['SERVER_PORT']==443) {
  $header = $env["HEADER_SERVER"];
  
}
else {
  $header = $env["HEADER"];
}

?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link href="css/ruang-admin.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
<!-- TopBar -->
<style>
  /* Style the logout button */
  .logout-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff0000;
    /* Red background color */
    color: #fff;
    /* White text color */
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
</style>
<nav class="navbar navbar-expand   topbar    static-top" style="background-color: white;">
  <a href=<?php echo $header;?>><img src="img/logo/logo.png" style-="width: 123px;"></a>
  <button id="sidebarToggleTop" class="btn  rounded-circle mr-3" style="margin-left: -9px;">
    <i class="fa fa-bars"></i>
  </button>
  <!-- <img src="img/logo/logo.png"style="width: 230px;"> -->
  <ul class="navbar-nav ml-auto">

    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">

    </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 19px;">
        <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
        <!-- <span class="ml-2 d-none d-lg-inline text-white small">Maman Ketoprak</span> -->
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="index.php">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </a>
        <div class="dropdown-divider"></div>

        <!-- <a href="logout2.php" class="btn btn"style="background-color: #4A0063;margin-left: 22px;color: white;">Logout</a> -->
        <a class="dropdown-item" href="logout2.php">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>

      </div>
    </li>
  </ul>
</nav>

<!-- Topbar -->