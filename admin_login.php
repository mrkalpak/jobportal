<?php include './header.php'; ?>

<link rel="stylesheet" href="./assets/css/login.css">
<!-- navbar  -->
<?php include './navbar.php'; ?>


<div class="row  my-5 login-card shadow">
    <div class="col-md-5 login-card-details">
        <h4 class="mt-5">
            Admin Login
        </h4>
        <span style="font-size: smaller;">
            <!-- Do not have a account <a href="./candidate-signup.php">Sign up for free</a> -->
        </span>

        <h5 class="fw-bold mt-5" style="color: var(--primary);">
            <!-- Admin Login -->
        </h5>

        <form class="mt-5" action="login_register.php" method="POST">
            <div class="mb-5">
                <label for="email" class="form-label">Email </label>
                <input type="email" name="amail" class="form-control" placeholder="Email Address" id="email">

            </div>
            <div class="mb-5">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" placeholder="********" class="form-control" id="password">
                    <button class="btn btn-outline-eye toggle-password" type="button">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>

            </div>

            <button type="submit" name="admin_login" class="btn btn-theme-primary w-100 mb-5">Admin-Login</button>
        </form>
        <a class="mb-5" href="forgotpassword.php" style="font-size: smaller;">
            Forget Passsword ?
        </a>

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
 
</body>

</html>