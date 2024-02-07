<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Fairs</title>
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
    <!-- <link rel="stylesheet" href="assets/css/gallery.css"> -->

    <style>
        .job-fair-card-details {
            width: 75%;
            margin-left: auto;
            margin-right: auto;
        }

        .main-title {
            font-size: x-large !important;
        }

        @media (max-width: 767px) {
            .job-fair-card-details {
                width: 95%;
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- navbar  -->
    <?php include './navbar.php'; ?>


    <!-- gallery-->
    <section class="paddingTB60 ">
        <div class="card shadow job-fair-card-details px-4 py-3">

            <div class="col-12  text-center">
                <h3 class="main-title">About <span class="main-title-span">JobCard</span></h3>
            </div>
            <div class="text-center">

                <img src="./assets/images/home/jobcard.jpg" width="60%" height="auto" alt="" srcset="">
            </div>
            <div class=" p-5 textjustify">
            &nbsp; &nbsp; &nbsp; &nbsp; A job card has been introduced by the Job Fair India to make your job search easy and accessible where you have to submit complete details like Name, Address, Date of Birth, Qualification, Contact Number and all. With the complete details, you are registered to receive the job details and the new vacancies in different companies. It helps you be prepared and to explore the upcoming jobs as per your portfolio and you receive the jobs for better career enhancement. <br><br>
            &nbsp; &nbsp; &nbsp; &nbsp; It's an electronic card like a debit card where your name and other details are printed, and it helps you enter the upcoming job fair to get better options. <br> <br>
            &nbsp; &nbsp; &nbsp; &nbsp; Job card helps you with beneficial features like getting regular updates on upcoming jobs and the best thing with the job card is that once you get registered for the job updates your card becomes active for one year and you get regular updates of the jobs. So, it does not matter that if you get the job after registering with the job card means you will not get the updates, but you will get the better opportunity with regular updates. <br><br>
            &nbsp; &nbsp; &nbsp; &nbsp; Therefore, a job card is one of the best components for all those looking for better job options and wanting to cultivate their career with regular job updates. <br><br>
            &nbsp; &nbsp; &nbsp; &nbsp; It happens generally, that when you are ready for the job don’t get the proper information or details of employers, but the job fair helps you be updated and ahead of time. it’s your turn to get the updates and find the desired job for your ensured career, therefore, register yourself with the transformative and efficient job card and get ready for the calls from various companies. 

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