<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
    header("Location: index.php");
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

    <style>
        .card-color {
            background-color: #EFF3F2;
        }
    </style>

</head>

<body>
    <!-- navbar -->
    <?php include './profileNavbar.php'; ?>


    <!-- comapany Navbar -->
    <?php
    $activePage = "plansandsub";
    include './company-navbar.php';

    ?>


    <div class="p-4 ms-auto mb-5 me-auto cards-width card-color   ">


        <h3 class="text-center mt-5">Buy coins to close your hiring</h3>
        <div class="text-secondary text-center mt-0" style="font-size: smaller;">
            Use Job Fair coins to post the jobs and to hire through Job Fair Database product. Simple & easy free
            process. 
        </div>
        <div class="row mt-5 g-5">
            <div class="row w-100 ms-auto me-auto px-4">
                <div class="card">
                    <span class="fw-semibold mt-2 ms-2" style="font-size: medium;">
                        Free Coins
                    </span>
                    <div class="mt-2 ms-2">

                        <img src="./assets/images/jobcoin.png" alt=""><span class="fw-semibold  fs-3" style="vertical-align: middle;">
                            600
                        </span>
                    </div>
                    <hr>
                    <div class=" mb-4" style="font-size: smaller;">
                        <i class="bi bi-clock-fill ms-1" style="color: #F18101;"></i> Valid for <span class="fw-semibold">6
                            Months </span> &nbsp;
                        <i class="bi bi-person-fill" style="color: #F18101; font-size: 17px !important;"></i> Single
                        user account
                    </div>
                </div>
            </div>
            <div class="col-md ">
                <div class="card mb-3">
                    <div class="card-header  bg-transparent fw-semibold fs-6 text-center " style="font-size: smaller;">
                        Classic </div>
                    <div class="card-body">
                        <div class=" mb-5">


                            <img src="./assets/images/jobcoin.png" alt=""><span class="fw-semibold fs-3" style="vertical-align: middle;">
                                300
                            </span> <br>
                            <span style="font-size: x-small;">Try the classic plan for beginners.
                                300 coins balance valid for 6 months. </span>
                        </div>
                        <hr />
                        <div class=" mb-4" style="font-size: smaller;">
                            <i class="bi bi-clock-fill ms-1" style="color: #F18101;"></i> Valid for <span class="fw-semibold">6 Months </span><br>
                            <i class="bi bi-person-fill" style="color: #F18101; font-size: 17px !important;"></i> Single
                            user account
                        </div>
                        <div class="card-footer border-0 bg-transparent ">
                            <!-- <button class="btn btn-primary-custom btn-sm w-100">Buy Now</button> -->



                            <form method="post">
                                <input type="text" name="points1" value="300" hidden>
                                <input type="submit" class="btn btn-primary-custom btn-sm w-100" name="plan1" value="Buy Now">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md ">
                <div class="card mb-3">
                    <div class="card-header bg-transparent fs-6 fw-semibold text-center " style="font-size: smaller;">
                        Premium</div>
                    <div class="card-body">
                        <div class=" mb-5">


                            <img src="./assets/images/jobcoin.png" alt=""><span class="fw-semibold fs-3" style="vertical-align: middle;">
                                500
                            </span> <br>
                            <span style="font-size: x-small;">Get best offer for 1 year. Register for the Premium plan
                                access 500 coins. </span>
                        </div>
                        <hr />
                        <div class=" mb-4" style="font-size: smaller;">
                            <i class="bi bi-clock-fill ms-1" style="color: #F18101;"></i> Valid for <span class="fw-semibold">1 Years </span><br>
                            <i class="bi bi-person-fill" style="color: #F18101; font-size: 17px !important;"></i> Single
                            user account
                        </div>
                        <div class="card-footer border-0 bg-transparent ">
                            <!-- <button class="btn btn-primary-custom btn-sm w-100">Buy Now</button> -->
                            <form method="post">
                                <input type="text" name="points2" value="600" hidden>
                                <input type="submit" class="btn btn-primary-custom btn-sm w-100" name="plan2" value="Buy Now">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md ">
                <div class="card mb-3">
                    <div class="card-header bg-transparent fs-6 fw-semibold text-center " style="font-size: smaller;">
                        Premium</div>
                    <form method="post">
                        <div class="card-body">
                            <div class=" mb-5">

                                <span class="" style="font-size: small ;">Buy coins as per your need</span>
                                <div class="mb-2">
                                    <input type="number" class="form-control form-control-sm" name="points3" id="customcoin">
                                </div>

                                <div class="col">
                                    <img src="./assets/images/jobcoin.png" alt=""><span class="  " style="vertical-align: middle;">
                                        1 Coin = ₹ 1
                                    </span>
                                </div>
                            </div>
                            <hr />
                            <div class=" mb-4" style="font-size: smaller;">
                                <i class="bi bi-clock-fill ms-1" style="color: #F18101;"></i> Valid for <span class="fw-semibold">30 Days </span><br>
                                <i class="bi bi-person-fill" style="color: #F18101; font-size: 17px !important;"></i> Single
                                user account
                            </div>
                            <div class="card-footer border-0 bg-transparent ">
                                <!-- <button class="btn btn-primary-custom btn-sm w-100">Buy Now</button> -->
                                <!-- <input type="text" name="points" value="600" hidden> -->
                                <input type="submit" class="btn btn-primary-custom btn-sm w-100" name="plan3" value="Buy Now">
                    </form>

                </div>
            </div>
        </div>
    </div>

    </div>
    <hr>
    <div class="my-3 text-center fw-semibold fs-5">
        Our Pricing Plans
    </div>
    <div class="row px-0 ms-auto me-auto bg-white text-center " style="width: 380px;">
        <div class="col  p-4 border">
            Classic
        </div>
        <div class="col  p-4 border">
            ₹ 300
        </div>
    </div>
    <div class="row px-0 ms-auto me-auto bg-white text-center " style="width: 380px;">
        <div class="col p-4 border">
            Premium
        </div>
        <div class="col p-4 border">
            ₹ 500
        </div>
    </div>
    <div class="row mt-5 text-center">
        <div class="col">
            <img src="./assets/images/jobcoin.png" alt=""><span class="  " style="vertical-align: middle;">
                1 Coin = ₹ 1
            </span>
        </div>
        <div class="col">
            <span class="  " style="vertical-align: middle;">
                1 Job Post =
            </span>

            <img src="./assets/images/jobcoin.png" alt=""><span class=" " style="vertical-align: middle;">
                50 Coins ( ₹ 50)
            </span>
        </div>
        <div class="col">
            <span class="  " style="vertical-align: middle;">
                1 Data =
            </span>

            <img src="./assets/images/jobcoin.png" alt=""><span class=" " style="vertical-align: middle;">
                2 Coins ( ₹ 2)
            </span>
        </div>

    </div>
    </div>


    <!-- footer -->
    <?php include './footer.php'; ?>
    <!-- script -->
    <script src="./assets/js/showrows.js"></script>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['plan1'])) {
    $points = $_POST['points1'];
    $fpoints = $db_points + $points;
    $currentDate = date('Y-m-d');
    $expirationDate = date('Y-m-d', strtotime('+6 months', strtotime($currentDate)));

    $add = "UPDATE `company` SET `coins`='$fpoints'  where username='$main_user' ";
    $run233 = mysqli_query($con, $add);

    $add2 = "INSERT INTO `plans`(`username`, `amount`, `active`, `edate`) VALUES ('$main_user','$points',1,'$expirationDate')";
    $run2 = mysqli_query($con, $add2);
    echo "
            <script>
              alert('$points Payment Sucessfully');
              window.location.href='company-plans.php';
            </script>
          ";
}





