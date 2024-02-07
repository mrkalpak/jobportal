<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}
require('connection.php');
$_SESSION['username'];




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
    <title>Admin Dashboard</title>
    <link href="css/ruang-admin.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">

    <!-- DATA BASE -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- --------------------------------------------Boostrap-------------------------------------------------------------- -->
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Bootstrap Table CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css">

    <!-- Bootstrap Table JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js"></script>

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>



    <style>
        .th-inner {
            background-color: #4A0063;
            color: white;
        }
    </style>

</head>

<body id="page-top">
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column bg-light">
            <!-- Topbar -->

            <nav>
                <?php include 'admin-header.php'; ?>
            </nav>
            <!-- TopBar -->
            <div class="row" id="content">


                <!-- Sidebar -->
                <?php include 'sidebar.php'; ?>
                <!-- Sidebar -->


                <!-- Container Fluid-->
                <div class="col" id="container-wrapper">

                    <div class="row justify-content-between  bdr-custom-padding fs-4">
                        <div class="col-md-6" style="font-size: 40px;color: #4A0063;">
                            Company Registered
                        </div>
                        <div class="col-md-6 div1" style="color:#F18101;">
                            <i class="fa fa-home"></i>/ Company
                            <br>


                        </div>
                    </div>

                    <div class="row mb-3">

                        <!-- Invoice Example -->
                        <div class="col-xl-12" style="margin-left: -6px;">
                            <div class="card">
                                <div class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5 class="m-0 font-weight-bold " style="color: #F6B264;">Company List</h5>
                                </div>

                                <div class="card-body">

                                    <form action="company-registration.php" method="post">
                                        <button id="downloadexcel" class="btn btn-dark" type="button" style="background:#4A0063;">Export to Excel</button>
                                    </form>
                                    <div class="table-responsive p-3">
                                        <table class="table align-items-center table-flush table-hover" id="dataTableHover" data-toggle="table" data-search="true" data-pagination="true">
                                            <thead class=" text-light">
                                                <tr>
                                                    <th class="th-inner">Name </th>
                                                    <th class="th-inner">Email </th>
                                                    <th class="th-inner">Contact No </th>
                                                    <th class="th-inner">Added On </th>
                                                    <th class="th-inner">Available Coins</th>
                                                    <th class="th-inner">Approval</th>
                                                    <th class="th-inner">Action</th>


                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php

                                                $query = "SELECT * FROM `company` ORDER BY company_date DESC ";
                                                if ($result = mysqli_query($con, $query)) {
                                                    if (mysqli_num_rows($result) > 0) {
                                                        $developer_records = array();
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $developer_records[] = $row; ?>


                                                            <tr>


                                                                <td> <?= $row['name'] ?> </td>
                                                                <td><?= $row['email'] ?></td>
                                                                <td><?= $row['mobile'] ?></td>
                                                                <td><?= $row['company_date'] ?></td>
                                                                <td><?= $row['coins'] ?></td>
                                                                <td><?= $row['active'] == 0 ? "Pending" : ($row['active'] == 2 ? "Rejected" : "Active") ?></td>
                                                                <td>
                                                                    <form class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to delete Company ?')" style="display: inline-block" ;>
                                                                        <input type="hidden" name="id" value="<?= $row['username'] ?>">
                                                                        <input type="submit" name="deletePost" value="Delete" class="btn btn-sm btn-dark">

                                                                    </form>
                                                                </td>

                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No matching records found.";
                                                    }
                                                }
                                                    ?>






                                                            </tr>



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
        <script src="table2excel.js"></script>
        <script>
            document.getElementById('downloadexcel').addEventListener('click', function() {
                var table2excel = new Table2Excel();
                table2excel.export(document.querySelectorAll("#dataTableHover"));
            });
        </script>
    </div>


    <script>
        $(document).ready(function() {
            $('#dataTableHover').bootstrapTable();
        });
    </script>

    <script src="js/ruang-admin.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<?php

if (isset($_POST['deletePost'])) {
    $id = $_POST['id'];


    $delete = "DELETE FROM `company` WHERE username ='$id'";
    $run = mysqli_query($con, $delete);
    if ($run) {
        echo "
               <script>
                 alert('Deleted Sucessfully');
                 window.location.href='company-registration.php';
               </script>
             ";
    } else {

        echo "
               <script>
                 alert('Cannot Run Query');
                 window.location.href='company-registration.php';
               </script>
             ";
    }
}
?>



</html>