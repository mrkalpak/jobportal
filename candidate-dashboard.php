<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'stud')) {
    header("Location: index.php");
}
$main_user = $_SESSION['username'];


$query = "SELECT *
FROM users_candidate WHERE username = '$main_user'";

if ($result = mysqli_query($con, $query)) {

    $row = mysqli_fetch_assoc($result);
}


$query4 = "SELECT COUNT(*) AS application_count 
FROM appliedjobs WHERE username = '$main_user'";

if ($result4 = mysqli_query($con, $query4)) {

    $row4 = mysqli_fetch_assoc($result4);
}

?>
<?php include './header.php'; ?>

<!-- page -->
<link rel="stylesheet" href="../assets/css/job-details.css">
<link rel="stylesheet" href="./assets/css/candidate-dashboard.css">
<link rel="stylesheet" href="./assets/css/candiate-sidebar.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet" />
<!-- navbar  -->
<?php include './profileNavbar.php'; ?>

<div id="button-side-nav-bar" class="">

</div>
<section>

    <div class="row w-100">


        <?php
        $activePage = 'home';
        include './candidate-sidenavbar.php';
        ?>

        <div class="col-md-10">


            <!-- profile section -->
            <div class=" mx-5 my-4 row">
                <div class="col-auto">
                    <img src="./assets/images/home/profile2.png" width="90px" height="85px" alt="" srcset="">

                </div>
                <div class="col mt-3">
                    Hello, <br>
                    <span style="color: var(--primary);font-size: 26px;"> <?= $row['name'] ?></span>
                </div>

            </div>

            <div class="row    mx-1 my-4">
                <div class=" dashboard-card  col-auto card pt-4 pb-3 pe-4 my-3 mx-1">
                    <div class="row ">
                        <div class="col-auto mx-3">
                            <div class="   ms-auto me-auto text-center">
                                <i class="bi bi-file-earmark-fill" style="font-size: 36px; color: var(--primary) ;"></i>
                            </div>
                        </div>
                        <div class="col " style="font-weight: 400;
                    font-size: 18px;">
                            Total Applied <br>
                            <span style="
                        font-size: 26px;"><?= $row4['application_count'] ?></span>
                        </div>
                    </div>
                </div>

                <div class="  dashboard-card col-auto card pt-4 pb-3 pe-4 my-3 mx-1">
                    <div class="row ">
                        <div class="col-auto mx-3">
                            <div class="   ms-auto me-auto text-center">
                                <i class="bi bi-broadcast " style="font-size: 36px; color: var(--primary);"></i>


                            </div>
                        </div>
                        <div class="col " style="font-weight: 400;
                    font-size: 18px;">
                            Live Jobs <br>
                            <span style="
                        font-size: 26px;">80+</span>
                        </div>
                    </div>
                </div>

                <div class="  dashboard-card col-auto card pt-4 pb-3 pe-4 my-3 mx-1">
                    <div class="row ">
                        <div class="col-auto mx-3">
                            <div class="   ms-auto me-auto text-center">
                                <i class="bi bi-clock-fill " style="font-size: 36px; color: var(--primary);"></i>
                            </div>
                        </div>
                        <div class="col " style="font-weight: 400;
                    font-size: 18px;">
                            Pending Job <br>
                            <span style="
                        font-size: 26px;">120+</span>
                        </div>
                    </div>
                </div>

                <div class="  dashboard-card col-auto card pt-4 pb-3 pe-4 my-3 mx-1">
                    <div class="row ">
                        <div class="col-auto mx-3">
                            <div class="   ms-auto me-auto text-center">
                                <i class="bi bi-briefcase-fill " style="font-size: 36px; color: var(--primary);"></i>
                            </div>
                        </div>
                        <div class="col " style="font-weight: 400;
                    font-size: 18px;">
                            Closed Jobs <br>
                            <span style="
                        font-size: 26px;">900+</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- currently applied table -->
            <div class="table-responsive rounded">



                <table id="dashboard-table" class="w-100 ">
                    <thead style="background-color: var(--primary); color: white; ">
                        <tr>
                            <td class="p-3 text-start" scope="col">Job Tittle</td>
                            <td scope="col">Apply Date</td>
                            <td scope="col">Company</td>
                            <td scope="col">Status</td>
                        </tr>
                    </thead>
                    <tbody>


                        <?php


                        // Now you can use the $category value in your query
                        $query2 = "SELECT appl.*, job.*
                            FROM appliedjobs AS appl 
                            INNER JOIN jobs AS job ON appl.jobid = job.jobid  
                            WHERE appl.username = '$main_user' 
                            ORDER BY appl.applydate 
                            LIMIT 6";


                        // $query = "SELECT * FROM `appliedjobs` WHERE username = '$main_user'";

                        if ($result2 = mysqli_query($con, $query2)) {
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) { ?>


                                    <tr>
                                        <td>
                                            <div class="row mb-3 m-2">
                                                <!-- <div class="col-auto">
                                                        <img class="rounded-5" height="37px" width="37px" src="companydocs/." alt="" srcset="">
                                                    </div> -->
                                                <div class="col-auto w-75">

                                                    <div class="row  w-100">
                                                        <div class="col-auto fw-semibold text-start w-70 ">
                                                            <?php echo $row2['jobtitle']; ?>---
                                                            <?php echo $row2['applyid']; ?>
                                                        </div>
                                                        <!-- <div class="col-auto text-secondary d-flex w-30 justify-content-end" style="font-size: 14px;">
                                                                1 days ago
                                                            </div> -->
                                                    </div>
                                                    <div class="row text-secondary  w-100 text-start" style="font-size: 14px;">
                                                        <div class="col-auto w-40">
                                                            <?php echo $row2['location2']; ?>
                                                        </div>
                                                        <div class="col-auto d-flex w-60 justify-content-end">
                                                            Salary: <span class="text-black fw-semibold"><?php echo $row2['minsalary']; ?>-<?php echo $row2['maxsalary']; ?> </span> /Month

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $row2['applydate'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row2['compname'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row2['action'] == 0) { ?>

                                                <span class="badge pending">Pending</span>
                                            <?php
                                            } elseif ($row2['action'] == 1) { ?>

                                                <span class="badge success"> Shortlist </span>

                                            <?php
                                            } elseif ($row2['action'] == 2) { ?>


                                                <span class="badge canceled">Rejected</span>
                                            <?php
                                            }

                                            ?>
                                            <!-- <span class="badge canceled">Rejected</span> -->
                                        </td>
                                    </tr>

                                <?php
                                }
                            } else {
                                ?>

                                <tr>
                                    <td colspan="4" class=" bg-light text-center text-danger"> No records found..... </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="col-md-12 p-5 ">
            <h5 class="main-title  related-jobs-nav ">
                Related Jobs
                <span class="nav-icons">
                    <i class="bi bi-chevron-left"></i>
                    <i class="bi bi-chevron-right"></i>
                </span>
            </h5>
            <div class="owl-carousel related-jobs-carousel owl-theme">
                <?php

                $main_user = $_SESSION['username'];

                $category = $row['category'];


                $query1 = "SELECT job.*, comp.* 
                     FROM jobs AS job 
                     INNER JOIN company AS comp ON job.username = comp.username 
                     WHERE job.category LIKE '%$category%' 
                     ORDER BY job.sdate 
                     LIMIT 6";





                if ($result1 = mysqli_query($con, $query1)) {
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row1 = mysqli_fetch_assoc($result1)) { ?>

                            <div class="item">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="logo-box">
                                                <img src="companydocs/.<?php echo $row1['companylogo']; ?>" class="logo-img" alt="Logo">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <h5 class="card-title"><?php echo $row1['jobtitle']; ?></h5>
                                            <p class="card-text">
                                                <span class="company-name"><?php echo $row1['compname']; ?></span>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <h6>Salary: <span><span><?php echo $row1['minsalary']; ?>-<?php echo $row1['maxsalary']; ?> / Month</h6>
                                    <h6>Experience: <span><?php echo $row1['minyr']; ?>-<?php echo $row1['maxyr']; ?> Years.</span></h6>
                                    <h6>Location: <span><?php echo $row1['location2']; ?></span></h6>
                                    <div class="d-flex mt-3 justify-content-between align-items-center">
                                        <span class="badge rounded-pill badge-full-time"><?php echo $row1['typeofjob']; ?></span>
                                        <h6 class="m-0 text-center">
                                            <a href="job-details.php?id=<?php echo $row1['jobid']; ?>" class="apply-now-link">Apply Now</a>
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
</section>

<!-- footer -->
<?php include './footer.php'; ?>


 


<script src="./assets/js/candidate-sidenavbar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="assets/js/job-details.js"></script>
</body>

</html>