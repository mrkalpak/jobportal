 <!-- Navbar -->
 <?php
require('connection.php');
$logo='assets/images/home/user-profile.svg';
//  var_dump($_SESSION["username"]);
//  if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
//     header("Location: index.php");
//  }
 if($_SESSION["type"]=="comp")
 {
    $comp=$_SESSION["username"];
    $query = "SELECT `companylogo` FROM `company` WHERE  `username`='$comp'";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $logo='companydocs/.'.$row["companylogo"];
        }

    }

 }
 if($_SESSION["type"]=="stud")
 {
    // $comp=$_SESSION["username"];
    // $query = "SELECT `companylogo` FROM `company` WHERE  `username`='$comp'";
    // $result = $con->query($query);
    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         $logo='companydocs/.'.$row["companylogo"];
    //     }

    // }
    $logo='assets/images/home/studentLogo.png';

 }
 ?>
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
     <div class="container">
         <a class="navbar-brand" href="index.php">
             <img class="logo" src="assets/images/logo.png">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto ms-auto my-2 my-lg-0">
            <li class="nav-item mx-3">
                <a class="nav-link active" href="./">Home</a>
            </li>
            <li class="nav-item dropdown mx-3">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Find Jobs
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./job-category.php">Search By Category</a></li>
                    <li><a class="dropdown-item" href="./#featuredJob">Featured Job</a></li>
                </ul>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Candidate
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li> -->
            <!-- <li class="nav-item">
                <a class="nav-link">Company</a>
            </li> -->
            <li class="nav-item mx-3">
                <a href="./blog.php" class="nav-link">Blog</a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="./#contactus">Contact Us</a>
            </li>
        </ul>
             <div class="d-flex align-items-center">
                 <!-- <a href="#" class="btn btn-secondary position-relative me-3 bg-gray-500 rounded-0">
                     <i class="bi bi-envelope"></i>
                     <span class="badge badge-bg-custom position-absolute top-0 start-100 translate-middle p-1">3</span>
                 </a>
                 <a href="#" class="btn btn-secondary position-relative me-3 bg-gray-500 rounded-0">
                     <i class="bi bi-bell"></i>
                     <span class="badge badge-bg-custom position-absolute top-0 start-100 translate-middle p-1">3</span>
                 </a> -->
                 <a href="#">
                     <img src="<?php if($logo=="companydocs/."){echo "./assets/images/logo1.png";}else{echo $logo;}?>" alt="Company Logo" class="square-image">
                 </a>
             </div>
         </div>
     </div>
 </nav>