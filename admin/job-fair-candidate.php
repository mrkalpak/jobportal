<?php
    require('connection.php');
    $url= $_SERVER['REQUEST_URI'];  
    $urlArray = explode('=',$url);
    $last = $urlArray[sizeof($urlArray)-1];
    // echo $last;  


    // Query to fetch data from the job_fair table
    $query = "SELECT * FROM job_faircandidate Where fairId=".$last."";
    $result = mysqli_query($con, $query);

   

    $query2 = "SELECT * FROM job_fair Where id=".$last."";
    $result2 = mysqli_query($con, $query2);

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
                                    Job fair Candidate List
                                </div>
                                <div class="col-md-6 div1" style="color:#F18101;">
                                    <i class="fa fa-home"></i>/ Job fair Candidate List
                                    <br>


                                </div>
                            </div>

                            <div class="candidate-card me-auto ms-auto border border-1 p-2 rounded">

                                <?php
                                 while($row2 = $result2->fetch_assoc()) {
                                    // print_r($row['fair_Organizer']);
                                    echo'
                                    <div class="row px-4 mb-2">
                                        <div class="col-md-9">
                                            '.$row2['fair_Organizer'].'<span class="badge rounded-pill  active-plan">Active</span>
                                                <br>
                                            <span style="color: #595959;">'.$row2['location'].' | Date: '.$row2['fairDate'].'</span> <br>
                                            </div>
                                            <div class="col-md-3 border-start">
                                                '.$result->num_rows.' <br> Total Applications
                                            </div>
                                    </div>
                                    ';
                                }
                                ?>

                            </div>
                            <div class="candidate-card me-auto ms-auto mt-3">
                                <div class=" d-flex justify-content-end ">
                                    <a href="exportExcel.php?fair_Id=<?php echo $last ?>"><button class="btn btn-sm btn-outline-custom text-white "><i class="bi bi-download"></i>&nbsp; Download Excel</button></a>
                                </div>
                            </div>
                            <?php
                            while($row = $result->fetch_assoc()) {

                            echo'
                            <div class="border border-1 candidate-card mt-3 rounded ms-auto me-auto p-3">
                                <div class="row">
                                    <div class="col fw-bold">
                                        '.$row['candidateName'].'
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <a href="../assets/candidateResume/'.$row['candidateResume'].'" target="_blank" class="btn btn-sm btn-outline-secondary " download>
                                            <i class="bi bi-download"></i>&nbsp;
                                            Resume
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 row text-secondary">

                                        <div class="col-auto"> <i class="bi bi-geo-alt-fill"></i>'.$row['candiateLocation'].' </div>
                                        <div class="col-auto">

                                            D.O.B : '.$row['candidateDOB'].'</div>
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11">
                                    <div class="col-md-2">
                                        <i class="bi bi-mortarboard-fill"></i>&nbsp; Qualification 
                                    </div>
                                    <div class="col-auto">
                                    '.$row['qualification'].'
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11">
                                    <div class="col-md-2">
                                        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 6.32247V0H0V6.32247C0 6.58498 0.18 6.83248 0.49 6.96748L4.67001 8.84997L3.68001 10.605L0.27 10.8225L2.85999 12.5025L2.07 15L5.00001 13.6725L7.93 15L7.15 12.5025L9.74001 10.8225L6.33 10.605L5.34 8.84997L9.52 6.96748C9.82 6.83248 10 6.59247 10 6.32247ZM6 7.67247L5.00001 8.12247L4 7.67247V0.750001H6V7.67247Z" fill="black" />
                                        </svg>
                                        </i>
                                        &nbsp; Skills :
                                    </div>
                                    <div class="col-auto">
                                    '.$row['jobType'].'
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11">
                                    <div class="col-md-2">
                                        <i class="bi bi-telephone-fill"></i>&nbsp; Phone :
                                    </div>
                                    <div class="col-auto">
                                    '.$row['candidatePhone'].'
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11">
                                    <div class="col-md-2">
                                        <i class="bi bi-envelope-fill"></i>&nbsp; Email :
                                    </div>
                                    <div class="col-auto">
                                    '.$row['candidateEmail'].'
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11">
                                    <div class="col-md-2">
                                        <i class="bi bi-person-badge-fill"></i>&nbsp; Exprience
                                    </div>
                                    <div class="col-auto">
                                    '.$row['exp'].'
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11">
                                    <div class="col-md-2">
                                        <i class="bi bi-linkedin"></i>&nbsp; LinkedIn :
                                    </div>
                                    <div class="col-auto">
                                        <a href="https://www.linkedin.com/feed/">'.$row['linkedInProfile'].'/</a>
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11 bg-light">
                                    <div class="col-md-2">
                                        <i class="bi bi-card-text"></i>&nbsp; Description :
                                    </div>
                                    <div class="col-auto">
                                    '.$row['discription'].'
                                    </div>
                                </div>


                            </div>';
                            }
                            ?>
                            <!-- <div class="border border-1 candidate-card mt-3 rounded ms-auto me-auto p-3">
                                <div class="row">
                                    <div class="col fw-bold">
                                        Shubham Hase
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <a href="" target="_blank" class="btn btn-sm btn-outline-secondary ">
                                            <i class="bi bi-download"></i>&nbsp;
                                            Resume
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 row text-secondary">

                                        <div class="col-auto"> <i class="bi bi-geo-alt-fill"></i> Icici Bank, Pune. </div>
                                        <div class="col-auto">

                                            D.O.B : 12/12/2012.</div>
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11">
                                    <div class="col-md-2">
                                        <i class="bi bi-mortarboard-fill"></i>&nbsp; Qualification :
                                    </div>
                                    <div class="col-auto">
                                        Diploma, Btech
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11">
                                    <div class="col-md-2">
                                        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 6.32247V0H0V6.32247C0 6.58498 0.18 6.83248 0.49 6.96748L4.67001 8.84997L3.68001 10.605L0.27 10.8225L2.85999 12.5025L2.07 15L5.00001 13.6725L7.93 15L7.15 12.5025L9.74001 10.8225L6.33 10.605L5.34 8.84997L9.52 6.96748C9.82 6.83248 10 6.59247 10 6.32247ZM6 7.67247L5.00001 8.12247L4 7.67247V0.750001H6V7.67247Z" fill="black" />
                                        </svg>
                                        </i>
                                        &nbsp; Skills :
                                    </div>
                                    <div class="col-auto">
                                        Web dev, app dev
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11">
                                    <div class="col-md-2">
                                        <i class="bi bi-telephone-fill"></i>&nbsp; Phone :
                                    </div>
                                    <div class="col-auto">
                                        55555555555
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11">
                                    <div class="col-md-2">
                                        <i class="bi bi-envelope-fill"></i>&nbsp; Email :
                                    </div>
                                    <div class="col-auto">
                                        user@user.com
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11">
                                    <div class="col-md-2">
                                        <i class="bi bi-person-badge-fill"></i>&nbsp; Exprience
                                    </div>
                                    <div class="col-auto">
                                        4
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11">
                                    <div class="col-md-2">
                                        <i class="bi bi-linkedin"></i>&nbsp; LinkedIn :
                                    </div>
                                    <div class="col-auto">
                                        <a href="https://www.linkedin.com/feed/">https://www.linkedin.com/</a>
                                    </div>
                                </div>
                                <div class="row mt-2 col-md-11 bg-light">
                                    <div class="col-md-2">
                                        <i class="bi bi-card-text"></i>&nbsp; Description :
                                    </div>
                                    <div class="col-auto">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, animi.
                                    </div>
                                </div>


                            </div> -->
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
</body>

</html>