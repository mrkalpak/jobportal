<?php include './header.php'; ?>
<?php
require('connection.php');
$url = $_SERVER['REQUEST_URI'];
$urlArray = explode('=', $url);
$last = $urlArray[sizeof($urlArray) - 1];
// echo $last;  


// Query to fetch data from the job_fair table
$query = "SELECT * FROM job_fair Where id=" . $last . "";
$result = mysqli_query($con, $query);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    $NoData = "No Data present";
}



$EducationData = [
    '10th',
    '11th',
    '12th',
    'Diploma',
    'ITI (Industrial Training Institute)',
    'BE (Bachelor of Engineering)',
    'BA (Bachelor of Arts)',
    'BSc (Bachelor of Science)',
    'BCom (Bachelor of Commerce)',
    'BBA (Bachelor of Business Administration)',
    'BCA (Bachelor of Computer Applications)',
    'BSW (Bachelor of Social Work)',
    'BFA (Bachelor of Fine Arts)',
    'B.Ed (Bachelor of Education)',
    'B.Tech (Bachelor of Technology)',
    'MBBS (Bachelor of Medicine, Bachelor of Surgery)',
    'BDS (Bachelor of Dental Surgery)',
    'BHMS (Bachelor of Homeopathic Medicine and Surgery)',
    'BAMS (Bachelor of Ayurvedic Medicine and Surgery)',
    'BUMS (Bachelor of Unani Medicine and Surgery)',
    'BNYS (Bachelor of Naturopathy and Yogic Sciences)',
    'LLB (Bachelor of Laws)',
    'BPharm (Bachelor of Pharmacy)',
    'B.VSc & AH (Bachelor of Veterinary Science and Animal Husbandry)',
    'BPT (Bachelor of Physiotherapy)',
    'BHM (Bachelor of Hotel Management)',
    'BFA (Bachelor of Fine Arts)',
    'BPE (Bachelor of Physical Education)',
    'BPEd (Bachelor of Physical Education)',
    'B.Des (Bachelor of Design)',
    'BFA (Bachelor of Fine Arts)',
    'BMM (Bachelor of Mass Media)',
    'BBA LLB (Integrated Bachelor of Business Administration and Bachelor of Laws)',
    'B.Arch (Bachelor of Architecture)',
    'BFA (Bachelor of Fine Arts)',
    'BFSc (Bachelor of Fisheries Science)',
    'BFST (Bachelor of Food Science and Technology)',
    'BBA (Bachelor of Business Administration',
    'BMS (Bachelor of Management Studies)',
    'BCOM (Bachelor of Commerce)',
    'BCA (Bachelor of Computer Applications)',
    'BSW (Bachelor of Social Work)',
    'BPE (Bachelor of Physical Education)',
    'BPEd (Bachelor of Physical Education)',
    'BLibSc (Bachelor of Library Science)',
    'BFA (Bachelor of Fine Arts)',
    'BPT (Bachelor of Physiotherapy)',
    'BBA (Bachelor of Business Administration)',
    'BHM (Bachelor of Hotel Management)',
    'BCA (Bachelor of Computer Applications)',
    'BFA (Bachelor of Fine Arts)',
    'BMM (Bachelor of Mass Media)',
    'BRTS (Bachelor of Radiologic Technology and Science)',
    'BVSc & AH (Bachelor of Veterinary Science and Animal Husbandry)',
    'B.Des (Bachelor of Design)',
    'B.Optom (Bachelor of Optometry)',
    'BOptom (Bachelor of Optometry)',
    'B.El.Ed (Bachelor of Elementary Education)',
    'BFSc (Bachelor of Fisheries Science)',
    'BFST (Bachelor of Food Science and Technology)',
    'BDS (Bachelor of Dental Surgery)',
    'BHMS (Bachelor of Homeopathic Medicine and Surgery)',
    'BNYS (Bachelor of Naturopathy and Yogic Sciences)',
    'BUMS (Bachelor of Unani Medicine and Surgery)',
    'BA LLB (Integrated Bachelor of Arts and Bachelor of Laws)',
    'BAMS (Bachelor of Ayurvedic Medicine and Surgery)',
    'BSc Nursing (Bachelor of Science in Nursing)',
    'BMLT (Bachelor of Medical Laboratory Technology)',
    'BPT (Bachelor of Physiotherapy)',
    'B.Pharm (Bachelor of Pharmacy)',
    'BTTM (Bachelor in Travel and Tourism Management)',
    'BUMS (Bachelor of Unani Medicine and Surgery)',
    'BNYS (Bachelor of Naturopathy and Yogic Sciences)',
    'BSMS (Bachelor of Siddha Medicine and Surgery)',
    'BAMS (Bachelor of Ayurvedic Medicine and Surgery)',
    'BSMS (Bachelor of Siddha Medicine and Surgery)',
    'BHMS (Bachelor of Homeopathic Medicine and Surgery)',
    'BPT (Bachelor of Physiotherapy)',
    'BOptom (Bachelor of Optometry)',
    'BDS (Bachelor of Dental Surgery)',
    'BASLP (Bachelor in Audiology and Speech-Language Pathology)',
    'BAMS (Bachelor of Ayurvedic Medicine and Surgery)',
    'BSc Nursing (Bachelor of Science in Nursing)',
    'BMLT (Bachelor of Medical Laboratory Technology)',
    'BPT (Bachelor of Physiotherapy)',
    'B.Pharm (Bachelor of Pharmacy)',
    'BTTM (Bachelor in Travel and Tourism Management)',
    'BUMS (Bachelor of Unani Medicine and Surgery)',
    'BNYS (Bachelor of Naturopathy and Yogic Sciences)',
    'BSMS (Bachelor of Siddha Medicine and Surgery)',
    'BASLP (Bachelor in Audiology and Speech-Language Pathology)',
    'MCA (Master of Computer Applications)',
    'MSc (Master of Science)',
    'MA (Master of Arts)',
    'MBA (Master of Business Administration)',
    'MBM (Master of Business Management)',
    'MCom (Master of Commerce)',
    'MSW (Master of Social Work)',
    'MFA (Master of Fine Arts)',
    'MPT (Master of Physiotherapy)',
    'M.Tech (Master of Technology)',
    'ME (Master of Engineering)',
    'M.Plan (Master of Planning)',
    'M.Des (Master of Design)',
    'M.Optom (Master of Optometry)',
    'MOptom (Master of Optometry)',
    'M.El.Ed (Master of Elementary Education)',
    'M.Ed (Master of Education)',
    'MLibSc (Master of Library Science)',
    'MFA (Master of Fine Arts)',
    'M.Sc Nursing (Master of Science in Nursing)',
    'MMLT (Master of Medical Laboratory Technology)',
    'MPT (Master of Physiotherapy)',
    'M.Pharm (Master of Pharmacy)',
    'MBA (Master of Business Administration)',
    'MHA (Master of Health Administration)',
    'MHM (Master of Hotel Management)',
    'MSc IT (Master of Science in Information Technology)',
    'MMS (Master of Management Studies)',
    'PGDM (Post Graduate Diploma in Management)',
    'PGP (Post Graduate Program in Management)',
    'MD (Doctor of Medicine)',
    'MS (Master of Surgery)',
    'DM (Doctorate of Medicine)',
    'MCh (Master of Chirurgiae)',
    'DNB (Diplomate of National Board)',
    'PhD (Doctor of Philosophy)',
    'Other'
];



