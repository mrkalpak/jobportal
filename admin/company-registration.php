<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}
require('connection.php');
$_SESSION['username'];


?>

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
                <table class="table align-items-center table-flush table-hover" id="table-id" data-toggle="table" data-search="true" data-pagination="true">
                    <thead class=" text-light">
                        <tr>
                            <th class="th-inner"style="background-color: #4A0063;color: white;">Name </th>
                            <th class="th-inner"style="background-color: #4A0063;color: white;">Email </th>
                            <th class="th-inner"style="background-color: #4A0063;color: white;">Contact No </th>
                            <th class="th-inner"style="background-color: #4A0063;color: white;">Added On </th>
                            <th class="th-inner"style="background-color: #4A0063;color: white;">Available Coins</th>
                            <th class="th-inner"style="background-color: #4A0063;color: white;">Approval</th>
                            <th class="th-inner"style="background-color: #4A0063;color: white;">Action</th>


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
<script src="table2excel.js"></script>
        <script>
            document.getElementById('downloadexcel').addEventListener('click', function() {
                var table2excel = new Table2Excel();
                table2excel.export(document.querySelectorAll("#table-id"));
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
    <!-- Include jQuery -->
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

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
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
