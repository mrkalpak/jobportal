<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
    header("Location: index.php");
}
$main_user = $_SESSION['username'];
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
    <div class="candidate-card me-auto ms-auto mt-3 row">
        <div class="col fs-4 fw-semibold">
            Unlocked Candidates
        </div>
        <div class="col d-flex justify-content-end ">
            <button class="btn btn-sm btn-outline-custom text-white "><i class="bi bi-download"></i>&nbsp; Download Excel</button>
        </div>
    </div>


    <?php
    $query6 = "SELECT mu.*, uc.* FROM $main_user AS mu 
    INNER JOIN users_candidate AS uc ON mu.username = uc.username 
    WHERE mu.usertype = 1 
    ORDER BY mu.card DESC";


    if ($result6 = mysqli_query($con, $query6)) {
        if (mysqli_num_rows($result6) > 0) {
            while ($row = mysqli_fetch_assoc($result6)) { ?>
                <div class="border border-1 candidate-card mt-3 rounded ms-auto me-auto p-3">
                    <div class="row">
                        <div class="col fw-bold">
                            <?= $row['name'] ?> &nbsp; &nbsp;


                            <!-- ----code for card or not----- -->
                            <?php
                            if ($row['card'] == true) { ?>
                                <i class="bi bi-star-fill text-warning"></i>
                            <?php } ?>



                        </div>
                        <?php
                        if (!$row['resume'] == null) { ?>
                            <div class="col d-flex justify-content-end">
                                <a href="uploaddocs/.<?php echo $row['resume']; ?>" target="_blank" class="btn btn-sm btn-outline-secondary ">
                                    <i class="bi bi-download"></i>&nbsp;
                                    Resume
                                </a>
                            </div>
                            </a>
                        <?php } else { ?>

                            <div class="col d-flex justify-content-end">
                                <!-- <a href="uploaddocs/.<?php echo $row['resume']; ?>" target="_blank" class="btn btn-sm btn-outline-secondary "> -->
                                <i class="bi bi-download"></i>&nbsp;
                                Pending
                                </a>
                            </div>
                        <?php
                        } ?>
                    </div>

                    <div class="row">
                        <div class="col-md-8 row text-secondary">
                            <div class="col-auto"><span class="badge bg-secondary ">Fresher</span></div>
                            <div class="col-auto"> <i class="bi bi-geo-alt-fill"></i> <?php echo $row['location']; ?> </div>
                            <div class="col-auto">

                                Age :<?php echo $row['age']; ?> .</div>
                        </div>
                    </div>



                    <div class="row mt-2 col-md-11">
                        <div class="col-md-2">
                            <i class="bi bi-mortarboard-fill"></i>&nbsp; Qualification :
                        </div>
                        <div class="col-auto">
                            <?php echo $row['qualification']; ?>
                        </div>
                    </div>
                    <div class="row mt-2 col-md-11">
                        <div class="col-md-2">
                            <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 6.32247V0H0V6.32247C0 6.58498 0.18 6.83248 0.49 6.96748L4.67001 8.84997L3.68001 10.605L0.27 10.8225L2.85999 12.5025L2.07 15L5.00001 13.6725L7.93 15L7.15 12.5025L9.74001 10.8225L6.33 10.605L5.34 8.84997L9.52 6.96748C9.82 6.83248 10 6.59247 10 6.32247ZM6 7.67247L5.00001 8.12247L4 7.67247V0.750001H6V7.67247Z" fill="black" />
                            </svg>
                            </i>
                            &nbsp; Domain :
                        </div>
                        <div class="col-auto">
                            <?php echo $row['category']; ?>
                        </div>
                    </div>
                    <div class="row mt-2 col-md-11">
                        <div class="col-md-2">
                            <i class="bi bi-telephone-fill"></i>&nbsp; Phone Number :
                        </div>
                        <div class="col-auto">
                            <?php echo $row['phone']; ?>
                        </div>
                    </div>
                    <div class="row mt-2 col-md-11">
                        <div class="col-md-2">
                            <i class="bi bi-envelope-fill"></i>&nbsp; Email :
                        </div>
                        <div class="col-auto">
                            <?php echo $row['email']; ?>
                        </div>
                    </div>
                    <!-- <div class="row mt-2 col-md-11">
                    <div class="col-md-2">
                        <i class="bi bi-linkedin"></i>&nbsp; LinkedIn :
                    </div>
                    <div class="col-auto">
                        <a href="https://www.linkedin.com/feed/">https://www.linkedin.com/</a>
                    </div>
                </div> -->
                    <div class="row mt-2 col-md-11 bg-light">
                        <div class="col-md-2">
                            <i class="bi bi-card-text"></i>&nbsp; Description :
                        </div>
                        <div class="col-auto">
                            <?php echo $row['description']; ?>
                        </div>
                    </div>


                </div>

    <?php
            }
        } else {
            echo "No matching records found.";
        }
    }
    ?>


    <?php include './footer.php'; ?>
    <!-- script -->
    <script src="./assets/js/showrows.js"></script>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        // JavaScript code for scroll position restoration
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('candidate-card')) {
                // Get the clicked candidate card's unique identifier (e.g., data-candidate-id)
                var candidateId = event.target.getAttribute('data-candidate-id');

                // Record the scroll position for this specific candidate card
                var scrollPosition = window.scrollY;
                localStorage.setItem('scrollPosition_' + candidateId, scrollPosition);
            }
        });

        // Restore scroll positions when the page loads
        window.addEventListener('load', function() {
            // Loop through candidate cards and restore their scroll positions
            var candidateCards = document.querySelectorAll('.candidate-card');
            candidateCards.forEach(function(candidateCard) {
                var candidateId = candidateCard.getAttribute('data-candidate-id');
                var storedScrollPosition = localStorage.getItem('scrollPosition_' + candidateId);
                if (storedScrollPosition !== null) {
                    window.scrollTo(0, parseInt(storedScrollPosition));
                }
            });
        });
    </script>




</body>

</html>