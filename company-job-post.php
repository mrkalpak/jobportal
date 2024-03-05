<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
    header("Location: index.php");
}
$main_user = $_SESSION['username'];

$query = "SELECT * FROM `company` WHERE  `username`='$main_user'";

$result = mysqli_query($con, $query);

if ($result) {

    $result_fetch = mysqli_fetch_assoc($result);
    $db_points = $result_fetch['coins'];
}
?>

<?php include './header.php'; ?>

    <link rel="stylesheet" href="./assets/css/company-dashboard.css">
    <link rel="stylesheet" href="./assets/css/company-joblist.css">
    <!-- navbar -->
    <?php include './profileNavbar.php'; ?>
    

    <!-- comapany Navbar -->
    <?php
    $activePage = "joblist";
    include './company-navbar.php';
    
    ?>


    <div class="card candidate-card ms-auto me-auto p-4">
        <div class="row d-flex justify-content-between fw-semibold">
            <div class="col-auto fs-5">
                Post a new job
            </div>

        </div>
        <hr>

        <form class="upe-mutistep-form px-4" id="Upemultistepsform" method="POST" action="postdata.php" enctype="multipart/form-data">
            <div class="step-header d-flex mb-2">
                <span class="steplevel "> <span class="hide-text">
                        Job details
                    </span> </span>
                <span class="steplevel "><span class="hide-text"> Candidate requirements</span></span>
                <span class="steplevel"><span class="hide-text">Job Description</span></span>
                <span class="steplevel"><span class="hide-text">Job preview</span></span>
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
                        <label for="companyName" class="form-label">Company you're hiring for</label>
                        <input type="text" value="<?= $result_fetch['name'] ?>" class="form-control" disabled required>
                        <input type="text" value="<?= $result_fetch['name'] ?>" class="form-control" name="companyname" id="companyname" hidden required>
                    </div>
                    <div class="col mb-3 mt-3">
                        <label for="companyName" class="form-label">Job title / Designation</label>
                        <input type="text" required class="form-control" id="jobtitle" name="jobtitle" placeholder="Eg. Software Developer" required>
                    </div>
                </div>

                <?php
                $sql = "SELECT * FROM `category`";
                $result4 = $con->query($sql);
                ?>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="linkedin" class="form-label">Select Job Category</label>
                        <select class="form-select" id="category" name="category" aria-label="Default select example">


                            <?php
                            if ($result4->num_rows > 0) {

                                while ($row = $result4->fetch_assoc()) {
                                    $category_id = $row["category_id"];
                                    $category_name = $row["category"];
                            ?>
                                    <option value="<?= $row["category"] ?>"><?= $row["category"] ?></option>

                            <?php

                                }
                            } else {
                                echo "No categories found.";
                            }
                            ?>


                        </select>

                    </div>
                    <div class="col mb-3 ">
                        <label for="companyName" class="form-label">Deadline </label>
                        <input type="date" required class="form-control" id="deadline" name="deadline">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="minsalary" class="form-label">Location</label>
                        <div class="row ms-0 me-0 col-md-6">
                            <input type="text" required class="form-control" id="location" name="location" placeholder="Eg. Pune/Mumbai" required>
                        </div>
                    </div>
                    <div class="mb-3 col">
                        <label for="job banner" class="form-label">Job Image(Banner)<p style="color: red; font-size: smaller;">
                                <i>Aspect Ratio: 2:1 or 380x200px</i>
                            </p></label>
                        <div class="row ms-0 me-0 col-md-6">
                            <input type="file" required class="form-control" id="file" name="file" required>
                        </div>
                    </div>


                </div>


                <div class="mb-3 ">
                    <label for="" class="form-label">Type of Job</label>

                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input input-radio" checked type="radio" name="jobtype" id="fulltime" value="Full Time">
                        <label class="form-check-label btn radio-outline-custom rounded-5" for="fulltime">Full Time</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input input-radio" type="radio" name="jobtype" id="parttime" value="Part Time">
                        <label class="form-check-label btn radio-outline-custom rounded-5" for="parttime">PartTime</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input input-radio" type="radio" name="jobtype" id="bothtype" value="Both">
                        <label class="form-check-label btn radio-outline-custom rounded-5" for="bothtype">Both
                        </label>
                    </div>
                    <!-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="nightshift">
                        <label class="form-check-label" for="nightshift">
                            This is a night shift job
                        </label>
                    </div> -->

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Work Type</label>

                    <br>
                    <span class="text-secondary" style="font-size: smaller;">
                        Let candidates know where they will be working from.
                    </span> <br>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input input-radio" checked type="radio" name="joblocation" id="wfo" value="Work from office">
                        <label class="form-check-label btn radio-outline-custom rounded-5" for="wfo">Work from
                            office</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input input-radio" type="radio" name="joblocation" id="wfh" value="Work from home">
                        <label class="form-check-label btn radio-outline-custom rounded-5" for="wfh">Work from
                            home</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input input-radio" type="radio" name="joblocation" id="fieldjob" value="Feild job">
                        <label class="form-check-label btn radio-outline-custom rounded-5" for="fieldjob">Field
                            job</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Compensation</label>

                    <br>
                    <span class="text-secondary" style="font-size: smaller;">
                        Job postings with right salary & incentives will help you find the right candidates.
                    </span> <br>
                    <label for="" class="form-label">What is the pay type? </label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input input-radio" checked type="radio" name="jobsalaytype" id="fixed" value="Fixed only">
                        <label class="form-check-label btn radio-outline-custom rounded-5" for="fixed">Fixed
                            only</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input input-radio" type="radio" name="jobsalaytype" id="fixedincen" value="Fixed + Incentive">
                        <label class="form-check-label btn radio-outline-custom rounded-5" for="fixedincen">Fixed +
                            Incentive</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input input-radio" type="radio" name="jobsalaytype" id="incen" value="Incentive only">
                        <label class="form-check-label btn radio-outline-custom rounded-5" for="incen">Incentive
                            only</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="minsalary" class="form-label">Fixed salary / month *</label>
                        <div class="row ms-0 me-0 col-md-6">

                            <input type="number" required name="minsalary" class="form-control col" id="minsalary" placeholder="80000" required>
                            <div class="col-auto pt-2" style="background-color: lightgray;">To</div>
                            <input type="number" required name="maxsalary" class="form-control col" id="maxsalary" placeholder="90000" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="step">
                <span class="fw-semibold fs-5">
                    Candidate Requirements
                </span> <br>
                <span class="text-secondary" style="font-size: smaller;">
                    We’ll use these requirement details to make your job visible to the right candidates.
                </span> <br>
                <div class="col-md-6 mb-3 mt-3">
                    <label for="minedu" class="form-label">Minimum Education</label>
                    <select id="minedu" name="education" class="form-select" aria-label="Default select example">
                        <option selected>Select</option>
                        <option value="diploma">Diploma</option>
                        <option value="10th">10th Grade</option>
                        <option value="12th">12th Grade</option>
                        <option value="vocational_diploma">Vocational Diploma</option>
                        <option value="associate_degree">Associate Degree</option>
                        <option value="bachelor_degree">Bachelor's Degree</option>
                        <option value="master_degree">Master's Degree</option>
                        <option value="doctorate">Doctorate (Ph.D.)</option>
                        <option value="professional_certificate">Professional Certificate</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="minyr" class="form-label">Total Exprience Required (In Years)</label>
                    <div class="row ms-0 me-0 col-md-6">

                        <input type="number" required class="form-control col" name="minyr" id="minyr" placeholder="0" required>
                        <div class="col-auto pt-2" style="background-color: lightgray;">-</div>
                        <input type="number" required class="form-control col" name="maxyr" id="maxyr" placeholder="3" required>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="vacancy" class="form-label">Vacancy:</label>

                    <input type="number" required class="form-control " name="vacancy" id="vacancy" placeholder="Max number of vacancy" required>

                </div>
                <div class="mb-3 col-md-6">
                    <label for="gender" class="form-label">Gender:</label>

                    <select id="gender" name="gender" class="form-select" aria-label="Default select example">
                        <option value="Both" selected>Both</option>
                        <option value="male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

            </div>
            <div class="step">
                <div class="mb-3">
                    <label for="jd" class="form-label">Job Description</label>
                    <textarea name="description" class="form-control" id="jd" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="jres" class="form-label">Job Responsibility:</label>
                    <textarea name="responsibility" class="form-control" id="jres" rows="6"></textarea>
                </div>
                <div class="mb-3">
                    <label for="addreq" class="form-label">Additional Requirements:</label>
                    <textarea name="requirements" class="form-control" id="addreq" rows="3"></textarea>
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
                    <div class="col-md-3 job-post-heading">
                        Company Name :
                    </div>
                    <div class="col-auto preview-companyName">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 job-post-heading ">
                        Job Title :
                    </div>
                    <div class="col-auto preview-jobTitle">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 job-post-heading ">
                        Category :
                    </div>
                    <div id="jobCategory" class="col-auto preview-jobTitle">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 job-post-heading ">
                        Deadline :
                    </div>
                    <div class="col-auto  preview-Deadline ">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 job-post-heading">
                        Job Type :
                    </div>
                    <div id="output" class="col-auto preview-jobType">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 job-post-heading">
                        Location :
                    </div>
                    <div id="Location" class="col-auto">


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 job-post-heading">
                        Work Type :
                    </div>
                    <div class="col-auto preview-jobLocation">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 job-post-heading">
                        Pay Type :
                    </div>
                    <div class="col-auto preview-jobSalayType">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 job-post-heading">
                        Salary :
                    </div>
                    <div class="col-auto preview-salaryRange">

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
                    <div id="outputEducation" class="col-auto">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 job-post-heading">
                        Total Exprience Required :
                    </div>
                    <div id="outputExperience" class="col-auto">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 job-post-heading">
                        Vacancy :
                    </div>
                    <div id="outputVacancy" class="col-auto">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 job-post-heading">
                        Gender :
                    </div>
                    <div id="outputGender" class="col-auto">

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 job-post-heading">
                        Job Description :
                    </div>
                    <div id="outputJobDescription" class="col-md-9">

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 job-post-heading">
                        Job Requirements :
                    </div>
                    <div id="outputJobResponsibilites" class="col-md-9">

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 job-post-heading">
                        Additional Requirements :
                    </div>
                    <div id="outputjobRequirements" class="col-md-9">

                    </div>
                </div>
                <hr>
                <span class="text-danger" style="font-size: medium;">

                </span>
            </div>

            <div class="d-flex justify-content-center btn-row">
                <button class="btn col-md-2 btn-outline-secondary m-2" id="prevBtn" onclick="nextPrev(-1)" type="button">Back</button>
                <button class="btn col-md-2 btn-primary-custom m-2" id="nextBtn" onclick="nextPrev(1, event)" type="button">Continue</button>
                <button type="submit" class="btn col-md-2 btn-primary-custom m-2" onclick="triggerPostJob()" name="postjob" id="submitBtn" style="display: none;">Submit</button>

            </div>
            <div class="job-summary"></div>
        </form>
    </div>
    </div>
    </div>
    <?php include './footer.php'; ?>

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
                document.getElementById("nextBtn").style.display = "none"; // Hide "Continue" button
                document.getElementById("submitBtn").style.display = "inline"; // Display "Submit" button

            } else {
                document.getElementById("nextBtn").style.display = "inline"; // Display "Continue" button
                document.getElementById("submitBtn").style.display = "none"; // Hide "Submit" button

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
            event.preventDefault();
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
        window.onload=function(){
                var today = new Date().toISOString().split('T')[0];
                document.getElementsByName("setTodaysDate")[0].setAttribute('min', today);
                    }
    </script>



    <script>
        function triggerPostJob() {
            // Use AJAX to send a request to the server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'postdata.php', true);



            // Send the request with a parameter indicating that 'postjob' should be set in $_POST
            xhr.send('postjob=true');
        }
    </script>
    <script>
        function updateJobSummary() {
            // Job details
            var companyName = document.getElementById("companyname").value;
            var jobTitle = document.getElementById("jobtitle").value;
            var jobCategory = document.getElementById("category").value;
            var deadline = document.getElementById("deadline").value;
            var Location = document.getElementById("location").value;
            var jobType = document.querySelector('input[name="jobtype"]:checked').value;
            var jobLocation = document.querySelector('input[name="joblocation"]:checked').value;
            var jobSalayType = document.querySelector('input[name="jobsalaytype"]:checked').value;
            var minSalary = document.getElementById("minsalary").value;
            var maxSalary = document.getElementById("maxsalary").value;
            //   Candidate requirment
            var minEducation = document.getElementById("minedu").value;

            var minExperience = document.getElementById("minyr").value;
            var maxExperience = document.getElementById("maxyr").value;
            var vacancy = document.getElementById("vacancy").value;
            var gender = document.getElementById("gender").value;
            // job description
            var jobDescription = document.getElementById("jd").value;
            var jobResponsibilities = document.getElementById("jres").value;
            var additionalRequirements = document.getElementById("addreq").value;


            // Update the job post preview section
            document.querySelector(".preview-companyName").innerHTML = companyName;
            document.querySelector(".preview-jobTitle").innerHTML = jobTitle;
            document.getElementById("jobCategory").innerHTML = jobCategory;
            document.querySelector(".preview-Deadline").innerHTML = deadline;
            document.getElementById("Location").innerHTML = Location;
            document.querySelector(".preview-jobType").innerHTML = jobType;
            document.querySelector(".preview-jobLocation").innerHTML = jobLocation;
            document.querySelector(".preview-jobSalayType").innerHTML = jobSalayType;
            document.querySelector(".preview-salaryRange").innerHTML = `${minSalary} To ${maxSalary}`;
            document.getElementById("outputEducation").innerHTML = minEducation;
            document.querySelector("#outputExperience").innerHTML = `${minExperience} - ${maxExperience} Years`;
            document.querySelector("#outputVacancy").innerHTML = vacancy;
            document.querySelector("#outputGender").innerHTML = gender;
            document.querySelector("#outputJobDescription").innerHTML = jobDescription;
            document.querySelector("#outputJobResponsibilites").innerHTML = jobResponsibilities;
            document.querySelector("#outputjobRequirements").innerHTML = additionalRequirements;

        }

        // Add event listeners for input elements
        var inputElements = document.querySelectorAll('input[name="jobtype"], input[name="joblocation"], input[name="jobsalaytype"], #jobtitle,#category,#deadline,#location, #minsalary, #maxsalary,#minedu,#minyr, #maxyr,#vacancy,#gender, #jd, #jres, #addreq');
        inputElements.forEach(function(inputElement) {
            inputElement.addEventListener('change', updateJobSummary);
        });
    </script>