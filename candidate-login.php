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
    <link rel="stylesheet" href="./assets/css/login.css">

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- navbar  -->
    <?php include './navbar.php'; ?>

    <div class="row  my-5 login-card shadow">
        <div class="col-md-5 login-card-details">
            <h4 class="mt-5">
                Welcome to JOB FAIR INDIA
            </h4>
            <span style="font-size: smaller;">
                Do not have a account <a href="./candidate-signup.php">Sign up for free</a>
            </span>

            <h5 class="fw-bold mt-5" style="color: var(--primary);">
                Candidate Login
            </h5>

            <form class="mt-5" action="login_register.php" method="POST">
                <div class="mb-5">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" name="email_username" class="form-control" placeholder="Email Address" id="email">

                </div>

                <div class="mb-5">
                    <label for="password" class="form-label">Password</label>

                    <div class="input-group">
                        <input type="password" name="password" placeholder="********" class="form-control" id="password">

                        <button class="btn btn-outline-eye toggle-password" type="button">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <a class="mb-5" href="forgotpassword1.php" style="font-size: smaller;">
                        Forget Passsword ?
                    </a>

                </div>

                <button type="submit" name="login" class="btn btn-theme-primary w-100 mb-5">Login</button>
            </form>


            <span class="" style="font-size: smaller;">
                By login, you are agreeing to our Terms & Conditions and Privacy Policy.
            </span>
            <div class="mb-4"></div>
        </div>
        <div class="col-md-7 login-img-background py-5">
            <img src="./assets/images/logo.png" class="ms-auto me-auto" width="300 rem" height="105px" alt="">
            <img src="./assets/images/login-sideimage.png" width="300rem" alt="">
        </div>
    </div>


    <script src="./assets/js/showpassword.js"></script>
    <!-- footer -->
    <?php include './footer.php'; ?>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>