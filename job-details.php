<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'stud')) {
    header("Location: index.php");
}
$main_user = $_SESSION['username'];
// $jobid=$_POST['id'];
 $jobid = $_GET['id'];

$query = "SELECT job.*, comp.*
FROM jobs AS job
INNER JOIN company AS comp ON job.username = comp.username
WHERE job.jobid = '$jobid'";

if ($result = mysqli_query($con, $query)) {

    $row = mysqli_fetch_assoc($result);
    $main_user;
    $jobid;
    $row['username'];
}
?>


<?php include './header.php'; ?>

<!-- page -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/job-details.css">


<!-- navbar  -->
<?php include './navbar.php'; ?>

<!-- breadcrumb -->
<div class="breadcrumb-section">
    <div class="container">
        <h2 class="title">Job Details</h2>
        <nav aria-label="breadcrumb" class="text-center mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Jobs</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Job Details</li>
            </ol>
        </nav>
    </div>
</div>

<!-- job details -->
<section class="paddingTB60 job-details">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-4">
                        <div class="small-card d-flex">
                            <img src="companydocs/.<?php echo $row['companylogo']; ?>" alt="Icon" class="logo-img">
                            <div class="text-content">
                                <h5 class="job-title"><?php echo $row['jobtitle']; ?></h5>
                                <p class="job-company"><?php echo $row['compname']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <h6 class="job-tag-title">Location: <span><?php echo $row['location2']; ?></span></h6>
                        <h6 class="job-tag-title">Category: <span><?php echo $row['category']; ?></span></h6>
                    </div>
                    <div class="col-4">
                        <h6 class="job-tag-title">Job Type: <span><?php echo $row['typeofjob']; ?></span></h6>
                        <h6 class="job-tag-title">Salary: <span><?php echo $row['minsalary']; ?>-<?php echo $row['maxsalary']; ?> / Month</span></h6>
                    </div>
                </div>
                <hr>
                <h5 class="main-title">Job Description:</h5>
                <p class="main-text">
                    <?php echo $row['description']; ?>
                </p>
                <h5 class="main-title">Job Responsibility:</h5>
                <p class="main-text">
                    <?php echo $row['responsibility']; ?>
                </p>

                <h5 class="main-title">Requirements:</h5>
                <p class="main-text">
                    <?php echo $row['requirements']; ?>
                </p>

            </div>
            <div class="col-md-4">
                <div style="display: flex; justify-content: flex-end; align-items: center;">
                    <p style="margin-right: 10px; margin-bottom: 0;">
                    <form class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to Bookmark Job ?')">
                        <input type="hidden" name="id" value="<?= $jobid ?>">
                        <input type="hidden" name="id2" value="<?= $main_user ?>">
                        <input type="hidden" name="id3" value="<?= $row['username'] ?>">
                        <input type="submit" name="save_job" value="Save Job" class="btn btn-secondary">
                    </form>
                    </p>

                    <form class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to apply Job ?')">
                        <input type="hidden" name="id" value="<?= $jobid ?>">
                        <input type="hidden" name="id2" value="<?= $main_user ?>">
                        <input type="hidden" name="id3" value="<?= $row['username'] ?>">
                        <input type="submit" name="apply_job" value="Apply Position " class="btn btn-apply">
                    </form>

                </div>
                <div class="job-summery-card mt-4">
                    <h5 class="job-summery-title mb-4">Job Summary:</h5>
                    <p class="job-summery-text ms-2">Job Posted: <span><?php echo $row['sdate']; ?>.</span></p>
                    <p class="job-summery-text ms-2">Expiration: <span><?php echo $row['deadline']; ?>.</span></p>
                    <p class="job-summery-text ms-2">Vacancy: <span><?php echo $row['vacancy']; ?>.</span></p>
                    <p class="job-summery-text ms-2">Experiences: <span><?php echo $row['minyr']; ?>-<?php echo $row['maxyr']; ?> Years.</span></p>
                    <p class="job-summery-text ms-2">Education: <span><?php echo $row['education']; ?>.</span></p>
                    <p class="job-summery-text ms-2">Gender: <span><?php echo $row['gender']; ?>.</span></p>
                    <!-- <p class="job-summery-text ms-2">jobid id : <span><?php echo $row['jobid']; ?>.</span></p>
                        <p class="job-summery-text ms-2">Student db id 2: <span><?php echo $main_user; ?>.</span></p>
                        <p class="job-summery-text ms-2"> company id3: <span><?php echo $row['username'] ?>.</span></p> -->

                </div>
                <ul class="social-media-icons-share">
                    <li>Job Link Share : </li>
                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                    <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                    <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                    <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                </ul>
                <div class="email-us-card mt-4">
                    <h6 class="email-us-title">Email Now</h6>
                    <p class="email-us-text">Send your resume at <span><?php echo $row['email']; ?></span></p>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <h5 class="main-title related-jobs-nav">
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
    </div>
