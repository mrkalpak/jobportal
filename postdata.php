<?php
require('connection.php');
session_start();
// echo "im in post data";
require('config.php');
require('razorpay-php-2.9.0/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

?>

<?php
if (isset($_POST['postjob'])) {

  // var_dump($_POST);


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
  $description = $con -> real_escape_string($_POST['description']);
  $responsibility = $con -> real_escape_string($_POST['responsibility']);
  $requirements = $con -> real_escape_string($_POST['requirements']);



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

      //Job Post Transaction History Code

      function generateTransactionIdSecure() {
        // Generate 16 bytes of random data
        $bytes = random_bytes(16);
        // Convert the binary data into hexadecimal representation
        $transactionId = bin2hex($bytes);
        return $transactionId;
      }
      $transactionId=generateTransactionIdSecure();
      $currentbalance=$db_coins-$jobcost;
      $transactionTime=date('Y-m-d H:i:s');
      $purpose='Job Post';
      $response='Success';
      $date=date('Y-m-d');

      $coinTransaction = "INSERT INTO `transaction_history`(`company_id`, `user_id`, `transaction_id`, `last_balance`, `current_balance`, `transaction_time`, `response`, `date`, `purpose`)
      VALUES ('$username',NULL,'$transactionId','$db_coins','$currentbalance','$transactionTime','$response','$date','$purpose')";
      //Job Post Transaction History Code End 
      try{
        $res = mysqli_query($con, $coinTransaction);
      }catch(Exception $error){
        echo $error->getMessage();
      }
      try{
        $result = mysqli_query($con, $query);
      }catch(Exception $e){
        echo $e->getMessage();
      }

      if ($result) {
        $query3 = "UPDATE `company` SET `coins` = $db_coins-$jobcost  WHERE `company`.`username` = '$username'";
        $result2 = mysqli_query($con, $query3);
        echo "
                 <script>
                   alert('Data updated Sucessfully');
                   window.location.href='popup2.php';
                 </script>
               ";
      }
    } else {
      echo "
            <script>
              alert('Insufficient Coins ');
              window.location.href='company-plans.php';
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
  $description = $con -> real_escape_string($_POST['description']);
  $responsibility = $con -> real_escape_string($_POST['responsibility']);
  $requirements = $con -> real_escape_string($_POST['requirements']);


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
              window.location.href='company-plans.php';
            </script>
          ";
    }
  }
}


// if(isset($_GET['resume'])){
//   $userId=$_GET['resume'];
//   $username = $_SESSION['username'];
//   $coinDetails = "SELECT coins FROM `company` WHERE  `username`='$username'";
//   $checkCoin = mysqli_query($con, $coinDetails);
//   $currentCoin = mysqli_fetch_assoc($checkCoin);
//   // var_dump($currentCoin);
//     if($currentCoin['coins']>1){
     
//       $query3 = "UPDATE `company` SET `coins` = $currentbalance  WHERE `company`.`username` = '$username'";
//       try{
//         $result2 = mysqli_query($con, $query3);
//         if($result2){
//           $getResume = "SELECT `resume` FROM `users_candidate` WHERE `users_candidate`.`username` = '$userId'";
//           $Resume = mysqli_query($con, $getResume);
//           $candidateResume = mysqli_fetch_assoc($Resume);
//           $file_name = '.'.$candidateResume['resume'];
//           $file = './uploaddocs/' . $file_name;
//           if (file_exists($file)) {
//             header('Content-Type: ' . mime_content_type($file_name));
//             header('Content-Disposition: attachment;filename="' . basename($file_name) . '"');
//             header('Content-Length: ' . filesize($file));
//             readfile($file);
//           } else {
//                echo"<script>
//                   alert('file Does Not Exist');
//                   window.history.back();
//                 </script>";   
//           }
         
//         }
//       }
//       catch(Exception $errorUpdate){
//         echo $errorUpdate->getMessage();
//       }  

//     }
//     else{
//         echo "
//           <script>
//             alert('Insufficient Coins ');
//             window.location.href='company-plans.php';
//           </script>
//       ";
//     } 
//   }
?>

