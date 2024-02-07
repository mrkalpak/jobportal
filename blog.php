<?php
session_start();
require('connection.php');

// Fetch data from the database
$query = "SELECT * FROM blogs";
$result = mysqli_query($con, $query);

if (!$result) {
    die('Query failed: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
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
    <link rel="stylesheet" href="assets/css/blogs.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- navbar  -->
    <?php include './navbar.php'; ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-section">
        <div class="container">
            <h2 class="title">Blog</h2>
            <nav aria-label="breadcrumb" class="text-center mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Recent article-->
    <section class="paddingTB60 blogs">
        <div class="container">
            <div class="row g-3">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4">
                        <div class="card">
                            <a href="blog-details.php?blog_id=<?php echo $row['blog_id']; ?>">
                                <img src="admin/blog/.<?php echo $row['blog_image']; ?>" class="card-img-top" alt="Image">
                            </a>
                            <div class="card-body">
                                <div class="main-row">
                                    <br>
                                    <br>
                                    <div class="date-square">
                                        <?php echo date('d M', strtotime($row['blog_date'])); ?>
                                    </div>
                                    <div class="comment-count">comments</div>
                                    <div class="user-name">
                                        <?php echo $row['blog_name']; ?>
                                    </div>
                                </div>
                                <h5 class="card-title article-details">
                                    <?php echo $row['blog_title']; ?>
                                </h5>
                                <h6 class="card-subtitle mb-2 text-muted m-0">
                                    <a href="blog-details.php?blog_id=<?php echo $row['blog_id']; ?>" class="explore-more-link">Explore More</a>

                                </h6>
                            </div>
                        </div>
                    </div>
                <?php } ?>


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
    <?php
    // Free result set and close connection
    mysqli_free_result($result);
    mysqli_close($con);
    ?>

    <!-- footer -->
    <?php include './footer.php'; ?>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>