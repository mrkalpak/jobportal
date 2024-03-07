<?php
session_start();
$env = parse_ini_file('../.env');
if($_SERVER['SERVER_PORT']==443) {
    $header = $env["HEADER_SERVER"];
}
else {
    $header = $env["HEADER"];
}
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
  header("Location: ../index.php");
}
require('connection.php');


?>



<!-- ----------------------------Create Client------------------------------------------------------------- -->


<?php
if (isset($_POST['create_client'])) {




  $username = $_SESSION['username'];
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $address = $_POST['address'];



  // Assuming you're using sessions to track the logged-in user




  $query = "INSERT INTO `jobcard_client`(`jobcard_client_name`, `client_phone`, `client_email`, `address`) 
            VALUES ('$name', '$mobile', '$email', '$address')";




  $result = mysqli_query($con, $query);

  if ($result) {
    echo "
                 <script>
                   alert('Client Created Sucessfully');
                   window.location.href='client-management.php';
                 </script>
               ";
  } else {
    echo "
             <script>
               alert('Somrthing went Wrong');
               window.location.href='client-management.php';
             </script>
           ";
  }
}

?>



<!-- ----------------------------Update Client------------------------------------------------------------- -->

<?php
if (isset($_POST['update_client'])) {




  $username = $_SESSION['username'];



  $id = $_POST['client_id'];
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $address = $_POST['address'];



  // Assuming you're using sessions to track the logged-in user




  $query = "UPDATE `jobcard_client` SET `jobcard_client_name`='$name',`client_phone`='$mobile',`client_email`='$email',`address`='$address'
     WHERE client_id='$id'";




  $result = mysqli_query($con, $query);

  if ($result) {
    echo "
                 <script>
                   alert('updated Sucessfully');
                   window.location.href='client-management.php';
                 </script>
               ";
  } else {
    echo "
             <script>
               alert('Somrthing went Wrong');
               window.location.href='client-management.php';
             </script>
           ";
  }
}

?>



<!-- ----------------------------Create Blog------------------------------------------------------------- -->

<?php
if (isset($_POST['create_blog'])) {




  $username = $_SESSION['username'];
  $name = $_POST['name'];
  $title = $_POST['title'];
  $description = $con -> real_escape_string($_POST['description']);
  $tag = $_POST['tag'];







  if (isset($_FILES['imageA']['name']) && !empty($_FILES['imageA']['name'])) {

    $image1 = $_FILES['imageA']['name'];
    $target_file1 = basename($image1);
    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    $check1 = $_FILES['imageA']['tmp_name'];
    $extension1 = substr($image1, strlen($image1) - 4, strlen($image1));
    $image_ext1 = pathinfo($image1, PATHINFO_FILENAME);
    $Final_image_name1 = $image_ext1 . date("mjYHis") . "." . $imageFileType1;
    $destination1 = "blog/.$Final_image_name1";
    move_uploaded_file($check1, $destination1);
  }


  if (isset($_FILES['imageB']['name']) && !empty($_FILES['imageB']['name'])) {

    $image2 = $_FILES['imageB']['name'];
    $target_file2 = basename($image2);
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $check2 = $_FILES['imageB']['tmp_name'];
    $extension2 = substr($image2, strlen($image2) - 4, strlen($image2));
    $image_ext2 = pathinfo($image2, PATHINFO_FILENAME);
    $Final_image_name2 = $image_ext2 . date("mjYHis") . "." . $imageFileType2;
    $destination2 = "blog/.$Final_image_name2";
    move_uploaded_file($check2, $destination2);
  }


  $query = "INSERT INTO `blogs`(`blog_name`, `blog_title`, `blog_image`, `blog_description`, `blog_tags`, `other_image`)
    VALUES ('$name', '$title', '$Final_image_name1', '$description', '$tag', '$Final_image_name2')";




  $result = mysqli_query($con, $query);

  if ($result) {
    echo "
                 <script>
                   alert('Blog Uploaded Sucessfully');
                   window.location.href='client-management.php';
                 </script>
               ";
  } else {
    echo "
             <script>
               alert('Something went Wrong');
               window.location.href='client-management.php';
             </script>
           ";
  }
}

?>








