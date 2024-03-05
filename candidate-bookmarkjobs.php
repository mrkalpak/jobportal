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
            $activePage = 'bookmarkedjobs';
            include './candidate-sidenavbar.php';
            ?>


            <div class="col">

                <h4 class="my-5 fw-normal">
                    Saved Jobs:
                </h4>

                <div class="table-responsive rounded">



                    <table id="dashboard-table" class="w-100 ">
                        <thead style="background-color: var(--primary); color: white; ">
                            <tr>
                                <td class="p-3 text-start" scope="col">Job Tittle</td>
                                <!-- <td scope="col">Apply Date</td> -->
                                <td scope="col">Company</td>
                                <td scope="col">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            // Now you can use the $category value in your query
                            $query2 = "SELECT book.*, job.* 
                            FROM bookmark AS book 
                            INNER JOIN jobs AS job ON book.jobid = job.jobid  
                            WHERE book.username = '$main_user'                            
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
                                                                <?php echo $row2['bookmarkid']; ?>
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
                                            <!-- <td>
                                                
                                            </td> -->
                                            <td>
                                                <?php echo $row2['compname'] ?>
                                            </td>
                                            <td>
                                                <a href="job-details.php?id=<?php echo $row2['jobid']; ?>" class="apply-now-link">Apply Now</a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                } else {
                                    ?>

                                    <tr>
                                        <td colspan="3" class=" bg-light text-center text-danger"> No records found..... </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

    </section>
    <!-- footer -->

    <script src="./assets/js/candidate-sidenavbar.js"></script>

    <?php include './footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="assets/js/job-details.js"></script>
</body>

</html>