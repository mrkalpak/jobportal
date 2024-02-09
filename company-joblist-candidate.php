<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
    header("Location: index.php");
}
$main_user = $_SESSION['username'];



if (!isset($_COOKIE['jobid'])) {
    $jobid = $_GET['id'];
    setcookie("jobid", $jobid, time() + 3600, "/");

    echo "
    <script>
      alert('Refreshing Data...Press OK...');
      window.location.href='company-joblist-candidate.php';
    </script>
  ";
} else {
    $jobid = $_COOKIE['jobid'];
}



$query = "SELECT * FROM `jobs` WHERE  `jobid`='$jobid'";

$result = mysqli_query($con, $query);

if ($result) {

    $result3 = mysqli_fetch_assoc($result);
    // $db_points = $result_fetch['coins'];
}
?>



<?php include './header.php'; ?>

<!-- page -->
<link rel="stylesheet" href="./assets/css/company-dashboard.css">
<link rel="stylesheet" href="./assets/css/company-joblist.css">
<!-- navbar -->
<?php include './profileNavbar.php'; ?>


<!-- comapany Navbar -->
<?php
$activePage = "joblist";
include './company-navbar.php';

?>

<!-- table -->


<div class="candidate-card me-auto ms-auto border border-1 p-2 rounded">


    <div class="row px-4 mb-2">
        <div class="col-md-9">
            <?php echo  $result3['jobtitle']; ?>

            <br>
            <span style="color: #595959;"><?php echo  $result3['category'] ?> <br>
                <span style="color: #595959;"><?php echo  $result3['location2']; ?> | Posted On: <?php echo  $result3['sdate']; ?></span> <br>
                <span style="color: #595959;"> Expired On: <?php echo  $result3['deadline']; ?></span> <br>

        </div>
        <?php

        $query4 = "SELECT COUNT(*) as job_count 
                            FROM $main_user 
                            WHERE usertype = 0 AND jobid = $jobid AND action= 0";

        if ($result4 = mysqli_query($con, $query4)) {
            if (mysqli_num_rows($result4) > 0) {
                $result5 = mysqli_fetch_assoc($result4);
                $applications = $result5['job_count'];
            } else {
                // Handle the case where no results were found.
                $applications = 0; // Or set it to any other default value.
            }
        }

        ?>
        <div class="col-md-3 border-start">
            <?php echo $applications  ?> <br> Total Applications
        </div>




    </div>
    <div>
        <div colspan="2" class=" active-plan-alert px-4">
            <i class="bi bi-briefcase-fill"></i>
            &nbsp;
            Not receiving enough candidates? Check our suggestions to attract 2X more candidates.
            <a href="./company-job-edit.php?id=<?php echo $result3['jobid']; ?>">
                <button class="btn btn-sm btn-outline-custom text-white me-2 ">Update Requirements</button>
            </a>
        </div>

    </div>
    <div>
        <td colspan="2" class=" bg-light"></td>
    </div>
</div>
<div class="candidate-card me-auto ms-auto mt-3">
    <div class=" d-flex justify-content-end ">
        <button class="btn btn-sm btn-outline-custom text-white "><i class="bi bi-download"></i>&nbsp; Download Excel</button>
    </div>
</div>


<!-- --------------------Student While Loop Here-------------------------------------------------------- -->



<?php
$query6 = "SELECT mu.*, uc.* FROM $main_user AS mu 
    INNER JOIN users_candidate AS uc ON mu.username = uc.username 
    WHERE mu.usertype = 0 AND mu.jobid = $jobid AND mu.action = 0 
    ORDER BY mu.card DESC";


