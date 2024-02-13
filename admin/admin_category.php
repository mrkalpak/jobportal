<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: index.php");
}

require('connection.php');

?>
 <!-- Include Bootstrap CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
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
                                    Add Category

                                </div>
                                <div class="col-md-6 div1" style="color:#F18101;">
                                    <i class="fa fa-home"></i>/ Images

                                </div>
                            </div>


                            <div class="row mb-3">

                                <!-- Invoice Example -->
                                <div class="col-xl-12" style="margin-left: -6px;">
                                    <div class="card">
                                        <div class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h5 class="m-0 font-weight-bold " style="color:#F6B264;"> Category List
                                            </h5>
                                        </div>

                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row px-3">

                                                <div class="col-md-5 mb-3">
                                                    <label for="textInput">Enter Text:</label>
                                                    <input type="text" name="category" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control" id="textInput" required>
                                                    <small class="text-danger">Please enter category.</small>
                                                </div>

                                                <!-- <button type="submit" class="col-md-2 mb-5  btn" style="color: white;background-color: #4A0063;margin-top: 33px;">Upload</button> -->
                                                <input type="submit" name="upload" value="Upload" class="col-md-2 mb-5  btn" style="color: white;background-color: #4A0063;margin-top: 33px;">
                                            </div>

                                        </form>

                                        <div class="card-body">

                                            <div class="table-responsive p-3">
                                                <table class="table align-items-center table-flush table-hover" id="table-id">
                                                    <thead class="thead-dark text-light ">
                                                        <tr>
                                                            <!-- <th style="background-color: #4A0063;">Image </th> -->
                                                            <th style="background-color: #4A0063;">Category </th>
                                                            <th style="background-color: #4A0063;">Action </th>

                                                        </tr>
                                                    </thead>
                                                    <?php


                                                    $q = "SELECT * FROM category ";

                                                    $query = mysqli_query($con, $q);

                                                    while ($row = mysqli_fetch_array($query)) {

                                                        $name = $row['category'];

                                                    ?>

                                                        <tr>
                                                            <td>
                                                                <?php echo $name ?>


                                                            </td>

                                                            <td>
                                                                <form class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to delete?')">
                                                                    <input type="hidden" name="id" value="<?= $row['category_id'] ?>">
                                                                    <input type="submit" name="deletePost" value="Delete" class="btn btn-sm btn-dark">
                                                                </form>
                                                            </td>
                                                        </tr>


                                                    <?php }
                                                    ?>



                                                    <tbody>



                                                    </tbody>
                                                </table>
                                            </div>


                                            <div class="chart-area" style="margin-top: 54px;">



                                            </div>


                                        </div>

                                    </div>
                                </div>

                            </div>
                           
                        </div>
                        <!-- Footer -->

                        <footer class="sticky-footer">
                            <?php include 'footer.php'; ?>
                        
                        </footer>
                        <!-- Footer -->
                    </div>
        </div>
        <script>
        $(document).ready(function() {
            $('#table-id').DataTable({
                searching: true
            });
        });
    </script>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <!-- Scroll to top -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
</body>


<?php
if (isset($_POST['upload'])) {


    $category = $_POST['category'];




    $q = "INSERT INTO  `category`( `category`)  VALUES ('$category')";

    if (mysqli_query($con, $q)) {


        echo "
                    <script>
                      alert(' Added successfully.');
          
                                window.location.href='admin_category.php';
                    </script>
                  ";
    } else {


        echo "
                    <script>
                      alert('Something went wrong??');
          
                                window.location.href='admin_category.php';
                    </script>
                  ";
    }
}

?>

<?php

if (isset($_POST['deletePost'])) {
    $id = $_POST['id'];


    $delete = "DELETE FROM category WHERE category_id ='$id'";
    $run = mysqli_query($con, $delete);
    if ($run) {
        echo "
               <script>
                 alert('Deleted Sucessfully');
                 window.location.href='images.php';
               </script>
             ";
    } else {

        echo "
               <script>
                 alert('Cannot Run Query');
                 window.location.href='images.php';
               </script>
             ";
    }
}
?>

