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

<?php include './profileNavbar.php'; ?>

<div id="button-side-nav-bar" class="">

</div>
<section>

    <div class="row w-100">

        <?php
        $activePage = 'setting';
        include './candidate-sidenavbar.php';
        ?>


        <div class="col">
            <div class="row border border-1 px-5  mx-5 my-5">

                <h5 class="my-4">Profile Settings</h5>
                <form action="candidate-setting.php" method="post">
                    <h6 class="mt-4">Change Your Password</h6>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="pass" class="form-label">New Password*</label>
                            <input type="password" name="password" class="form-control" id="pass">

                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="c_pass" class="form-label">Confirm Password*</label>
                            <input type="password" name="cpassword" class="form-control" id="c_pass">

                        </div>
                        <button type="submit" name="update_pass" class=" col-auto mb-3 btn  text-white mt-5" style="background-color: var(--primary);">Update Change</button>
                    </div>
                </form>


                <form action="">
                    <!-- <h6 class="mt-4">Phone & Email</h6>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="p-cno" class="form-label">Primary Number*</label>
                                <input type="number" class="form-control" id="p-cno">

                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="s-cno" class="form-label">Secondary Number*</label>
                                <input type="number" class="form-control" id="s-cno">

                            </div>

                        </div>

                        <h6 class="mt-4">Change Location</h6>
                        <div class="mb-3 col-md-12">
                            <label for="location" class="form-label">Get Location*</label>
                            <input type="email" class="form-control" id="location">

                        </div> -->
                    <h6 class="mt-4">Privacy & Security</h6>
                    <div class="d-flex my-2 justify-content-between">

                        <label class=" ms-0 me-auto" for="">All Job Alert</label>
                        <div class="form-check form-switch me-0 ms-auto">
                            <input class="form-check-input" type="checkbox" id="alljobalert" checked>
                        </div>
                    </div>
                    <div class="d-flex my-2 justify-content-between">

                        <label class=" ms-0 me-auto" for="">Resume Visibility</label>
                        <div class="form-check form-switch me-0 ms-auto">
                            <input class="form-check-input" type="checkbox" id="visibility" checked>
                        </div>
                    </div>
                    <div class="my-2">
                        Disable Account <br>
                        <span style="color: #595959; font-size: smaller">If you log in again you will able to see all the match jobs and get all information.</span>

                    </div>
                    <div class="d-flex my-2 justify-content-between">

                        <div class="deleteac">
                            Delete Account <br>
                            <span style="color: #595959; font-size: smaller">If you delete your account, you will no longer be able to get information about the matched jobs.</span>
                        </div>
                        <div class="btn" style="color: #FF3023;">
                            Delete Account
                        </div>
                    </div>
                    <button class=" col-auto mb-3 btn  text-white mt-5" style="background-color: var(--primary);">Update Change</button>
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

if (isset($_POST['update_pass'])) {
    echo "im in statment";
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password == $cpassword) {
        $password2 = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $updateP = "UPDATE `users_candidate` SET `password` = '$password2' WHERE `users_candidate`.`username` = '$main_user'";
        $run = mysqli_query($con, $updateP);
        if ($run) {

            echo "
               <script>
                 alert('Password updated Sucessfully');
                 window.location.href='candidate-setting.php';
               </script>
             ";
        } else {

            echo "
               <script>
                 alert('Cannot Run Query');
                 window.location.href='candidate-setting.php';
               </script>
             ";
        }
    } else {
        echo "
        <script>
          alert('Password Not Matched');
          window.location.href='candidate-setting.php';
        </script>
      ";
    }
}


?>

</html>