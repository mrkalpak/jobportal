<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}
require('connection.php');
$_SESSION['username'];


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




    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">





    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">

    <!-- DATA BASE -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        /* Increase the size of the DataTables entry size dropdown */
        .dataTables_length select {
            padding: 6px 16px;
            /* You can adjust the padding to your desired size */
            font-size: 14px;
            /* You can adjust the font size to your desired size */
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column bg-light">
            <!-- Topbar -->

            <nav>
                <?php include 'admin-header.php'; ?>
                <nav>
                    <!-- TopBar -->
                    <div class="row" id="content">


                        <!-- Sidebar -->
                        <?php include 'sidebar.php'; ?>
                        <!-- Sidebar -->


                        <!-- Container Fluid-->
                        <div class="col" id="container-wrapper">
                            <div class=" col ">

                                <div class="d-sm-flex align-items-center justify-content-between " style="margin-left: -12px; margin-bottom: 42px;">
                                    <p style="font-size: 40px;padding: 15px;color: #4A0063;">Company Approval List </p>


                                    <ol class="breadcrumb">


                                        <a href=""><i class="fa fa-home " style="margin-right: 38px;color: #F18101;">/Company</i></a>

                                    </ol>

                                </div>
                            </div>

                            <div class="row mb-3">

                                <!-- Invoice Example -->
                                <div class="col-xl-12" style="margin-left: -6px;">
                                    <div class="card">
                                        <div class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h5 class="m-0 font-weight-bold " style="color: #F6B264;">Company List</h5>
                                        </div>

                                        <div class="card-body">



                                            <!-- <span style="font-size: 20px;padding: 5px 9px 16px 6px;">Show</span>
                                            <select class="form-group col-md-0" aria-label=".form-select-lg example"
                                            style="height:11%;border-radius: 5px; width: 45px;"+>

                                                <option selected></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <span style="font-size: 20px;padding: 5px 9px 16px 6px">Entries</span>
                                            <form class="form-inline" style="float: right;margin-right: 66px;">

                                                <div class="form-group mb-2">
                                                    <h6 style="margin: auto;color: black;">Search:</h6>
                                                </div>
                                                <div class="form-group mx-sm-3 mb-2">
                                                    <label for="inputSearch" class="sr-only">Search</label>
                                                    <input type="text" class="form-control" id="inputSearch"
                                                        placeholder="Search">
                                                </div>
                                            </form> -->

                                            <!-- model strat -->
                                            <!-- Modal -->

                                            <!-- model end -->

                                            <div class="table-responsive p-3">
                                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                                    <thead class="thead-dark text-light ">
                                                        <tr>
                                                            <th style="background-color: #4A0063;">SR.no </th>
                                                            <th style="background-color: #4A0063;">Name </th>
                                                            <th style="background-color: #4A0063;">Email </th>
                                                            <th style="background-color: #4A0063;">Contact No </th>
                                                            <th style="background-color: #4A0063;">Location</th>
                                                            <th style="background-color: #4A0063;">Added On </th>

                                                            <th style="background-color: #4A0063;">Action</th>


                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php

                                                        $query = "SELECT * FROM `company` WHERE active = 0 ORDER BY company_date  DESC  ";

                                                        // Execute $query and process the results


                                                        if ($result = mysqli_query($con, $query)) {
                                                            if (mysqli_num_rows($result) > 0) {
                                                                $count = 1;
                                                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                                                    <tr>
                                                                        <td> <?= $count++ ?> </td>
                                                                        <td> <?= $row['name'] ?>--<?php echo $row['username']; ?> </td>

                                                                        <td><?= $row['email'] ?></td>
                                                                        <td><?= $row['mobile'] ?></td>
                                                                        <td><?= $row['location'] ?></td>
                                                                        <td><?= $row['company_date'] ?></td>


                                                                        <td> <a href="company-approval-post.php?id=<?php echo $row['username']; ?>" class="btn btn" style="color:white; background-color: #F18101;">View More</a>
                                                                        </td>

                                                                    </tr>




                                                        <?php
                                                                }
                                                            } else {
                                                                echo "No matching records found.";
                                                            }
                                                        }
                                                        ?>



                                                    </tbody>
                                                </table>
                                            </div>


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
        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Include DataTables JavaScript -->
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTableHover').DataTable({
                    searching: true
                });
            });
        </script>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
</body>

</html>