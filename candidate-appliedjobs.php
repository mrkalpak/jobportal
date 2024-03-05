<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'stud')) {
    header("Location: index.php");
}
$main_user = $_SESSION['username'];


?>


<?php include './header.php'; ?>

<!-- page -->
<link rel="stylesheet" href="./assets/css/candidate-appliedjobs.css">
<!-- navbar  -->
<?php include './profileNavbar.php'; ?>

<div id="button-side-nav-bar" class="">

</div>

<section>

    <div class="row w-100">
        <?php
        $activePage = 'appliedjobs';
        include './candidate-sidenavbar.php'; ?>
        <div class="col">

            <h4 class="my-5 fw-normal">
                Applied Jobs:
            </h4>

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
                                                            <?php echo $row2['jobtitle']; ?>
                                                            ( jobid - <?php echo $row2['applyid']; ?>)
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
    </div>
</section>
<!-- footer -->
<?php include './footer.php'; ?>


<script src="./assets/js/candidate-sidenavbar.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="assets/js/job-details.js"></script>
</body>

</html>