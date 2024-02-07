<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
    header("Location: index.php");
}
$username = $_SESSION['username'];

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
    <link rel="stylesheet" href="./assets/css/company-dashboard.css">
    <link rel="stylesheet" href="./assets/css/company-profile.css">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- navbar -->
    <?php include './profileNavbar.php'; ?>


    <!-- comapany Navbar -->
    <?php
    $activePage = "profile";


    $query = "SELECT companytype, companysize, companylogo, location, websitelink, facebook, linkedin, mobile, alternatemobile, active FROM company WHERE username = ?";
    $stmt = $con->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $username);

        $username = $_SESSION['username'];
        // Assuming you have a 'username' session variable

        $stmt->execute();
        $stmt->bind_result($companytype, $companysize, $companylogo, $location, $websitelink, $facebook, $linkedin, $mobile, $alternatemobile, $active);
        $stmt->fetch();
        $stmt->close();

        if (
            empty($companytype) ||              // Check if company type is empty
            empty($companysize) ||              // Check if company size is empty
            empty($companylogo) ||              // Check if company logo is empty
            empty($location) ||                // Check if location is empty
            // Check if LinkedIn is empty
            empty($mobile) ||                  // Check if mobile number is empty
            empty($alternatemobile) ||         // Check if alternate mobile number is empty
            $active != 1
        ) {
            include './company-navbar2.php';
        } else {

            include './company-navbar.php';
        }
    }




    ?>

    <?php
    $sql1 = "SELECT * FROM company  WHERE username='$username' ";
    $query1 = mysqli_query($con, $sql1);
    $result_fetch1 = mysqli_fetch_assoc($query1);
    $row1 = mysqli_num_rows($query1);
    ?>

    <!-- profile section -->
    <div class="row  mx-5 my-5 px-4">
        <h5 class="mb-5">My Profile</h5>
        <form method="POST" enctype="multipart/form-data" class="border border-1 px-5">
            <h6 class="mt-4">Company Information:</h6>
            <div class="row mt-3">

                <div class="mb-3 col">
                    <label for="companyname" class="form-label">Company Name*</label>
                    <input type="text" value="<?= $result_fetch1['name'] ?>" class="form-control" id="companyname" name="name">

                </div>
                <div class="mb-3 col">
                    <label for="companytype" class="form-label">Company Type*</label>
                    <input type="text" value="<?= $result_fetch1['companytype'] ?>" class="form-control" id="companyname" name="companytype1" hidden>
                    <select value="<?= $result_fetch1['companytype'] ?>" class="form-select" id="companytype" name="companytype">

                        <option selected value=""><?= $result_fetch1['companytype']; ?></option>
                        <option value="Digital Agency">Digital Agency</option>
                        <option value="Digital Marketing Agency">Digital Marketing Agency</option>
                        <option value="Software Company">Software Company</option>
                        <option value="E-commerce Company">E-commerce Company</option>
                        <option value="Consulting Firm">Consulting Firm</option>
                        <option value="Manufacturing Company">Manufacturing Company</option>
                        <option value="Retail Store">Retail Store</option>
                        <option value="Restaurant">Restaurant</option>
                        <option value="Construction Company">Construction Company</option>
                        <option value="Healthcare Provider">Healthcare Provider</option>
                        <option value="Financial Services Company">Financial Services Company</option>
                        <option value="Travel Agency">Travel Agency</option>
                        <option value="Real Estate Agency">Real Estate Agency</option>
                    </select>

                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="companysize" class="form-label">Company Size*</label>
                        <input type="number" value="<?= $result_fetch1['companysize'] ?>" class="form-control" id="companysize" name="companysize">

                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" value="<?= $result_fetch1['email'] ?>" class="form-control" id="email" name="mail" disabled>

                    </div>
                </div>
                <div class=" row ">
                    <div class="mb-3 py-3  row  col-md-6 bg-light me-0 ms-0 px-0">
                        <div class="col-md-4 ms-3 mt-2">

                            Company Logo:
                        </div>
                        <label for="imageInput" class="image-input col-md-6 mx-lg-4">
                            <div class="col">

                                <img src="./assets/images/home/image-stock.png" id="blah" class="mt-3 img-fluid  border border-1" alt="Upload Logo">
                                <input type="file" id="imageInput" class="d-none" name="file">
                                <!-- <input class="form-control" type="file" id="formFile"  name="file"> -->
                                <div class="image-overlay">Upload Logo</div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <?php
                            if (!$result_fetch1['companylogo'] == null) { ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="companydocs/.<?php echo $result_fetch1['companylogo']; ?>" target="_blank">Your uploaded Logo </a>
                            <?php }
                            ?>

                        </label>

                    </div>
                    <div class="col-md-6">

                        <div class="mb-4 col">
                            <label for="location" class="form-label">Location*</label>
                            <input type="text" value="<?= $result_fetch1['location'] ?>" class="form-control" id="location" name="location">

                        </div>
                        <div class="mb-4 col">
                            <label for="weburl" class="form-label">Website Link*</label>
                            <input type="text" value="<?= $result_fetch1['websitelink'] ?>" class="form-control" id="weburl" name="websitelink">

                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" value="<?= $result_fetch1['facebook'] ?>" class="form-control" id="facebook" name="facebook">

                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" value="<?= $result_fetch1['linkedin'] ?>" class="form-control" id="linkedin" name="linkedin">

                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="mob_number" class="form-label">Mobile Number</label>
                        <input type="number" value="<?= $result_fetch1['mobile'] ?>" class="form-control" id="mob_number" name="mobile">

                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="alt_mob_number" class="form-label">Alternate Mobile Number</label>
                        <input type="number" value="<?= $result_fetch1['alternatemobile'] ?>" class="form-control" id="alt_mob_number" name="alternatemobile">

                    </div>
                </div>









                <button type="button" name="companyupdate" data-bs-toggle="modal" data-bs-target="#submitmodal" class=" col-auto mt-3 mb-3 btn custom-outline-color">Update Change</button>



        </form>

        <!-- Your Bootstrap modal goes here -->
        <div class="modal" tabindex="-1" id="submitmodal" data-bs-backdrop="static" data-bs-keyboard="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body px-5">
                        <div class="col-12 text-center">
                            <h5 class="">Profile Updated</h5>
                            <h6>Your Profile is under review <br /> We will get back to you</h6>
                        </div>
                    </div>
                    <div class="my-3 text-center">
                        <button type="submit" name="home" class="btn btn-primary-custom" data-bs-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>


        <?php
        // Check if the button is clicked
        if (isset($_POST['home'])) {
            // Redirect to another page using JavaScript
            echo '<script>window.location.href = "company-profile.php";</script>';
        }
        ?>

        <!-- Bootstrap JS and your script -->
        <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="path/to/jquery.min.js"></script>
        <script>
            // Function to redirect to profile.php
            function redirectToProfile() {
                window.location.href = "company-profile.php";
            }

            // Show the modal on page load
            $(document).ready(function() {
                $("#submitmodal").modal("show");
            });
        </script>














        <!-- Bootstrap JS and your script -->
        <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="path/to/jquery.min.js"></script>
        <script>
            // Function to submit the form
            function submitForm() {
                $("#yourForm").submit();
            }

            // Show the modal on page load
            $(document).ready(function() {
                $("#submitmodal").modal("show");
            });
        </script>




        <!-- bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="./assets/js/candidate-sidenavbar.js"></script>
        <!-- footer -->
        <?php include './footer.php'; ?>
        <script src="path/to/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>




</html>