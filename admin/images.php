<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}

require('connection.php');


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
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                                    Add Images

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
                                            <h5 class="m-0 font-weight-bold " style="color:#F6B264;"> Images List
                                            </h5>
                                        </div>

                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row px-3">

                                                <div class="col-md-5 mb-3">
                                                    <label for="inputEmail4"> Choose Images:</label>
                                                    <input type="file" name="file" class="form-control" id="customFileSm" accept="image/*" required>
                                                    <span style="  color: red;">please select image size 130*75</span>
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label for="inputEmail4"> Select Category:</label>
                                                    <select class="form-control" name="category" id="exampleFormControlSelect1" required>
                                                        <option>Candidate response</option>
                                                        <option>Jobcard and Fair</option>
                                                        <option>Marketing</option>
                                                    </select>

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
                                                            <th style="background-color: #4A0063;">Image </th>
                                                            <th style="background-color: #4A0063;">Category </th>
                                                            <th style="background-color: #4A0063;">Action </th>

                                                        </tr>
                                                    </thead>
                                                    <?php

                                                    $results_per_page = 6;

                                                    if (!isset($_GET['page'])) {
                                                        $page = 1;
                                                    } else {
                                                        $page = $_GET['page'];
                                                    }

                                                    $start_from = ($page - 1) * $results_per_page;

                                                    $q = "SELECT * FROM images ORDER BY image_date DESC LIMIT {$start_from}, {$results_per_page}";

                                                    $query = mysqli_query($con, $q);

                                                    while ($row = mysqli_fetch_array($query)) {

                                                        $name = $row['image_name'];
                                                        $category = $row['image_category'];
                                                    ?>

                                                        <tr>
                                                            <td>
                                                                <a href="images/.<?php echo $name ?>" target="_blank">
                                                                    <img src="images/.<?php echo $row['image_name']; ?>" alt="Image description" width="130" height="75">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <select class="form-control" id="exampleFormControlSelect1" style=" width: 189px;" disabled>
                                                                        <option selected><?php echo $category  ?></option>


                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <form class="mt-2" method="POST" onsubmit="return confirm('Are you sure want to delete?')">
                                                                    <input type="hidden" name="id" value="<?= $row['image_id'] ?>">
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
                                            <?php




                                            $query_count = "SELECT COUNT(*) as count FROM images WHERE 1";

                                            $query_count_run = mysqli_query($con, $query_count);
                                            $result_count = mysqli_fetch_assoc($query_count_run);
                                            $total_records = $result_count['count'];
                                            $total_pages = ceil($total_records / $results_per_page);


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



                                                        $class = $page == 1 ? 'page-item disabled' : 'page-item';
                                                        $class2 = $page == $total_pages ? 'page-item disabled' : 'page-item';

                                                        echo "<li class='$class'><a class='page-link' href='?page=$prev_page' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";


                                                        for ($i = 1; $i <= $total_pages; $i++) {
                                                            // Check if $i is the current page ($page)
                                                            if ($i == $page) {
                                                                echo "<li class='page-item active'><a class='page-link' href='#'><span style='color: grey;'>$i</span></a></li>";
                                                            } else {
                                                                echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                                                            }
                                                        }



                                                        echo "<li class=' $class2'><a class='page-link' href='?page=$next_page' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
                                                        ?>
                                                    </ul>
                                                </nav>
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


    $file = $_FILES['file']['name'];
    $category = $_POST['category'];
    $target_file2 = basename($file);
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    $check2 = $_FILES['file']['tmp_name'];
    $extension2 = substr($file, strlen($file) - 4, strlen($file));
    $image_ext2 = pathinfo($file, PATHINFO_FILENAME);
    $Final_image_name2 = $image_ext2 . date("mjYHis") . "." . $imageFileType2;
    $destination2 = "images/.$Final_image_name2";


    if (move_uploaded_file($check2, $destination2)) {

        $q = "INSERT INTO `images`( `image_name`, `image_category`) VALUES ('$Final_image_name2','$category')";

        if (mysqli_query($con, $q)) {


            echo "
                    <script>
                      alert('Image uploaded successfully.');
          
                                window.location.href='images.php';
                    </script>
                  ";
        } else {


            echo "
                    <script>
                      alert('Something went wrong??');
          
                                window.location.href='images.php';
                    </script>
                  ";
        }
    } else {


        echo "
                <script>
                  alert('Please select a image to upload..!');
      
                            window.location.href='images.php';
                </script>
              ";
    }
}
?>

<?php

if (isset($_POST['deletePost'])) {
    $id = $_POST['id'];


    $delete = "DELETE FROM images WHERE image_id ='$id'";
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

</html>