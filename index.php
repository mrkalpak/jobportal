<?php
session_start();
require('connection.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
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
    <!-- Plugin css -->
    <link rel="stylesheet" href="assets/css/our-trusted-company.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/popular-category.css">
    <link rel="stylesheet" href="assets/css/featured-jobs-gallery.css">
    <link rel="stylesheet" href="assets/css/how-it-works.css">
    <link rel="stylesheet" href="assets/css/users-feedback.css">
    <link rel="stylesheet" href="assets/css/about-jobs.css">
    <link rel="stylesheet" href="assets/css/top-companies.css">
    <link rel="stylesheet" href="assets/css/recent-article.css">
    <link rel="stylesheet" href="./assets/css/our-services.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>




    <!-- navbar  -->
    <?php include './navbar.php'; ?>

    <!-- hero section -->
    <section class="hero-section px-5 ">

        <div class="row">
            <div class="col-lg-6">
                <h2 class="hero-title">Job Fair
                    <span class="hero-title hero-title-yellow">India</span>
                </h2>
                <h2 class="hero-description">
                    An opportunity for talented professionals
                </h2>
                <div class="search-box">
                    <h5>
                        Candidate Login/Sign Up
                    </h5>
                    <form action="login_register.php" method="POST">

                        <div class="form-floating mb-1">
                            <input type="email" name="email_username" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button name="login" class="search-button">Sign In</button>
                    </form>
                </div>
                <div class="suggested-tag d-flex">
                    <h6 class="">
                        Suggested Tag:
                    </h6>
                    <p class="tag-list">
                        Engineering, Marketing, UI/UX Design, Data Analyst, Programming
                    </p>
                </div>
                <div class="container-image">
                    <div class="image-row">
                        <div class="image-container">
                            <img src="assets/images/home/h-1.png" alt="Image 1">
                        </div>
                        <div class="image-container">
                            <img src="assets/images/home/h-2.png" alt="Image 2">
                        </div>
                        <div class="image-container">
                            <img src="assets/images/home/h-3.png" alt="Image 3">
                        </div>
                        <div class="image-container">
                            <img src="assets/images/home/h-4.png" alt="Image 4">
                        </div>
                        <div class="image-container">
                            <img src="assets/images/home/h-5.png" alt="Image 5">
                        </div>
                        <div class="image-container">
                            <span class="image-text">21k</span>
                            <span class="image-subtext">users</span>
                        </div>
                    </div>
                    <div class="connected-text">
                        To Much People Have Connected With Us!
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="assets/images/home/hero-image.png" alt="Image" class="img-fluid" style="height:110%">
            </div>
        </div>

    </section>

    <section class="paddingTB60 how-it-works">
        <h3 class="main-title text-center">JOB FAIR <span class="main-title-span">INDIA</span></h3>
        <div class="container textjustify">
            &nbsp;&nbsp;&nbsp;&nbsp;
            Job Fair India is an exclusive and reputed platform where talented professionals and freshers can explore and find opportunities to build their careers. Multiple companies are associated with our team, and their delegates are present at the mega job fair and select competent personas or freshers to start their careers with the keen package as per their ability, qualification, and personality. Here, you can get the details of the upcoming job fair and find positive feedback and suggestions from the experts to prepare for the upcoming job fair. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;Although the Job Fair is the best way to evaluate your capability and enhance your interpersonal skills, where you can be more confident in first time. However, many finds difficulties and lack self-confidence while attending a job interview or group discussion for the first time. You can get enormous ideas and experience for the upcoming job fair.

        </div>
    </section>
    <!-- Trusted Company -->
    <section class="paddingTB60 our-trusted-company px-5">

        <h3 class="main-title text-center">Our Trusted <span class="main-title-span">Company</span></h3>
        <div class="trusted-companies slider">
            <div class="slide-in-right slide"><img src="assets/images/COMPANY/bajaj1.png" height="100" width="50"></a></div>
            <div class="slide-in-right slide"><img src="assets/images/COMPANY/dominoz1.png" height="100" width="50"></a></div>
            <div class="slide-in-right slide"><img src="assets/images/COMPANY/finolex1.png" height="100" width="50"></a></div>
            <div class="slide-in-right slide"><img src="assets/images/COMPANY/labour1.png" height="100" width="50"></a></div>
            <div class="slide-in-right slide"><img src="assets/images/COMPANY/lg1.png" height="100" width="50"></a></div>
            <div class="slide-in-right slide"><img src="assets/images/COMPANY/paytm1.png" height="100" width="50"></a></div>
            <div class="slide-in-right slide"><img src="assets/images/COMPANY/tata1.png" height="100" width="50"></a></div>
            <div class="slide-in-right slide"><img src="assets/images/COMPANY/techmedia.png" height="100" width="50"></a></div>

        </div>

    </section>

    <!-- Our services -->
    <section class="paddingTB60 our-services" id="our-services">
        <div class="container">

            <div class="col-12 text-center">
                <h3 class="main-title">Our <span class="main-title-span">Services</span></h3>
            </div>

            <div class="row px-3 justify-content-md-center">
                <div class="card shadow px-0 mb-3 card-margin col-md-4">
                    <img class="card-img-top w-100" src="./assets/images/home/article1.png" alt="Card image cap">
                    <div class="card-body mx-2">
                        <h4 class="card-title">Job Fair</h4>
                        <p class="card-text textjustify">Job Fair India invites all enthusiastic freshers looking for better opportunities to ensure a secure and established future with a reputed job. It helps you pursue your dream of employment after completing the relevant professional courses. Therefore, it is one of the best platforms where you can have enormous opportunities because it is organised in multiple places, where various companies get gathered collectively, and they impart transformative responses to visitors and job aspirants. At the job fair, due to having accumulation and collection of multiple ideas, you can get valuable insight and vision to choose the best option as per your ability.</p>
                        <div class="d-flex justify-content-end">

                            <a href="./job-fair.php" class="btn btn-primary-custom ">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="card shadow px-0 mb-3 card-margin col-md-4">
                    <img class="card-img-top" src="./assets/images/home/article2.png" alt="Card image cap">
                    <div class="card-body mx-2">
                        <h4 class="card-title">Job Cards</h4>
                        <p class="card-text textjustify">A job Card is an electronic card like an ATM or other, which is provided as evidence of registration, where all your details are filled in, and it helps you get updates on the upcoming job fairs and vacancies for new companies like another job platform. It is distinct in a different manner from the other, where you get authentic information from the company to directly get connected. It is created with complete transparency and fairness where you will not be asked for pre counselling or joining charge. We have a robust connectivity with the employers therefore a job card always helps you be updated and ahead to either join as freshers or to switch to the better options. </p>
                        <div class="d-flex justify-content-end">

                            <a href="./job-card.php " class="btn btn-primary-custom ">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- about company -->
    <section class="paddingTB60 about-company" id="aboutus">
        <div class="container">
            <div class="col-12 text-center">
                <h3 class="main-title">About <span class="main-title-span">Us</span></h3>
            </div>
            <div class="d-flex mt-5 about-us-content">
                <div class="text-about-us  ">
                    <div class="card shadow px-3 py-5 textjustify" style="height: 100%;">

                        Job fair is the event to get an opportunity, i.e., a Job for the relevant field you belong to. Various jobs and vacancies exist with the association of enormous companies and employers. It helps you get a lot of chances at a single place or platform and minimises the difficulties for all those aspirants and freshers looking for the job as their gateway to an established career. It imparts multiple ideas and insights that can be beneficial for cultivating your skills, and therefore, it is beneficial for all those freshers looking for a job and wanting to start their new journey.
                        <a href="./about.php">Read more....</a>
                    </div>
                </div>
                <div class="img-about">
                    <img src="./assets/images/home/about1.jpeg" class="rounded image-about" height="auto" alt="" srcset="">
                </div>
            </div>
        </div>
    </section>


    <!-- how it works -->
    <section class="paddingTB60 how-it-works">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 text-center">
                    <h3 class="main-title">How It <span class="main-title-span">Works</span></h3>
                    <p class="main-text">To choose your trending job dream & to make future bright.</p>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body d-flex">
                            <div class="icon-box">
                                <img src="assets/images/home/hiw-icon1.svg" alt="Icon" class="img-icon">
                            </div>
                            <div class="text-content">
                                <h6 class="card-title">Account Create</h6>
                                <p class="card-text">To create your account be confident & safely.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body d-flex">
                            <div class="icon-box">
                                <img src="assets/images/home/hiw-icon2.svg" alt="Icon" class="img-icon">
                            </div>
                            <div class="text-content">
                                <h6 class="card-title">Create Resume</h6>
                                <p class="card-text">To create your account be confident & safely.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body d-flex">
                            <div class="icon-box">
                                <img src="assets/images/home/hiw-icon3.svg" alt="Icon" class="img-icon">
                            </div>
                            <div class="text-content">
                                <h6 class="card-title">Find Jobs</h6>
                                <p class="card-text">To create your account be confident & safely.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body d-flex">
                            <div class="icon-box">
                                <img src="assets/images/home/hiw-icon4.svg" alt="Icon" class="img-icon">
                            </div>
                            <div class="text-content">
                                <h6 class="card-title">Apply Jobs</h6>
                                <p class="card-text">To create your account be confident & safely.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- featured jobs -->
    <section class="paddingTB60 featured-jobs" id="featuredJob">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 text-center">
                    <h3 class="main-title"><span class="main-title-span">Featured</span> Jobs</h3>
                    <p class="main-text">To choose your trending job dream & to make future bright.</p>
                </div>

                <!-- <div class="col-12 text-center">
                    <button class="btn filter-button rounded-pill" data-filter="marketing-sales">Marketing & Sales</button>
                    <button class="btn filter-button rounded-pill" data-filter="development">Development</button>
                    <button class="btn filter-button rounded-pill" data-filter="technology">Technology</button>
                    <button class="btn filter-button rounded-pill" data-filter="medical-nurse">Medical & Nurse</button>
                </div> -->

                <?php
                $query = "";
                if (!isset($_SESSION['logged_in'])) {
                    $query = "SELECT job.*, comp.* FROM jobs AS job 
                    INNER JOIN company AS comp ON job.username = comp.username 
                     ORDER BY `sdate` DESC LIMIT 6";
                } elseif ((strpos($_SESSION['username'], 'admin') === 0) || (strpos($_SESSION['username'], 'comp') === 0)) {
                    $query = "SELECT job.*, comp.* FROM jobs AS job 
                    INNER JOIN company AS comp ON job.username = comp.username 
                     ORDER BY `sdate` DESC LIMIT 6";
                } else {
                    $main_user = $_SESSION['username'];
                    $query2 = "SELECT `category` FROM `users_candidate` WHERE `username` = '$main_user'"; // Notice the single quotes around $main_user
                    $result2 = mysqli_query($con, $query2);

                    if ($result2) {
                        $result22 = mysqli_fetch_assoc($result2);
                        $category = $result22['category'];

                        // Now you can use the $category value in your query
                        $query = "SELECT job.*, comp.* 
                                  FROM jobs AS job 
                                  INNER JOIN company AS comp ON job.username = comp.username 
                                  WHERE job.category LIKE '%$category%' 
                                  ORDER BY job.sdate DESC
                                  LIMIT 12";

                        // Execute $query and process the results
                    }
                }

                if ($result = mysqli_query($con, $query)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>


                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 filter development">
                                <div class="card shadow">
                                    <div class="position-relative mb-4">
                                        <img src="companydocs/.<?php echo $row['banner']; ?>" class="card-img-top cover-image" alt="">
                                        <span class="badge position-absolute badge-square">Badge</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="logo-box">
                                                <img src="companydocs/.<?php echo $row['companylogo']; ?>" class="logo-img" alt="Logo">
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <h5 class="card-title"><?php echo $row['jobtitle']; ?></h5>
                                            <p class="card-text">
                                                <span class="company-name"><?php echo $row['compname']; ?></span>
                                                <span class="deadline">Deadline:</span>
                                                <span class="date"><?php echo $row['deadline']; ?></span>

                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <h6>Salary: <span><?php echo $row['minsalary']; ?>-<?php echo $row['maxsalary']; ?>
                                            <!-- </span> Per Hour</h6> -->
                                            <!-- <h6>Experience: <span>3-3.5 Years</span></h6> -->
                                            <h6>Location: <span><?php echo $row['location2']; ?></span></h6>
                                            <div class="d-flex mt-3 justify-content-between align-items-center">
                                                <span class="badge rounded-pill badge-full-time">Full Time</span>
                                                <h6 class="m-0 text-center">
                                                    <?php
                                                    if (isset($_SESSION['logged_in'])) { ?>
                                                        <a href="job-details.php?id=<?php echo $row['jobid']; ?>" class="apply-now-link">Apply Now</a>
                                                    <?php
                                                    } else { ?>
                                                        <a href="candidate-login.php" class="apply-now-link">Apply Now</a>
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






            </div>
        </div>
    </section>

    <!-- Users Feedback -->
    <section class="paddingTB60 users-feedback bg-white">
        <div class="container">
            <div class="row w-100 g-3">
                <div class="col-md-6">
                    <h3 class="main-title">Our Users <span class="main-title-span">Feedback</span></h3>
                    <p class="main-text">To choose your trending job dream & to make future bright.</p>
                    <div class="row g-5 w-100 mt-4 ps-5">
                        <div class="col-md-6">
                            <h6 class="count-title">Live Jobs</h6>
                            <p class="count-text">20223</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="count-title">Companies</h6>
                            <p class="count-text">802 +</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="count-title">Candidates</h6>
                            <p class="count-text">500 +</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="count-title">New Jobs</h6>
                            <p class="count-text">102 +</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="owl-carousel feedback-carousel owl-theme">
                            <div class="item">
                                <div class="user-feedback-card">
                                    <div class="slide-header d-flex">
                                        <img src="assets/images/home/user1.png" alt="Icon" class="img-user">
                                        <div class="text-content">
                                            <h6 class="card-title">Samuel Hungary</h6>
                                            <p class="card-text">PHP Developer</p>
                                        </div>
                                    </div>
                                    <h5 class="feedback-text mt-4">
                                        "On the other hand, we denounce with righteous indignation and dislike men who are
                                        so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire".
                                    </h5>
                                </div>
                            </div>
                            <div class="item">
                                <div class="user-feedback-card">
                                    <div class="slide-header d-flex">
                                        <img src="assets/images/home/user1.png" alt="Icon" class="img-user">
                                        <div class="text-content">
                                            <h6 class="card-title">Noshima Jonde</h6>
                                            <p class="card-text">Java Developer</p>
                                        </div>
                                    </div>
                                    <h5 class="feedback-text mt-4">
                                        "On the other hand, we denounce with righteous indignation and dislike men who are
                                        so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire".
                                    </h5>
                                </div>
                            </div>
                            <div class="item">
                                <div class="user-feedback-card">
                                    <div class="slide-header d-flex">
                                        <img src="assets/images/home/user1.png" alt="Icon" class="img-user">
                                        <div class="text-content">
                                            <h6 class="card-title">Jorden Therow</h6>
                                            <p class="card-text">.Net Developer</p>
                                        </div>
                                    </div>
                                    <h5 class="feedback-text mt-4">
                                        "On the other hand, we denounce with righteous indignation and dislike men who are
                                        so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire".
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-3 justify-content-between align-items-center">
                            <span class="count-item"></span>
                            <span class="feedback-nav-icons">
                                <i class="bi bi-chevron-left"></i>
                                <i class="bi bi-chevron-right"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- test comment -->
    <!-- About Jobs-->
    <section class="paddingTB60 about-jobs">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-5">




                    <h3 class="main-title">To Know <span class="main-title-span">About</span> Jobs</h3>
                    <p class="main-text">To much valuable feed from our trusted users in world-wide.</p>
                    <div class="row g-5 w-100 mt-4">
                        <div class="col-md-12 ps-5">
                            <h6 class="job-feature-title">Highly Secured</h6>
                            <p class="job-feature-text">Firstly, your account to be secured in login or sign up & don’t be upset, be confident.</p>
                            <h6 class="job-feature-title">Authentic Source</h6>
                            <p class="job-feature-text">Secondly, Every job post to be secured in login or sign up & don’t be upset, be confident.</p>
                            <h6 class="job-feature-title">Cost Effective</h6>
                            <p class="job-feature-text">Thirdly, Every job post to be secured in login or sign up & don’t be upset, be confident.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <!-- <div class="vertical-image"></div>
                        <div class="horizontal-image"></div>
                        <div class="small-card d-flex">
                            <img src="assets/images/home/user1.png" alt="Icon" class="img-user">
                            <div class="text-content">
                                <h6 class="card-title"><span class="main-title-span">Best Quality</span> For Jobs Site</h6>
                                <p class="card-text">To Make Sure Your Job Opportunity.</p>
                            </div>
                        </div> -->
                        <img src="./assets/images/image 5.png " alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent article-->
    <!-- <section class="paddingTB60 recent-article">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-12 text-center">
                    <h3 class="main-title">Our Recent <span class="main-title-span">Article</span></h3>
                    <p class="main-text">To much valuable feed from our trusted users in world-wide.</p>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="position-relative">
                            <img src="assets/images/home/article1.png" class="card-img-top" alt="Image">
                            <span class="badge rounded-pill position-absolute bottom-0 start-50 translate-middle-x">Marketing</span>
                        </div>
                        <h5 class="article-details">How To Apply Your Dream Jobs In Digital Marketing, Easy Solution.</h5>
                        <hr>
                        <div class="d-flex mt-3 justify-content-between align-items-center">
                            <div class="d-flex">
                                <img src="assets/images/home/au1.png" alt="Icon" class="img-user">
                                <div class="text-content">
                                    <h6 class="card-username">Roland Khelcy</h6>
                                    <p class="card-user-position">Admin</p>
                                </div>
                            </div>
                            <h6 class="m-0 text-center">
                                <a href="#" class="view-details-link">View Details</a>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="position-relative">
                            <img src="assets/images/home/cat3.png" class="card-img-top" alt="Image">
                            <span class="badge rounded-pill position-absolute bottom-0 start-50 translate-middle-x">Design</span>
                        </div>
                        <h5 class="article-details">To Be Continue Redesign & Build Up Your Career Opportunity.</h5>
                        <hr>
                        <div class="d-flex mt-3 justify-content-between align-items-center">
                            <div class="d-flex">
                                <img src="assets/images/home/au2.png" alt="Icon" class="img-user">
                                <div class="text-content">
                                    <h6 class="card-username">Mrs. Rudhela Saley</h6>
                                    <p class="card-user-position">Admin</p>
                                </div>
                            </div>
                            <h6 class="m-0 text-center">
                                <a href="#" class="view-details-link">View Details</a>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="position-relative">
                            <img src="assets/images/home/article2.png" class="card-img-top" alt="Image">
                            <span class="badge rounded-pill position-absolute bottom-0 start-50 translate-middle-x">Technology</span>
                        </div>
                        <h5 class="article-details">If You Are A talented People, Make Sure Your Technology Part.</h5>
                        <hr>
                        <div class="d-flex mt-3 justify-content-between align-items-center">
                            <div class="d-flex">
                                <img src="assets/images/home/au3.png" alt="Icon" class="img-user">
                                <div class="text-content">
                                    <h6 class="card-username">Martoniey Sekh</h6>
                                    <p class="card-user-position">Admin</p>
                                </div>
                            </div>
                            <h6 class="m-0 text-center">
                                <a href="#" class="view-details-link">View Details</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Contact US -->
    <section class="paddingTB60  " id="contactus">
        <div class="container">
            <div class="col-12 text-center">
                <h3 class="main-title"><span class="main-title-span">Contact</span> Us</h3>
            </div>

            <form action="" method="post" class="contactus bg-white p-4 border rounded-3 shadow">

                <div class=" mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="name" name="name" placeholder="Enter Full Name" required>
                </div>
                <div class=" mb-3">
                    <label for="number" class="form-label">Number</label>
                    <input type="number" class="form-control" id="number" name="number" placeholder="Enter Number" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-4">
                    <label for="msg_text" class="form-label"> Enter Message</label>
                    <textarea class="form-control" id="msg_text" name="msg" rows="3" required></textarea>
                </div>

                <button class="btn btn-theme-primary col-md-4 offset-md-4 text-center " name="query">Submit</button>
            </form>

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


<?php
if (isset($_POST['query'])) {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $number = $_POST['number'];





    $q = "INSERT INTO `query`(`q_name`, `q_email`, `message`,`q_number`) VALUES ('$name','$email','$msg','$number')";

    if (mysqli_query($con, $q)) {


        echo "
                    <script>
                      alert('query submitted successfully.');
          
                                window.location.href='index.php';
                    </script>
                  ";
    } else {


        echo "
                    <script>
                      alert('Something went wrong??');
          
                                window.location.href='index.php';
                    </script>
                  ";
    }
}

?>

</html>