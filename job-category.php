<?php
session_start();
require('connection.php');


?>
<?php include './header.php'; ?>

<!-- page -->
<link rel="stylesheet" href="assets/css/job-category.css">
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


 
<!-- Plugin js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="assets/js/our-trusted-company.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="assets/js/popular-category.js"></script>
<script src="assets/js/featured-jobs-gallery.js"></script>
<script src="assets/js/users-feedback.js"></script>
</body>

</html>