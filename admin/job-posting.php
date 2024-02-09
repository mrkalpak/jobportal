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
    <link href="css/ruang-admin.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/jobpost.css">



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

                            <div class="row justify-content-between  bdr-custom-padding fs-4">
                                <div class="col-md-6" style="font-size: 40px;color: #4A0063;">
                                    Job Posting
                                </div>
                                <div class="col-md-6 div1" style="color:#F18101;">
                                    <i class="fa fa-home"></i>/ Job Posting
                                    <br>
                                    <a href="jobdetails.php"> <button type="button" class="btn btn-secondary" style=" background:#4A0063;    margin-bottom: -34px;">Create New Job Post
                                        </button></a>

                                </div>
                            </div>


                            <div class="row mx-auto my-4 table-responsive">
                                <table class="" id="myTable">
                                    <tr style="background-color: #4a0063; ">
                                        <th>Job Title</th>
                                        <th>Applications</th>
                                        <th id="action_col">Action</th>
                                    </tr>

                                    <tr>
                                        <td>
                                            Manager- Account & Finance <span class="badge rounded-pill  active-plan">Active</span>
                                            <br>
                                            <span style="color: #595959;">Anywhere in India | Posted On: 02 April, 2023</span> <br>

                                        </td>
                                        <td>
                                            35 <br> Total Applications
                                        </td>

                                        <td>
                                            <a href="./joblist-candidate.php">

                                                <button class="btn btn-outline-custom  mt-2 me-2 " data-bs-toggle="modal" data-bs-target="#proceed-modal">View candidates</button>
                                            </a>
                                        </td>


                                    </tr>




                                    <tr>
                                        <td>
                                            Manager- Account & Finance <span class="badge rounded-pill  expire-plan">Expired</span>
                                            <br>
                                            <span style="color: #595959;">Anywhere in India | Posted On: 02 April, 2023</span> <br>

                                        </td>
                                        <td>
                                            35 <br> Total Applications
                                        </td>

                                        <td>
                                            <a href="./joblist-candidate.php">

                                                <button class="btn btn-outline-custom  mt-2 me-2 " data-bs-toggle="modal" data-bs-target="#proceed-modal">View candidates</button>
                                            </a>
                                        </td>


                                    </tr>



                                </table>

                            </div>
                            <!---Container Fluid-->
                        </div>
                        <!-- Footer -->

                        <footer class="sticky-footer">
                            <?php include 'footer.php'; ?>
                            <?php include 'company-job-post.php'; ?>
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