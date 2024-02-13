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
    $NoData="No Data present";
}
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
                        <label for="email" class="form-label">Emial*</label>
                        <input type="email" name="candidateEmail" class="form-control" id="email" required>

                    </div>
                    <!-- <div class="mb-3 col">
                                <label for="weburl" class="form-label">Website Link*</label>
                                <input type="text" class="form-control" id="weburl">

                            </div> -->
                    <div class="mb-3 col">
                        <label for="cu-job-place" class="form-label">Current Job Place(Optional)</label>
                        <input type="text" name="currentProfile" class="form-control" id="cu-job-place">

                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="designation" class="form-label">Designation(Optional)</label>
                        <input type="text" name="candidateDesignation" class="form-control" id="designation">

                    </div>
                    <div class="mb-3 col">
                        <label for="exprience" class="form-label">Exprience*</label>
                        <input type="Number" name="exp" value="" min="0" max="99" required placeholder="In years" class="form-control" id="exprience" name="candidateExprience">
                    </div>

                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="linkedin" class="form-label">Serching Job As a</label>
                        <select name="jobType" required class="form-select" aria-label="Default select example">

                            <option selected value="Developer">Developer</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>

                    </div>
                    <div class="mb-3 col">
                        <label for="qualification" class="form-label">Qualification*</label>
                        <select name="qualification" required class="form-select" id="qualification" aria-label="Default select example">

                            <option value="10th">10th</option>
                            <option value="11th">11th</option>
                            <option value="12th">12th</option>
                            <option value="Diploma">Diploma</option>
                            <option value="ITI">ITI (Industrial Training Institute)</option>
                            <option value="BE">BE (Bachelor of Engineering)</option>
                            <option value="BA">BA (Bachelor of Arts)</option>
                            <option value="BSc">BSc (Bachelor of Science)</option>
                            <option value="BCom">BCom (Bachelor of Commerce)</option>
                            <option value="BBA">BBA (Bachelor of Business Administration)</option>
                            <option value="BCA">BCA (Bachelor of Computer Applications)</option>
                            <option value="BSW">BSW (Bachelor of Social Work)</option>
                            <option value="BFA">BFA (Bachelor of Fine Arts)</option>
                            <option value="B.Ed">B.Ed (Bachelor of Education)</option>
                            <option value="B.Tech">B.Tech (Bachelor of Technology)</option>
                            <option value="MBBS">MBBS (Bachelor of Medicine, Bachelor of Surgery)</option>
                            <option value="BDS">BDS (Bachelor of Dental Surgery)</option>
                            <option value="BHMS">BHMS (Bachelor of Homeopathic Medicine and Surgery)</option>
                            <option value="BAMS">BAMS (Bachelor of Ayurvedic Medicine and Surgery)</option>
                            <option value="BUMS">BUMS (Bachelor of Unani Medicine and Surgery)</option>
                            <option value="BNYS">BNYS (Bachelor of Naturopathy and Yogic Sciences)</option>
                            <option value="LLB">LLB (Bachelor of Laws)</option>
                            <option value="BPharm">BPharm (Bachelor of Pharmacy)</option>
                            <option value="B.VSc & AH">B.VSc & AH (Bachelor of Veterinary Science and Animal Husbandry)</option>
                            <option value="BPT">BPT (Bachelor of Physiotherapy)</option>
                            <option value="BHM">BHM (Bachelor of Hotel Management)</option>
                            <option value="BFA">BFA (Bachelor of Fine Arts)</option>
                            <option value="BPE">BPE (Bachelor of Physical Education)</option>
                            <option value="BPEd">BPEd (Bachelor of Physical Education)</option>
                            <option value="B.Des">B.Des (Bachelor of Design)</option>
                            <option value="BFA">BFA (Bachelor of Fine Arts)</option>
                            <option value="BMM">BMM (Bachelor of Mass Media)</option>
                            <option value="BBA LLB">BBA LLB (Integrated Bachelor of Business Administration and Bachelor of Laws)</option>
                            <option value="B.Arch">B.Arch (Bachelor of Architecture)</option>
                            <option value="BFA">BFA (Bachelor of Fine Arts)</option>
                            <option value="BFSc">BFSc (Bachelor of Fisheries Science)</option>
                            <option value="BFST">BFST (Bachelor of Food Science and Technology)</option>
                            <option value="BBA">BBA (Bachelor of Business Administration)</option>
                            <option value="BMS">BMS (Bachelor of Management Studies)</option>
                            <option value="BCOM">BCOM (Bachelor of Commerce)</option>
                            <option value="BCA">BCA (Bachelor of Computer Applications)</option>
                            <option value="BSW">BSW (Bachelor of Social Work)</option>
                            <option value="BPE">BPE (Bachelor of Physical Education)</option>
                            <option value="BPEd">BPEd (Bachelor of Physical Education)</option>
                            <option value="BLibSc">BLibSc (Bachelor of Library Science)</option>
                            <option value="BFA">BFA (Bachelor of Fine Arts)</option>
                            <option value="BPT">BPT (Bachelor of Physiotherapy)</option>
                            <option value="BBA">BBA (Bachelor of Business Administration)</option>
                            <option value="BHM">BHM (Bachelor of Hotel Management)</option>
                            <option value="BCA">BCA (Bachelor of Computer Applications)</option>
                            <option value="BFA">BFA (Bachelor of Fine Arts)</option>
                            <option value="BMM">BMM (Bachelor of Mass Media)</option>
                            <option value="BRTS">BRTS (Bachelor of Radiologic Technology and Science)</option>
                            <option value="BVSc & AH">BVSc & AH (Bachelor of Veterinary Science and Animal Husbandry)</option>
                            <option value="B.Des">B.Des (Bachelor of Design)</option>
                            <option value="B.Optom">B.Optom (Bachelor of Optometry)</option>
                            <option value="BOptom">BOptom (Bachelor of Optometry)</option>
                            <option value="B.El.Ed">B.El.Ed (Bachelor of Elementary Education)</option>
                            <option value="BFSc">BFSc (Bachelor of Fisheries Science)</option>
                            <option value="BFST">BFST (Bachelor of Food Science and Technology)</option>
                            <option value="BDS">BDS (Bachelor of Dental Surgery)</option>
                            <option value="BHMS">BHMS (Bachelor of Homeopathic Medicine and Surgery)</option>
                            <option value="BNYS">BNYS (Bachelor of Naturopathy and Yogic Sciences)</option>
                            <option value="BUMS">BUMS (Bachelor of Unani Medicine and Surgery)</option>
                            <option value="BA LLB">BA LLB (Integrated Bachelor of Arts and Bachelor of Laws)</option>
                            <option value="BAMS">BAMS (Bachelor of Ayurvedic Medicine and Surgery)</option>
                            <option value="BSc Nursing">BSc Nursing (Bachelor of Science in Nursing)</option>
                            <option value="BMLT">BMLT (Bachelor of Medical Laboratory Technology)</option>
                            <option value="BPT">BPT (Bachelor of Physiotherapy)</option>
                            <option value="B.Pharm">B.Pharm (Bachelor of Pharmacy)</option>
                            <option value="BTTM">BTTM (Bachelor in Travel and Tourism Management)</option>
                            <option value="BUMS">BUMS (Bachelor of Unani Medicine and Surgery)</option>
                            <option value="BNYS">BNYS (Bachelor of Naturopathy and Yogic Sciences)</option>
                            <option value="BSMS">BSMS (Bachelor of Siddha Medicine and Surgery)</option>
                            <option value="BAMS">BAMS (Bachelor of Ayurvedic Medicine and Surgery)</option>
                            <option value="BSMS">BSMS (Bachelor of Siddha Medicine and Surgery)</option>
                            <option value="BHMS">BHMS (Bachelor of Homeopathic Medicine and Surgery)</option>
                            <option value="BPT">BPT (Bachelor of Physiotherapy)</option>
                            <option value="BOptom">BOptom (Bachelor of Optometry)</option>
                            <option value="BDS">BDS (Bachelor of Dental Surgery)</option>
                            <option value="BASLP">BASLP (Bachelor in Audiology and Speech-Language Pathology)</option>
                            <option value="BAMS">BAMS (Bachelor of Ayurvedic Medicine and Surgery)</option>
                            <option value="BSc Nursing">BSc Nursing (Bachelor of Science in Nursing)</option>
                            <option value="BMLT">BMLT (Bachelor of Medical Laboratory Technology)</option>
                            <option value="BPT">BPT (Bachelor of Physiotherapy)</option>
                            <option value="B.Pharm">B.Pharm (Bachelor of Pharmacy)</option>
                            <option value="BTTM">BTTM (Bachelor in Travel and Tourism Management)</option>
                            <option value="BUMS">BUMS (Bachelor of Unani Medicine and Surgery)</option>
                            <option value="BNYS">BNYS (Bachelor of Naturopathy and Yogic Sciences)</option>
                            <option value="BSMS">BSMS (Bachelor of Siddha Medicine and Surgery)</option>
                            <option value="BASLP">BASLP (Bachelor in Audiology and Speech-Language Pathology)</option>
                            <option value="MCA">MCA (Master of Computer Applications)</option>
                            <option value="MSc">MSc (Master of Science)</option>
                            <option value="MA">MA (Master of Arts)</option>
                            <option value="MBA">MBA (Master of Business Administration)</option>
                            <option value="MBM">MBM (Master of Business Management)</option>
                            <option value="MCom">MCom (Master of Commerce)</option>
                            <option value="MSW">MSW (Master of Social Work)</option>
                            <option value="MFA">MFA (Master of Fine Arts)</option>
                            <option value="MPT">MPT (Master of Physiotherapy)</option>
                            <option value="M.Tech">M.Tech (Master of Technology)</option>
                            <option value="ME">ME (Master of Engineering)</option>
                            <option value="M.Plan">M.Plan (Master of Planning)</option>
                            <option value="M.Des">M.Des (Master of Design)</option>
                            <option value="M.Optom">M.Optom (Master of Optometry)</option>
                            <option value="MOptom">MOptom (Master of Optometry)</option>
                            <option value="M.El.Ed">M.El.Ed (Master of Elementary Education)</option>
                            <option value="M.Ed">M.Ed (Master of Education)</option>
                            <option value="MLibSc">MLibSc (Master of Library Science)</option>
                            <option value="MFA">MFA (Master of Fine Arts)</option>
                            <option value="M.Sc Nursing">M.Sc Nursing (Master of Science in Nursing)</option>
                            <option value="MMLT">MMLT (Master of Medical Laboratory Technology)</option>
                            <option value="MPT">MPT (Master of Physiotherapy)</option>
                            <option value="M.Pharm">M.Pharm (Master of Pharmacy)</option>
                            <option value="MBA">MBA (Master of Business Administration)</option>
                            <option value="MHA">MHA (Master of Health Administration)</option>
                            <option value="MHM">MHM (Master of Hotel Management)</option>
                            <option value="MSc IT">MSc IT (Master of Science in Information Technology)</option>
                            <option value="MMS">MMS (Master of Management Studies)</option>
                            <option value="PGDM">PGDM (Post Graduate Diploma in Management)</option>
                            <option value="PGP">PGP (Post Graduate Program in Management)</option>
                            <option value="MD">MD (Doctor of Medicine)</option>
                            <option value="MS">MS (Master of Surgery)</option>
                            <option value="DM">DM (Doctorate of Medicine)</option>
                            <option value="MCh">MCh (Master of Chirurgiae)</option>
                            <option value="DNB">DNB (Diplomate of National Board)</option>
                            <option value="PhD">PhD (Doctor of Philosophy)</option>
                            <option value="Other">Other</option>
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="linkdin" class="form-label">Linkedin</label>
                        <input required type="text" name="linkedInProfile" class="form-control" id="linkdin">

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


<!-- Plugin js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="assets/js/our-trusted-company.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="assets/js/popular-category.js"></script>
<script src="assets/js/featured-jobs-gallery.js"></script>
<script src="assets/js/users-feedback.js"></script>
</body>

</html>