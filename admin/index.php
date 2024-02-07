<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}

require('connection.php');
$_SESSION['username'];


$query = "SELECT * FROM blogs";
$result = mysqli_query($con, $query);

if (!$result) {
    die('Query failed: ' . mysqli_error($con));
}



$sqlTotalCompanies = "SELECT COUNT(*) AS total_company FROM company";
$resultTotalCompanies = mysqli_query($con, $sqlTotalCompanies);
$rowTotalCompanies = mysqli_fetch_assoc($resultTotalCompanies);
$totalCompanyCount = $rowTotalCompanies['total_company'];


$sqlPending = "SELECT COUNT(*) AS pending_company FROM company where active = 0";
$resultPending = mysqli_query($con, $sqlPending);
$rowPending = mysqli_fetch_assoc($resultPending);
$pendingCount = $rowPending['pending_company'];



$job_pending = "SELECT COUNT(*) AS pending_count FROM jobs WHERE active = 0";
$result1 = mysqli_query($con, $job_pending);
$countrow = mysqli_fetch_assoc($result1);
$job_count = $countrow['pending_count'];


$in_cards = "SELECT COUNT(*) AS inactive_cards FROM jobcards WHERE card_active = 0";
$result2 = mysqli_query($con, $in_cards);
$countrow2 = mysqli_fetch_assoc($result2);
$inactive_card = $countrow2['inactive_cards'];


$Ac_cards = "SELECT COUNT(*) AS active_cards FROM jobcards WHERE card_active = 1";
$result3 = mysqli_query($con, $Ac_cards);
$countrow3 = mysqli_fetch_assoc($result3);
$active_card = $countrow3['active_cards'];


$blogs = "SELECT COUNT(*) AS blog_count FROM blogs";
$result4 = mysqli_query($con, $blogs);
$countrow4 = mysqli_fetch_assoc($result4);
$blog_count = $countrow4['blog_count'];






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
    <link href="css/ruang-admin.min.css" rel="stylesheet">

    <!-- DATA BASE -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .main-row .date-square {
            background-color: #4A0063;
            color: white;
            padding: 8px;
            border-radius: 4px;
            margin-right: 10px;
            font-weight: 400;
            font-size: 16px;
        }

        .main-row .comment-count {
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
            font-size: 15px;
            color: #595959;
            margin-right: 15px;
        }

        .main-row .user-name {
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
            font-size: 15px;
            color: #595959;
            margin-left: 15px;
        }

        .main-row {
            display: flex;
            align-items: flex-end;
            margin-top: -50px;
            padding: 15px;
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
                        <!-- Container Fluid-->
                        <div class="col" id="container-wrapper">
                            <!-- <div class="d-sm-flex align-items-center justify-content-between "
                                style="margin-left: 11px;">
                                <h3 class="h3 mb-5 text-gray-800" style="margin-left: 28px;margin-top: 51px;
">
                            Dashboard</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><i class="fa fa-home"style="margin-right: 32px;
    color: #F18101;">Dashboard</i><a href="./index.php"></a>
                                    </li>
                                   
                                </ol>
                            </div> -->
                            <div class="row justify-content-between p-5 fs-4">
                                <div class="col-auto" style="font-size: 40px;color: #4A0063;">
                                    Dashboard
                                </div>

                                <div class="col-auto" style="color:#F18101;">
                                    <?php if (isset($_SESSION['username'])) {

                                        $_SESSION['username'];
                                    }
                                    ?>
                                    <i class="fa fa-home"></i>Dashboard
                                </div>
                            </div>
                            <!-- <div class="row mb-3"> -->


                            <div class="card">
                                <div class="row mb-3  justify-content-center" style="margin-top: 41px;">
                                    <!-- Earnings (Monthly) Card Example -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total
                                                            Companies
                                                        </div>
                                                        <div class="h3 mb-0 font-weight-bold " style="color:#4A0063;">
                                                            <?= $totalCompanyCount ?>
                                                        </div>
                                                        <div class="mt-2 mb-0 text-muted text-xs">

                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x " style="color:#4A0063;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Earnings (Annual) Card Example -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                            Pending Company Approval
                                                        </div>
                                                        <div class="h3 mb-0 font-weight-bold " style="color:#0275D8;">
                                                            <?= $pendingCount ?>
                                                        </div>
                                                        <div class="mt-2 mb-0 text-muted text-xs">

                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x " style="color:#0275D8;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- New User Card Example -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="row  align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                            Pending Job Post Approval
                                                        </div>
                                                        <div class="h3 mb-0 mr-3 font-weight-bold " style="color:#01BAB3;">
                                                            <?= $job_count ?>
                                                        </div>
                                                        <div class="mt-2 mb-0 text-muted text-xs">

                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x" style="color:#01BAB3;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <!-- Pending Requests Card Example -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="row  align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                            Inactive
                                                            Cards</div>
                                                        <div class="h3 mb-0 font-weight-bold " style="color:#F18101;">
                                                            <?= $inactive_card ?>
                                                        </div>
                                                        <div class="mt-2 mb-0 text-muted text-xs">

                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x " style="color:#F18101;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Pending Requests Card Example -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="row  align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Active
                                                            Blogs
                                                        </div>
                                                        <div class="h3 mb-0 font-weight-bold " style="color: #495057;">
                                                            <?= $blog_count ?>
                                                        </div>
                                                        <div class="mt-2 mb-0 text-muted ">

                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x " style="color: #495057;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Pending Requests Card Example -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <div class="row  align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Active
                                                            JobCards
                                                        </div>
                                                        <div class="h3 mb-0 font-weight-bold" style="color: #A37DAF;">
                                                            <?= $active_card ?>
                                                        </div>
                                                        <div class="mt-2 mb-0 text-muted text-xs">

                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x " style="color: #A37DAF;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Cards -->
                                <h4 class="m-0 font-weight-bold " style="color: #4A0063;padding: 38px 32px 18px;">
                                    Recent Blogs </h4>
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <div class="col-lg-4" style="margin-top: 31px;">

                                                <div class="card">
                                                    <a href="../blog-details.php?blog_id=<?php echo $row['blog_id']; ?>">
                                                        <img src="blog/.<?php echo $row['blog_image']; ?>" class="card-img-top" alt="Image">
                                                    </a>
                                                    <br>
                                                    <br>
                                                    <div class="main-row">
                                                        <?php echo date('d M', strtotime($row['blog_date'])); ?>
                                                        <div class="comment-count">11 comments</div>
                                                        <div class="user-name">
                                                            <?php echo $row['blog_name']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title article-details">
                                                            <?php echo $row['blog_title']; ?>
                                                        </h5>
                                                        <p class="card-text">

                                                        </p>
                                                        <a href="../blog-details.php?blog_id=<?php echo $row['blog_id']; ?>" class="explore-more-link">Explore More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        } ?>

                                    </div>

                                </div>



                            </div>



                            <!-- Invoice Example -->

                            <!--Row-->



                            <!-- Modal Logout -->


                            <!-- </div> -->
                            <!---Container Fluid-->
                        </div>

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