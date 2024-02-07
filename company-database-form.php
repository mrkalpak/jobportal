<?php require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
    header("Location: index.php");
} ?>
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
    <link rel="stylesheet" href="./assets/css/company-dashboard.css">
    <link rel="stylesheet" href="./assets/css/company-joblist.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- navbar -->
    <?php include './profileNavbar.php'; ?>


    <!-- comapany Navbar -->
    <?php
    $activePage = "database";
    include './company-navbar.php';

    ?>
    <div class="card ms-auto me-auto border-1 cards-width p-4">
        <form action="./company-database-lock.php">
            <h5>
                Search for
            </h5>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="exp_type" id="fresher" value="fresher">
                <label class="form-check-label" for="fresher">Fresher</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="exp_type" id="exprience" value="exprience">
                <label class="form-check-label" for="exprience">Exprience</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" checked type="radio" name="exp_type" id="any" value="any">
                <label class="form-check-label" for="any">Any</label>
            </div>
            <hr>
            <div class="mb-3">
                <label for="keyword" class="form-label">Keywords</label>
                <input type="email" class="form-control" id="keyword" placeholder="Enter KeyWords (job title)">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Current City</label>
                <input type="email" class="form-control" id="city" placeholder="Enter City">
            </div>
            <div class="mb-3">
                <label for="high_edu" class="form-label">Highest Education</label>
                <select class="form-select" id="high_edu">
                    <option selected value="10th">10th</option>
                    <option value="12th">12th</option>
                    <option value="Diploma">Diploma</option>
                    <option value="B-tech">B-tech</option>
                </select>
            </div>
            <hr>
            <div class="text-center mt-4">
                <button class="btn btn-primary-custom " type="submit">
                    <i class="bi bi-search"></i> Search Candidates
                </button>

            </div>
        </form>
    </div>


    <!-- footer -->
    <?php include './footer.php'; ?>
    <!-- script -->
    <script src="./assets/js/showrows.js"></script>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>