<?php
require('connection.php');


function checkSession(){
  session_start();
  if (empty($_SESSION['username'])) {
    header("Location: index.php");
  }
}

#for login--------------------------------------------------------------------





if (isset($_POST['login'])) {
  $query = "SELECT * FROM `users_candidate` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
  $result = mysqli_query($con, $query);

  echo "username";

  echo  $_POST['email_username'];

  if ($result) {
    if (mysqli_num_rows($result) == 1) {
      $result_fetch = mysqli_fetch_assoc($result);
      if (password_verify($_POST['password'], $result_fetch['password'])) {
        checkSession();
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $result_fetch['username'];
        $_SESSION['name'] = $result_fetch['name'];
        $_SESSION['type'] = 'stud';
        header("location: candidate-myprofile.php");
      } else {
        echo "
          <script>
            alert('Incorrect Password');
            window.location.href='candidate-login.php';
          </script>
        ";
      }
    } else {
      echo "
            <script>
              alert('Email or Username Not Registered');
              window.location.href='candidate-login.php';
            </script>
          ";
    }
  } else {
    echo "
      <script>
        alert('Cannot Run Query');
        window.location.href='candidate-login.php';
      </script>
    ";
  }
}




?>

<!-- ---------------------------company login--------------------------------------- -->

<?php

if (isset($_POST['company_login'])) {
  $email = $_POST['email_username'];
  $username = $_POST['email_username'];
  $password = trim($_POST['password']);

  // var_dump($_POST);
  // return;


  if($email !='' && $password!=''){
  $query = "SELECT * FROM `company` WHERE `email`='$email' OR `username`='$username'";
  $result = mysqli_query($con, $query);

  if ($result) {
    if (mysqli_num_rows($result) == 1) {
      $result_fetch = mysqli_fetch_assoc($result);
      checkSession();
      if ($result_fetch['active'] == 2) {

        echo "
        <script>
          alert('Your company has been rejected.');
          window.location.href='company-login.php';
        </script>
      ";
      } else {
        if (password_verify($password, $result_fetch['password'])) {
          echo "password matched";
          $_SESSION['logged_in'] = true;
          $_SESSION['username'] = $result_fetch['username'];
          $_SESSION['name'] = $result_fetch['name'];
          $_SESSION['type'] = 'comp';
          header("location: company-profile.php");
        } else {
        }
        echo "
        <script>
          alert('Password Not Matched....');
          window.location.href='company-login.php';
        </script>
      ";
      }
    } else {
      echo "
            <script>
              alert('Email or Username Not Registered');
              window.location.href='company-signup.php';
            </script>
          ";
    }
  } else {
    echo "
            <script>
              alert('Cannot Run Query');
              window.location.href='company-login.php';
            </script>
          ";
  }
}else{
  echo "
  <script>
    alert('Please Enter Email and Password');
    window.history.back();
  </script>
  ";
}
}



?>






<?php




// -------------------------------#for registration student------------------------------------------------------------------------



if (isset($_POST['register'])) {


  checkSession();

  $min = 1;
  $max = 100;
  $randomNumberInRange = rand($min, $max);
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  // $phone = $_POST['phone'];
  // $dob = $_POST['dob'];
  $name = $_POST['name'];

  $username = "user" . date("mjYHis") . $randomNumberInRange;
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
                  window.location.href='candidate-signup1.php';
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




?>


<!-- ---------------------test-------------------------------- -->





<!-- ----------------------------Update Profile---------------------- -->

<?php
checkSession();

if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $location = $_POST['location'];
  $phone = $_POST['phone'];
  // $email = $_POST['email'];
  $currentjob = $_POST['currentjob'];
  $designation = $_POST['designation'];
  $exprience = $_POST['exprience'];
  $linkedin = $_POST['linkedin'];

  if ($_POST['qualification'] == null) {
    echo "from if : -";
    echo $qualification = $_POST['qualification1'];
  } else {
    echo "<br>from else";
    echo $qualification = $_POST['qualification'];
  }


  if ($_POST['category'] == null) {
    echo "<br>from if";
    echo $category = $_POST['category1'];
  } else {
    echo "<br>from else";
    echo $category = $_POST['category'];
  }




  $description = $con -> real_escape_string($_POST['description']);
  echo $file = $_FILES['file']['name'];


  $target_file2 = basename($file);
  $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
  $check2 = $_FILES['file']['tmp_name'];
  $extension2 = substr($file, strlen($file) - 4, strlen($file));
  $image_ext2 = pathinfo($file, PATHINFO_FILENAME);
  $Final_image_name2 = $image_ext2 . date("mjYHis") . "." . $imageFileType2;
  $destination2 = "uploaddocs/.$Final_image_name2";


  move_uploaded_file($check2, $destination2);

  // Assuming you're using sessions to track the logged-in user
  $username = $_SESSION['username'];
  if ($file == null) {
    $query = "UPDATE `users_candidate` SET 
    `name` = '$name', 
    `age` = '$age', 
    `location` = '$location', 
    `phone` = '$phone', 
    `currentjob` = '$currentjob', 
    `designation` = '$designation' ,
    `experience_level` = '$exprience' ,
    `qualification` = '$qualification',
    `category` = '$category' , 
    `description` = '$description', 
    `linkedin` = '$linkedin'  WHERE `users_candidate`.`username` = '$username';";
  } else {
    $query = "UPDATE `users_candidate` SET 
    `name` = '$name', 
    `age` = '$age', 
    `location` = '$location', 
    `phone` = '$phone', 
    `currentjob` = '$currentjob', 
    `designation` = '$designation',
    `experience_level` = '$exprience' ,
    `qualification` = '$qualification',
    `category` = '$category' , 
    `resume` = '$Final_image_name2', 
    `description` = '$description', 
    `linkedin` = '$linkedin'  WHERE `users_candidate`.`username` = '$username';";
  }


  $result = mysqli_query($con, $query);

  if ($result) {
    echo "
          <script>
            alert('Data updated Sucessfully');
            window.location.href='candidate-myprofile.php';
          </script>
        ";
  } else {
    echo "
      <script>
        alert('Somrthing went Wrong');
        window.location.href='candidate-myprofile.php';
      </script>
    ";
  }
}
?>



