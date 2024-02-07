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
    <link rel="stylesheet" href="assets/css/gallery.css">

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- navbar  -->
    <?php include './navbar.php'; ?>


    <!-- gallery-->
    <section class="paddingTB60 ">
        <div class="row w-100 justify-content-md-center" style="justify-content: center;">
            <div class="  col-auto ">

                <a class="text-center underline-grow underline-active" id="underline-link1">Photos</a>
            </div>
            <div class="  col-auto">

                <a class=" text-center underline-grow" id="underline-link2">Videos</a>
            </div>

        </div>
        <div class=" paddingTB60 text-center" id="tab1" style="display: block;">
            <div class="row w-100 tab justify-content-md-center">
                <?php


                $q = "SELECT * FROM images ORDER BY image_date DESC";

                $query = mysqli_query($con, $q);

                while ($row = mysqli_fetch_array($query)) {

                    $name = $row['image_name'];
                    $category = $row['image_category'];
                ?>
                    <div class="col-md-4  mb-4">
                        <img src="admin/images/.<?php echo $row['image_name']; ?>" width="100%" alt="img">
                    </div>
                <?php }
                ?>

            </div>
        </div>
        <div class=" paddingTB60 " id="tab2" style="display: none;">
            <div class="row w-100 tab justify-content-md-center">
                <?php


                $q1 = "SELECT * FROM videos ORDER BY video_date DESC";

                $query1 = mysqli_query($con, $q1);

                while ($row1 = mysqli_fetch_array($query1)) {

                    $name1 = $row1['video_name'];
                    $category1 = $row1['video_category'];
                ?>
                    <div class="col-md-4  mb-4">
                        <iframe width="450" height="260" src="admin/videos/.<?php echo $name1 ?>" allowfullscreen></iframe>
                    </div>

                <?php }
                ?>

            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include './footer.php'; ?>

    <script>
        const underlineLink1 = document.getElementById('underline-link1');
        const underlineLink2 = document.getElementById('underline-link2');

        underlineLink1.addEventListener('click', function(event) {
            event.preventDefault();
            underlineLink1.classList.add('underline-active');
            underlineLink2.classList.remove('underline-active');
            document.getElementById("tab1").style.display = "block";
            document.getElementById("tab2").style.display = "none";

        });
        underlineLink2.addEventListener('click', function(event) {
            event.preventDefault();
            underlineLink2.classList.add('underline-active');
            underlineLink1.classList.remove('underline-active');
            document.getElementById("tab1").style.display = "none";
            document.getElementById("tab2").style.display = "block";
        });
    </script>
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