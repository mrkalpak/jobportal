<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
    header("Location: index.php");
}

if (isset($_COOKIE['jobid'])) {
    setcookie("jobid", "", time() - 3600, "/");
}


$main_user = $_SESSION['username'];

$query = "SELECT * FROM `company` WHERE  `username`='$main_user'";

$result = mysqli_query($con, $query);

if ($result) {

    $result_fetch = mysqli_fetch_assoc($result);
    $db_points = $result_fetch['coins'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Category</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <!-- Custom css -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- page -->
    <link rel="stylesheet" href="./assets/css/company-dashboard.css">
    <link rel="stylesheet" href="./assets/css/company-joblist.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->

</head>

<body>
    <!-- navbar -->
    <?php include './profileNavbar.php'; ?>


    <!-- comapany Navbar -->
    <?php
    $activePage = "joblist";
    include './company-navbar.php';

    ?>
    <!-- profile section -->
    <div class="row  mx-5 my-5">
        <div class="col-md-12 mb-4  at-corners">
            <a href="./company-job-post.php" class="btn mt-2 text-white " style="background-color: var(--primary);">Create Job Post</a>
            <div class="mt-2">
                Coins balance: <img src="./assets/svgs/coin.svg"> <?= $db_points ?> <br>
                <a href="./company-plans.php    ">

                    <button class="btn btn-outline-custom text-white mt-2  w-100">Buy Coin</button>
                </a>
            </div>
        </div>
        <div class="col-md-12   at-corners">
            <div class="d-flex mb-2 ">
                <button class="btn btn-outline-custom text-white mt-2 me-2 ">All</button>
                <!-- <button class="btn btn-outline-custom text-white mt-2 me-2 ">Active</button> -->
                <!-- <button class="btn btn-outline-custom text-white mt-2 me-2 ">Expired</button> -->

            </div>
            <form class="d-flex me-0 ms-auto" style="width: 300px;">
                <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                <!-- <button class="btn custom-outline-color" type="submit">Search</button> -->
            </form>
        </div>

    </div>
    <!-- table -->
    <div class="row  mx-5 my-4 table-responsive">




        <table class="" id="myTable">
            <tr style="background-color: var(--primary); ">
                <th>Job Title</th>
                <th>Applications</th>
                <th id="action_col">Action</th>
            </tr>

            <?php

            $query2 = "SELECT * FROM `jobs` WHERE  `username`='$main_user' ";
            $result2 = mysqli_query($con, $query2);


            $rows = mysqli_num_rows($result2);

            if ($rows) {
                while ($result3 = mysqli_fetch_assoc($result2)) {
                    $jobid = $result3['jobid'];
            ?>
                    <div class="">
                        <tr>
                            <td>
                                Job id - <?php echo  $result3['jobid']; ?>



                                <?php
                                if ($result3['active'] == 2) { ?>
                                    <span class="badge rounded-pill  expire-plan">Expired</span>
                                <?php
                                } elseif ($result3['active'] == 1) { ?>
                                    <span class="badge rounded-pill  active-plan">Active</span>
                                <?php
                                } elseif ($result3['active'] == 0) { ?>
                                    <span class="badge rounded-pill expire-plan">Under Review</span>



                                <?php
                                }
                                ?>
                                <br>
                                <?php echo  $result3['jobtitle']; ?>

                                <br>
                                <span style="color: #595959;"><?php echo  $result3['category'] ?> <br>
                                    <span style="color: #595959;"><?php echo  $result3['location2']; ?> | Posted On: <?php echo  $result3['sdate']; ?></span> <br>
                                    <span style="color: #595959;"> Expired On: <?php echo  $result3['deadline']; ?></span> <br>
                            </td>
                            <?php

                            $query4 = "SELECT COUNT(*) as job_count 
                            FROM $main_user 
                            WHERE usertype = 0 AND jobid = $jobid AND action= 0";

                            if ($result4 = mysqli_query($con, $query4)) {
                                if (mysqli_num_rows($result4) > 0) {
                                    $result5 = mysqli_fetch_assoc($result4);
                                    $applications = $result5['job_count'];
                                }
                                // Handle the case where no results were found.
                                // Or set it to any other default value.

                            } else {
                                $applications = 0;
                            }

                            ?>
                            <td>
                                <?php echo $applications  ?> <br> Total Applications
                            </td>
                            <td>
                                <?php

                                if ($result3['active'] == 1) { ?>
                                    <a href="./company-joblist-candidate.php?id=<?php echo $result3['jobid']; ?>">

                                        <button class="btn btn-outline-custom text-white mt-2 me-2 " data-bs-toggle="modal" data-bs-target="#proceed-modal">View candidates</button>
                                    </a>


                                <?php
                                }
                                ?>

                                <form class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to delete Job ?')">
                                    <input type="hidden" name="id" value="<?= $jobid ?>">
                                    <input type="submit" name="deletePost" value="Delete" class="btn btn-sm btn-danger">
                                </form>
                                <!-- <button type="button" class="btn btn-danger mt-2 me-2">Delete</button> -->
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class=" active-plan-alert px-4">
                                <i class="bi bi-briefcase-fill"></i>
                                &nbsp;
                                Not receiving enough candidates? Check our suggestions to attract 2X more candidates.
                                <a href="./company-job-edit.php?id=<?php echo $result3['jobid']; ?>">
                                    <button class="btn btn-sm btn-outline-custom text-white me-2 ">Update Requirements</button>
                                </a>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="3" class=" bg-light"></td>
                        </tr>
                        <?php
                }
            } else {
                ?>
                
                <tr>
                            <td colspan="3" class=" bg-light text-center text-danger"> No records found..... Please Create new job post</td>
                        </tr>
                <?php
            }

            ?>
                    </div>
                    

        </table>
       
    </div>


    <!-- footer -->
    <?php include './footer.php'; ?>

    <!-- script -->
    <script src="./assets/js/showrows.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>


<?php

if (isset($_POST['deletePost'])) {
    $id = $_POST['id'];
    $table = $id;

    $delete = "DELETE FROM jobs WHERE jobid='$id'";
    $run = mysqli_query($con, $delete);
    if ($run) {

        echo "
               <script>
                 alert('Deleted Sucessfully');
                 window.location.href='company-joblist.php';
               </script>
             ";
    } else {

        echo "
               <script>
                 alert('Cannot Run Query');
                 window.location.href='company-joblist.php';
               </script>
             ";
    }
}


?>

</html>