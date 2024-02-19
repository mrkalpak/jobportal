<?php
    require('connection.php');
    $url= $_SERVER['REQUEST_URI'];  
    $urlArray = explode('=',$url);
    $last = $urlArray[sizeof($urlArray)-1];
    // var_dump($last);  

    // Query to fetch data from the job_fair table
    $query = "SELECT * FROM admin_jobpost ORDER BY id DESC";


    $query2 = "SELECT phone FROM users_candidate where cardtype=1";

    $result = mysqli_query($con, $query);
    $result2 = mysqli_query($con, $query2);
    $phoneNumbersString = '';

    if (mysqli_num_rows($result)>0) {
        $row = mysqli_query($con,$query);

        // $rowdata = $result->fetch_assoc();
        // $rowdata2 = $result2->fetch_assoc();
        // print_r($rowdata2);
    } else {
        $NoData="No Data Found";
    }

    $row2 = mysqli_query($con,$query2);
    while($row2 = $result2->fetch_assoc()) {
        $phoneNumbersString .= $row2['phone'].',';
    }
    if (!empty($phoneNumbersString)) {
        $phoneNumbersString = rtrim($phoneNumbersString, ',');
    }
        // echo $phoneNumbersString;

    

   

    // $query2 = "SELECT * FROM job_fair Where id=".$last."";
    // $result2 = mysqli_query($con, $query2);

    // print_r($result->num_rows);
    // echo '<br>';
    // print_r($result2);

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
    <link rel="stylesheet" href="./css/jobpost.css">



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
                                    Job Posting
                                </div>
                                <div class="col-md-6 div1" style="color:#F18101;">
                                    <i class="fa fa-home"></i>/ Job Posting
                                    <br>
                                    <a href="jobdetails.php"> <button type="button" class="btn btn-secondary" style=" background:#4A0063;    margin-bottom: -34px;">Create New Job Post
                                        </button></a>

                                </div>
                            </div>


                            <div class="row mx-auto my-4 table-responsive">
                                <table class="" id="myTable">
                                    <tr style="background-color: #4a0063; ">
                                        <th>Job Title</th>
                                        <th>Applications</th>
                                        <th id="action_col">Action</th>
                                    </tr>
                                    <?php
                                    while($row = $result->fetch_assoc()) {
                                        $query2 = "SELECT * FROM job_faircandidate WHERE fairId=".$row['id']."";
                                            $result2 = mysqli_query($con, $query2);
                                            // print_r($result2->num_rows);
                                            $today=date("Y-m-d");
                                            // // echo $today;
                                            $fairStatus="";
                                            if($today==$row['applyTill'] || $today<$row['applyTill']){
                                                $fairStatus="Active";
                                                $badege="success";
                                            }else{
                                                $fairStatus="Expired";
                                                $badege="danger";

                                            }
                                    echo '<tr>
                                        <td>
                                            '.$row['jobTitle'].' <span class="badge ms-2 badge-'.$badege.' rounded-pill  ">'.$fairStatus.'</span>
                                            <br>
                                            <span style="color: #595959;">'.$row['workingFrom'].' | Posted On: '.$row['createdDate'].'</span> <br>

                                        </td>
                                        <td>
                                            2 Total Applications
                                        </td>

                                        <td>
                                        <a href="./jobdetails.php?edit='.$row['id'].'">
                                            <button class="btn btn-outline-custom  mt-2 me-2 " >Edit</button>
                                        </a>
                                        <a href="./joblist-candidate.php?AppliedCandidate='.$row['id'].'">
                                            <button class="btn btn-outline-custom  mt-2 me-2 " data-bs-toggle="modal" data-bs-target="#proceed-modal">View candidates</button>
                                        </a>
                                        </td>


                                    </tr>';
                                    }?>
                                    <?php
                                        if (mysqli_num_rows($result)==0) {
                                            echo '<h4 class="text-danger text-center">'.$NoData.'</h4>';
                                        }
                                        // print_r($phone);

                                    ?>
                                </table>
                                <a>
                                    <button onclick="sendSms()"  class="btn btn-outline-custom  mt-2 me-2 " >Send SMS </button>
                                </a>
                                <script>
                                    function sendSms(){ 
                                        // alert('Are you sure you want to send');
                                        Swal.fire({
                                            title: "Are you sure you want to send?",
                                            showCancelButton: true,
                                            denyButtonText: `Don't Send`,

                                            }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                $.ajax({
                                                    url:"http://panel2.messagewale.com/http-jsonapi.php?&username=JobFair&password=Jobfair@23&senderid=JOBCRD&route=1&number=<?php echo $phoneNumbersString?>&message=Dear Candidate For todays opening click on link https://shorturl.at/BCUW5 Ref-NCP NASHIK Reg- - - Job Card and Job Fair India&templateid=1407168327034496963",
                                                    type:'GET',
                                                    dataType: "jsonp",
                                                    cors: true ,
                                                    contentType:'application/json',
                                                    secure: true,
                                                    headers: {
                                                        "Access-Control-Allow-Origin": "*",
                                                    },
                                                    beforeSend: function (xhr) {
                                                        xhr.setRequestHeader ("Authorization", "Basic " + btoa(""));
                                                    },
                                                    success: function (result) {
                                                        console.log('Success');
                                                        console.log(result);
                                                    },
                                                    error: function (status,textStatus,errorThrown) {
                                                        location.reload()  
                                                    //     console.log(status);
                                                    //     console.log(errorThrown);
                                                    //     console.log(textStatus);

                                                    }
                                                    
                                                });
                                            }


                                        });
                                    }    
                                </script>

                            </div>
                            <!---Container Fluid-->
                        </div>
                        <!-- Footer -->

                        <footer class="sticky-footer">
                            <?php include 'footer.php'; ?>
                            <?php include 'company-job-post.php'; ?>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>