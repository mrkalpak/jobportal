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

<?php
if(isset($_POST['candidateData'])){
  //  var_dump($_POST);   
  //   return;
    // var_dump($_FILES);
    $username = $_SESSION['username'];
    $candidateName=$_POST['candidateName'];
    $candiateLocation=$_POST['candiateLocation'];
    $candidatePhone=$_POST['candidatePhone'];
    $candidateCurrentJobLocation=$_POST['candidateCurrentJobLocation'];
    $candidateEmail=$_POST['candidateEmail'];
    $candidateDesignation=$_POST['candidateDesignation'];
    $exp=$_POST['exp'];
    $jobType=$_POST['jobType'];
    $qualification=$_POST['qualification'];
    $discription=$_POST['discription'];
    $fairId=$_POST['fairId'];
    $fileName=$_FILES['candidateResume']['name'];
    $linkedInProfile=$_POST['linkedInProfile'];
    $candidateDOB=$_POST['candidateDOB'];

    if($candidateName!='' && $candidateDOB!='' && $linkedInProfile!='' && $candiateLocation!='' && $candidatePhone!='' && $candidateEmail!='' && $exp!=''&& $jobType!='' && $qualification!='' && $discription!=''){
      
      if (isset($_FILES['candidateResume']['name'])) {

        $image2 = $_FILES['candidateResume']['name'];
        $target_file2 = basename($image2);
        $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
        $check2 = $_FILES['candidateResume']['tmp_name'];
        $extension2 = substr($image2, strlen($image2) - 4, strlen($image2));
        $image_ext2 = pathinfo($image2, PATHINFO_FILENAME);
        if($extension2=='.pdf'){
          $Final_image_name2 = $image_ext2.".".$imageFileType2;
          $destination2 = "./assets/candidateResume/$Final_image_name2";
          move_uploaded_file($check2, $destination2);
        }else{
          echo "<script>
            alert('Please Upload pdf file Only');
            window.history.back();
          </script>";
          return;

        }
      }
      try {

      $query = "INSERT INTO `job_faircandidate`(`candidateName`,`candidateDOB`,`linkedInProfile`, `candiateLocation`, `candidatePhone`, `candidateEmail`, `candidateCurrentJobLocation`,`candidateDesignation`,`candidateResume`,`exp`,`jobType`,`qualification`,`discription`,`fairId`)
      VALUES ('$candidateName','$candidateDOB','$linkedInProfile', '$candiateLocation', '$candidatePhone', '$candidateEmail', '$candidateCurrentJobLocation','$candidateDesignation','$Final_image_name2','$exp','$jobType','$qualification','$discription','$fairId')";
      // var_dump($query);      
        $result = mysqli_query($con, $query);
        if ($result) {
          echo "
            <script>
              alert('Uploaded Sucessfully');
              window.location.href='job-fair.php';
            </script>";
        } 
        } catch(Exception $e) {
          echo "<script>
                  alert(`".$e->getMessage()."`);
                  window.history.back();
                </script>";

        }

  }else{
    echo "<script>
    alert('Fill the form properly');
    window.history.back();

    </script>";
  }


 
}
?>
<?php
if(isset($_POST['cardCandidate'])){
  
  // var_dump($_FILES);
  $username = $_SESSION['username'];
  $candiatename=$_POST['candiatename'];
  $birthdate=$_POST['birthdate'];
  $location=$_POST['location'];
  $c_no=$_POST['c_no'];
  $email=$_POST['email'];
  $cujobplace=$_POST['cu-job-place'];
  $designation=$_POST['designation'];
  $qualification=$_POST['qualification'];
  $linkedIn=$_POST['linkedIn'];
  $exprience=$_POST['exprience'];
  $describe=$_POST['describeYourSelf'];
  $jobId=$_POST['jobId'];
  $fileName=$_FILES['cardCandidateResume']['name'];

  // if(strlen($username)>3){
    
    
  // }else{

  //   echo "
  //       <script>
  //         alert('Please Enter Candidate Name Greate Then 3 Words');
  //         window.history.back();
  //       </script>";

  // }
  // echo '<br>';
  // var_dump($_POST);
  // return;

  if($candiatename!='' && $birthdate !='' && $location!='' && $c_no!='' && $email!='' && $qualification!='' && $exprience!='' && $fileName!='' && $describe!='' && $jobId!=''){
    if (isset($_FILES['cardCandidateResume']['name'])) {
      $image2 = $_FILES['cardCandidateResume']['name'];
      $target_file2 = basename($image2);
      $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
      $check2 = $_FILES['cardCandidateResume']['tmp_name'];
      $extension2 = substr($image2, strlen($image2) - 4, strlen($image2));
      $image_ext2 = pathinfo($image2, PATHINFO_FILENAME);
      if($extension2=='.pdf'){
      $Final_image_name2 = $image_ext2.".".$imageFileType2;
      $destination2 = "./assets/cardCandidateResume/$Final_image_name2";
      move_uploaded_file($check2, $destination2);
      }else{
        echo "<script>
        alert('Please Upload pdf file Only');
        window.history.back();
      </script>";
      return;

      }
    }
    try {

    $query = "INSERT INTO `cardcandidate`(`jobId`,`candiatename`,`birthdate`,`location`,`c_no`, `email`, `cu-job-place`, `designation`, `qualification`,`linkedIn`,`exprience`,`describeYourself`,`cardCandidateResume`)
                                  VALUES ('$jobId','$candiatename','$birthdate','$location','$c_no', '$email', '$cujobplace', '$designation', '$qualification','$linkedIn','$exprience','$describe','$fileName')";
    // var_dump($query);      
      $result = mysqli_query($con, $query);
      if ($result) {
        echo "
          <script>
            alert('Uploaded Sucessfully');
            window.location.href='http://localhost/jobportal';
          </script>";
      } 
      } catch(Exception $e) {
        // $error=$e->getMessage();
        echo "
        <script>
          alert(`".$e->getMessage()."`);
          window.history.back();          
        </script>";
      }

}else{
  echo "<script>
  alert('Fill the form properly');
  window.history.back();
  </script>";
}


}


?>

