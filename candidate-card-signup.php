<?php
include "connection.php";
session_start();
if (isset($_POST['register'])) {


    $name = $_POST['name'];
    $jobcard = $_POST['jobcard'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if (empty($name)) {
        $error = "Name is Required";
    } elseif (empty($jobcard)) {
        $error = "jobcard is Required";
    } elseif (empty($email)) {
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
        $username = "usercard" . date("mjYHis");




        if ($password == $cpassword) {

            $fetch_cardno = "SELECT * FROM `jobcards` WHERE  `card_id`='$jobcard'";
            $resul2 = mysqli_query($con, $fetch_cardno);
            if ($resul2 && mysqli_num_rows($resul2) > 0) {
                $data1 = mysqli_fetch_assoc($resul2);
                $card_no = $data1['card_id'];

                $active = $data1['card_active'];
                $expiremonth = $data1['expire_months'];


                $today = date('Y-m-d');
                $expire_date = date('Y-m-d', strtotime($today . ' + ' . $expiremonth . ' months'));



                if ($active == 0) {
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
                                        window.location.href='candidate-card-signup.php';
                                      </script>
                                    ";
                            }
                        } else {

                            // ------Write Code For Payment Method--------------

                            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                            $query = "INSERT INTO `users_candidate`(`name`,`username`, `email`, `password`, `cardtype`, `expire_date`) VALUES ('$name','$card_no','$mail','$password',1,'$expire_date')";
                            $jobcard_update = "UPDATE `jobcards` 
                            SET `card_active` = 1, 
                                `card_sdate` = '$today', 
                                `card_edate` = '$expire_date'
                            WHERE `card_id` = '$card_no'";

                            $fire = mysqli_query($con, $jobcard_update);
                            if (mysqli_query($con, $query) && $fire) {
                                $_SESSION['logged_in'] = true;
                                $_SESSION['username'] = $card_no;
                                $_SESSION['type'] = 'stud';
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
                                            alert('Cannot Run Query 1');
                                            window.location.href='candidate-card-signup.php';
                                          </script>
                                        ";
                            }
                        }
                    } else {
                        echo "
                                  <script>
                                    alert('Cannot Run Query 2');
                                    window.location.href='candidate-card-signup.php';
                                  </script>
                                ";
                    }
                } else {
                    echo "
                <script>
                  alert('Jobcard Expired!!!.');
                  window.location.href='candidate-card-signup.php';
                </script>
              ";
                }
            } else {
                echo "
                <script>
                  alert('Jobcard Expired!!!.. $jobcard');
                  window.location.href='candidate-card-signup.php';
                </script>
              ";
            }
        } else {
            echo "
              <script>
                alert('Password Not Matched');
                window.location.href='candidate-card-signup.php';
              </script>
            ";
        }
    }
}


?>
<?php include './header.php'; ?>

<link rel="stylesheet" href="./assets/css/login.css">
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
            Candidate Login
        </h5>
        <p style="color:red">
            <?php
            if (isset($error)) {
                echo $error;
            }

            ?>
        </P>

        <form class="mt-5" action="candidate-card-signup.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="name" name="name" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control" placeholder="Enter Name" id="name" value="<?php if (isset($error)) {
                                                                                                                                                                    echo $name;
                                                                                                                                                                } ?>" required>

            </div>
            <div class="mb-3">
                <label for="job-card-number" class="form-label">Job Card Number </label>
                <input type="text" name="jobcard" class="form-control" placeholder="Card Number" id="jobcard" value="<?php if (isset($error)) {
                                                                                                                            echo $jobcard;
                                                                                                                        } ?>" required>

            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" value="<?php if (isset($error)) {
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
 
</body>

</html>