<?php
if(isset($_POST['candidateData'])){
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
    $discription=$con -> real_escape_string($_POST['discription']);
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
  $exprience=$_POST['exprience'];
  $describe=$con -> real_escape_string($_POST['describeYourSelf']);
  $jobId=$_POST['jobId'];
  $fileName=$_FILES['cardCandidateResume']['name'];
  $linkedIn=NULL;

  if(strlen($candiatename)>3 && preg_match("/^[a-zA-Z ]+$/", $candiatename)){
    // var_dump($birthdate);
    $pattern = "/^\d{4}-\d{2}-\d{2}$/";
    $checkDate=preg_match($pattern, $birthdate);
    $today=date("Y-m-d");
    $dob = new DateTime($birthdate);
    $current = new DateTime($today);
    $age = $dob->diff($current);
    $validEmail=filter_var($email, FILTER_VALIDATE_EMAIL)!== false;
    if($checkDate && $age->y>=18){
      if(preg_match('/^[a-zA-Z0-9\s]+$/', $location) && preg_match('/^[a-zA-Z0-9\s]+$/', $cujobplace) ){
      if(preg_replace('/\D/', '', $c_no) && strlen($c_no) == 10){
        if($validEmail){
          if(preg_match('/^[a-zA-Z\s]+$/', $designation)){
            if(preg_replace('/\D/', '', $exprience)){
            if(preg_match('/^[a-zA-Z0-9\s]+$/', $describe)){
            if($candiatename!='' && $birthdate !='' && $location!='' && $c_no!='' && $email!='' && $qualification!='' && $exprience!='' && $fileName!='' && $describe!='' && $jobId!=''){
              if($_POST['linkedIn']!=''){
                $checkLinkedIn=preg_match('/^http(s)?:\/\/([\w]+\.)?linkedin\.com\/in\/[A-z0-9_-]+\/?+$/', $_POST['linkedIn']);
                if($checkLinkedIn){
                  $linkedIn=$_POST['linkedIn'];
                }else{
                  echo "<script>
                    alert('Please Provide Valid LinkedIn Account ');
                    window.history.back();
                  </script>";
                  return;
                }
              }
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
            }
            else{
              echo "<script>
              alert('Fill the form properly');
              window.history.back();
              </script>";
            }
          }else{
            echo "<script>
            alert('Please Enter Proper Discription');
            window.history.back();
          </script>"; 
          }
          }else{
            echo "<script>
            alert('Please Enter Proper Experience');
            window.history.back();
          </script>";
          }
        }
        else{
          echo "<script>
          alert('Please Enter Proper Designation');
          window.history.back();
          </script>";
        }
        }else{
          echo "<script>
          alert('Please Enter Valid Email Address');
          window.history.back();
          </script>";
        }
      }else{
        echo "<script>
        alert('Please Enter Valid Phone Number with 10 Digits');
        window.history.back();
        </script>";
      }
    }else{
      echo "<script>
      alert('Please Enter Proper Address For Current Location & Current Job Place ');
      window.history.back();
    </script>";
    }
}
else{
  echo "
      <script>
        alert('Please Enter Valid Date and Age Must be 18');
        window.history.back();
      </script>";  
}
}else{

  echo "
      <script>
        alert('Please Enter Candidate Name Greater Then 3 Words & Please Avoid Special Char');
        window.history.back();
      </script>";

}


}


?>

<?php
if (isset($_POST['main_user'])) {
  $api=new Api($keyId,$keySecret);
  $main_user=$_POST['main_user'];
  $query = "SELECT * FROM `company` WHERE  `username`='$main_user'";
  $result = mysqli_query($con, $query);
  if ($result) {

      $result_fetch = mysqli_fetch_assoc($result);
      // var_dump($result_fetch);
      $db_points = $result_fetch['coins'];
  }
  $points = $_POST['customcoin'];
  $currentDate = date('Y-m-d');
  $expirationDate = date('Y-m-d', strtotime('+30 days', strtotime($currentDate)));
  $fpoints = $db_points + $points;

  $randomNumber = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
  $receiptId = "reciptId" . $randomNumber;
  $orderData = [
    'receipt'         => $receiptId,
    'amount'          => $points*100, // 39900 rupees in paise
    'currency'        => 'INR'
  ];

  $razorpayOrder = $api->order->create($orderData);
  $razorpayOrderId=$razorpayOrder['id'];
  $_SESSION['razorpayOrderId']=$razorpayOrderId;
  $transactionId=$_SESSION['razorpayOrderId'];
    // var_dump($transactionId);
    $add2 = "INSERT INTO `plans`(`username`,`transaction_Id`,`amount`, `active`, `edate`) VALUES ('$main_user','$transactionId','$points',1,' $expirationDate')";
    $run2 = mysqli_query($con, $add2);
    $data= ["res"=>$transactionId];
    echo json_encode($data);
}


if (isset($_POST['companyId'])){
  $api=new Api($keyId,$keySecret);
    $cId=$_POST['companyId'];
    $tId=$_POST["transactionId"];
    $rPayId=$_POST["razorpay_payment_id"];
    $customcoin=$_POST["customcoin"];
    $verifySignature=$_POST["verifySignature"];
    // var_dump($customcoin);
    // return;
    $verify=$tId."|".$rPayId;
    $generated_signature = hash_hmac('sha256', $verify, $keySecret);
    if($generated_signature==$verifySignature){
      $updateQuery = "UPDATE `plans` SET `razorpay_payment_id`='$rPayId',`status`=1,`verifySignature`='$verifySignature' where transaction_Id='$tId' ";
      $run= mysqli_query($con, $updateQuery);    
      $main_user=$_POST['companyId'];
      $query = "SELECT * FROM `company` WHERE  `username`='$main_user'";
      $result = mysqli_query($con, $query);
      if ($result) {
          $result_fetch = mysqli_fetch_assoc($result);
          // var_dump($result_fetch);
          $db_points = $result_fetch['coins'];
      }
      $fpoints = $db_points + $customcoin;
      $add = "UPDATE `company` SET `coins`='$fpoints'  where username='$main_user' ";
      $run1 = mysqli_query($con, $add);
      if($run1 && $run){
        $data= ["res"=>'success'];
        echo json_encode($data);
        
      }else{
        $data= ["res"=>'error'];
        echo json_encode($data);
      }
    }else{
        $data= ["res"=>'unverified Signature'];
        echo json_encode($data);
    }
}
?>




