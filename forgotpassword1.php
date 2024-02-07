<?php
require('connection.php');
session_start();

if (isset($_GET['url'])) {
    echo $link2 = $_GET['url'];
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
    <link rel="stylesheet" href="./assets/css/candidate-appliedjobs.css">
    <link rel="stylesheet" href="./assets/css/candidate-editresume.css">
    <!-- <link rel="stylesheet" href="./assets/css/candidate-dashboard.css"> -->


    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <?php include './profileNavbar.php'; ?>

    <div id="button-side-nav-bar" class="">

    </div>
    <section>

        <div class="row w-100">




            <div class="col">
                <div class="row border border-1 px-5  mx-5 my-5">

                    <h5 class="my-4">Forgot Password</h5>
                    <form action="forgotpassword1.php" method="post">
                        <h6 class="mt-4">Enter Your Email-id</h6>

                        <div class="mb-3 col-md-6">
                            <label for="userType" class="form-label">User Type*</label>
                            <select name="user_type" class="form-select" id="userType" required>
                                <option value="company">Company</option>
                                <option value="candidate">Candidate</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">

                                <input type="email" name="email" class="form-control" id="pass" required>

                            </div>
                            <div class="mb-3 col-md-6">

                            </div>
                            <button type="submit" name="update_pass" class=" col-auto mb-3 btn  text-white mt-5" style="background-color: var(--primary);">Forgot Password</button>
                        </div>
                    </form>



                    <form>
                        <h6 class="mt-4">Your Link</h6>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <?php
                                if (isset($_GET['url'])) { ?>

                                    <input type="email" name="email" value="<?= $link2 ?>" class="form-control" id="pass">
                                <?php }
                                ?>


                            </div>
                            <div class="mb-3 col-md-6">

                            </div>
                        </div>
                    </form>



                </div>

            </div>
        </div>

    </section>
    <!-- footer -->
    <?php include './footer.php'; ?>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="./assets/js/candidate-sidenavbar.js"></script>
</body>


<?php

if (isset($_POST['update_pass']) && ($_POST['user_type'] == "candidate")) {
    echo "im in statment";
    $email = $_POST['email'];
    $check = "SELECT `email`,`username` FROM `users_candidate` WHERE email = '$email'";
    $run = mysqli_query($con, $check);
    if ($run && mysqli_num_rows($run) > 0) {





        $token = mt_rand(100000, 99999999);
        $updateQ = "UPDATE `users_candidate` SET `token` = '$token' WHERE `users_candidate`.`email` = '$email'";
        $result2 = mysqli_query($con, $updateQ);
        if ($result2) {


            $link = "http://localhost/jobportal/forgotpassword.php?token=$token&email=$email";
            $idParameterEncoded = urlencode($link);

            $url = "$idParameterEncoded";


            echo "
            <script>
              alert('Your Accound is found.we send mail on $email,Thank you ');
              window.location.href='forgotpassword1.php?url=$url';
            </script>
          ";
        } else {

            echo "
            <script>
              alert('Cannot Run Query');
              window.location.href='forgotpassword1.php';
            </script>
          ";
        }
    } else {
        echo "
        <script>
          alert('Sorry!!! account not found with this E-mail ');
          window.location.href='forgotpassword1.php';
        </script>
      ";
    }
}


?>




<?php

if (isset($_POST['update_pass']) && ($_POST['user_type'] == "company")) {

    $email = $_POST['email'];
    $check = "SELECT `email`,`username` FROM `company` WHERE email = '$email'";
    $run = mysqli_query($con, $check);
    if ($run && mysqli_num_rows($run) > 0) {





        $token = mt_rand(100000, 99999999);
        $updateQ = "UPDATE `company` SET `token` = '$token' WHERE `company`.`email` = '$email'";
        $result2 = mysqli_query($con, $updateQ);
        if ($result2) {


            $link = "http://localhost/jobportal/forgotpassword.php?token=$token&email=$email";
            $idParameterEncoded = urlencode($link);

            $url = "$idParameterEncoded";


            echo "
            <script>
              alert('Your Accound is found.we send mail on $email,Thank you ');
              window.location.href='forgotpassword1.php?url=$url';
            </script>
          ";
        } else {

            echo "
            <script>
              alert('Cannot Run Query');
              window.location.href='forgotpassword1.php';
            </script>
          ";
        }
    } else {
        echo "
        <script>
          alert('Sorry!!! account not found with this E-mail ');
          window.location.href='forgotpassword1.php';
        </script>
      ";
    }
}


?>



</html>