</section>

<!-- footer -->
<?php include './footer.php'; ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="assets/js/job-details.js"></script>

 
<!-- Plugin js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="assets/js/our-trusted-company.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>
<?php


if (isset($_POST['save_job'])) {


    $jobid = $_POST['id'];
    $candidate = $_POST['id2'];
    $company  = $_POST['id3'];


    $fetch1 = " SELECT * FROM `bookmark` where username = '$candidate' AND jobid = '$jobid' ";
    $query2 = mysqli_query($con, $fetch1);
    if ($query2 && (mysqli_num_rows($query2) > 0)) {
        echo "
            <script>
              alert('You have already bookmark');
              window.location.href='job-details.php?id=$jobid';
            </script>
          ";
    } else {
        $insert1 = "INSERT INTO `bookmark`(`jobid`, `username`, `companyusername`) VALUES ('$jobid','$candidate','$company')";

        if (mysqli_query($con, $insert1)) {

            echo "
               <script>
                 alert('Sucessfully Bookmark the job 1');
                 window.location.href='job-details.php?id=$jobid';
               </script>
             ";
        } else {

            echo "
               <script>
                 alert('internal error');
                 window.location.href='job-details.php?id=$jobid';
               </script>
             ";
        }
    }
}



?>

<!-- ---------------------------------Apply Job--------------------------------------------------- -->

<?php

if (isset($_POST['apply_job'])) {


    $jobid = $_POST['id'];
    $candidate = $_POST['id2'];
    $company  = $_POST['id3'];


    $fetch1 = " SELECT * FROM `$company` where username = '$candidate'  AND jobid = '$jobid' ";
    $query2 = mysqli_query($con, $fetch1);
    if ($query2 && (mysqli_num_rows($query2) > 0)) {
        echo "
        <script>
          alert('You have already applied to job ');
          window.location.href='job-details.php?id=$jobid';
        </script>
      ";
    } else {
        $query3 = "SELECT `cardtype` FROM `users_candidate` WHERE username=' $candidate' ";
        $query4 = mysqli_query($con, $query3);
        $data1 = mysqli_fetch_assoc($query4);
        $cardtype = $data1['cardtype'];

        $insert1 = "INSERT INTO `appliedjobs`(`jobid`, `username`, `companyusername`, `action`) VALUES ('$jobid','$candidate','$company',0)";
        $insert2 = "INSERT INTO $company (username, jobid, usertype, card, action) VALUES ('$candidate', '$jobid', 0, '$cardtype', 0)";


        if (mysqli_query($con, $insert2) && mysqli_query($con, $insert1)) {

            echo "
               <script>
                 alert('Sucessfully Applied to job ');
                 window.location.href='job-details.php?id=$jobid';
               </script>
             ";
        } else {

            echo "
               <script>
                 alert('internal error');
                 window.location.href='job-details.php?id=$jobid';
               </script>
             ";
        }
    }
}


?>


</html>