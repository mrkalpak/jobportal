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

<?php include './header.php'; ?>

<!-- page -->
<link rel="stylesheet" href="assets/css/blogs.css">
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
 
</body>

</html>