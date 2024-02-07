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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/ruang-admin.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column bg-light">
            <!-- TopBar -->
            <nav>
                <?php include 'admin-header.php'; ?>
                <nav>
                    <!-- Topbar -->
                    <div class="row" id="content">

                        <!-- Sidebar -->

                        <?php include 'sidebar.php'; ?>

                        <!--Sidebar -->
                        <!-- Container Fluid-->
                        <div class="col">

                            <div class="row justify-content-between  bdr-custom-padding fs-4">
                                <div class="col-md-6" style="font-size: 40px;color: #4A0063;">
                                    Blogs
                                </div>
                                <div class="col-md-6 div1" style="color:#F18101;">
                                    <i class="fa fa-home"></i>/ Blogs
                                    <br>


                                </div>
                            </div>


                            <div class="row mb-3">
                                <!-- Area Chart -->
                                <div class="col-xl-12">
                                    <div class="card mb-4">
                                        <div class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h5 class="m-0 font-weight-bold " style="color:#F6B264;">Jobfair Blogs
                                            </h5>
                                        </div>

                                        <div class="card-body">


                                            <section class="">
                                                <div class="container py-4">
                                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                                        <div class="col-12">
                                                            <div class="card shadow-2-strong" style="background:#FFF8E5">
                                                                <div class="card-body mx-md-4">
                                                                    <h3>Upload</h3>
                                                                    <form action="admin_postdata.php" method="POST" enctype="multipart/form-data">
                                                                        <!-- Name Input -->
                                                                        <div class="form-outline mb-3">
                                                                            <label class="form-label" for="name">Name</label>
                                                                            <input type="text" name="name" onkeydown="return /[a-zA-Z ]/i.test(event.key)" placeholder="Name" id="name" class="form-control" style="border-radius: 0px;" required />
                                                                        </div>

                                                                        <!-- Title Input -->
                                                                        <div class="form-outline mb-3">
                                                                            <label class="form-label" for="title">Title</label>
                                                                            <input type="text" name="title" placeholder="Title" id="title" class="form-control" style="border-radius: 0px;" required />
                                                                        </div>

                                                                        <!-- Blog Image Upload -->
                                                                        <div class="form-group purple-border">
                                                                            <label for="blogImage">Blog Image</label>
                                                                            <input type="file" name="imageA" class="form-control-file" id="blogImage" required>
                                                                        </div>

                                                                        <!-- Description Textarea -->
                                                                        <div class="form-group">
                                                                            <label for="description">Description</label>
                                                                            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                                                                        </div>

                                                                        <!-- Tag Selection -->
                                                                        <div class="form-outline mb-3">
                                                                            <label for="inputState">Tag</label>
                                                                            <select id="inputState" name="tag" class="form-control">
                                                                                <option selected>Choose..</option>
                                                                                <option value="a">Tag a</option>
                                                                                <option value="b">Tag b</option>
                                                                                <option value="c">Tag c</option>

                                                                            </select>
                                                                        </div>

                                                                        <!-- Other Images Upload -->
                                                                        <div class="form-group purple-border">
                                                                            <label for="otherImages">Other Images (If any)</label>
                                                                            <input type="file" name="imageB" class="form-control-file" id="otherImages">
                                                                        </div>

                                                                        <!-- Submit Button -->
                                                                        <div class="text-center">
                                                                            <button type="submit" name="create_blog" class="btn btn-lg" style="color: white; background-color: #4A0063; width: 43%;">Upload</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Footer -->
                        <footer>
                            <?php include 'footer.php'; ?>
                        </footer>
                        <!-- Footer -->
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
                        <script>
                            $(document).ready(function() {
                                $('#dataTable').DataTable(); // ID From dataTable 
                                $('#dataTableHover').DataTable(); // ID From dataTable with Hover
                            });
                        </script>
</body>

</html>