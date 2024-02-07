<?php
include "connection.php";

session_start();
if (isset($_POST['register'])) {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if (empty($name)) {
        $error = "Name is Required";
    } elseif (empty($email)) {
        $error = "Email is Required";
    } elseif (empty($password)) {
        $error = "Password is Required";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long";
    } elseif ($password != $cpassword) {
        $error = "Password does not match";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $error = "Password must contain at least one uppercase letter";
    } elseif (!preg_match("/[a-z]/", $password)) {
        $error = "Password must contain at least one lowercase letter";
    } else {
        $username = "user" . date("mjYHis");
        //   $stream = $_POST['stream'];

        if ($password == $cpassword) {

            $mail = $_POST['email'];
            $user_exist_query = "SELECT * FROM `users_candidate` WHERE  `email`='$_POST[email]'";
            $result = mysqli_query($con, $user_exist_query);

            if ($result) {
                if (mysqli_num_rows($result) > 0) #it will be executed if username or email is already taken
                {
                    $result_fetch = mysqli_fetch_assoc($result);
                    if ($result_fetch['email'] == $_POST['email']) {
                        #error for username already registered
                        echo "
                  <script>
                    alert('$result_fetch[email] - E-mail already registered');
                    window.location.href='candidate-signup.php';
                  </script>
                ";
                    }
                } else {



                    // ------Write Code For Payment Method--------------






                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $query = "INSERT INTO `users_candidate`(`name`,`username`, `email`, `password`) VALUES ('$name','$username','$mail','$password')";
                    if (mysqli_query($con, $query)) {
                        $_SESSION['logged_in'] = true;
                        $_SESSION['username'] = $username;
                        $_SESSION['type'] = 'stud';

                        // header("location: company-joblist.php");


                        #if data inserted successfully
                        echo "
                            <script>
                              alert('Registration Successful');
                              
                              window.location.href='candidate-myprofile.php';
                            </script>
                          ";
                    } else {
                        #if data cannot be inserted
                        echo "
                  <script>
                    alert('Cannot Run Query');
                    window.location.href='candidate-signup.php';
                  </script>
                ";
                    }
                }
            } else {
                echo "
              <script>
                alert('Cannot Run Query');
                window.location.href='candidate-signup.php';
              </script>
            ";
            }
        } else {
            echo "
              <script>
                alert('Password Not Matched');
                window.location.href='candidate-signup.php';
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

    <div class="row  my-5 login-card shadow">
        <div class="col-md-5 login-card-details">
            <h4 class="mt-5">
                Welcome to JOB FAIR INDIA
            </h4>
            <span style="font-size: smaller;">
                Already have an account? <a href="./candidate-login.php">Log in</a>
            </span>

            <h5 class="fw-bold mt-5" style="color: var(--primary);">
                Candidate Sign Up
            </h5>
            <p style="color:red">
                <?php
                if (isset($error)) {
                    echo $error;
                }

                ?>
            </P>

            <form class="mt-5" action="" method="POST">
                <form class="mt-5">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name </label>
                        <input type="text" name="name" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control" placeholder="Enter Name" id="name" value="<?php if (isset($error)) {
                                                                                                                                                                            echo $name;
                                                                                                                                                                        } ?>" required>

                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email </label>
                        <input type="email" class="form-control" name="email" placeholder="Email Address" id="email" value="<?php if (isset($error)) {
                                                                                                                                echo $email;
                                                                                                                            } ?>" required>

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
                        <label for="cnf_password" class="form-label">Confirm Password</label>
                        <input type="password" placeholder="********" name="cpassword" class="form-control" id="cpassword" required>
                    </div>

                    <button type="submit" name="register" class="btn btn-theme-primary w-100 mb-5">Sign In</button>
                </form>

                <span class="" style="font-size: smaller;">
                    By login, you are agreeing to our Terms & Conditions and Privacy Policy.
                </span>
                <div class="mb-4"></div>
        </div>
        <div class="col-md-7 login-img-background py-5">
            <img src="./assets/images/logo.png" class="ms-auto me-auto" width="300 rem" height="105px" alt="">
            <img src="./assets/images/login-sideimage.png" width="300rem" alt="">
        </div>
    </div>


    <script src="./assets/js/showpassword.js"></script>
    <!-- footer -->
    <?php include './footer.php'; ?>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

<?php

?>

</html>