<?php
if (isset($_POST['generate_cards'])) {

  $username = $_SESSION['username'];
   $name = $_POST['client_name'];
   $count = $_POST['no_cards'];
  $prefix = $_POST['prefix'];
  if ($_POST['e_date'] == 3) {
    $today = date('Y-m-d');
    $expiremonth = 3;
  } elseif ($_POST['e_date'] == 6) {
    $today = date('Y-m-d');
    $expiremonth = 6;
  } else {
    $today = date('Y-m-d');
    $expiremonth = 12;
  }


  for ($i = 1; $i <= $count; $i++) {

    $min = 1111111;
    $max = 999999999999;
    $randomNumber = mt_rand($min, $max);
    $cardusername = "$prefix" . $randomNumber;

    $sql = "INSERT INTO `jobcards`(`card_id`, `client_name`, `card_active`, `card_sdate`, `expire_months`)  VALUES ('$cardusername', '$name',0,'$today','$expiremonth')";
    $result = mysqli_query($con, $sql);




    if (!$result) {
      echo "
                 <script>
                   alert('$result Card Generation Failed try again');
                   window.location.href='jobcards-management.php';
                 </script>
               ";
    }
  }
  echo "
        <script>
          alert('$count Jobcards Generated Sucessfully');
          window.location.href='jobcards-management.php';
        </script>
      ";
} ?>







<?php

if (isset($_POST['generate_cards2'])) {
  $username = $_SESSION['username'];
  $query = "INSERT INTO `blogs`(`blog_name`, `blog_title`, `blog_image`, `blog_description`, `blog_tags`, `other_image`)
    VALUES ('$name', '$title', '$Final_image_name1', '$description', '$tag', '$Final_image_name2')
    ";




  $result = mysqli_query($con, $query);

  if ($result) {
    echo "
                 <script>
                   alert('Blog Uploaded Sucessfully');
                   window.location.href='client-management.php';
                 </script>
               ";
  } else {
    echo "
             <script>
               alert('Somrthing went Wrong');
               window.location.href='client-management.php';
             </script>
           ";
  }
}


?>
<?php
if (isset($_POST['admin_jobfair'])) {
    // var_dump($_POST);
    $username = $_SESSION['username'];
    // var_dump($_FILES);
    $fairName=$_POST['fairName'];
    $fairDate=$_POST['fairDate'];
    $fairTime=$_POST['fairTime'];
    $location=$_POST['location'];
    $organizer=$_POST['organizer'];
    $fileName=$_FILES['BannerImg']['name'];
    

    if($fairName!='' && $fairDate!='' && $fairTime!='' && $location!='' && $organizer!='' && $fileName!=''){
      if (isset($_FILES['BannerImg']['name'])) {

        $image2 = $_FILES['BannerImg']['name'];
        $target_file2 = basename($image2);
        $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
        $check2 = $_FILES['BannerImg']['tmp_name'];
        $extension2 = substr($image2, strlen($image2) - 4, strlen($image2));
        $image_ext2 = pathinfo($image2, PATHINFO_FILENAME);
        if($extension2=='.jpeg' || $extension2=='.png'|| $extension2=='.jpg'){
          $Final_image_name2 = $image_ext2.".".$imageFileType2;
          $destination2 = "../assets/fair/$Final_image_name2";
          move_uploaded_file($check2, $destination2);
        }else{
          echo "<script>
              alert('Please Upload JPEG,JPG,PNG file extension Only');
              window.history.back();
            </script>";
          return;
        }

        
      }

      $query = "INSERT INTO `job_fair`(`fairName`, `fairDate`, `fairTime`, `location`, `fair_Organizer`,`fileName`)
      VALUES ('$fairName', '$fairDate', '$fairTime', '$location', '$organizer','$Final_image_name2')";
      $result = mysqli_query($con, $query);
      if ($result) {
        echo "
              <script>
                alert('Fair Uploaded Sucessfully');
                window.location.href='admin_jobfair.php';
              </script>
            ";
      } else {
        echo "
              <script>
                alert('Somrthing went Wrong');
                window.history.back();
              </script>
            ";
    }
  }else{
    echo "
        <script>
          alert('Please Fill the form Propely');
          window.history.back();
        </script>
      ";
  }
}
?>
<?php
if (isset($_POST['updateFair'])) {
  $username = $_SESSION['username'];
  $fairName=$_POST['fairName'];
  $fairDate=$_POST['fairDate'];
  $fairTime=$_POST['fairTime'];
  $location=$_POST['location'];
  $organizer=$_POST['organizer'];
  $fileName=$_FILES['BannerImg']['name'];
  $updateId=$_POST['updateId'];
  // print_r($_FILES);
  if($fairName!='' && $fairDate!='' && $fairTime!='' && $location!='' && $organizer!=''){

  if (isset($_FILES['BannerImg']['name']) && $_FILES['BannerImg']['size']>0) {
    
    $image2 = $_FILES['BannerImg']['name'];
    
    $target_file2 = basename($image2);
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $check2 = $_FILES['BannerImg']['tmp_name'];
    $extension2 = substr($image2, strlen($image2) - 4, strlen($image2));
    $image_ext2 = pathinfo($image2, PATHINFO_FILENAME);
    $Final_image_name2 = $image_ext2.".".$imageFileType2;
    $destination2 = "../assets/fair/$Final_image_name2";
    move_uploaded_file($check2, $destination2);
    $query = "UPDATE job_fair SET 
      fairName='$fairName',
      fairDate='$fairDate',
      fairTime='$fairTime',
      fair_Organizer='$organizer',
      location='$location',
      fileName='$Final_image_name2',
      fairTime='$fairTime'
      WHERE id='$updateId'";
  }else{
      // print_r($organizer);
      $query = "UPDATE job_fair SET 
      fairName='$fairName',
      fairDate='$fairDate',
      fairTime='$fairTime',
      fair_Organizer='$organizer',
      location='$location',
      fairTime='$fairTime'
      WHERE id='$updateId'";
    // print_r($query);
  }
  $result = mysqli_query($con, $query);
  if ($result) {
    echo "
          <script>
            alert('Fair Updated Sucessfully');
            window.location.href='admin_jobfair.php';
          </script>";
  } else {
    echo "<script>
            alert('Somrthing went Wrong');
            window.history.back();
          </script>
        ";
  }
  }else{
    echo "
    <script>
      alert('Please Fill the form Propely');
      window.history.back();
    </script>";
  }

}
?>