if (isset($_POST['plan2'])) {
    $points = $_POST['points2'];
    $currentDate = date('Y-m-d');
    $expirationDate = date('Y-m-d', strtotime('+1 year', strtotime($currentDate)));
    $fpoints = $db_points + $points;

    $add = "UPDATE `company` SET `coins`='$fpoints'  where username='$main_user' ";
    $run233 = mysqli_query($con, $add);

    $add2 = "INSERT INTO `plans`(`username`, `amount`, `active`, `edate`) VALUES ('$main_user','$points',1,' $expirationDate')";
    $run2 = mysqli_query($con, $add2);
    echo "
            <script>
              alert('$points Payment Sucessfully');
              window.location.href='company-plans.php';
            </script>
          ";
}







if (isset($_POST['plan3'])) {
    $points = $_POST['points3'];
    $currentDate = date('Y-m-d');
    $expirationDate = date('Y-m-d', strtotime('+30 days', strtotime($currentDate)));
    $fpoints = $db_points + $points;

    $add = "UPDATE `company` SET `coins`='$fpoints'  where username='$main_user' ";
    $run1 = mysqli_query($con, $add);

    $add2 = "INSERT INTO `plans`(`username`, `amount`, `active`, `edate`) VALUES ('$main_user','$points',1,' $expirationDate')";
    $run2 = mysqli_query($con, $add2);

    echo "
            <script>
              alert('$points Payment Sucessfully');
              window.location.href='company-plans.php';
            </script>
          ";
}

?>