$jobCategory = ['Developer', 'Engineer', 'Designer', 'Architecture'];
?>

<link rel="stylesheet" href="./assets/css/candiate-myprofile.css">
<style>
    .job-fair-card-details {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }

    .main-title {
        font-size: xx-large !important;
    }

    @media (max-width: 767px) {
        .job-fair-card-details {
            width: 95%;
            margin-left: auto;
            margin-right: auto;
        }
    }
</style>
<!-- navbar  -->
<?php include './navbar.php'; ?>

<section class="paddingTB60 ">
    <div class="card shadow job-fair-card-details px-4 py-3">

        <div class="col-12  text-center">
            <h3 class="main-title">Job <span class="main-title-span">Application</span></h3>
            <h4 class="main-title"><?php echo $row["fair_Organizer"] ?></h4>
        </div>
        <div class="text-center">
            <img src="./assets/fair/<?php echo $row["fileName"] ?>" width="40%" height="auto" alt="" srcset="">
        </div>
        <div class="d-flex justify-content-between mx-5 px-5 mt-4">
            <div class="">
                Location : <?php echo $row["location"] ?><a target='_blank' href="http://maps.google.com/?q='<?php echo $row["location"] ?>'">Click here</a>
            </div>
            <div class="">
                Date : <?php echo $row["fairDate"] ?>
            </div>
            <div class="">
                Time : <?php echo $row["fairTime"] ?>

            </div>
        </div>
        <div class=" p-5 ">
            <?php
            $row['fairDate'];
            $today = date('Y-m-d');
            // var_dump($today>$row['fairDate']);
            if ($today > $row['fairDate']) {
                echo "<div class='row d-flex justify-content-center text-danger h4'>
                        Opp's Fair expired
                     </div>";
            } else {
            ?>
                <form action="postdata.php" method="POST" enctype="multipart/form-data" class=" px-5" id="myForms">
                    <div class="row mt-3">

                        <div class="mb-3 col">
                            <label for="candidateName" class="form-label">Name*</label>
                            <input type="text" name="candidateName" class="form-control" id="candiatename" required>

                        </div>
                        <div class="mb-3 col">
                            <label for="candiateAge" class="form-label">Birthdate*</label>
                            <input type="date" name="candidateDOB" class="form-control" id="candiateAge" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col">
                            <label for="location" class="form-label">Current Location*</label>
                            <input type="text" name="candiateLocation" class="form-control" id="location" required>

                        </div>
                        <div class="mb-3 col">
                            <label for="c_no" class="form-label">Phone Number*</label>
                            <input type="number" name="candidatePhone" class="form-control" id="c_no" required>

                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" name="candidateEmail" class="form-control" id="email" required>

                        </div>
                        <!-- <div class="mb-3 col">
                                <label for="weburl" class="form-label">Website Link*</label>
                                <input type="text" class="form-control" id="weburl">

                            </div> -->
                        <div class="mb-3  col-md-6">
                            <label for="selectexprience" class="form-label">Exprience/Fresher*</label>
                            <select class="form-select" onchange="handleexprience(this.value)" id="selectexprience" aria-label="Default select example">
                                <option selected>Select Exprience/Fresher</option>
                                <option value="Fresher">Fresher</option>
                                <option value="Exprienced">Exprienced</option>
                            </select>
                        </div>
                        <div id="expriencehide" style="display: none;" class="row">

                            <div class="mb-3  col-md-6">
                                <label for="exprience" class="form-label">Exprience in years*</label>
                                <input type="Number" min="1" max="100" value="" placeholder="In years" class="form-control" id="exprience" name="exprience">
                            </div>

                            <div class="mb-3  col-md-6">
                                <label for="cu-job-place" class="form-label">Current Job Place(Optional)</label>
                                <input type="text" value="" class="form-control" id="cu-job-place" name="currentjob">
                            </div>
                            <div class="mb-3  col-md-6">
                                <label for="designation" class="form-label">Designation(Optional)</label>
                                <input type="text" value="" class="form-control" id="designation" name="designation">
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM `category`";
                        $result4 = $con->query($sql);
                        ?>
                        <div class="mb-3  col-md-6">
                            <label for="linkedin" class="form-label">Serching Job As a</label>
                            <select name="jobType" required onchange="handlesearchjob(this.value)" class="form-select" aria-label="Default select example">
                                <option>Search Job as</option>
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
                                <option value="Other">Other</option>
                            </select>

                        </div>
                        <div id="otherseracingjob" style="display: none;" class="mb-3  col-md-6">

                            <label for="otherseracingjob1" class="form-label">Other Serching Job As a*</label>
                            <input type="text" value="" class="form-control" id="otherseracingjob1" name="otherseracingjob">

                        </div>
                        <div class="mb-3  col-md-6">
                            <label for="qualification" class="form-label">Qualification*</label>
                            <select name="qualification" required onchange="handlequalification(this.value)" class="form-select" id="qualification" aria-label="Default select example">
                                <Option value="">Select Education</Option>
                                <?php
                                for ($i = 0; $i < count($EducationData); $i++) {
                                    echo '<option  value="' . $EducationData[$i] . '">' . $EducationData[$i] . '</option>';
                                }
                                ?>
                            </select>

                        </div>
                        <div id="otherqualification" style="display: none;" class="mb-3  col-md-6">

                            <label for="otherqualification1" class="form-label">Other Qualification*</label>
                            <input type="text" value="" class="form-control" id="otherqualification1" name="otherqualification">

                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="linkdin" class="form-label">Linkedin</label>
                            <input type="url" name="linkedInProfile" class="form-control" id="linkdin">

                        </div>
                        <div class="mb-3 col ">
                            <label for="formFile" class="form-label">Upload Resume</label>
                            <input name="candidateResume" class="form-control" required type="file" id="formFile" accept="application/pdf">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="shortdesc" class="form-label">Describe Yourself</label>
                        <textarea name="discription" class="form-control" required id="shortdesc" rows="5"></textarea>
                        <input type="hidden" name="fairId" value="<?php echo $last ?>">
                    </div>
                    <button type="submit" name="candidateData" class="btn py-2 px-3 mb-3 text-white btn-lg" style="background-color: var(--primary);" value="">Submit</button>

                </form>
            <?php
            }
            ?>
        </div>

    </div>

