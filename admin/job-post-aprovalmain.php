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
    <link href="css/ruang-admin.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .job-listing-card {
            padding: 20px;
        }

        .job-listing-card .logo-box {
            width: 50px;
            height: 50px;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .job-listing-card .logo-box .logo-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .job-listing-card .card-title {
            font-size: 18px;
            margin-bottom: 1px;
            color: #061421;
        }

        .job-listing-card .card-text .company-name {
            font-size: 14px;
            color: #595959;
        }

        .job-listing-card .card-text .deadline {
            font-size: 15px;
            color: #061421;
            margin-left: 15px;
        }

        .job-listing-card .card-text .date {
            font-size: 14px;
            color: #595959;
        }

        .job-listing-card h6 {
            font-size: 16px;
            font-weight: 400;
            color: #595959;
        }

        .job-listing-card h6 span {
            font-size: 16px;
            font-weight: 400;
            color: #061421;
        }

        .job-listing-card .badge-full-time {
            background-color: #F3E8C1;
            font-size: 14px;
            font-weight: 400;
            color: #061421;
            padding: 10px 25px;
        }

        .job-listing-card .badge-part-time {
            background-color: #c6abfb;
            font-size: 14px;
            font-weight: 400;
            color: #061421;
            padding: 10px 25px;
        }

        .job-listing-card .apply-now-link {
            text-decoration: none;
            font-size: 14px;
            font-weight: 400;
            color: var(--primary);
        }

        .job-listing .pagination .page-item {
            margin-right: 10px;
        }

        .job-listing .pagination .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }

        .job-listing .pagination .page-item .page-link {
            color: #000;
            border-color: var(--primary);
        }

        .job-listing .pagination .page-link:focus,
        .job-listing .pagination .page-link:hover {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }
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
                            <!-- <div class="d-sm-flex align-items-center justify-content-between "
                                style="margin-left: 11px;">
                                <p style="font-size: 40px;color:#4A0063">Clients
                                </p>

                                <ol class="breadcrumb">
  
                                    <a href=""><i class="fa fa-home "
                                            style="  margin-left: 37px;margin-top: 28px; margin-right: -202px;color:#F18101;">/Clients</i></a>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        style=" padding-left: 30px; margin-top: 89px; margin-bottom: 28px;margin-right: 16px;  padding-right: 31px;background:#4A0063;">Create
                                        New Client </button>

</div> -->
                            <div class="row justify-content-between  bdr-custom-padding fs-4">
                                <div class="col-md-6" style="font-size: 40px;color: #4A0063;">
                                    Job Posting Approval

                                </div>
                                <div class="col-md-6 div1" style="color:#F18101;">
                                    <i class="fa fa-home"></i>/ Job Posting
                                    <br>


                                </div>
                            </div>

                            <div class="row mb-3">

                                <!-- Invoice Example -->
                                <div class="col-xl-12" style="margin-left: -6px;">
                                    <div class="card">
                                        <div class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h5 class="m-0 font-weight-bold " style="color:#F6B264;">Job Posting Approval
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <div class="paddingTB60 job-listing">
                                                <div class="container mx-auto">
                                                    <div class="row g-5">


                                                        <!-- _____________ -->
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <?php


                                                                $query =  "SELECT job.*, comp.* 
                                                                FROM jobs AS job 
                                                                INNER JOIN company AS comp ON job.username = comp.username 
                                                                WHERE job.active = 0 
                                                                ORDER BY job.sdate 
                                                                ";

                                                                // Execute $query and process the results


                                                                if ($result = mysqli_query($con, $query)) {
                                                                    if (mysqli_num_rows($result) > 0) {
                                                                        while ($row = mysqli_fetch_assoc($result)) { ?>

                                                                            <div class="col-lg-12 mb-3">
                                                                                <div class="card job-listing-card">
                                                                                    <div class="row">
                                                                                        <div class="col-2">
                                                                                            <div class="logo-box">
                                                                                                <img src="../companydocs/.<?php echo $row['companylogo']; ?>" class="logo-img" alt="Logo">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-5">
                                                                                            <h5 class="card-title"><?php echo $row['jobtitle']; ?></h5><br>
                                                                                            <?php echo $row['category']; ?>
                                                                                            <p class="card-text">
                                                                                                <span class="company-name"><?php echo $row['compname']; ?></span>
                                                                                                <span class="deadline">Deadline:</span>
                                                                                                <span class="date"><?php echo $row['deadline']; ?></span>
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="col-5">
                                                                                            <h6>Salary: <span><?php echo $row['minsalary']; ?>-<?php echo $row['maxsalary']; ?></span> Month</h6>
                                                                                            <h6>Experience: <span><?php echo $row['minyr']; ?>-<?php echo $row['maxyr']; ?> Years</span></h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <hr>
                                                                                    <div class="d-flex mt-3 justify-content-between align-items-center">
                                                                                        <span class="badge rounded-pill badge-full-time"><?php echo $row['typeofjob']; ?></span>
                                                                                        <h6 class="m-0 text-center">
                                                                                            <a href="./job-posting-approval.php?id=<?= $row['jobid'] ?>" class="apply-now-link">View more</a>
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                <?php
                                                                        }
                                                                    } else {
                                                                        echo "No matching records found.";
                                                                    }
                                                                }
                                                                ?>



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>







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