<?php
// -------------------------------# Company for registration------------------------------------------------------------------------



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
        $target_file1 = basename($image1);
        $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
        $check1 = $_FILES['imageA']['tmp_name'];
        $extension1 = substr($image1, strlen($image1) - 4, strlen($image1));
        $image_ext1 = pathinfo($image1, PATHINFO_FILENAME);
        $Final_image_name1 = $image_ext1 . date("mjYHis") . "." . $imageFileType1;
        $destination1 = "companydocs/.$Final_image_name1";

        // imageB and 2
        $image2 = $_FILES['imageB']['name'];
        $target_file2 = basename($image2);
        $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
        $check2 = $_FILES['imageB']['tmp_name'];
        $extension2 = substr($image2, strlen($image2) - 4, strlen($image2));
        $image_ext2 = pathinfo($image2, PATHINFO_FILENAME);
        $Final_image_name2 = $image_ext2 . date("mjYHis") . "." . $imageFileType2;
        $destination2 = "companydocs/.$Final_image_name2";

        move_uploaded_file($check1, $destination1);

        move_uploaded_file($check2, $destination2);






        $password2 = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO `company`(`username`,`name`,`email`,`password`, `cin`, `gst`, `pancard`, `gstcertificate`,`coins`) VALUES('$username','$name','$mail','$password2','$cin','$gst','$Final_image_name1','$Final_image_name2','$coins')";
        if (mysqli_query($con, $query)) {
          #if data inserted successfully
          $query5 = "CREATE TABLE $username (
             `stud_id` int(11) NOT NULL,
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
                    
                    window.location.href='company-profile.php';
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




?>




<!-- --------------------------company Update------------------------- -->



<?php
        // checkSession();

if (isset($_POST['companyupdate'])) {
  // $email = $_POST['email'];
  $name = $_POST['name'];
  if ($_POST['companytype'] == null) {

    $companytype = $_POST['companytype1'];
  } else {

    $companytype = $_POST['companytype'];
  }


  $companysize = $_POST['companysize'];
  // $companylogo = $_POST['companylogo'];
  $location = $_POST['location'];
  $websitelink = $_POST['websitelink'];
  $facebook = $_POST['facebook'];
  $linkedin = $_POST['linkedin'];
  $mobile = $_POST['mobile'];
  $alternatemobile = $_POST['alternatemobile'];
  $file = $_FILES['file']['name'];


  $target_file2 = basename($file);
  $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
  $check2 = $_FILES['file']['tmp_name'];
  $extension2 = substr($file, strlen($file) - 4, strlen($file));
  $image_ext2 = pathinfo($file, PATHINFO_FILENAME);
  $Final_image_name2 = $image_ext2 . date("mjYHis") . "." . $imageFileType2;
  $destination2 = "companydocs/.$Final_image_name2";


  move_uploaded_file($check2, $destination2);

  // Assuming you're using sessions to track the logged-in user 
  $username = $_SESSION['username'];

  // var_dump($username);
  // return;

  $query = "UPDATE `company` SET `name`='$name',`companytype`='$companytype',`companysize`='$companysize',`companylogo`='$Final_image_name2',
  `location`='$location',`websitelink`='$websitelink',`facebook`='$facebook',
  `linkedin`='$linkedin',`mobile`='$mobile',`alternatemobile`='$alternatemobile' WHERE `company`.`username` = '$username';";

  $result = mysqli_query($con, $query);

  $chkpopup = "SELECT * FROM `company`  WHERE `company`.`username` = '$username'";

  $resultchk = mysqli_query($con, $chkpopup);
  $fetchchk = mysqli_fetch_assoc($resultchk);


  if ($result) {
    if ($fetchchk['active'] != 1) {
      echo "
      <script>
        alert('Data updated Sucessfully');
        window.location.href='popup.php';
      </script>
    ";
    } else {
      echo "
      <script>
        alert('Data updated Sucessfully');
        window.location.href='company-profile.php';
      </script>
    ";
    }
  } else {
    echo "
      <script>
        alert('Somrthing went Wrong');
        window.location.href='company-profile.php';
      </script>
    ";
  }
}
?>


















<?php

#admin Login

if (isset($_POST['admin_login'])) {
  echo $admin_mail = $_POST['amail'];
  checkSession();
  $query = "SELECT * FROM `admin` WHERE `admin_email`='$admin_mail'";
  $result = mysqli_query($con, $query);

  if ($result) {
    if (mysqli_num_rows($result) == 1) {
      $result_fetch = mysqli_fetch_assoc($result);
      if ($_POST['password'] == $result_fetch['admin_password']) {
        checkSession();
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $result_fetch['admin_email'];
        $_SESSION['type'] = 'admin';
        // $_SESSION['name'] = $result_fetch['name'];
        header("location: admin/index.php");
      } else {
        echo "
          <script>
            alert('Incorrect Password');
            window.location.href='admin_login.php';
          </script>
        ";
      }
    } else {
      echo "
        <script>
          alert('Email or Username Not Registered');
          window.location.href='admin_login.php';
        </script>
      ";
    }
  } else {
    echo "
      <script>
        alert('Cannot Run Query');
        window.location.href='admin_login.php';
      </script>
    ";
  }
}
?>