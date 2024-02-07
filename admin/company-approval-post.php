<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}
$main_user = $_SESSION['username'];
// $jobid=$_POST['id'];
$jobid = $_GET['id'];

$query = "SELECT * FROM `company` WHERE  `username`='$jobid'";

$result = mysqli_query($con, $query);

if ($result) {

    $row = mysqli_fetch_assoc($result);
    // $db_points = $result_fetch['coins'];
}
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">

    <!-- DATA BASE -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column bg-light">
            <!-- Topbar -->

            <nav>
                <?php include 'admin-header.php'; ?>
                <nav>
                    <!-- TopBar -->
                    <div class="row" id="content">


                        <!-- Sidebar -->
                        <?php include 'sidebar.php'; ?>
                        <!-- Sidebar -->


                        <!-- Container Fluid-->
                        <div class="col" id="container-wrapper">
                            <div class=" col ">

                                <div class="d-sm-flex align-items-center justify-content-between " style="margin-left: -12px; margin-bottom: 42px;">
                                    <p style="font-size: 40px;padding: 15px;color: #4A0063;">Job Posting Approval
                                    </p>


                                    <ol class="breadcrumb">

                                        <!-- <li class="breadcrumb-item"><a href="./"></a></li> -->
                                        <!-- <li class="breadcrumb-item active" aria-current="page">Dashboard</li> -->
                                        <a href=""><i class="fa fa-home " style="margin-right: 38px;color: #F18101;">/
                                                Job Posting</i></a>
                                        <!-- <button type="button" class="btn btn-secondary"style="padding-right: 88px;margin-right: 59px;margin-bottom: 28px; margin-top: 89px;padding-left: 84px;">Create New Client </button> -->
                                    </ol>

                                </div>
                            </div>

                            <div class="row mb-3">

                                <!-- Invoice Example -->
                                <div class="col-xl-11.5" style="margin-left: 1px;">
                                    <div class="card">
                                        <div class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h5 class="m-0 font-weight-bold " style="color: #F6B264;">Company List</h5>
                                        </div>

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Company
                                                    Information:</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-6" style="margin-bottom: 12px;">
                                                            <label for="inputEmail4">Company Name</label>
                                                            <input type="text" class="form-control" placeholder="Company Name" value="<?= $row['name'] ?>" disabled>
                                                        </div>
                                                        <div class="col-md-6" style="margin-bottom: 12px;">
                                                            <label for="inputEmail4">Company Type</label>
                                                            <input type="text" class="form-control" value="<?= $row['companytype'] ?>" placeholder="Company Type" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6" style="margin-bottom: 12px;">
                                                            <label for="inputEmail4">Phone</label>
                                                            <input type="text" class="form-control" value="<?= $row['mobile'] ?>" placeholder="Phone" disabled>
                                                        </div>
                                                        <div class="col-md-6" style="margin-bottom: 12px;">
                                                            <label for="inputEmail4">Email*</label>
                                                            <input type="text" class="form-control" value="<?= $row['email'] ?>" placeholder="Email*" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6" style="margin-bottom: 12px;">
                                                            <label for="inputEmail4">Location</label>
                                                            <input type="text" class="form-control" value="<?= $row['location'] ?>" placeholder="Location" disabled>
                                                        </div>
                                                        <div class="col-md-6" style="margin-bottom: 12px;">
                                                            <label for="inputEmail4">Website Link</label>
                                                            <input type="text" class="form-control" value="<?= $row['websitelink'] ?>" placeholder="Website Link" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6" style="margin-bottom: 12px;">
                                                            <label for="inputEmail4">Company Size</label>
                                                            <input type="text" class="form-control" value="<?= $row['companysize'] ?>" placeholder="Company Size" disabled>
                                                        </div>
                                                        <div class="col-md-6" style="margin-bottom: 12px;">
                                                            <label for="inputEmail4">LinkedIn</label>
                                                            <input type="text" class="form-control" value="<?= $row['linkedin'] ?>" placeholder="LinkedIn" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6" style="margin-bottom: 12px;">
                                                            <label for="inputEmail4">CIN NO</label>
                                                            <input type="text" class="form-control" value="<?= $row['cin'] ?>" placeholder="CIN NO" disabled>
                                                        </div>
                                                        <div class="col-md-6" style="margin-bottom: 12px;">
                                                            <label for="inputEmail4">GST NO</label>
                                                            <input type="text" class="form-control" value="<?= $row['gst'] ?>" placeholder="GST NO" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6" style="margin-bottom: 12px;">
                                                            <label for="inputEmail4">Pan Card</label>
                                                            <input type="text" class="form-control" value="<?= $row['pancard'] ?>" placeholder="Pan Card" disabled>
                                                            <a href="../companydocs/.<?php echo $row['pancard']; ?>" target="_blank">View Pan Card</a>
                                                        </div>
                                                        <div class="col-md-6" style="margin-bottom: 12px;">
                                                            <label for="inputEmail4">GST Certificate</label>
                                                            <input type="text" class="form-control" value="<?= $row['gstcertificate'] ?>" placeholder="GST Certificate" disabled>
                                                            <a href="../companydocs/.<?php echo $row['gstcertificate']; ?>" target="_blank">View GST Certificate</a>
                                                        </div>
                                                    </div>
                                                </form>



                                                <!-- <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">View Documents
                                                    </label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div> -->
                                            </div>
                                            <div class="text-center">
                                                <form onsubmit="return confirm('Are you sure want to Accept Company ?')" method="post">
                                                    <input type="hidden" name="id" value="<?= $row['username'] ?>">

                                                    <input type="submit" name="accept" value="Accept" class="btn btn" style="margin-bottom: 27px;color: white;background-color: #4A0063;">
                                                </form>
                                                <form onsubmit="return confirm('Are you sure want to Reject Company ?')" method="post">
                                                    <input type="hidden" name="id2" value="<?= $row['username'] ?>">
                                                    <input type="submit" name="reject" value="Reject" class="btn btn" style="margin-bottom: 27px;color: white;background-color: #F18101;">
                                                </form>



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


        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
</body>


<?php

if (isset($_POST['accept'])) {
    $id = $_POST['id'];


    $delete = "UPDATE `company` SET `active` = '1'  WHERE username ='$id'";
    $run = mysqli_query($con, $delete);
    if ($run) {

        echo "
               <script>
                 alert('Approved Sucessfully');
                 window.location.href='company-approval.php';
               </script>
             ";
    } else {

        echo "
               <script>
                 alert('Internal Error');
                 window.location.href='company-approval.php';
               </script>
             ";
    }
}


?>
<?php

if (isset($_POST['reject'])) {
    $id = $_POST['id2'];


    $delete = "UPDATE `company` SET `active` = '2'  WHERE username ='$id'";
    $run = mysqli_query($con, $delete);
    if ($run) {

        echo "
               <script>
                 alert('Rejected Sucessfully');
                 window.location.href='company-approval.php';
               </script>
             ";
    } else {

        echo "
               <script>
                 alert('Internal Error');
                 window.location.href='company-approval.php';
               </script>
             ";
    }
}


?>

</html>