if ($result6 = mysqli_query($con, $query6)) {
    if (mysqli_num_rows($result6) > 0) {
        while ($row = mysqli_fetch_assoc($result6)) { ?>
            <!-- -------code for print all applied student---------------- -->
            <div class="border border-1 candidate-card mt-3 rounded ms-auto me-auto p-3">
                <div class="row">
                    <div class="col fw-bold">
                        <?= $row['name'] ?> &nbsp; &nbsp;
                        <!-- <?= $row['jobid'] ?> &nbsp; &nbsp; -->



                        <!-- ----code for card or not----- -->
                        <?php
                        if ($row['card'] == true) { ?>
                            <i class="bi bi-star-fill text-warning"></i>
                        <?php } ?>



                    </div>
                    <?php
                    if (!$row['resume'] == null) { ?>
                        <div class="col d-flex justify-content-end">
                            <a href="uploaddocs/.<?php echo $row['resume']; ?>" target="_blank" class="btn btn-sm btn-outline-secondary ">
                                <i class="bi bi-download"></i>&nbsp;
                                Resume
                            </a>
                        </div>
                        </a>
                    <?php } else { ?>

                        <div class="col d-flex justify-content-end">
                            <!-- <a href="uploaddocs/.<?php echo $row['resume']; ?>" target="_blank" class="btn btn-sm btn-outline-secondary "> -->
                            <i class="bi bi-download"></i>&nbsp;
                            Pending
                            </a>
                        </div>
                    <?php
                    } ?>
                </div>

                <div class="row">
                    <div class="col-md-8 row text-secondary">
                        <div class="col-auto"><span class="badge bg-secondary ">Fresher</span></div>
                        <div class="col-auto"> <i class="bi bi-geo-alt-fill"></i> <?php echo $row['location']; ?> </div>
                        <div class="col-auto">

                            Age :<?php echo $row['age']; ?> .</div>
                    </div>
                </div>



                <div class="row mt-2 col-md-11">
                    <div class="col-md-2">
                        <i class="bi bi-mortarboard-fill"></i>&nbsp; Qualification :
                    </div>
                    <div class="col-auto">
                        <?php echo $row['qualification']; ?>
                    </div>
                </div>
                <div class="row mt-2 col-md-11">
                    <div class="col-md-2">
                        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 6.32247V0H0V6.32247C0 6.58498 0.18 6.83248 0.49 6.96748L4.67001 8.84997L3.68001 10.605L0.27 10.8225L2.85999 12.5025L2.07 15L5.00001 13.6725L7.93 15L7.15 12.5025L9.74001 10.8225L6.33 10.605L5.34 8.84997L9.52 6.96748C9.82 6.83248 10 6.59247 10 6.32247ZM6 7.67247L5.00001 8.12247L4 7.67247V0.750001H6V7.67247Z" fill="black" />
                        </svg>
                        </i>
                        &nbsp; Domain :
                    </div>
                    <div class="col-auto">
                        <?php echo $row['category']; ?>
                    </div>
                </div>
                <div class="row mt-2 col-md-11">
                    <div class="col-md-2">
                        <i class="bi bi-telephone-fill"></i>&nbsp; Phone Number :
                    </div>
                    <div class="col-auto">
                        <?php echo $row['phone']; ?>
                    </div>
                </div>
                <div class="row mt-2 col-md-11">
                    <div class="col-md-2">
                        <i class="bi bi-envelope-fill"></i>&nbsp; Email :
                    </div>
                    <div class="col-auto">
                        <?php echo $row['email']; ?>
                    </div>
                </div>
                <!-- <div class="row mt-2 col-md-11">
                        <div class="col-md-2">
                            <i class="bi bi-linkedin"></i>&nbsp; LinkedIn :
                        </div>
                        <div class="col-auto">
                            <a href="https://www.linkedin.com/feed/">https://www.linkedin.com/</a>
                        </div>
                    </div> -->
                <div class="row mt-2 col-md-11 bg-light">
                    <div class="col-md-2">
                        <i class="bi bi-card-text"></i>&nbsp; Description :
                    </div>
                    <div class="col-auto">
                        <?php echo $row['description']; ?>
                    </div>
                </div>
                <div class="row mt-2 col-md-12">

                    <div class="col d-flex justify-content-end">
                        <form class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to Reject ?')">
                            <input type="hidden" name="id" value="<?= $row['stud_id'] ?>">
                            <button type="submit" name="deletePost" value="Delete" class="btn btn-sm btn-outline-danger  me-3"><i class="bi bi-x-square"></i>&nbsp; Reject</button>
                        </form>
                        <form class="mt-2" method="POST">
                            <input type="hidden" name="id" value="<?= $row['stud_id'] ?>">
                            <button type="submit" name="selected" class="btn btn-sm btn-outline-custom text-white "> <i class="bi bi-check2-square"></i>&nbsp; Select</button>

                        </form>


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










<!-- footer -->
<?php include './footer.php'; ?>

<!-- script -->
<script src="./assets/js/showrows.js"></script>
 
</body>

<?php


if (isset($_POST['deletePost'])) {
    $stud_id = $_POST['id'];;


    $delete = "DELETE FROM $main_user WHERE stud_id ='$stud_id'";

    $delete2 = "UPDATE `appliedjobs` SET  `action` = '2'
    WHERE `username` IN (SELECT `username` FROM `$main_user` WHERE `stud_id` = '$stud_id') AND `jobid` IN (SELECT `jobid` FROM `$main_user` WHERE `stud_id` = '$stud_id')";


    $run2 = mysqli_query($con, $delete2);
    $run = mysqli_query($con, $delete);
    if ($run) {

        echo "
               <script>
                 alert(' Rejected Sucessfully');
                 window.location.href='company-joblist-candidate.php';
               </script>
             ";
    } else {

        echo "
               <script>
                 alert('Cannot Run Query');
                 window.location.href='company-joblist-candidate.php';
               </script>
             ";
    }
}


?>


<?php


if (isset($_POST['selected'])) {
    $stud_id = $_POST['id'];;


    $delete1 = "UPDATE $main_user SET `action` = '1'  WHERE stud_id ='$stud_id'";

    $delete2 = "UPDATE `appliedjobs` SET  `action` = '1'
    WHERE `username` IN (SELECT `username` FROM `$main_user` WHERE `stud_id` = '$stud_id') AND `jobid` IN (SELECT `jobid` FROM `$main_user` WHERE `stud_id` = '$stud_id')";

    $run1 = mysqli_query($con, $delete1);
    $run2 = mysqli_query($con, $delete2);
    if ($run1 && $run2) {

        echo "
               <script>
                 alert(' Selected Sucessfully');
                 window.location.href='company-joblist-candidate.php';
               </script>
             ";
    } else {

        echo "
               <script>
                 alert('Cannot Run Query');
                 window.location.href='company-joblist-candidate.php';
               </script>
             ";
    }
}


?>

</html>