<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'stud')) {
    header("Location: index.php");
}
require('connection.php');
$category = $_GET['category_id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Category</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <!-- Custom css -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- page -->
    <link rel="stylesheet" href="assets/css/job-listing.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- navbar  -->
    <?php include './navbar.php'; ?>

    <!-- breadcrumb -->
    <div class="breadcrumb-section">
        <div class="container">
            <h2 class="title">Job Listing</h2>
            <nav aria-label="breadcrumb" class="text-center mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="#">Jobs</a></li> -->
                    <li class="breadcrumb-item active" aria-current="page">Job Listing</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- job listing -->
    <section class="paddingTB60 job-listing">
        <div class="container mx-auto">
            <div class="row g-5">
                <!-- <div class="col-md-8">  -->
                <div class="row">
                    <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                        <div class="results-text">Showing results 10 in 200 jobs list</div>
                        <!-- <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle text-capitalize" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-sort-down"></i> Sort by
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                    <li><a class="dropdown-item" href="#">Default</a></li>
                                    <li><a class="dropdown-item" href="#">Oldest</a></li>
                                    <li><a class="dropdown-item" href="#">Newest</a></li>
                                </ul>
                            </div> -->
                    </div>

                    <?php



                    // Now you can use the $category value in your query
                    $query = "SELECT job.*, comp.* 
                                  FROM jobs AS job 
                                  INNER JOIN company AS comp ON job.username = comp.username  
                                  WHERE job.category LIKE '%$category%' 
                                  ORDER BY job.sdate 
                                  ";

                    // Execute $query and process the results

                    if ($result = mysqli_query($con, $query)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {




                                $jobid = $row['jobid']; ?>
                                <div class="col-lg-12 mb-3">
                                    <div class="card job-listing-card">
                                        <div class="row">
                                            <div class="col-1 text-center">
                                                <div class="logo-box ">
                                                    <img src="companydocs/.<?php echo $row['companylogo']; ?>" class="logo-img" alt="Logo">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="card-title">
                                                    <?php echo $row['jobtitle']; ?>
                                                </h5>
                                                <p class="card-text">
                                                    <span class="company-name">
                                                        <?php echo $row['compname']; ?>
                                                    </span>
                                                    <span class="deadline">Deadline:</span>
                                                    <span class="date">
                                                        <?php echo $row['deadline']; ?>
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-5 text-end">
                                                <h6>Salary: <span>
                                                        <?php echo $row['minsalary']; ?>-
                                                        <?php echo $row['maxsalary']; ?>
                                                </h6>
                                                <h6>Experience: <span> <?php echo $row['minyr']; ?>-
                                                        <?php echo $row['maxyr']; ?></span></h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex mt-3 justify-content-between align-items-center">
                                            <span class="badge rounded-pill badge-full-time">Full Time</span>
                                            <h6 class="m-0 text-center">
                                                <?php
                                                if (isset($_SESSION['logged_in'])) { ?>
                                                    <a href="job-details.php?id=<?php echo $row['jobid']; ?>" class="apply-now-link">Apply Now</a>
                                                <?php
                                                } else { ?>
                                                    <a href="company-login.php" class="apply-now-link">Apply Now</a>
                                                <?php
                                                }
                                                ?>

                                            </h6>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {
                            echo "No matching records found.";
                        }
                    }
                    ?>
                    <!-- 
                        <div class="col-12 d-flex justify-content-center mt-5">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- footer -->
    <?php include './footer.php'; ?>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Plugin js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="assets/js/our-trusted-company.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="assets/js/popular-category.js"></script>
    <script src="assets/js/featured-jobs-gallery.js"></script>
    <script src="assets/js/users-feedback.js"></script>
</body>

</html>