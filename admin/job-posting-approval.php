<?php
session_start();
require('connection.php');
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}

$main_user = $_SESSION['username'];
// $jobid=$_POST['id'];
$jobid = $_GET['id'];

$query = "SELECT job.*, comp.*
FROM jobs AS job
INNER JOIN company AS comp ON job.username = comp.username
WHERE job.jobid = '$jobid'";

if ($result = mysqli_query($con, $query)) {

    $row = mysqli_fetch_assoc($result);
    // echo $main_user;
    // echo "<br>", $jobid;
    // echo "<br>", $row['username'];
}
?>




    <!-- DATA BASE -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


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
                                <div class="col-xl-12" style="margin-left: -6px;">
                                    <div class="card">
                                        <div class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h5 class="m-0 font-weight-bold " style="color: #F6B264;">Company List</h5>
                                        </div>

                                        <div class="card-body">

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <?php echo $row['jobtitle']; ?><br>
                                                        <?php echo $row['compname']; ?>
                                                    </div>
                                                    <div class="col-sm">
                                                        Location:<?php echo $row['location2']; ?><br>
                                                        Designation:<?php echo $row['category']; ?>
                                                    </div>
                                                    <div class="col-sm">
                                                        Job Type<?php echo $row['typeofjob']; ?><br>
                                                        Salary:<?php echo $row['minsalary']; ?>-<?php echo $row['maxsalary']; ?>/Per Month
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="container">

                                                <h5>Job Description/Title:</h5>
                                                <p> <?php echo $row['description']; ?></p>
                                                <h5>Job Responsibility:</h5>
                                                <p> <?php echo $row['responsibility']; ?></p>

                                                <h5>Educational Requirements:</h5>
                                                <p> <?php echo $row['requirements']; ?></p>

                                                <!-- <h5>Experiences:</h5>
                                                <p>2-3 Years in this field.</p>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Additional Requirements:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div> -->
                                            </div>

                                            <div class="text-center">
                                            <div class="text-center">
                                                <!-- <form  method="post"> -->
                                                    <input type="hidden" name="id" id="username" value="<?= $row['username'] ?>">
                                                    <input type="button" name="accept" value="Accept Job" class="btn btn Acceptbtn" style="margin-bottom: 27px;color: white;background-color: #4A0063;">
                                                    <input type="button" name="reject" value="Reject Job" class="btn btn Acceptbtn" style="margin-bottom: 27px;color: white;background-color: #F18101;">
                                            </div>



                                            </div>
                                            <!-- <div class="text-center">
                                                <button type="button" class="btn btn" data-dismiss="modal" style="margin-bottom: 27px;color: white;background-color: #F18101;">Accept Job Post
                                                </button>
                                                <button type="button" class="btn btn" style="margin-bottom: 27px;color: white;background-color: #4A0063;">Reject Job Post </button>
                                            </div> -->







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
                jobId:<?php echo $jobid?>, 
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
                        window.location.href='job-post-aprovalmain.php';
                    }else{
                        AmagiLoader.hide();
                        // alert('Failed To send Mail');
                        // window.location.href='job-post-aprovalmain.php';
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

<?php

// if (isset($_POST['accept'])) {
//     $id = $_POST['id'];


//     $delete = "UPDATE `jobs` SET `active` = '1'  WHERE jobid ='$id'";
//     $run = mysqli_query($con, $delete);
//     if ($run) {

//         $to_email = 'nihal5930@gmail.com';
//         $subject = "Reset Link Please click and Reset Password";
//         $body = 'Job Approved Sucessfully';
//         $headers = "From: nm371136@gmail.com";
        
//         if (mail($to_email, $subject, $body, $headers)) {
//             echo "
//             <script>
//               alert('Job Approved Sucessfully');
//               window.location.href='job-post-aprovalmain.php';
//             </script>
//           ";
//             // echo "Email successfully sent to $to_email...";
//         } else {
//             echo "Email sending failed...";
//         }


//     } else {

//         echo "
//                <script>
//                  alert('Internal Error');
//                  window.location.href='job-post-aprovalmain.php';
//                </script>
//              ";
//     }
// }


?>
<?php

// if (isset($_POST['reject'])) {
//     $id = $_POST['id2'];


//     $delete = "UPDATE `jobs` SET `active` = '2'  WHERE jobid ='$id'";
//     $run = mysqli_query($con, $delete);
//     if ($run) {
//         $to_email = 'nihal5930@gmail.com';
//         $subject = "Reset Link Please click and Reset Password";
//         $body = 'Job Rejected Sucessfully';
//         $headers = "From: nm371136@gmail.com";
//         if (mail($to_email, $subject, $body, $headers)) {
//         echo "
//                <script>
//                  alert('Job Rejected Sucessfully');
//                  window.location.href='job-post-aprovalmain.php';
//                </script>
//              ";
//         }
//         else {
//             echo "Email sending failed...";
//         }
//     } else {

//         echo "
//                <script>
//                  alert('Internal Error');
//                  window.location.href='job-post-aprovalmain.php';
//                </script>
//              ";
//     }
// }


?>