<?php

  if(isset($_POST['admin_jobpost'])){
    // var_dump($_POST);
    $username = $_SESSION['username'];
    $CompanyName=$_POST['CompanyName'];
    $jobDesignation=$_POST['jobDesignation'];
    $jobTime=$_POST['jobTime'];
    if(isset($_POST['jobShift'])){
      $jobShift=$_POST['jobShift'];
    }else{
      $jobShift=NULL;
    }
    $jobLocation=$_POST['jobLocation'];
    $jobPayType=$_POST['jobPayType'];
    $jobMaxSalary=$_POST['jobMaxSalary'];
    $jobMinSalary=$_POST['jobMinSalary'];
    $jobQualification=$_POST['jobQualification'];
    $jobMinExp=$_POST['jobMinExp'];
    $jobMaxExp=$_POST['jobMaxExp'];
    $jobvacancy=$_POST['jobvacancy'];
    $jobGender=$_POST['jobGender'];
    $jobDescription=$con -> real_escape_string($_POST["jobDescription"]);
    $jobResponsibility=$con -> real_escape_string($_POST['jobResponsibility']);
    $jobRequirement=$con -> real_escape_string($_POST['jobRequirement']);
    $createdDate=date("Y-m-d H:i:s");
    $applyTill=$_POST['applyTill'];
    $shortCode = substr(md5(time()), 0, 6);
    $url=$header.'?C='.$shortCode;
    
    if($CompanyName!='' && $jobDesignation!='' && $jobTime!='' && $jobLocation!=''  && $jobMaxSalary!='' && $jobMinSalary!='' && $jobQualification!='' && $jobMinExp!='' && $jobMaxExp!='' && $jobvacancy!='' && $jobGender!='' && $jobResponsibility!='' && $jobRequirement!=''){
      

        $query = "INSERT INTO `admin_jobpost`(
          `companyName`, 
          `jobTitle`, 
          `jobType`, 
          `shift`,
          `workingFrom`,
          `compensation`,
          `minSalary`,
          `maxSalary`,
          `minEducation`,
          `minExp`,
          `maxExp`,
          `vacancy`,
          `gender`,
          `description`,
          `responsibility`,
          `requirement`,
          `createdDate`,
          `applyTill`,
          `urlId`,
          `url`
          )
        VALUES (
          '$CompanyName',
          '$jobDesignation', 
          '$jobTime', 
          '$jobShift', 
          '$jobLocation',
          '$jobPayType',
          '$jobMinSalary',
          '$jobMaxSalary',
          '$jobQualification',
          '$jobMinExp',
          '$jobMaxExp',
          '$jobvacancy',
          '$jobGender',
          '$jobDescription',
          '$jobResponsibility',
          '$jobRequirement',
          '$createdDate',
          '$applyTill',
          '$shortCode',
          '$url'
          )";
        try {
          $result = mysqli_query($con, $query);
            if ($result) {
              echo "<script>
                    alert('Job Uploaded Sucessfully');
                    window.location.href='job-posting.php';
                  </script>";
              }
          }
          catch(Exception $e) {
              echo "<script>
                    alert(`".$e->getMessage()."`);
                    window.history.back();
                  </script>";
            }
      
    }else{
      echo "
      <script>
        alert('Please Fill the form Propely');
        window.history.back();
        </script>
    ";
    }

  }