</section>

<div class="modal" tabindex="-1" id="submitmodal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body px-5">
                <div class="col-12  text-center">
                    <h5 class="">Shivsena Saeed Khan</h5>
                    <h6>Form submited successfully</h6>
                </div>
                Name : XYZ LMN
                <br>
                Date : 22-12-23
                <br>
                Time : 10:00 AM
                <br>
                Location : Pune <a href="">click here</a>
            </div>
            <div class="my-3 text-center">
                <button type="button" class="btn btn-primary-custom " data-bs-dismiss="modal">Done</button>

            </div>
        </div>
    </div>
</div>





<!-- footer -->
<?php include './footer.php'; ?>

<script>
    function handleexprience(value) {
        if (value === "Fresher") {
            document.getElementById("expriencehide").style.display = "none";
        } else {
            document.getElementById("expriencehide").style.display = "flex";

        }
    }

    function handlesearchjob(value) {
        if (value === "Other") {
            document.getElementById("otherseracingjob").style.display = "block";
        } else {
            document.getElementById("otherseracingjob").style.display = "none";

        }
    }

    function handlequalification(value) {
        if (value === "Other") {
            document.getElementById("otherqualification").style.display = "block";
        } else {
            document.getElementById("otherqualification").style.display = "none";

        }
    }
</script>
<!-- Plugin js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="assets/js/our-trusted-company.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="assets/js/popular-category.js"></script>
<script src="assets/js/featured-jobs-gallery.js"></script>
<script src="assets/js/users-feedback.js"></script>
</body>

</html>