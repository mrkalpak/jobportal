<?php
require('connection.php');
session_start();



if (isset($_GET['email']) && isset($_GET['token'])) {
    echo $email = $_GET['email'];
    echo  $token = $_GET['token'];
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

    </div>
    <section>

        <div class="row w-100">

            <?php
            if (isset($_GET['email']) && isset($_GET['token'])) { ?>
                <div class="col">
                    <div class="row border border-1 px-5  mx-5 my-5">

                        <h5 class="my-4">Set New Password</h5>
                        <form action="forgotpassword.php" method="post">
                            <h6 class="mt-4">Change Your Password</h6>
                            <div class="mb-3 col-md-6">
                                <label for="userType" class="form-label">User Type*</label>
                                <select name="user_type" class="form-select" id="userType" required>
                                    <option value="company">Company</option>
                                    <option value="candidate">Candidate</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="pass" class="form-label">New Password*</label>
                                    <input type="password" name="password" class="form-control" id="pass" required>

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="c_pass" class="form-label">Confirm Password*</label>
                                    <input type="password" name="cpassword" class="form-control" id="c_pass" required>




                                    <input type="hidden" name="email" value="<?= $email ?>" class="form-control" id="c_pass">
                                    <input type="hidden" name="token" value="<?= $token ?>" class="form-control" id="c_pass">




                                </div>
                                <button type="submit" name="update_pass" class=" col-auto mb-3 btn  text-white mt-5" style="background-color: var(--primary);">Update Change</button>
                            </div>
                        </form>




                    </div>
                </div>

            <?php

            } else { ?>


                <div class="col">
                    <div class="row border border-1 px-5  mx-5 my-5">

                        <h5 class="my-4">Set New Password</h5>
                        <form action="forgotpassword.php" method="post">
                            <h6 class="mt-4">This is Forgot Password Page . </h6><br>
                            <h6 class="mt-4">To change password Forgot it(go to main website and forgot by entering the email ) </h6>


                        </form>




                    </div>
                </div>

            <?php

            }
            ?>


        </div>

    </section>
    <!-- footer -->
    <?php include './footer.php'; ?>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="./assets/js/candidate-sidenavbar.js"></script>
</body>


<?php



// --------------------------------------------------------candidate Forgot Password-----------------------------------------------------------------------------------
if (isset($_POST['update_pass']) && ($_POST['user_type'] == "candidate")) {


    $email = $_POST['email'];
    $token = $_POST['token'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password == $cpassword) {

        if (isStrongPassword($password)) {


            $check = "SELECT email, token,username FROM users_candidate WHERE email = '$email'";
            $run = mysqli_query($con, $check);
            if ($run && (mysqli_num_rows($run) > 0)) {
                $data1 = mysqli_fetch_assoc($run);
                $db_token = $data1['token'];
                $username = $data1['username'];

                if ($db_token == $token) {
                    $password2 = password_hash($password, PASSWORD_BCRYPT);
                    $updateP = "UPDATE `users_candidate` SET `password` = '$password2', `token` = '0' WHERE `email` = '$email'";

                    $run2 = mysqli_query($con, $updateP);
                    if ($run2) {


                        echo "
                   <script>
                     alert('Password updated Sucessfully ');
                     window.location.href='forgotpassword.php';
                   </script>
                 ";
                    } else {

                        echo "
                   <script>
                     alert('Cannot Run Query');
                     window.location.href='forgotpassword.php';
                   </script>
                 ";
                    }
                } else {
                    echo "
                <script>
                  alert('Need to forgot Password Again');
                  window.location.href='forgotpassword.php';
                </script>
              ";
                }
            } else {
                echo "
                <script>
                    alert('Your account not found');
                    window.location.href='forgotpassword.php';
                </script>
            ";
            }
        } else {
            echo "
            <script>
                alert('Password should  least 8 characters, including uppercase,numbers.');
                window.location.href='forgotpassword.php';
            </script>
        ";
        }
    } else {
        echo "
        <script>
          alert('Password Not Matched');
          window.location.href='forgotpassword.php';
        </script>
      ";
    }
}


?>


<!-- --------------------------Company Forgot Password------------------------------- -->
<?php

if (isset($_POST['update_pass']) && ($_POST['user_type'] == "company")) {


    $email = $_POST['email'];
    $token = $_POST['token'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password == $cpassword) {

        if (isStrongPassword($password)) {


            $check = "SELECT email, token FROM company WHERE email = '$email'";
            $run = mysqli_query($con, $check);
            if ($run && (mysqli_num_rows($run) > 0)) {
                $data1 = mysqli_fetch_assoc($run);
                $db_token = $data1['token'];
                // $username = $data1['username'];

                if ($db_token == $token) {
                    $password2 = password_hash($password, PASSWORD_BCRYPT);
                    $updateP = "UPDATE `company` SET `password` = '$password2', `token` = '0' WHERE `email` = '$email'";

                    $run2 = mysqli_query($con, $updateP);
                    if ($run2) {


                        echo "
                   <script>
                     alert('Password updated Sucessfully ');
                     window.location.href='forgotpassword.php';
                   </script>
                 ";
                    } else {

                        echo "
                   <script>
                     alert('Cannot Run Query');
                     window.location.href='forgotpassword.php';
                   </script>
                 ";
                    }
                } else {
                    echo "
                <script>
                  alert('Need to forgot Password Again');
                  window.location.href='forgotpassword.php';
                </script>
              ";
                }
            } else {
                echo "
                <script>
                    alert('Your account not found');
                    window.location.href='forgotpassword.php';
                </script>
            ";
            }
        } else {
            echo "
            <script>
                alert('Password should  least 8 characters, including uppercase,numbers.');
                window.location.href='forgotpassword.php';
            </script>
        ";
        }
    } else {
        echo "
        <script>
          alert('Password Not Matched');
          window.location.href='forgotpassword.php';
        </script>
      ";
    }
}


?>

<?php

function isStrongPassword($password)
{
    // Check if the password is greater than 8 characters
    if (strlen($password) <= 8) {
        return false;
    }

    // Check if the password contains at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }

    // Check if the password contains at least one digit
    if (!preg_match('/[0-9]/', $password)) {
        return false;
    }



    // If all checks pass, the password is strong
    return true;
}

// Example usage:


?>


</html>