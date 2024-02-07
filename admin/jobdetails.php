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

    <!-- DATA BASE -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
    .upe-mutistep-form .step {
        display: none;

    }

    .upe-mutistep-form .step-header .steplevel {
        position: relative;
        flex: 1;
        padding-bottom: 30px;
        text-align: center;

    }

    .upe-mutistep-form .step-header .steplevel.active {
        font-weight: 600;
    }

    .bi-x-lg {
        font-weight: bold;
    }

    .modal-custom-width {
        max-width: 75%;
    }


    .modal-content {
        margin: 0 auto;
    }

    .upe-mutistep-form .step-header .steplevel.finish {
        font-weight: 600;
        color: grey;
    }

    .upe-mutistep-form .step-header .steplevel::before {
        content: "";
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        z-index: 9;
        width: 20px;
        height: 20px;
        background-color: grey;
        border-radius: 50%;
        border: 3px solid #ecf5f4;
    }

    .upe-mutistep-form .step-header .steplevel.active::before {
        background-color:  #4A0063;
        border: 3px solid  #4A0063;
    }

    .upe-mutistep-form .step-header .steplevel.finish::before {
        background-color: var(--primary);
        border: 3px solid var(--primary);
    }

    .upe-mutistep-form .step-header .steplevel::after {
        content: "";
        position: absolute;
        left: 50%;
        bottom: 8px;
        width: 100%;
        height: 3px;
        background-color: #f3f3f3;
    }

    .upe-mutistep-form .step-header .steplevel.active::after {
        background-color: lightgrey;
    }

    .upe-mutistep-form .step-header .steplevel.finish::after {
        background-color: #009688;
    }

    .upe-mutistep-form .step-header .steplevel:last-child:after {
        display: none;
    }

    .input-radio {
        display: none;
    }

    .btn.radio-outline-custom {
        border: 2px solid gray;
        color: gray !important;
        background-color: transparent;
    }

    .form-check-input:checked+.btn.radio-outline-custom {

        border: 2px solid #4A0063;
        color: var #4A0063 !important;
        background-color: transparent;

    }

    .job-post-heading {
        color: #5E6C84;
    }

    @media (max-width: 767px) {
        .modal-custom-width {
            max-width: 98%;
        }

        .hide-text {
            display: none;
        }
    }
    </style>
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
                            <!-- <div class=" col ">

                                <div class="d-sm-flex align-items-center justify-content-between "
                                    style="margin-left: -12px; margin-bottom: 42px;">
                                    <p style="font-size: 40px;padding: 15px;color: #4A0063;">Job Posting Approval
                                    </p>


                                    <ol class="breadcrumb">

                                        
                                        <a href=""><i class="fa fa-home " style="margin-right: 38px;color: #F18101;">/
                                                Job Posting</i></a>
                                        

                                </div>
                            </div> -->

                            <div class="row justify-content-between  bdr-custom-padding fs-4">
                                <div class="col-md-6" style="font-size: 40px;color: #4A0063;">
                                    Job Posting Approval
                                </div>
                                <div class="col-md-6 div1" style="color:#F18101;">
                                    <i class="fa fa-home"></i>/ Job Posting
                                    <br>


                                </div>
                            </div>
                            <div class="row mb-3">

                                <!-- Invoice Example -->
                                <div class="col-xl-12" style="margin-left: -6px;">
                                    <div class="card">
                                        <div
                                            class="px-3 py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h5 class="m-0 font-weight-bold " style="color: #F6B264;">Job Post List</h5>
                                        </div>

                                        <div class="card-body">

                                            <form class="upe-mutistep-form px-4" id="Upemultistepsform" action="">
                                                <div class="step-header d-flex mb-2">
                                                    <span class="steplevel "> <span class="hide-text">
                                                            Job details
                                                        </span> </span>
                                                    <span class="steplevel "><span class="hide-text"> Candidate
                                                            requirements</span></span>
                                                    <span class="steplevel"><span class="hide-text">Job
                                                            Description</span></span>
                                                    <span class="steplevel"><span class="hide-text">Job
                                                            preview</span></span>
                                                </div>
                                                <div class="step">
                                                    <span class="fw-semibold fs-5">
                                                        Job details
                                                    </span> <br>
                                                    <span class="text-secondary" style="font-size: smaller;">
                                                        We use this information to find the best candidates for the job.
                                                    </span> <br>
                                                    <span class="text-danger" style="font-size: smaller;">
                                                        *Marked fields are mandatory
                                                    </span>
                                                    <div class="row">

                                                        <div class="col mb-3 mt-3">
                                                            <label for="companyName" class="form-label">Company you're
                                                                hiring for</label>
                                                            <input type="text" 
                                                                class="form-control" id="companyName"
                                                                value="Sanspots Pvt Ltd">
                                                        </div>
                                                        <div class="col mb-3 mt-3">
                                                            <label for="companyName" class="form-label">Job title /
                                                                Designation</label>
                                                            <input type="text" required class="form-control"
                                                                id="jobtitle" placeholder="Eg. Software Developer">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 ">
                                                        <label for="" class="form-label">Type of Job</label>

                                                        <br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input input-radio" checked
                                                                type="radio" name="jobtype" id="fulltime"
                                                                value="fulltime">
                                                            <label
                                                                class="form-check-label btn radio-outline-custom rounded-5"
                                                                for="fulltime">Full
                                                                Time</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input input-radio" type="radio"
                                                                name="jobtype" id="parttime" value="fulltime">
                                                            <label
                                                                class="form-check-label btn radio-outline-custom rounded-5"
                                                                for="parttime">Part
                                                                Time</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input input-radio" type="radio"
                                                                name="jobtype" id="bothtype" value="fulltime">
                                                            <label
                                                                class="form-check-label btn radio-outline-custom rounded-5"
                                                                for="bothtype">Both
                                                                (Full-Time and Part-Time)</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="nightshift">
                                                            <label class="form-check-label" for="nightshift">
                                                                This is a night shift job
                                                            </label>
                                                        </div>

                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Location</label>

                                                        <br>
                                                        <span class="text-secondary" style="font-size: smaller;">
                                                            Let candidates know where they will be working from.
                                                        </span> <br>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input input-radio" checked
                                                                type="radio" name="joblocation" id="wfo" value="wfo">
                                                            <label
                                                                class="form-check-label btn radio-outline-custom rounded-5"
                                                                for="wfo">Work from
                                                                office</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input input-radio" type="radio"
                                                                name="joblocation" id="wfh" value="wfh">
                                                            <label
                                                                class="form-check-label btn radio-outline-custom rounded-5"
                                                                for="wfh">Work from
                                                                home</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input input-radio" type="radio"
                                                                name="joblocation" id="fieldjob" value="fulltime">
                                                            <label
                                                                class="form-check-label btn radio-outline-custom rounded-5"
                                                                for="fieldjob">Field
                                                                job</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Compensation</label>

                                                        <br>
                                                        <span class="text-secondary" style="font-size: smaller;">
                                                            Job postings with right salary & incentives will help you
                                                            find the right candidates.
                                                        </span> <br>
                                                        <label for="" class="form-label">What is the pay type? </label>
                                                        <br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input input-radio" checked
                                                                type="radio" name="jobsalaytype" id="fixed"
                                                                value="fixed">
                                                            <label
                                                                class="form-check-label btn radio-outline-custom rounded-5"
                                                                for="fixed">Fixed
                                                                only</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input input-radio" type="radio"
                                                                name="jobsalaytype" id="fixedincen" value="fixedincen">
                                                            <label
                                                                class="form-check-label btn radio-outline-custom rounded-5"
                                                                for="fixedincen">Fixed +
                                                                Incentive</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input input-radio" type="radio"
                                                                name="jobsalaytype" id="incen" value="incen">
                                                            <label
                                                                class="form-check-label btn radio-outline-custom rounded-5"
                                                                for="incen">Incentive
                                                                only</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="mb-3">
                                                            <label for="minsalary" class="form-label">Fixed salary /
                                                                month *</label>
                                                            <div class="row ms-0 me-0 col-md-6">

                                                                <input type="number" required class="form-control col"
                                                                    id="minsalary" placeholder="80000">
                                                                <div class="col-auto pt-2"
                                                                    style="background-color: lightgray;">To</div>
                                                                <input type="number" required class="form-control col"
                                                                    id="maxsalary" placeholder="90000">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="step">
                                                    <span class="fw-semibold fs-5">
                                                        Candidate Requirements
                                                    </span> <br>
                                                    <span class="text-secondary" style="font-size: smaller;">
                                                        We’ll use these requirement details to make your job visible to
                                                        the right candidates.
                                                    </span> <br>
                                                    <div class="col-md-6 mb-3 mt-3">
                                                        <label for="minedu" class="form-label">Minimum Education</label>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option value="10th pass" selected>10th Pass</option>
                                                            <option value="12th pass">12th Pass</option>
                                                            <option value="Btech">Btech</option>
                                                            <option value="Diploma">Diploma</option>

                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="minyr" class="form-label">Total Exprience Required
                                                            (In Years)</label>
                                                        <div class="row ms-0 me-0 col-md-6">

                                                            <input type="number" required class="form-control col"
                                                                id="minyr" placeholder="0">
                                                            <div class="col-auto pt-2"
                                                                style="background-color: lightgray;">-</div>
                                                            <input type="number" required class="form-control col"
                                                                id="maxyr" placeholder="3">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="vacancy" class="form-label">Vacancy:</label>

                                                        <input type="number" required class="form-control " id="vacancy"
                                                            placeholder="Max number of vacancy">

                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="gender" class="form-label">Gender:</label>

                                                        <select class="form-select" aria-label="Default select example">
                                                            <option value="Both" selected>Both</option>
                                                            <option value="male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="step">
                                                    <div class="mb-3">
                                                        <label for="jd" class="form-label">Job Description</label>
                                                        <textarea class="form-control" id="jd" rows="3"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jres" class="form-label">Job Responsibility:</label>
                                                        <textarea class="form-control" id="jres" rows="6"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="addreq" class="form-label">Additional
                                                            Requirements:</label>
                                                        <textarea class="form-control" id="addreq" rows="3"></textarea>
                                                    </div>

                                                </div>
                                                <div class="step">
                                                    <span class="fw-semibold fs-5">
                                                        Job Post Preview
                                                    </span> <br>
                                                    <span class="fw-semibold fs-6">
                                                        Job details
                                                    </span>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading ">
                                                            Company Name :
                                                        </div>
                                                        <div class="col-auto">
                                                            Sanspost Pvt Ltd
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            Job Title :
                                                        </div>
                                                        <div class="col-auto">
                                                            Software Developer
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            Job Type :
                                                        </div>
                                                        <div class="col-auto">
                                                            Full Time
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            Work Type :
                                                        </div>
                                                        <div class="col-auto">
                                                            Work From Office
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            City :
                                                        </div>
                                                        <div class="col-auto">
                                                            Pune
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            Pay Type :
                                                        </div>
                                                        <div class="col-auto">
                                                            Salary + Incentives
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            Salary :
                                                        </div>
                                                        <div class="col-auto">
                                                            80000 To 90000
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <span class="fw-semibold fs-6">
                                                        Candidate details
                                                    </span>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            Minimum Education :
                                                        </div>
                                                        <div class="col-auto">
                                                            10Th Pass
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            Total Exprience Required :
                                                        </div>
                                                        <div class="col-auto">
                                                            0-10 Years
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            Vacancy :
                                                        </div>
                                                        <div class="col-auto">
                                                            100
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            Gender :
                                                        </div>
                                                        <div class="col-auto">
                                                            Both (Male and Female)
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            Job Description :
                                                        </div>
                                                        <div class="col-md-9">
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Iure architecto perspiciatis dolorum autem fuga asperiores
                                                            eaque accusantium neque fugiat voluptas.
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            Job Requirements :
                                                        </div>
                                                        <div class="col-md-9">
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Corporis nam nostrum excepturi, necessitatibus hic aliquam
                                                            veniam soluta iusto, asperiores rerum, nobis libero minus!
                                                            Deleniti placeat amet ipsa magni nemo repudiandae autem
                                                            pariatur vitae fugit, eius ad hic nihil at illum aliquid,
                                                            facere, incidunt molestias sunt dicta quas et cum. Sunt?
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-3 job-post-heading">
                                                            Additional Requirements :
                                                        </div>
                                                        <div class="col-md-9">
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Corporis nam nostrum excepturi, necessitatibus hic aliquam
                                                            veniam soluta.
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <span class="text-danger" style="font-size: medium;">
                                                        *It will cost 50 Coins to post this job post
                                                    </span>
                                                </div>
                                               
                                                <div class="d-flex justify-content-center btn-row">
                                                    <button class="btn col-md-2 btn-outline-secondary m-2" id="prevBtn" onclick="nextPrev(-1)" type="button "style=" background:#F18101; border: white;color: white;">Back</button>
                                                    <!-- <button  class="btn col-md-2 " style=" background:#4A0063; color: white;">Back  </button> -->
                                                    <button class="btn col-md-2 btn-custom m-2" id="nextBtn"
                                                        onclick="nextPrev(1)" type="button" style=" background:#4A0063; color: white;">Continue</button>

                                                </div>
                                            </form>











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
        <script>
        var currentTab = 0;
        tabShow(currentTab);

        function tabShow(n) {
            var x = document.getElementsByClassName("step");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == x.length - 1) {
                document.getElementById("nextBtn").innerHTML = "Submit";
                document.getElementById("nextBtn").type = "submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Continue";
            }
            activelevel(n);
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("step");
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {
                document.getElementById("Upemultistepsform").submit();
                return false;
            }
            tabShow(currentTab);
        }

        function backPrev(n) {
            var x = document.getElementsByClassName("step");
            x[n].style.display = "block";
        }

        function activelevel(n) {
            var i,
                x = document.getElementsByClassName("steplevel");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }
        </script>
</body>

</html>