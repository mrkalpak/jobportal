<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}
require('connection.php');
echo $_SESSION['username'];
echo $client_id = $_GET['id'];



$query = "SELECT * FROM `jobcard_client` WHERE  `client_id`='$client_id'";

$result = mysqli_query($con, $query);

if ($result) {

    $result_fetch = mysqli_fetch_assoc($result);
    // $db_points = $result_fetch['coins'];
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>Admin Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.css" rel="stylesheet">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>

    </style>
</head>

<body id="page-top">
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column bg-light">
            <nav>
                <?php include 'admin-header.php'; ?>
                <nav>
                    <div class="row" id="content">
                        <!-- TopBar -->

                        <!-- Sidebar -->
                        <?php include 'sidebar.php'; ?>
                        <!-- Sidebar -->

                        <!-- Topbar -->

                        <!-- Container Fluid-->
                        <div class="col" id="container-wrapper">



                            <!-- Modal2 -->
                            <form action="admin_postdata.php" method="POST">
                                <section class="">
                                    <div class="container py-4">
                                        <div class="row d-flex justify-content-center align-items-center h-10">
                                            <div class="col-6">
                                                <div class="card shadow-2-strong" style="background:#FFF8E5">
                                                    <div class="card-body mx-md-4">

                                                        <h3>Upload</h3>

                                                        <div class="form-outline mb-3">
                                                            <label class="form-label" for="name">Name</label>
                                                            <input type="text" name="name" onkeydown="return /[a-zA-Z ]/i.test(event.key)" required placeholder="Name" value="<?= $result_fetch['jobcard_client_name'] ?>" id="name" class="form-control" style="border-radius: 0px;" />
                                                        </div>

                                                        <div class="form-outline mb-3">
                                                            <label class="form-label" for="mobile">Mobile No</label>
                                                            <input type="text" name="mobile" required placeholder="Mobile No" value="<?= $result_fetch['client_phone'] ?>" id="mobile" class="form-control" style="border-radius: 0px;" />
                                                        </div>
                                                        <div class="form-outline mb-3">
                                                            <label class="form-label" for="email">Email</label>
                                                            <input type="text" name="email" required placeholder="Email" value="<?= $result_fetch['client_email'] ?>" id="email" class="form-control" style="border-radius: 0px;" />
                                                        </div>
                                                        <div class="form-outline mb-3">
                                                            <label class="form-label" for="address">Address</label>
                                                            <input type="text" name="address" required placeholder="Address" value="<?= $result_fetch['address'] ?>" id="address" class="form-control" style="border-radius: 0px;" />
                                                            <input type="text" name="client_id" value="<?= $result_fetch['client_id'] ?>" hidden>
                                                        </div>

                                                        <!-- Checkbox -->
                                                        <div class="text-center">
                                                            <button type="submit" name="update_client" class="btn btn-lg" style="color: white;background-color: #4A0063; width: 43%;">UPDATE</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>

                            <!-- Modal2 -->




                            <div class="chart-area" style="margin-top: 54px;">



                            </div>


                        </div>

                    </div>
        </div>

        <!--Row-->



        <!-- Modal Logout -->


    </div>
    <!---Container Fluid-->
    </div>
    <!-- Footer -->

    <footer class="sticky-footer">
        <?php include 'footer.php'; ?>
    </footer>
    <!-- Footer -->
    </div>
    </div>

    <!-- Scroll to top -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
</body>

</html>