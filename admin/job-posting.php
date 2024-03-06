<?php
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}
require('connection.php');
$_SESSION['username'];


?>
<?php
$env = parse_ini_file('../.env');
if($_SERVER['SERVER_PORT']==443) {
    $header = $env["HEADER_SERVER"];
}
else {
    $header = $env["HEADER"];
}

require('connection.php');
    $url= $_SERVER['REQUEST_URI'];  
    $urlArray = explode('=',$url);
    $last = $urlArray[sizeof($urlArray)-1];
    // var_dump($last);  

    // Query to fetch data from the job_fair table
    $query = "SELECT * FROM `admin_jobpost` ORDER BY id DESC";
    $query2 = "SELECT `phone` FROM `users_candidate` where `cardtype`=1";
    $query3 = "SELECT * FROM `admin_jobpost` ORDER BY `id` DESC limit 1";

    $result = mysqli_query($con, $query);
    $result2 = mysqli_query($con, $query2);
    $result3 = mysqli_query($con, $query3);
    
    while($createUrl = $result3->fetch_assoc()) {
        // var_dump($createUrl);
        $jobTd=$createUrl['id'];
        $jobTitle=$createUrl['jobTitle'];
        $string = preg_replace('/\s+/', '', $jobTitle);
        $url= $header."card-candidate-jobdetail.php?job=".$jobTd."";

        $msgUrl=$createUrl['url'];
        
        
    }
    $phoneNumbersString = '';

    if (mysqli_num_rows($result)>0) {
        $row = mysqli_query($con,$query);

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
    // echo $row2['phone'];


?>
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="./css/jobpost.css">
<style>
    /* Increase the size of the DataTables entry size dropdown */
    .dataTables_length select {
        padding: 6px 16px;
        /* You can adjust the padding to your desired size */
        font-size: 14px;
        /* You can adjust the font size to your desired size */
    }
    a{
        text-decoration: none !important;
    }
</style>
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
                                <table class="table align-items-center table-flush table-hover" id="table-id">
                                <thead class="thead-dark text-light ">
                                                        <tr>
                                        <th style="background-color: #4A0063;">Job Title</th>
                                        <th style="background-color: #4A0063;">Applications</th>
                                        <th style="background-color: #4A0063;" id="action_col">Action</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    // var_dump($createUrl['id'],$createUrl['jobTitle']);

                                    while($row = $result->fetch_assoc()) {
                                        $query4 = "SELECT jobId FROM cardcandidate WHERE jobId=".$row['id']."";
                                        $result4 = mysqli_query($con, $query4);
                                        // echo'<pre>';
                                        // print_r($result4);
                                        // echo '</pre>';
                                        // var_dump($result4);
                                        $query2 = "SELECT * FROM admin_jobpost WHERE id=".$row['id']."";
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
                                        '.$result4->num_rows.'
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
</tbody>

                                    
                                </table>
                                <?php
                                if ($phoneNumbersString!='') {
                                    echo'<a>
                                        <button onclick="sendSms()"  class="btn btn-outline-custom  mt-2 me-2 " >Send SMS </button>
                                    </a>';
                                        }
                                ?>
                                <?php
                                        if (mysqli_num_rows($result)==0) {
                                            echo '<h4 class="text-danger text-center">'.$NoData.'</h4>';
                                        }
                                        // print_r($phone);
                                    ?>
                                


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
        <script src="js/demo/chart-area-demo.js"></script><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <script>
               window.onload=function(){
                var today = new Date().toISOString().split('T')[0];
                document.getElementsByName("setTodaysDate")[0].setAttribute('min', today);
                    }

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
                            url:"http://panel2.messagewale.com/http-api.php?username=JobFair&password=Jobfair@23&senderid=JOBCRD&route=1&number=<?php echo $phoneNumbersString?>&message=Dear Candidate For todays opening click on link <?=$msgUrl?> Ref-NCP NASHIK Reg- - - Job Card and Job Fair India&templateid=1407168327034496963",
                            type:'GET',
                            dataType: "jsonp",
                            // cors: true ,
                            contentType:'application/json; charset=utf-8;',
                            // secure: true,
                            headers: {
                                "Access-Control-Allow-Origin": "*",
                            },
                            success: function (data, status, xhr) {
                                console.log('data: ', data);
                            },
                            error: function (xhr,textStatus,error) {
                                location.reload()  
                                console.log(xhr);
                                console.log(error);

                            }
                            
                        });
                        // Define the API URL
                    // const apiKey = '38384a6f62466169723734381707812329';
                    // const apiUrl = 'http://panel2.messagewale.com/http-jsonapi.php?&username=JobFair&password=Jobfair@23&senderid=JOBCRD&route=1&number=<?php echo $phoneNumbersString?>&message=Dear Candidate For todays opening click on link https://shorturl.at/koJO3 Ref-NCP NASHIK Reg- - - Job Card and Job Fair India&templateid=1407168327034496963';
                    // const requestOptions = {
                    //     method: 'GET',
                    //     headers: {
                    //         'Authorization': `Bearer ${apiKey}`,
                    //         "Access-Control-Allow-Origin": "*",

                    //     },
                    //     };
                    // // Make a GET request
                    // fetch(apiUrl,requestOptions)
                    // .then(response => {
                    //     if (!response.ok) {
                    //     throw new Error('Network response was not ok');
                    //     }
                    //     return response.json();
                    // })
                    // .then(data => {
                    //     console.log(data);
                    // })
                    // .catch(error => {
                    //     console.error('Error:', error);
                    // });
                    }


                });
            }        
        </script>
</body>

</html>