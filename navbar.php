<nav class="navbar navbar-expand-lg bg-white px-5">

    <a class="navbar-brand" href="index.php">
        <img class="logo" src="assets/images/logo.png">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto ms-auto my-2 my-lg-0">
            <li class="nav-item mx-3">
                <a class="nav-link active" href="./">Home</a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link active" href="./#our-services">Our Services</a>
            </li>
            <li class="nav-item dropdown mx-3">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Find Jobs
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./job-category.php">Search By Category</a></li>
                    <li><a class="dropdown-item" href="./#featuredJob">Featured Job</a></li>

                </ul>
            </li>
            <li class="nav-item mx-3">
                <a href="./gallery.php" class="nav-link">Gallery</a>
            </li>
            <li class="nav-item mx-3">
                <a href="./media.php" class="nav-link">Media</a>
            </li>
            <li class="nav-item mx-3">
                <a href="./blog.php" class="nav-link">Blog</a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="./#aboutus">About Us</a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="./#contactus">Contact Us</a>
            </li>
        </ul>
        <div class="d-flex align-items-center">
            <!-- <a href="#" class="btn btn-light position-relative me-3 rounded-0">
                <i class="bi bi-bell"></i>
                <span class="badge badge-bg-custom position-absolute top-0 start-100 translate-middle p-1">3</span>
            </a> -->
            <?php
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];

                // Check if the username starts with 'comp'
                if (strpos($username, 'comp') === 0) { ?>
                    <a href="./company-profile.php" class="btn btn-primary-outline me-3">
                        <i class="bi bi-person"></i>
                        Dashboard!
                    </a>
                <?php


                } elseif (strpos($username, 'user') === 0) { ?>
                    <a href="./candidate-myprofile.php" class="btn btn-primary-outline me-3">
                        <i class="bi bi-person"></i>
                        Dashboard
                    </a>
                <?php
                } elseif (strpos($username, 'admin') === 0) { ?>
                    <a href="./admin/index.php" class="btn btn-primary-outline me-3">
                        <i class="bi bi-person"></i>
                        Admin-Dashboard
                    </a>

                <?php



                }
            } else { ?>
                <a href="./candidate-signup.php" class="btn btn-primary-outline me-3">
                    <i class="bi bi-person"></i>
                    Sign up
                </a>
            <?php
            }

            ?>
        </div>
        <!-- <div class="">
            <form class="d-flex" role="search">
                <input class="form-control me-2 " style="width: 150px !important;" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary-outline" type="submit">Search</button>
            </form>
        </div> -->
    </div>

</nav>