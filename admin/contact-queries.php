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
                            <!-- <div class="d-sm-flex align-items-center justify-content-between "
                                style="margin-left: 11px;">
                                <p style="font-size: 40px;color:#4A0063">Clients
                                </p>

                                <ol class="breadcrumb">
  
                                    <a href=""><i class="fa fa-home "
                                            style="  margin-left: 37px;margin-top: 28px; margin-right: -202px;color:#F18101;">/Clients</i></a>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        style=" padding-left: 30px; margin-top: 89px; margin-bottom: 28px;margin-right: 16px;  padding-right: 31px;background:#4A0063;">Create
                                        New Client </button>

</div> -->
                            <div class="row justify-content-between  bdr-custom-padding fs-4">
                                <div class="col-md-6" style="font-size: 40px;color: #4A0063;">
                                    Contact Us Queries
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
                                            <h5 class="m-0 font-weight-bold " style="color:#F6B264;">Contact us Queries List</h5>
                                        </div>

                                        <div class="card-body">
                                            <!-- <h5 class="m-0 font-weight-bold text-dark">Jobfair Application</h5> -->
                                            <button class="btn btn-dark" style="background:#4A0063;" type="submit">Copy</button>
                                            <input class="btn btn-dark" style="background:#4A0063;" type="button" value="Excel">
                                            <input class="btn btn-dark" style="background:#4A0063;" type="submit" value="CSV">
                                            <input class="btn btn-dark" style="background:#4A0063;" type="reset" value="PDF">
                                            <input class="btn btn-dark" style="background:#4A0063;" type="reset" value="Print">
                                            <br>
                                            <br>
                                            <!-- <span style="font-size: 20px;padding: 5px 9px 16px 6px;">Show</span>

                                            <select class="form-group col-md-0" aria-label=".form-select-lg example" style="height:11%;border-radius: 5px; width: 45px;">
                                                <option selected></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <span style="font-size: 20px;padding: 5px 9px 16px 6px;">Entries</span> -->
                                            <form class="form-inline" style="float: right;margin-right: 66px;">

                                                <!-- <div class="form-group mb-2">
                                                    <h6 style="margin: auto;color: black;">Search:</h6>
                                                </div>
                                                <div class="form-group mx-sm-3 mb-2">
                                                    <label for="search" class="sr-only">Search</label>
                                                    <input type="text" class="form-control" id="search" placeholder="Search">
                                                </div> -->
                                            </form>


                                            <div class="table-responsive p-3">
                                                <table class="table align-items-center table-flush table-hover" id="table-id">
                                                    <thead class="thead-dark text-light ">
                                                        <tr>
                                                            <th style="background-color: #4A0063;">Name </th>
                                                            <th style="background-color: #4A0063;">Email </th>
                                                            <!-- <th style="background-color: #4A0063;">Phone </th> -->
                                                            <th style="background-color: #4A0063;">Message </th>
                                                            <th style="background-color: #4A0063;">Number </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php

                                                        $query = "SELECT * FROM `query`ORDER BY q_date DESC ";

                                                        // Execute $query and process the results


                                                        if ($result = mysqli_query($con, $query)) {
                                                            if (mysqli_num_rows($result) > 0) {
                                                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                                                    <tr>
                                                                        <td> <?= $row['q_name'] ?> </td>
                                                                        <td><?= $row['q_email'] ?></td>

                                                                        <td><?= $row['message'] ?></td>

                                                                        <td><?= $row['q_number'] ?></td>

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

        <!-- Scroll to top -->


        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
</body>
