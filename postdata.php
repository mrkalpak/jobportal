<?php
require('connection.php');
session_start();
// echo "im in post data";
?>







<?php
if (isset($_POST['postjob'])) {



  // echo $nightshift = $_POST['nightshift'] ?? 'DefaultJobTitle';
  $jobcost = 50;
  $username = $_SESSION['username'];



  $companyname = $_POST['companyname'];
  $deadline = $_POST['deadline'];
  $location = $_POST['location'];
  $jobtitle = $_POST['jobtitle'];
  $jobtype = $_POST['jobtype'];
  $category = $_POST['category'];
  $joblocation = $_POST['joblocation'];
  $jobsalaytype = $_POST['jobsalaytype'];
  $minsalary = $_POST['minsalary'];
  $maxsalary = $_POST['maxsalary'];
  $education = $_POST['education'];
  $minyr = $_POST['minyr'];
  $maxyr = $_POST['maxyr'];
  $vacancy = $_POST['vacancy'];
  $gender = $_POST['gender'];
  $description = $_POST['description'];
  $responsibility = $_POST['responsibility'];
  $requirements = $_POST['requirements'];



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



  $query2 = "SELECT `coins` FROM `company` WHERE `company`.`username` = '$username'";

  if ($result2 = mysqli_query($con, $query2)) {
    $result_fetch2 = mysqli_fetch_assoc($result2);
    $db_coins = $result_fetch2['coins'];
    if ($db_coins >= $jobcost) {
      $query = "INSERT INTO `jobs`(`username`, `compname`, `jobtitle`, `category`, `deadline`, `location2`, `banner`, `typeofjob`, `location`, `paytype`, `minsalary`, `maxsalary`, `education`, `minyr`, `maxyr`, `vacancy`, `gender`, `description`, `responsibility`, `requirements`, `active`)
      VALUES ('$username', '$companyname', '$jobtitle', '$category', '$deadline', '$location','$Final_image_name2', '$jobtype', '$joblocation', '$jobsalaytype', '$minsalary', '$maxsalary', '$education', '$minyr', '$maxyr', '$vacancy', '$gender', '$description', '$responsibility', '$requirements', 0)";




      $result = mysqli_query($con, $query);

      if ($result) {





        $query3 = "UPDATE `company` SET `coins` = $db_coins-$jobcost  WHERE `company`.`username` = '$username'";
        $result2 = mysqli_query($con, $query3);
        echo "
                 <script>
                   alert('Data updated Sucessfully');
                   window.location.href='popup2.php';
                 </script>
               ";
      } else {
        echo "
             <script>
               alert('Somrthing went Wrong');
               window.location.href='company-joblist.php';
             </script>
           ";
      }
    } else {
      echo "
            <script>
              alert('Insufficient Coins ');
              window.location.href='company-joblist.php';
            </script>
          ";
    }
  }
}
?>





<?php
if (isset($_POST['updatejob'])) {




  $username = $_SESSION['username'];
  $jobid = $_POST['jobid'];


  $query2 = "SELECT * FROM `jobs` WHERE `jobid` = '$jobid'";

  if ($result2 = mysqli_query($con, $query2)) {
    $result_fetch2 = mysqli_fetch_assoc($result2);


    $jobtype = $_POST['jobtype'] ??  $result_fetch2['typeofjob'];
    $joblocation = $_POST['joblocation'] ??  $result_fetch2['location'];
    $jobsalaytype = $_POST['jobsalaytype'] ??  $result_fetch2['typeofjob'];
  }


  $jobcost = 20;

  // echo "<br>", $companyname = $_POST['companyname'];
  // echo "<br>", $jobtitle = $_POST['jobtitle'];
  // echo "<br>", $category = $_POST['category'];
  $deadline = $_POST['deadline'];
  $location = $_POST['location'];
  $minsalary = $_POST['minsalary'];
  $maxsalary = $_POST['maxsalary'];
  $education = $_POST['education'];
  $minyr = $_POST['minyr'];
  $maxyr = $_POST['maxyr'];
  $vacancy = $_POST['vacancy'];
  $gender = $_POST['gender'];
  $description = $_POST['description'];
  $responsibility = $_POST['responsibility'];
  $requirements = $_POST['requirements'];


  // Assuming you're using sessions to track the logged-in user



  $query2 = "SELECT `coins` FROM `company` WHERE `company`.`username` = '$username'";

  if ($result2 = mysqli_query($con, $query2)) {
    $result_fetch2 = mysqli_fetch_assoc($result2);
    $db_coins = $result_fetch2['coins'];
    if ($db_coins >= $jobcost) {
      $query = "UPDATE `jobs` SET `typeofjob` = '$jobtype',`deadline` = '$deadline', `location2` = '$location', `location` = '$joblocation', `paytype` = '$jobsalaytype', `minsalary` = '$minsalary', `maxsalary` = '$maxsalary', `education` = '$education',
       `minyr` = '$minyr', `maxyr` = '$maxyr', `vacancy` = '$vacancy', `gender` = '$gender', `description` = '$description', `responsibility` = '$responsibility', `requirements` = '$requirements' WHERE `jobs`.`jobid` = $jobid;";



      $result = mysqli_query($con, $query);

      if ($result) {





        $query3 = "UPDATE `company` SET `coins` = $db_coins-$jobcost  WHERE `company`.`username` = '$username'";
        $result2 = mysqli_query($con, $query3);
        echo "
                 <script>
                   alert('Job updated Sucessfully');
                   window.location.href='company-joblist.php';
                 </script>
               ";
      } else {
        echo "
             <script>
               alert('Somrthing went Wrong');
               window.location.href='company-joblist.php';
             </script>
           ";
      }
    } else {
      echo "
            <script>
              alert('Insufficient Coins ');
              window.location.href='company-joblist.php';
            </script>
          ";
    }
  }
}
?>

