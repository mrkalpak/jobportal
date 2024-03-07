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

                                        <div class="modal-content p-5">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Company
                                                    Information:</h5>
                                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button> -->
                                            </div>
                                            <div class="modal-body p-5">
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
                                                <!-- <form  method="post"> -->
                                                    <input type="hidden" name="id" id="username" value="<?= $row['username'] ?>">
                                                    <input type="hidden" name="email" id="email" value="<?= $row['email'] ?>">
                                                    <input type="button" name="accept" value="Accept" class="btn btn Acceptbtn" style="margin-bottom: 27px;color: white;background-color: #4A0063;">
                                                    <input type="button" name="reject" value="Reject" class="btn btn Acceptbtn" style="margin-bottom: 27px;color: white;background-color: #F18101;">
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
        <script src="https://cdn.jsdelivr.net/gh/AmagiTech/JSLoader/amagiloader.js"></script>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
        
        <script>

         $(".Acceptbtn").click(function(){
            var action = $(this).attr('value');
            Swal.fire({
            title: "Are You Sure?",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",

            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                AmagiLoader.show();
                var userData = {
                username:$("#username").val(),
                action:action,
                email:$("#email").val(), 
                };
                $.ajax({
                type: "POST",
                url: 'sendMail.php',
                data: userData,
                success: function(response) {
                    console.log(response);
                    if(response=='Mail Sent'){
                        AmagiLoader.hide();
                        alert('Sucessfully Done');
                        window.location.href='company-approval.php';
                    }else{
                        AmagiLoader.hide();
                        alert('Failed To send Mail');
                        window.location.href='company-approval.php';
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
            } else if (result.isDenied) {
                
            }
            });
            // return;
            
         })   
        </script>
</body>


