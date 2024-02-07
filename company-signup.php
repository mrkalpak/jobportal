<?php
// -------------------------------# Company for registration------------------------------------------------------------------------
include "connection.php";
session_start();

if (isset($_POST['company_register'])) {


    $min = 1;
    $max = 100;
    $randomNumberInRange = rand($min, $max);

    $name = $_POST['name'];
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);
    $username = "comp" . date("mjYHis") . $randomNumberInRange;
    $mail = $_POST['email'];
    $cin = $_POST['cin'];
    $gst = $_POST['gst'];

    if (empty($name)) {
        $error = "Name is Required";
    } elseif (empty($mail)) {
        $error = "Email is Required";
    } elseif (empty($password)) {
        $error = "Password is Required";
    } elseif ($password != $cpassword) {
        $error = "Password does not match";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $error = "Password must contain at least one uppercase letter";
    } elseif (!preg_match("/[a-z]/", $password)) {
        $error = "Password must contain at least one lowercase letter";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long";
    } else {


        //   $stream = $_POST['stream'];}

        // $pancard = $_FILES['pancard'];
        // $gstcertificate = $_FILES['gstcertificate'];
        $coins = 600;


        if ($password == $cpassword) {


            $user_exist_query = "SELECT * FROM `company` WHERE  `email` ='$mail'";
            $result = mysqli_query($con, $user_exist_query);

            if ($result) {
                if (mysqli_num_rows($result) > 0) #it will be executed if username or email is already taken
                {
                    $result_fetch = mysqli_fetch_assoc($result);
                    if ($result_fetch['email'] == $mail) {
                        #error for username already registered
                        echo "
                    <script>
                      alert('$result_fetch[email] - E-mail already registered');
                      window.location.href='company-signup.php';
                    </script>
                  ";
                    }
                } else {



                    $image1 = $_FILES['imageA']['name'];
                    if (!empty($image1)) {
                        $target_file1 = basename($image1);
                        $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
                        $check1 = $_FILES['imageA']['tmp_name'];
                        $extension1 = substr($image1, strlen($image1) - 4, strlen($image1));
                        $image_ext1 = pathinfo($image1, PATHINFO_FILENAME);
                        $Final_image_name1 = $image_ext1 . date("mjYHis") . "." . $imageFileType1;
                        $destination1 = "companydocs/.$Final_image_name1";
                        move_uploaded_file($check1, $destination1);
                    } else {
                        $Final_image_name1 = "Not Uploaded";
                    }





                    // imageB and 2
                    $image2 = $_FILES['imageB']['name'];
                    if (!empty($image2)) {
                        $target_file2 = basename($image2);
                        $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
                        $check2 = $_FILES['imageB']['tmp_name'];
                        $extension2 = substr($image2, strlen($image2) - 4, strlen($image2));
                        $image_ext2 = pathinfo($image2, PATHINFO_FILENAME);
                        $Final_image_name2 = $image_ext2 . date("mjYHis") . "." . $imageFileType2;
                        $destination2 = "companydocs/.$Final_image_name2";
                        move_uploaded_file($check2, $destination2);
                    } else {
                        $Final_image_name2 = "Not Uploaded";
                    }






                    $password2 = password_hash($password, PASSWORD_BCRYPT);
                    $query = "INSERT INTO `company`(`username`,`name`,`email`,`password`, `cin`, `gst`, `pancard`, `gstcertificate`,`coins`) VALUES('$username','$name','$mail','$password2','$cin','$gst','$Final_image_name1','$Final_image_name2','$coins')";
                    if (mysqli_query($con, $query)) {
                        #if data inserted successfully
                        $query5 = "CREATE TABLE $username (
                  `stud_id` int(11) NOT NULL AUTO_INCREMENT,
                `username` varchar(250) NOT NULL,
                `jobid` int(250) DEFAULT NULL,
                `usertype` int(10) NOT NULL COMMENT 'applid ==0 or referral==1',
                `card` tinyint(1) NOT NULL,
                `action` tinyint(1) NOT NULL DEFAULT 0 COMMENT '(0  pending) (1 accept) ',
                PRIMARY KEY (`stud_id`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";


                        if ($fire5 = mysqli_query($con, $query5)) {

                            $_SESSION['logged_in'] = true;
                            $_SESSION['username'] = $username;
                            $_SESSION['type'] = 'comp';

                            // header("location: company-joblist.php");


                            #if data inserted successfully
                            echo "
                      <script>
                        alert('Comapany Registration Successful');
                        
                        window.location.href='company-profile.php?id=$username';
                      </script>
                    ";
                        } else {
                            $query6 = "DELETE FROM `company` WHERE `company`.`username` = '$username'";
                            $fire6 = mysqli_query($con, $query6);
                            echo "
                <script>
                  alert('DB Creation Error');
                  window.location.href='company-signup.php';
                </script>
              ";
                        }
                    } else {
                        #if data cannot be inserted
                        echo "
                    <script>
                      alert('Cannot Run Query 1');
                      window.location.href='company-signup.php';
                    </script>
                  ";
                    }
                }
            } else {
                echo "
                <script>
                  alert('Cannot Run Query 2');
                  window.location.href='company-signup.php';
                </script>
              ";
            }
        } else {
            echo "
                <script>
                  alert('Password Not Matched');
                  window.location.href='company-signup.php';
                </script>
              ";
        }
    }
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
    <link rel="stylesheet" href="./assets/css/login.css">

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- navbar  -->
    <?php include './navbar.php'; ?>

    <div class="row  my-5 login-card shadow bg-light">
        <h4 class="mt-5 px-5">
            Welcome to JOB FAIR INDIA
        </h4>
        <span class="px-5" style="font-size: smaller;">
            Already have an account? <a href="./company-login.php">Log in</a>
        </span>

        <h5 class="fw-bold mt-5 px-5" style="color: var(--primary);">
            Company Sign-Up
            <hr>
        </h5>

        <div class="col-md-6 px-5 login-card-details">
            <p style="color:red">
                <?php
                if (isset($error)) {
                    echo $error;
                }

                ?>
            </P>


            <form action="company-signup.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Company Name </label>
                    <input type="text" class="form-control" placeholder="Company Name" name="name" id="name" required>

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" required>

                </div>

                <div class="mb-3">
                    <label for="cinno" class="form-label">CIN Number </label>
                    <input type="text" class="form-control" placeholder="Company CIN Number" name="cin" id="cinno">

                </div>
                <div class="mb-3">
                    <label for="gstno" class="form-label">GST Number </label>
                    <input type="text" class="form-control" placeholder="Company GST Number" name="gst" id="gstno">

                </div>


        </div>
        <div class="col-md-6 ">
            <div class="mb-3">
                <label for="pancard" class="form-label">Company Pan Card / HR Offer Letter</label>
                <input class="form-control" type="file" name="imageA" id="pancard" required>
            </div>
            <div class="mb-3">
                <label for="gstcer" class="form-label">GST Certificate</label>
                <input class="form-control" type="file" name="imageB" id="gstcer">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" placeholder="********" name="password" class="form-control" id="password" required>
                    <button class="btn btn-outline-eye toggle-password" type="button">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>

            </div>
            <div class="mb-3">
                <label for="cnf_password" class="form-label">Conform Password</label>
                <input type="password" placeholder="********" name="cpassword" class="form-control" id="cnf_password" required>
            </div>

            <button type="submit" name="company_register" class="btn btn-theme-primary w-100 mb-5">Sign Up</button>
            </form>
        </div>
        <div class="text-center" style="font-size: smaller;">
            By Sign Up, you are agreeing to our Terms & Conditions and Privacy Policy.
        </div>
        <div class="mb-4"></div>
    </div>


    <script src="./assets/js/showpassword.js"></script>
    <!-- footer -->
    <?php include './footer.php'; ?>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>