<?php
session_start();
require('connection.php');


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
    <link rel="stylesheet" href="assets/css/job-category.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- navbar  -->
    <?php include './navbar.php'; ?>

    <!-- breadcrumb -->
    <div class="breadcrumb-section">
        <div class="container">
            <h2 class="title">Job Category</h2>
            <nav aria-label="breadcrumb" class="text-center mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Job Category</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Job Categories-->
    <section class="paddingTB60 job-category">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div class="results-text">Showing results 10 in 200 jobs list</div>
                </div>

                <?php
                // Assuming you have a connection object named $conn
                $result = $con->query("SELECT category, category_id FROM category");

                // Check if there are any results
                if ($result->num_rows > 0) {
                    // Fetch the data and create cards
                    while ($row = $result->fetch_assoc()) {
                        $category = $row['category']; // Fetch category from the current row

                        $count_query = "SELECT COUNT(*) AS job_count
                            FROM jobs
                            WHERE category LIKE '%$category%';";

                        $count_result = $con->query($count_query);

                        if ($count_result) {
                            $count_row = $count_result->fetch_assoc();
                            $job_count = $count_row['job_count'];
                        } else {
                            $job_count = 0; // Set default count to 0 if there's an error
                        }

                        echo '<div class="col-md-3">
                    <div class="card">
                        <a href="job-listing.php?category_id=' . $row['category'] . '">
                            <h5 class="job-category-count">' . $row['category_id'] . '</h5>
                            <h2 class="job-category-title">' . $row['category'] . '</h2>
                            <h2 class="job-category-text">Job Available: <span>' . $job_count . '</span></h2>
                        </a>
                    </div>
                  </div>';
                    }
                } else {
                    echo "No categories found";
                }

                $con->close();
                ?>




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