?>
<?php
  if(isset($_POST['updateAdmin_jobpost'])){
    $username = $_SESSION['username'];
    $CompanyName=$_POST['CompanyName'];
    $jobDesignation=$_POST['jobDesignation'];
    $jobTime=$_POST['jobTime'];
    if(isset($_POST['jobShift'])){
      $jobShift=$_POST['jobShift'];
    }else{
      $jobShift=NULL;
    }
    $jobLocation=$_POST['jobLocation'];
    $jobPayType=$_POST['jobPayType'];
    $jobMaxSalary=$_POST['jobMaxSalary'];
    $jobMinSalary=$_POST['jobMinSalary'];
    $jobQualification=$_POST['jobQualification'];
    $jobMinExp=$_POST['jobMinExp'];
    $jobMaxExp=$_POST['jobMaxExp'];
    $jobvacancy=$_POST['jobvacancy'];
    $jobGender=$_POST['jobGender'];
    $jobDescription=$con -> real_escape_string($_POST["jobDescription"]);
    $jobResponsibility=$con -> real_escape_string($_POST['jobResponsibility']);
    $jobRequirement=$con -> real_escape_string($_POST['jobRequirement']);
    $applyTill=$_POST['applyTill'];
    $updateId=$_POST['updateID'];

    if($CompanyName!='' && $jobDesignation!='' && $jobTime!='' && $jobLocation!=''  && $jobMaxSalary!='' && $jobMinSalary!='' && $jobQualification!='' && $jobMinExp!='' && $jobMaxExp!='' && $jobvacancy!='' && $jobGender!='' && $jobResponsibility!='' && $jobRequirement!=''){
      $query ="UPDATE admin_jobpost SET 
      companyName='$CompanyName', 
      jobTitle='$jobDesignation', 
      jobType='$jobTime', 
      shift='$jobShift',
      workingFrom='$jobLocation',
      compensation='$jobPayType',
      minSalary='$jobMinSalary',
      maxSalary='$jobMaxSalary',
      minEducation='$jobQualification',
      minExp='$jobMinExp',
      maxExp='$jobMaxExp',
      vacancy='$jobvacancy',
      gender='$jobGender',
      description='$jobDescription',
      responsibility='$jobResponsibility',
      requirement='$jobRequirement',
      applyTill='$applyTill'
      WHERE id='$updateId'";
      // var_dump($query);
      try {
        $result = mysqli_query($con, $query);
          if ($result) {
            echo "<script>
                  alert('Job Updated Sucessfully');
                  window.location.href='job-posting.php';
                </script>";
            }
        }
        catch(Exception $e) {
            echo "<script>
                  alert(`".$e->getMessage()."`);
                  window.location.href='job-posting.php';
                </script>";
          }
    
  }else{
    // var_dump($_POST);
    // return;
    echo "
    <script>
      alert('Please Fill the form Propely');
      window.location.href='job-posting.php';
    </script>
  ";
  }
  }
?>