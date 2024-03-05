<?php
require('connection.php');
session_start();

if (isset($_GET['url'])) {
  echo $link2 = $_GET['url'];
}



?>
<?php include './header.php'; ?>

<?php include './Navbar.php'; ?>

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
$env = parse_ini_file('.env');
if($_SERVER['SERVER_PORT']==443) {
  $header = $env["HEADER_SERVER"];
  
}
else {
  $header = $env["HEADER"];
}

// echo "im in statment";
if (isset($_POST['update_pass']) && ($_POST['user_type'] == "candidate")) {
  $email = $_POST['email'];
  $check = "SELECT `email`,`username` FROM `users_candidate` WHERE email = '$email'";
  $run = mysqli_query($con, $check);
  if ($run && mysqli_num_rows($run) > 0) {





    $token = mt_rand(100000, 99999999);
    $updateQ = "UPDATE `users_candidate` SET `token` = '$token' WHERE `users_candidate`.`email` = '$email'";
    $result2 = mysqli_query($con, $updateQ);

    if ($result2) {


      $link = $header . "forgotpassword.php?token=$token&email=$email";
      // var_dump($link)  ; 
      $idParameterEncoded = urlencode($link);

      $url = "$idParameterEncoded";

            $to_email = 'nihal5930@gmail.com';
            $subject = "Reset Link Please click and Reset Password";
            $body = $link;
            $headers = "From: nm371136@gmail.com";
            
            if (mail($to_email, $subject, $body, $headers)) {
              echo "
              <script>
                alert('Reset Link has been sent to your Registered Mail Id  ');
              </script>
            ";
                // echo "Email successfully sent to $to_email...";
            } else {
                echo "Email sending failed...";
            }

 


          //   echo "
          //   <script>
          //     alert('Your Accound is found.we send mail on $email,Thank you ');
          //     window.location.href='forgotpassword1.php?url=$url';
          //   </script>
          // ";
        } else {
      echo "
            <script>
              alert('Your Accound is found.we send mail on $email,Thank you ');
              window.location.href='forgotpassword1.php?url=$url';
            </script>
          ";
    } 
    // else {

    //   echo "
    //         <script>
    //           alert('Cannot Run Query');
    //           window.location.href='forgotpassword1.php';
    //         </script>
    //       ";
    // }
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


      $link = $header . "forgotpassword.php?token=$token&email=$email";
      $idParameterEncoded = urlencode($link);
            $url = "$idParameterEncoded";
            $to_email = 'nihal5930@gmail.com';
            $subject = "Reset Link Please click and Reset Password";
            $body = $link;
            $headers = "From: nm371136@gmail.com";
            
            if (mail($to_email, $subject, $body, $headers)) {
              echo "
              <script>
                alert('Reset Link has been sent to your Registered Mail Id  ');
              </script>
            ";
                // echo "Email successfully sent to $to_email...";
            } else {
                echo "Email sending failed...";
            }

            // echo "
            // <script>
            //   alert('Your Accound is found.we send mail on $email,Thank you ');
            //   window.location.href='forgotpassword1.php?url=$url';
            // </script>
          // ";
        } else {
      $url = "$idParameterEncoded";


      echo "
            <script>
              alert('Your Accound is found.we send mail on $email,Thank you ');
              window.location.href='forgotpassword1.php?url=$url';
            </script>
          ";
    }
    //  else {


    //   echo "
    //         <script>
    //           alert('Cannot Run Query');
    //           window.location.href='forgotpassword1.php';
    //         </script>
    //       ";
    // }
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