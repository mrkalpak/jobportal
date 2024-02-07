<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}

require('connection.php');

$username = $_SESSION['username'];



$location = isset($_GET['location']) ? $_GET['location'] : '';
// $student_name = isset($_GET['student_name']) ? $_GET['student_name'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$education = isset($_GET['education']) ? $_GET['education'] : '';
$card_status = isset($_GET['card_status']) ? $_GET['card_status'] : '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>RuangAdmin - Dashboard</title>
    <link href="css/ruang-admin.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">





    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <style>
        /* Increase the size of the DataTables entry size dropdown */
        .dataTables_length select {
            padding: 6px 16px;
            /* You can adjust the padding to your desired size */
            font-size: 14px;

            /* You can adjust the font size to your desired size */
        }
    </style>

</head>

<body id="page-top">
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column bg-light">
            <nav>
                <?php include 'admin-header.php'; ?>
            </nav>
            <div class="row" id="content">
                <!-- TopBar -->

                <!-- Sidebar -->
                <?php include 'sidebar.php'; ?>
                <!-- Sidebar -->

                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="col" id="container-wrapper">

                    <div class="row justify-content-between  bdr-custom-padding fs-4">
                        <div class="col-md-6" style="font-size: 40px;color: #4A0063;">
                            Candidate Registered
                        </div>
                        <div class="col-md-6 div1" style="color:#F18101;">
                            <i class="fa fa-home"></i>/ Candidates
                            <br>


                        </div>
                    </div>

                    <div class="row mb-3">

                        <!-- Invoice Example -->
                        <div class="col-xl-12" style="margin-left: -6px;">
                            <div class="card">
                                <div class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5 class="m-0 font-weight-bold " style="color: #F6B264;">Candidate List</h5>
                                </div>

                                <div class="card-body">


                                    <button id="downloadexcel" class="btn btn-dark" type="button" style="background:#4A0063;">Export to Excel</button>
                                    <br>
                                    <br>



                                    <form action="?location=<?= $location ?>&education=<?= $education ?>&category=<?= $category ?>&card_status=<?= $card_status ?>" method="GET">




                                        <div class="form-row">
                                            <label for="inputID4" style="margin-top: 10px;margin-left: 28px;">Location</label>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" value="<?php echo isset($_GET['location']) ? htmlspecialchars($_GET['location']) : ''; ?>" id="inputID4" name="location" placeholder="location" style="margin-left: 12px;">
                                            </div>
                                            <label for="inputEducation" style="margin-top: 10px;margin-left: 28px;">Education</label>
                                            <div class="form-group col-md-4">
                                                <select class="form-control" id="inputEducation" name="education" style="margin-left: 12px;">

                                                    <option value="<?= isset($education) ? $education : ''; ?>" selected><?= isset($education) ? $education : 'Select an option'; ?></option>

                                                    <option value="10th">10th</option>
                                                    <option value="12th">12th</option>
                                                    <option value="B.Tech">B.Tech</option>
                                                    <option value="Diploma">Diploma</option>
                                                    <option value="M.Tech">M.Tech</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <label for="inputClient" style="margin-top: 10px;margin-left: 6px;">Job Category</label>
                                            <div class="form-group col-md-4">
                                                <select class="form-control" id="inputClient" name="category">
                                                    <option value="<?= isset($category) ? $category : ''; ?>" selected><?= isset($category) ? $category : 'Select an option'; ?></option>
                                                    <?php
                                                    $sql2 = "SELECT * FROM `category`";
                                                    $result42 = $con->query($sql2);
                                                    if ($result42->num_rows > 0) {
                                                        while ($row2 = $result42->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?= $row2["category"] ?>"><?= $row2["category"] ?></option>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "Not found.";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label for="inputCardType" style="margin-top: 10px;margin-left: 28px;">Card Type</label>
                                            <div class="form-group col-md-4">
                                                <select class="form-control" id="inputCardType" name="card_status" style="margin-left: 12px;">
                                                    <option value="<?= isset($card_status) ? $card_status : ''; ?>" selected></option>
                                                    <option value="1" <?= ($card_status == '1') ? 'selected' : '' ?>>Card Types</option>
                                                    <option value="0" <?= ($card_status == '0') ? 'selected' : '' ?>>Regular</option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div class="btn-group" role="group" aria-label="Third group">
                                                <button type="submit" name="search1" class="btn btn-secondary btn-lg" style="width: 129px;margin-left: 40px;border-radius: 6px;height: 44px;border: none;color: black;">Search</button>
                                                <a href="./candidate-registration.php" class="btn btn-secondary btn-lg" style="width: 129px;margin-left: 40px;border-radius: 6px;height: 44px;border: none;">Refresh</a>

                                            </div>
                                        </div>
                                    </form>


                                    <!-- Modal -->
                                    <div class="modal fade" id="candidateModal" tabindex="-1" aria-labelledby="candidateModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="candidateModal">Candidate Registered</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="row">
                                                            <div class=" col-md-6" style="margin-bottom: 12px;">
                                                                <label for="inputEmail4">Address</label>
                                                                <input type="text" class="form-control" placeholder="Address">
                                                            </div>
                                                            <div class="col-md-6" style="margin-bottom: 12px;">
                                                                <label for="inputEmail4">Phono No:</label>
                                                                <input type="text" class="form-control" placeholder="Phono No">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6" style="margin-bottom: 12px;">
                                                                <label for="inputEmail4">E-mail:</label>
                                                                <input type="text" class="form-control" placeholder="E-mail">
                                                            </div>
                                                            <div class="col-md-6" style="margin-bottom: 12px;">
                                                                <label for="inputEmail4">DOB:</label>
                                                                <input type="text" class="form-control" placeholder="DOB">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6" style="margin-bottom: 12px;">
                                                                <label for="inputEmail4">linkedin id:</label>
                                                                <input type="text" class="form-control" placeholder="linkedin id">
                                                            </div>
                                                            <div class="col-md-6" style="margin-bottom: 12px;">
                                                                <label for="inputEmail4">Qualification:</label>
                                                                <input type="text" class="form-control" placeholder="Qualification">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6" style="margin-bottom: 12px;">
                                                                <label for="inputEmail4">Searching job As a:</label>
                                                                <input type="text" class="form-control" placeholder="Searching job As a">
                                                            </div>
                                                            <div class="col-md-6" style="margin-bottom: 12px;">
                                                                <label for="inputEmail4">Resume:</label>
                                                                <input type="text" class="form-control" placeholder="Resume">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn" data-dismiss="modal" style="margin-bottom: 27px;color: white;background-color: #F18101;">Save
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive p-3">
                                        <table class="table align-items-center table-flush table-hover" id="table-id" data-toggle="table" data-search="true">
                                            <thead class="thead-dark text-light ">
                                                <tr>
                                                    <th style="background-color: #4A0063;">Name</th>
                                                    <th style="background-color: #4A0063;">E-mail</th>
                                                    <th style="background-color: #4A0063;">Qualification</th>
                                                    <th style="background-color: #4A0063;">Contact No</th>
                                                    <th style="background-color: #4A0063;">Added On</th>
                                                    <th style="background-color: #4A0063;">Type</th>

                                                    <!-- <th style="background-color: #4A0063;">Action</th> -->

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php



                                                if (isset($_GET['search1'])) {



                                                    $location = $_GET['location'];

                                                    $category = $_GET['category'];
                                                    $education = $_GET['education'];
                                                    $card_status = $_GET['card_status'];







                                                    $query = "SELECT * FROM `users_candidate` WHERE 1";



                                                    if (!empty($location)) {
                                                        $query .= " AND location LIKE '%$location%'";
                                                    }

                                                    if (!empty($category)) {
                                                        $query .= " AND category LIKE '%$category%'";
                                                    }

                                                    if (!empty($education)) {
                                                        $query .= " AND qualification LIKE '%$education%'";
                                                    }

                                                    if (!empty($card_status)) {
                                                        $query .= " AND cardtype LIKE '%$card_status%'";
                                                    }


                                                    // $query .= " LIMIT $start_from, $results_per_page";
                                                } else {
                                                    $query = "SELECT * FROM `users_candidate` ORDER BY student_date DESC ";
                                                }



                                                // Execute $query and process the results


                                                if ($result = mysqli_query($con, $query)) {
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                                            <tr>
                                                                <td> <?= $row['name'] ?> </td>

                                                                <td><?= $row['email'] ?></td>
                                                                <td><?= $row['qualification'] ?></td>
                                                                <td><?= $row['phone'] ?></td>
                                                                <td><?= $row['student_date'] ?></td>
                                                                <td><?= ($row['cardtype'] == 1) ? "card" : "regular" ?></td>





                                                            </tr>


                                                <?php
                                                        }
                                                    } else {
                                                        echo "No matching records found.";
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="chart-area" style="margin-top: 54px;">



                                    </div>


                                </div>

                            </div>
                        </div>

                        <!--Row-->



                        <!-- Modal Logout -->


                    </div>
                    <!---Container Fluid-->
                </div>
                <!-- Footer -->

                <footer class="sticky-footer">
                    <?php include 'footer.php'; ?>
                </footer>
                <!-- Footer -->
            </div>
        </div>

        <!-- Scroll to top -->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Include DataTables JavaScript -->
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#table-id').DataTable({
                    searching: true

                });

            });
        </script>
        <script src="table2excel.js"></script>
        <script>
            document.getElementById('downloadexcel').addEventListener('click', function() {
                var table2excel = new Table2Excel();
                table2excel.export(document.querySelectorAll("#table-id"));
            });
        </script>



        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
</body>

</html>