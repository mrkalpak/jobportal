<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
    header("Location: index.php");
}
$expLevel = isset($_GET['exp-lvl']) ? $_GET['exp-lvl'] : 'Any';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$city = isset($_GET['city']) ? $_GET['city'] : '';
$highEdu = isset($_GET['high_edu']) ? $_GET['high_edu'] : 'Any';


?>

<!DOCTYPE html>
<html lang="en">

<head>

    </style>
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
    <?php include './profileNavbar.php';

    ?>


    <!-- comapany Navbar -->
    <?php
    $activePage = "database";
    include './company-navbar.php';

    ?>
    <form action="?exp-lvl=<?= $expLevel ?>&keyword=<?= $keyword ?>&city=<?= $city ?>&high_edu=<?= $highEdu ?>" method="GET">

        <div class="candidate-card me-auto ms-auto mt-3 row">
            <input type="hidden" name="page" value="1" id="currentPage">
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="exp-lvl" class="form-label">Exprience Level</label>
                    <select name="exp-lvl" class="form-select" id="exp-lvl">
                        <option value="Any" <?= ($expLevel == 'Any') ? 'selected' : '' ?>>Any</option>
                        <option value="0" <?= ($expLevel == 'Fresher') ? 'selected' : '' ?>>Fresher</option>
                        <option value="1" <?= ($expLevel == 'Exprienced') ? 'selected' : '' ?>>Exprienced</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="keyword" class="form-label">Keywords</label>
                    <select name="keyword" class="form-select" id="keyword">
                        <option value="" <?= empty($keyword) ? 'selected' : '' ?>>Any</option>
                        <option value="Web Development" <?= ($keyword == 'Web Development') ? 'selected' : '' ?>>Web
                            Development</option>
                        <option value="Data Science" <?= ($keyword == 'Data Science') ? 'selected' : '' ?>>Data Science
                        </option>
                        <option value="App Development" <?= ($keyword == 'App Development') ? 'selected' : '' ?>>App
                            Development</option>
                        <option value="Testing" <?= ($keyword == 'Testing') ? 'selected' : '' ?>>Testing</option>
                        <option value="data intern" <?= ($keyword == 'data intern') ? 'selected' : '' ?>>data intern
                        </option>
                        <option value="web design" <?= ($keyword == 'web design') ? 'selected' : '' ?>>web design</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="city" class="form-label">Current City</label>
                    <select name="city" class="form-select" id="city">
                        <option value="" <?= empty($city) ? 'selected' : '' ?>>Any</option>
                        <option value="Pune" <?= ($city == 'Pune') ? 'selected' : '' ?>>Pune</option>
                        <option value="Nagpur" <?= ($city == 'Nagpur') ? 'selected' : '' ?>>Nagpur</option>
                        <option value="Mumbai" <?= ($city == 'Mumbai') ? 'selected' : '' ?>>Mumbai</option>
                        <option value="Nashik" <?= ($city == 'Nashik') ? 'selected' : '' ?>>Nashik</option>
                        <option value="Satara" <?= ($city == 'Satara') ? 'selected' : '' ?>>Satara</option>
                        <option value="tumsar" <?= ($city == 'tumsar') ? 'selected' : '' ?>>tumsar</option>
                    </select>
                </div>
            </div>


            <div class="col-md-3">
                <div class="mb-3">
                    <label for="high_edu" class="form-label">Highest Education</label>
                    <select name="high_edu" class="form-select" id="high_edu">
                        <option value="" <?= empty($highEdu) ? 'selected' : '' ?>>Any</option>
                        <option value="10th" <?= ($highEdu == '10th') ? 'selected' : '' ?>>10th</option>
                        <option value="12th" <?= ($highEdu == '12th') ? 'selected' : '' ?>>12th</option>
                        <option value="Diploma" <?= ($highEdu == 'Diploma') ? 'selected' : '' ?>>Diploma</option>
                        <option value="B-tech" <?= ($highEdu == 'B-tech') ? 'selected' : '' ?>>B-tech</option>
                    </select>
                </div>
            </div>

            <div class="text-end mt-2">
                <button name="updatesearch" class="btn btn-primary-custom " type="submit">
                    <i class="bi bi-search"></i> Update Search
                </button>
            </div>
        </div>
        <div class="candidate-card me-auto ms-auto mt-3 row">
            <div class="col fs-4 fw-semibold">
                Candidates
            </div>

        </div>
        <!-- TO DO BAckend when click on view more btn phone no  email linkdin resume should display oherview hide and also diduct the coins 2 coin per candidate -->

        <?php

        $results_per_page = 2;

        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        $start_from = ($page - 1) * $results_per_page;

        if (isset($_GET['updatesearch'])) {

            $expLevel = $_GET['exp-lvl'];
            $keyword = $_GET['keyword'];
            $city = $_GET['city'];
            $highEdu = $_GET['high_edu'];


            // $query = "SELECT * FROM users_candidate WHERE experience_level LIKE '%$expLevel%' AND category LIKE '%$keyword%' AND location LIKE '%$city%' AND highest_education LIKE '%$highEdu%'";
            $query = "SELECT * FROM users_candidate WHERE 1";

            if ($expLevel != 'Any') {
                $query .= " AND experience_level LIKE '%$expLevel%'";
            }

            if (!empty($keyword)) {
                $query .= " AND category LIKE '%$keyword%'";
            }

            if (!empty($city)) {
                $query .= " AND location LIKE '%$city%'";
            }

            if ($highEdu != 'Any') {
                $query .= " AND qualification LIKE '%$highEdu%'";
            }

            $query .= " LIMIT $start_from, $results_per_page";
        } else {
            $query = "SELECT * FROM users_candidate LIMIT $start_from, $results_per_page";
        }




        $query_run = mysqli_query($con, $query);


        if (mysqli_num_rows($query_run) > 0) {
            while ($items = mysqli_fetch_assoc($query_run)) { ?>
                <div class="border border-1 candidate-card mt-3 rounded ms-auto me-auto p-3">
                    <div class="row">
                        <div class="col fw-bold">

                            <?= $items['name'] ?> &nbsp; &nbsp;
                            <?php
                            if ($items['cardtype'] == true) { ?>
                                <i class="bi bi-star-fill text-warning"></i>
                            <?php } ?>
                        </div>
                        <div class="col d-flex justify-content-end ">
                            <a target="_blank" class=" btn btn-sm btn-outline-secondary ">
                                <i class="bi bi-download"></i>&nbsp;
                                Resume
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 row text-secondary">
                            <div class="col-auto"> <i class="bi bi-geo-alt-fill"></i>
                                <?= $items['location'] ?>
                            </div>
                            <div class="col-auto">Age :
                                <?= $items['age'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2 col-md-11">
                        <div class="col-md-2">
                            <i class="bi bi-mortarboard-fill"></i>&nbsp; Qualification :
                        </div>
                        <div class="col-auto">
                            <?= $items['qualification'] ?>
                        </div>
                    </div>
                    <div class="row mt-2 col-md-11">
                        <div class="col-md-2">
                            <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 6.32247V0H0V6.32247C0 6.58498 0.18 6.83248 0.49 6.96748L4.67001 8.84997L3.68001 10.605L0.27 10.8225L2.85999 12.5025L2.07 15L5.00001 13.6725L7.93 15L7.15 12.5025L9.74001 10.8225L6.33 10.605L5.34 8.84997L9.52 6.96748C9.82 6.83248 10 6.59247 10 6.32247ZM6 7.67247L5.00001 8.12247L4 7.67247V0.750001H6V7.67247Z" fill="black" />
                            </svg>
                            &nbsp; Skills :
                        </div>
                        <div class="col-auto">
                            <?= $items['category'] ?>
                        </div>
                    </div>
                    <div class="row mt-2 col-md-11   ">
                        <div class="col-md-2">
                            <i class="bi bi-telephone-fill"></i>&nbsp; Phone Number :
                        </div>
                        <div class="col-auto">
                            +91-**********
                        </div>
                    </div>
                    <div class="row mt-2 col-md-11   ">
                        <div class="col-md-2">
                            <i class="bi bi-envelope-fill"></i>&nbsp; Email :
                        </div>
                        <div class="col-auto">
                            *********@gmail.com
                        </div>
                    </div>
                    <div class="row mt-2 col-md-11   ">
                        <div class="col-md-2">
                            <i class="bi bi-linkedin"></i>&nbsp; LinkedIn :
                        </div>
                        <div class="col-auto">
                            @********linkedin
                        </div>
                    </div>
                    <div class="row mt-2 col-md-11">
                        <div class="col-md-2 font-weight-bold text-dark">
                            <i class="bi bi-mortarboard-fill"></i> Education :
                        </div>
                        <div class="col-auto">
                            <?php echo $items['qualification']; ?>
                        </div>
                    </div>
                    <div class="row mt-2 col-md-11">
                        <div class="col-md-2 font-weight-bold text-dark">
                            <i class="bi bi-person-badge-fill"></i> Experience :
                        </div>
                        <div class="col-auto">
                            <?php if ($items['experience_level'] == 1) {
                                echo "Experienced";
                            } else {
                                echo "Fresher";
                            } ?>
                        </div>
                    </div>
                    <div class="row mt-2 col-md-11 bg-light">
                        <div class="col-md-2">
                            <i class="bi bi-card-text"></i>&nbsp; Description :
                        </div>
                        <div class="col-auto">
                            <?= $items['description'] ?>
                        </div>
                    </div>
                    <div class="row mt-3 ms-3 col-md-11">
                        <!-- <a href="company-database-lock.php" class="btn btn-outline-custom col-md-2">
                            <i class="bi bi-unlock-fill"></i> View More Info
                        </a> -->


                        <a href="company-database-lock.php?id1=<?= $items['username'] ?>&id2=<?= $_SESSION['username'] ?>&id3=<?= $items['cardtype'] ?>">
                            <input type="button" value="View More Info" class="btn btn-outline-custom col-md-2" onclick="return confirm('It Will Cost 5 Coins?')">
                        </a>

                    </div>




                </div>
        <?php
            }
        } else {
            echo '<div class="alert alert-warning text-center" role="alert">
                        No results found.
                      </div>';
        }


        if (isset($_GET['updatesearch'])) {

            $expLevel = $_GET['exp-lvl'];
            $keyword = $_GET['keyword'];
            $city = $_GET['city'];
            $highEdu = $_GET['high_edu'];


            // $query = "SELECT * FROM users_candidate WHERE experience_level LIKE '%$expLevel%' AND category LIKE '%$keyword%' AND location LIKE '%$city%' AND highest_education LIKE '%$highEdu%'";
            $query_count = "SELECT COUNT(*) as count FROM users_candidate WHERE 1";

            if ($expLevel != 'Any') {
                $query_count .= " AND experience_level LIKE '%$expLevel%'";
            }

            if (!empty($keyword)) {
                $query_count .= " AND category LIKE '%$keyword%'";
            }

            if (!empty($city)) {
                $query_count .= " AND location LIKE '%$city%'";
            }

            if ($highEdu != 'Any') {
                $query_count .= " AND qualification LIKE '%$highEdu%'";
            }
        } else {
            $query_count = "SELECT COUNT(*) as count FROM users_candidate WHERE 1";
        }
        $query_count_run = mysqli_query($con, $query_count);
        $result_count = mysqli_fetch_assoc($query_count_run);
        $total_records = $result_count['count'];
        echo $total_pages = ceil($total_records / $results_per_page);


        ?>
        <style>
            .pagination {
                margin: 10px;
            }
        </style>

        <div class="col-12 d-flex justify-content-center mt-5">
            <!-- Inside the pagination section -->
            <nav aria-label="Page navigation example">
                <ul class="pagination" style="background-color: #595959;">

                    <?php
                    $prev_page = max($page - 1, 1);
                    $next_page = min($page + 1, $total_pages);

                    $query_string = http_build_query(['exp-lvl' => $expLevel, 'keyword' => $keyword, 'city' => $city, 'high_edu' => $highEdu, 'updatesearch' => ""]);

                    $query_string = (isset($_GET['updatesearch'])) ? "$query_string&" : '';
                    $class = $page == 1 ? 'page-item disabled' : 'page-item';
                    $class2 = $page == $total_pages ? 'page-item disabled' : 'page-item';

                    echo "<li class='$class'><a class='page-link' href='?$query_string page=$prev_page' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";


                    for ($i = 1; $i <= $total_pages; $i++) {
                        // Check if $i is the current page ($page)
                        if ($i == $page) {
                            echo "<li class='page-item active'><a class='page-link' href='#'><span style='color: grey;'>$i</span></a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='?$query_string page=$i'>$i</a></li>";
                        }
                    }



                    echo "<li class=' $class2'><a class='page-link' href='?$query_string page=$next_page' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
                    ?>
                </ul>
            </nav>

        </div>

        <?php
        echo $page;
        ?>



        <!-- footer -->
        <?php include './footer.php'; ?>
        <!-- script -->
        <script src="./assets/js/showrows.js"></script>

        <!-- bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>




        <?php

        if (isset($_GET['id1']) && isset($_GET['id2']) && isset($_GET['id3'])) {
            echo $student_username = $_GET['id1'];
            $company_username = $_GET['id2'];
            $card_type = $_GET['id3'];




            $checkQ = "SELECT * FROM `$company_username` WHERE username='$student_username' AND usertype = 1";
            $result5 = mysqli_query($con, $checkQ);
            if ($result5 && mysqli_num_rows($result5) > 0) {
                // Rows were found, so you can proceed with further actions
                // ...

                echo "
                <script>
                  alert('Already Unlocked Student');
                  window.location.href='company-database-lock.php';
                </script>
              ";
            } else {
                // ----------------fetch coins--------
                $data1 = "SELECT `coins` FROM `company` WHERE username = '$company_username'";
                $fire1 = mysqli_query($con, $data1);
                $fetch_data1 = mysqli_fetch_assoc($fire1);
                echo "db coins", $db_coins = $fetch_data1['coins'];
                $fcoin = $db_coins - 2;



                if ($db_coins >= 5) {

                    // coin deduce-------
                    $insert1 = "UPDATE `company` SET `coins` = '$fcoin' WHERE `company`.`username` = '$company_username'";
                    $run = mysqli_query($con, $insert1);
                    // insert to unlocked list---
                    $insert2 = "INSERT INTO `$company_username`(`username`,`usertype`, `card`, `action`)VALUES('$student_username',1,'$card_type',0)";
                    $fire2 = mysqli_query($con, $insert2);
                    if ($run && $fire2) {
                        echo "
                   <script>
                     alert('Unlocked Sucessfully');
                     window.location.href='company-database-lock.php';
                   </script>
                 ";
                    } else {

                        echo "
                   <script>
                     alert('Cannot Run Query');
                     window.location.href='company-database-lock.php';
                   </script>
                 ";
                    }
                } else {
                    echo "
                <script>
                  alert('Insufficient Coins $db_coins');
                  window.location.href='company-database-lock.php';
                </script>
              ";
                }
            }
        }


        ?>
</body>

</html>