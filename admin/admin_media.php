<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}

require('connection.php');


?>

 <!-- Include Bootstrap CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

                <nav>
                <?php include 'admin-header.php'; ?>
                <nav>
<body id="page-top">
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column bg-light">
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
                                    Add Media

                                </div>
                                <div class="col-md-6 div1" style="color:#F18101;">
                                    <i class="fa fa-home"></i>/ Media

                                </div>
                            </div>


                            <div class="row mb-3">

                                <!-- Invoice Example -->
                                <div class="col-xl-12" style="margin-left: -6px;">
                                    <div class="card">
                                        <div class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h5 class="m-0 font-weight-bold " style="color:#F6B264;"> Video List
                                            </h5>
                                        </div>

                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row px-3">

                                                <div class="col-md-5 mb-3">
                                                    <label for="inputEmail4"> Video Link:</label>
                                                    <input type="text" name="link" class="form-control" id="customFileSm" required>
                                                    <span style="  color: red;">Please enter which contain watvh Word - (https://www.youtube.com/watch?v=C73DubnDRBk)</span>
                                                </div>

                                                <!-- <button type="submit" class="col-md-2 mb-5  btn" style="color: white;background-color: #4A0063;margin-top: 33px;">Upload</button> -->
                                                <input type="submit" name="upload" value="Upload" class="col-md-2 mb-5  btn" style="color: white;background-color: #4A0063;margin-top: 33px;">
                                            </div>

                                        </form>


                                        <div class="card-body">

                                            <div class="table-responsive p-3">
                                                <table class="table align-items-center table-flush table-hover" id="table-id">
                                                    <thead class="thead-dark text-light text-center">
                                                        <tr>
                                                            <th style="background-color: #4A0063;">Action</th>
                                                            <th style="background-color: #4A0063;">Date </th>
                                                            <th style="background-color: #4A0063;">Media</th>



                                                        </tr>
                                                    </thead>
                                                    <?php


                                                    $q = "SELECT * FROM media ORDER BY media_date DESC";

                                                    $query = mysqli_query($con, $q);

                                                    while ($row = mysqli_fetch_array($query)) {

                                                        $link = $row['link'];

                                                        $convertedURL = str_replace("watch?v=", "embed/", $link);

                                                    ?>

                                                        <tr>
                                                            <td>
                                                                <form class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to delete?')">
                                                                    <input type="hidden" name="id" value="<?= $row['media_id'] ?>">
                                                                    <input type="submit" name="deletePost" value="Delete" class="btn btn-sm btn-dark">
                                                                </form>
                                                            </td>
                                                            <td>

                                                                <?= $row['media_date']; ?>

                                                            </td>

                                                            <td>
                                                                <div class="col-md-4  mb-4">
                                                                    <iframe class="embed-responsive-item" src="<?php echo $convertedURL; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                                                </div>
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

                                <!--Row-->



                                <!-- Modal Logout -->


                            </div>
                            <!---Container Fluid-->
                        </div>
                        <!-- Footer -->

                        <footer class="sticky-footer">
                            <?php include 'footer.php'; ?>
                            <!-- <?php include 'company-job-post.php'; ?> -->
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
        <!-- Scroll to top -->

<!-- Include DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
</body>



<?php
if (isset($_POST['upload'])) {



    $link = $_POST['link'];





    $q = "INSERT INTO `media`(`link`) VALUES ('$link')";

    if (mysqli_query($con, $q)) {


        echo "
                    <script>
                      alert('video uploaded successfully.');
          
                                window.location.href='admin_media.php';
                    </script>
                  ";
    } else {


        echo "
                    <script>
                      alert('Something went wrong??');
          
                                window.location.href='admin_media.php';
                    </script>
                  ";
    }
}

?>

<?php

if (isset($_POST['deletePost'])) {
    $id = $_POST['id'];


    $delete = "DELETE FROM media WHERE media_id ='$id'";
    $run = mysqli_query($con, $delete);
    if ($run) {
        echo "
               <script>
                 alert('Deleted Sucessfully');
                 window.location.href='admin_media.php';
               </script>
             ";
    } else {

        echo "
               <script>
                 alert('Cannot Run Query');
                 window.location.href='admin_media.php';
               </script>
             ";
    }
}
?>
