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

                        <!-- Sidebar -->
                        <?php include 'sidebar.php'; ?>
                        <!-- Sidebar -->

                        <!-- Container Fluid-->
                        <div class="col" id="container-wrapper">
                            <div class="row justify-content-between  bdr-custom-padding fs-4">
                                <div class="col-md-6" style="font-size: 40px;color: #4A0063;">
                                    Clients
                                </div>
                                <div class="col-md-6 div1" style="color:#F18101;">
                                    <i class="fa fa-home"></i>/ Clients
                                    <br>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" style=" background:#4A0063; margin-bottom: -34px;">Create
                                        New Client
                                    </button>

                                </div>
                            </div>


                            <!-- Modal -->
                            <form action="admin_postdata.php" method="POST">
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="text-center" id="exampleModalLabel" style="color:#4A0063">Create Client</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-outline mb-3">
                                                    <label class="form-label" for="name">Name</label>
                                                    <input type="text" name="name" placeholder="Name" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control" style="border-radius: 0px;" required />
                                                </div>



                                                <div class="form-outline mb-3">
                                                    <label class="form-label" for="mobile">Mobile No</label>
                                                    <input type="number" name="mobile" placeholder="Mobile No" class="form-control" style="border-radius: 0px;" required />
                                                </div>

                                                <div class="form-outline mb-3">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="email" name="email" placeholder="Email" class="form-control" style="border-radius: 0px;" required />
                                                </div>

                                                <div class="form-outline mb-3">
                                                    <label class="form-label" for="address">Address</label>
                                                    <input type="text" name="address" placeholder="Address" class="form-control" style="border-radius: 0px;" required />
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" name="create_client" class="btn btn" style="color: white; background-color:#4A0063">Create</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Modal2 -->
                            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="color:#4A0063">Update
                                                Client</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="typeEmailX-2">Name</label>
                                                <input type="text" placeholder=" Name" onkeydown="return /[a-zA-Z ]/i.test(event.key)" required id="updateModal" class="form-control" style="border-radius: 0px;" />

                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="typePasswordX-2">Prefix</label>
                                                <input type="text" placeholder="Prefix" id="updateModal" class="form-control" style="border-radius: 0px;" required />

                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="typePasswordX-2">Mobile
                                                    No</label>
                                                <input type="text" placeholder="Mobile No" id="updateModal" class="form-control" style="border-radius: 0px;" required />

                                            </div>
                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="typePasswordX-2">Client
                                                    Name</label>
                                                <input type="text" placeholder="Client Name" id="updateModal" class="form-control" style="border-radius: 0px;" required />

                                            </div>
                                            <div class="form-outline mb-3">
                                                <label class="form-label" for="typePasswordX-2">Address</label>
                                                <input type="text" placeholder="Address" id="updateModal" class="form-control" style="border-radius: 0px;" required />

                                            </div>
                                            <div class="text-center">
                                                <button type="button" class="btn btn" style="background-color: #4A0063;color: white;">Update</button>
                                                <button type="button" class="btn btn-secondary ">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal2 -->

                            <div class="row mb-3">

                                <!-- Invoice Example -->
                                <div class="col-xl-12" style="margin-left: -6px;">
                                    <div class="card">
                                        <div class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h5 class="m-0 font-weight-bold" style="color:#F6B264;">Jobcard Client's
                                                List</h5>
                                        </div>

                                        <div class="card-body">

                                            <button id="downloadexcel" class="btn btn-dark" type="button" style="background:#4A0063;">Excel</button>
                                            <input class="btn btn-dark" type="submit" style="background:#4A0063;" value="CSV">
                                            <input class="btn btn-dark" type="reset" style="background:#4A0063;" value="PDF">
                                            <input class="btn btn-dark" type="reset" style="background:#4A0063;" value="Print">
                                            <br>
                                            <br>
                                            <!-- <div class="">
                                                <span style="font-size: 20px;padding: 5px 9px 16px 6px;">Show</span>

                                                <select class="form-group col-md-0" aria-label=".form-select-lg example" style="height:11%;border-radius: 5px; width: 45px;">
                                                    <option selected></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                                <span style="font-size: 20px;padding: 5px 9px 16px 6px;">Entries</span>
                                              <form class="form-inline" style="float: right;margin-right: 66px;">

                                                    <div class="form-group mb-2">
                                                        <h6 style="margin: auto;color: black;">Search:</h6>
                                                    </div>
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <label for="search" class="sr-only">Search</label>
                                                        <input type="text" class="form-control" id="search" placeholder="Search">
                                                    </div>
                                                </form> -->

                                        </div>

                                        <div class="table-responsive p-3">

                                            <table class="table align-items-center table-flush table-hover" id="table-id" data-toggle="table" data-search="true">
                                                <thead class="thead text-white ">
                                                    <tr>
                                                        <th style="background-color: #4A0063;color: white;">Name
                                                        </th>
                                                        <th style="background-color: #4A0063;color: white;">Email
                                                        </th>
                                                        <th style="background-color: #4A0063;color: white;">Mobile
                                                        </th>
                                                        <th style="background-color: #4A0063;color: white;">Address
                                                        </th>
                                                        <th style="background-color: #4A0063;color: white;"> Action
                                                        </th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php

                                                    $query = "SELECT * FROM `jobcard_client` ";

                                                    // Execute $query and process the results


                                                    if ($result = mysqli_query($con, $query)) {
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                                <tr>
                                                                    <td> <?= $row['jobcard_client_name'] ?> </td>
                                                                    <td> <?= $row['client_email'] ?> </td>


                                                                    <td><?= $row['client_phone'] ?></td>
                                                                    <td><?= $row['address'] ?></td>


                                                                    <td>
                                                                        <a href="./update_client.php?id=<?= $row['client_id'] ?>">

                                                                            <button class="btn btn-dark" name="edit_client">Edit </button>
                                                                        </a>


                                                                        <form class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to delete Client ?')" style="display: inline-block" ;>
                                                                            <input type="hidden" name="id" value="<?= $row['client_id'] ?>">
                                                                            <input type="submit" name="deletePost" value="Delete" class="btn btn-dark">

                                                                        </form>
                                                                    </td>


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
                                            <script src="table2excel.js"></script>
                                            <script>
                                                document.getElementById('downloadexcel').addEventListener('click', function() {
                                                    var table2excel = new Table2Excel();
                                                    table2excel.export(document.querySelectorAll("#table-id"));
                                                });
                                            </script>

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


    $delete = "DELETE FROM jobcard_client WHERE client_id='$id'";
    $run = mysqli_query($con, $delete);
    if ($run) {

        echo "
               <script>
                 alert('Deleted Sucessfully');
                 window.location.href='client-management.php';
               </script>
             ";
    } else {

        echo "
               <script>
                 alert('Cannot Run Query');
                 window.location.href='client-management.php';
               </script>
             ";
    }
}


?>
