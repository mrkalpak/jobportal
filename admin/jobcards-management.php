<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}
$username = $_SESSION['username'];

$jobcard_id = isset($_GET['jobcard_id']) ? $_GET['jobcard_id'] : '';
$student_name = isset($_GET['student_name']) ? $_GET['student_name'] : '';
$client_name = isset($_GET['client_name']) ? $_GET['client_name'] : '';
$education = isset($_GET['education']) ? $_GET['education'] : '';
$card_status = isset($_GET['card_status']) ? $_GET['card_status'] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="table2excel.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>Admin Dashboard</title>






    <link href="css/ruang-admin.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">


</head>

<body id="page-top">
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column bg-light">
            <nav>
                <?php include 'admin-header.php'; ?>
                <nav>
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
                                    Jobcards
                                </div>
                                <div class="col-md-6 div1" style="color:#F18101;">
                                    <i class="fa fa-home"></i>/ Jobcards
                                    <br>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" style=" background:#4A0063;    margin-bottom: -34px;">Generate Card
                                    </button>

                                </div>
                            </div>
                            <!--  create card form Modal1 -->
                            <?php
                            $sql = "SELECT * FROM `jobcard_client`";
                            $result4 = $con->query($sql);
                            ?>


                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="admin_postdata.php" method="POST">
                                            <div class="modal-header">
                                                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                                <h3 class="text-center" id="exampleModalLabel" style="color:#4A0063">Generate New Card</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-outline mb-3">
                                                    <label class="form-label" for="no-cards">How many cards</label>
                                                    <input type="number" placeholder="How many cards" id="no-cards" name="no_cards" class="form-control" style="border-radius: 0px;" required />
                                                </div>
                                                <label class="form-label" for="no-cards">Cards Expiration date</label>
                                                <select class="form-select" name="e_date" aria-label="Default select example" required>

                                                    <option selected value=""> Select Expiration date</option>
                                                    <option value="3">3 Months</option>
                                                    <option value="6">6 Months</option>
                                                    <option value="12">12 Months</option>
                                                </select>
                                                <div class="form-group">
                                                    <label for="client-name">Client Name</label>
                                                    <select class="form-control" id="client-name" name="client_name" required>
                                                        <option selected value="">Select Client</option>
                                                        <?php
                                                        if ($result4->num_rows > 0) {

                                                            while ($row = $result4->fetch_assoc()) {
                                                                $category_id = $row["client_id"];
                                                                $category_name = $row["jobcard_client_name"];
                                                        ?>
                                                                <option value="<?= $row["jobcard_client_name"] ?>"><?= $row["jobcard_client_name"] ?></option>

                                                        <?php

                                                            }
                                                        } else {
                                                            echo "Not found.";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-outline mb-3">
                                                    <label class="form-label" for="prefix">Prefix</label>
                                                    <input type="text" name="prefix" placeholder="Prefix" class="form-control" style="border-radius: 0px;" required />
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" name="generate_cards" class="btn btn" style="background-color: #4A0063; color: white;">Generate
                                                        Cards</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <!-- ----------------------------------------------------search Form ------------------------------------------------------------ -->
                                <!-- Invoice Example -->
                                <div class="col-xl-12" style="margin-left: -6px;">
                                    <div class="card">
                                        <div class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h5 class="m-0 font-weight-bold" style="color:#F6B264;">Jobcard's List</h5>
                                        </div>

                                        <div class="card-body">
                                            <form action="?jobcard_id=<?= $jobcard_id ?>&student_name=<?= $student_name ?>&education=<?= $education ?>&client_name=<?= $client_name ?>&card_status=<?= $card_status ?>" method="GET">
                                                <div class="form-row">
                                                    <label for="inputID4" style="margin-top: 10px;margin-left: 28px;">Jobcard ID</label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" value="<?php echo isset($_GET['jobcard_id']) ? htmlspecialchars($_GET['jobcard_id']) : ''; ?>" id="inputID4" name="jobcard_id" placeholder="Jobcard ID" style="margin-left: 12px;">
                                                    </div>
                                                    <label for="inputName4" style="margin-top: 10px;margin-left: 28px;">Student Name</label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" value="<?php echo isset($_GET['student_name']) ? htmlspecialchars($_GET['student_name']) : ''; ?>" id="inputName4" name="student_name" placeholder="Name" style="margin-left: 12px;">
                                                    </div>
                                                </div>
                                                <div class="form-row">
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
                                                    <label for="inputClient" style="margin-top: 10px;margin-left: 28px;">Client Name</label>
                                                    <div class="form-group col-md-4">
                                                        <select class="form-control" id="inputClient" name="client_name" style="margin-left: 30px;">
                                                            <option value="<?= isset($client_name) ? $client_name : ''; ?>" selected><?= isset($client_name) ? $client_name : 'Select an option'; ?></option>
                                                            <?php
                                                            $sql2 = "SELECT * FROM `jobcard_client`";
                                                            $result42 = $con->query($sql2);
                                                            if ($result42->num_rows > 0) {
                                                                while ($row2 = $result42->fetch_assoc()) {
                                                            ?>
                                                                    <option value="<?= $row2["jobcard_client_name"] ?>"><?= $row2["jobcard_client_name"] ?></option>








                                                            <?php
                                                                }
                                                            } else {
                                                                echo "Not found.";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <label for="inputCardType" style="margin-top: 10px;margin-left: 28px;">Card Type</label>
                                                    <div class="form-group col-md-4">
                                                        <select class="form-control" id="inputCardType" name="card_status" style="margin-left: 12px;">
                                                            <option value="<?= isset($card_status) ? $card_status : ''; ?>" selected></option>
                                                            <option value="0" <?= ($card_status == '0') ? 'selected' : '' ?>>Pending</option>
                                                            <option value="1" <?= ($card_status == '1') ? 'selected' : '' ?>>Active</option>
                                                            <option value="2" <?= ($card_status == '2') ? 'selected' : '' ?>>Expired</option>
                                                        </select>

                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="Third group">
                                                        <button type="submit" name="search1" class="btn btn-secondary btn-lg" style="width: 129px;margin-left: 40px;border-radius: 6px;height: 44px;border: none;color: black;">Search</button>
                                                        <a href="./jobcards-management.php" class="btn btn-secondary btn-lg" style="width: 129px;margin-left: 40px;border-radius: 6px;height: 44px;border: none;">Refresh</a>

                                                    </div>
                                                </div>
                                            </form>





                                            <!-- ----------------------------------------------------------- form close-------------------------------------------------------                                  -->
                                            <br>
                                            <button id="downloadexcel" class="btn btn-dark" type="button" style="background:#4A0063;">Export to Excel</button>








                                            <!-- --------------------------------------------Main Table-------------------------------------------------------------------------------------------                     -->


                                            <div class="table-responsive p-3">
                                                <table class="table align-items-center table-flush table-hover" id="dataTableHover" data-toggle="table" data-search="true">
                                                    <thead class="thead-dark text-light">
                                                        <tr>
                                                            <th style="background-color: #4A0063;">Sr.No</th>
                                                            <th style="background-color: #4A0063;">Card Id </th>
                                                            <th style="background-color: #4A0063;">Client Name </th>
                                                            <th style="background-color: #4A0063;"> Name </th>
                                                            <th style="background-color: #4A0063;">Mobile </th>
                                                            <th style="background-color: #4A0063;">Email </th>
                                                            <th style="background-color: #4A0063;">Expire Date </th>
                                                            <th style="background-color: #4A0063;">Status </th>
                                                            <!-- <th style="background-color: #4A0063;">Action </th> -->

                                                        </tr>
                                                    </thead>

                                                    <tbody>



                                                        <?php


                                                        if (isset($_GET['search1'])) {



                                                            $jobcard_id = $_GET['jobcard_id'];
                                                            $student_name = $_GET['student_name'];
                                                            $client_name = $_GET['client_name'];
                                                            $education = $_GET['education'];
                                                            $card_status = $_GET['card_status'];







                                                            $query = "SELECT jc.*, cu.* FROM jobcards jc LEFT JOIN users_candidate cu ON jc.card_id = cu.username WHERE 1";

                                                            if (!empty($jobcard_id)) {
                                                                $query .= " AND card_id LIKE '%$jobcard_id%'";
                                                            }

                                                            if (!empty($student_name)) {
                                                                $query .= " AND name LIKE '%$student_name%'";
                                                            }

                                                            if (!empty($client_name)) {
                                                                $query .= " AND client_name LIKE '%$client_name%'";
                                                            }

                                                            if (!empty($education)) {
                                                                $query .= " AND qualification LIKE '%$education%'";
                                                            }

                                                            if (!empty($card_status)) {
                                                                $query .= " AND card_active LIKE '%$card_status%'";
                                                            }


                                                            // $query .= " LIMIT $start_from, $results_per_page";
                                                        } else {
                                                            $query = "SELECT jc.*, cu.* FROM jobcards jc LEFT JOIN users_candidate cu ON jc.card_id = cu.username";
                                                        }


                                                        if ($result = mysqli_query($con, $query)) {
                                                            if (mysqli_num_rows($result) > 0) {
                                                                $count = 1;
                                                                while ($row = mysqli_fetch_assoc($result)) { ?>

                                                                    <tr>
                                                                        <td> <?= $count++  ?> </td>
                                                                        <td> <?= $row['card_id'] ?> </td>
                                                                        <td><?= $row['client_name'] ?></td>
                                                                        <td><?= $row['name'] ?></td>
                                                                        <td><?= $row['phone'] ?></td>
                                                                        <td><?= $row['email'] ?></td>
                                                                        <td><?= $row['card_edate'] ?></td>
                                                                        <td><?= $row['card_active'] == 0 ? "Pending" : ($row['card_active'] == 2 ? "Expired" : "Active") ?></td>

                                                                        <!-- <td>
                                                                            <a href="./update_client.php?id=">

                                                                                <button class="btn btn-sm btn-success" name="edit_client">edit </button>
                                                                            </a>


                                                                            <form class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to delete Client ?')" style="display: inline-block" ;>
                                                                                <input type="hidden" name="id" value="">
                                                                                <input type="submit" name="deletePost" value="Delete" class="btn btn-sm btn-danger">

                                                                            </form>
                                                                        </td> -->
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
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                <!-- Include DataTables JavaScript -->
                                <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                                <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
                                <script src="table2excel.js"></script>
                                <script>
                                    document.getElementById('downloadexcel').addEventListener('click', function() {
                                        var table2excel = new Table2Excel();
                                        table2excel.export(document.querySelectorAll("#dataTableHover"));
                                    });
                                </script>

                                <script>
                                    $(document).ready(function() {
                                        $('#dataTableHover').DataTable({
                                            searching: true
                                        });
                                    });
                                </script>



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



        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Page level custom scripts -->

</body>

</html>