<?php include './header.php'; ?>
<?php include './navbar.php' ?>
<?php
    require('connection.php');
    // print_r($_GET['job']);
    $query = "SELECT * FROM admin_jobpost where id=".$_GET['job']."";
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();
    $today=date("Y-m-d");
    // // echo $today;
    $fairStatus="";
        
    // }else{


    // }


?>
<!-- breadcrumb -->
<link rel="stylesheet" href="./assets/css/job-details.css">
<div class="breadcrumb-section">
    <div class="container">
        <h2 class="title">Job Details</h2>
        <nav aria-label="breadcrumb" class="text-center mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Jobs</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Job Details</li>
            </ol>
        </nav>
    </div>
</div>

<!-- job details -->
<?php
    if($row>0){
    if( $today==$row['applyTill'] || $today<$row['applyTill'] ){
?>
<section class="paddingTB60 job-details">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-4">
                        <div class="small-card d-flex">
                            <img src="assets/images/home/logo1.png" alt="Icon" class="logo-img">
                            <div class="text-content">
                                <h5 class="job-title"><?php echo $row['jobTitle'] ?></h5>
                                <p class="job-company"><?php echo $row['companyName'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <h6 class="job-tag-title">Location: <span><?php echo $row['workingFrom'] ?></span></h6>
                        <h6 class="job-tag-title">Category: <span>Creative Design</span></h6>
                    </div>
                    <div class="col-4">
                        <h6 class="job-tag-title">Job Type: <span><?php echo $row['jobType']?></span></h6>
                        <h6 class="job-tag-title">Salary: <span><?php echo $row['minSalary'].'K-'.$row['maxSalary'].'K'?> / Month</span></h6>
                    </div>
                </div>
                <hr>
                <h5 class="main-title">Job Description:</h5>
                <p class="main-text">
                    <?php echo $row['description']?>
                </p>
                <h5 class="main-title">Job Responsibility:</h5>
                <p class="main-text">
                <?php echo $row['responsibility']?>
                </p>
                
                <h5 class="main-title">Additional Requirements:</h5>
                <p class="main-text">
                    <?php echo $row['requirement']?>
                </p>
                
            </div>
            <div class="col-md-4">
                <div style="display: flex; justify-content: flex-end; align-items: center;">
                    <!-- <p style="margin-right: 10px; margin-bottom: 0;">Save Job <i class="bi bi-save-fill"></i></p> -->
                    <a href="./card-candidate-applyform.php?job=<?php echo $row['id']?>" class="btn btn-apply">Apply Position</a>
                </div>
                <div class="job-summery-card mt-4">
                    <h5 class="job-summery-title mb-4">Job Summary:</h5>
                    <p class="job-summery-text ms-2">Job Posted: <span><?php echo $row['createdDate']?></span></p>
                    <p class="job-summery-text ms-2">Expiration: <span><?php echo $row['applyTill']?></span></p>
                    <p class="job-summery-text ms-2">Vacancy: <span><?php echo $row['vacancy']?></span></p>
                    <p class="job-summery-text ms-2">Experiences: <span><?php echo $row['minExp'].'-'.$row['maxExp']?> Years.</span></p>
                    <p class="job-summery-text ms-2">Education: <span><?php echo $row['minEducation'] ?></span></p>
                    <p class="job-summery-text ms-2">Gender: <span><?php echo $row['gender'] ?></span></p>
                </div>
                
                
            </div>
         
          
        </div>
    </div>
</section>
<?php
}
else{
?>
<section class="paddingTB60 job-details">
    <div class="container">
        <div class="row">
            
         <?php echo "Job Expired";?>
          
        </div>
    </div>
</section>

<?php
}
}
else{
?>
<section class="paddingTB60 job-details">
    <div class="container">
        <div class="row">
            
         <?php echo "No Job Found";?>
          
        </div>
    </div>
</section>
<?php
}
?>

<?php include './footer.php'; ?>