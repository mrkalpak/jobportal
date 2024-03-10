<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'stud')) {
    header("Location: index.php");
}
$username = $_SESSION['username'];
// $username='user09162023124154';
?>

<?php include './header.php'; ?>

<!-- page -->
<link rel="stylesheet" href="./assets/css/candiate-myprofile.css">
<link rel="stylesheet" href="./assets/css/candiate-sidebar.css">

<!-- navbar  -->
<?php include './profileNavbar.php'; ?>

<div id="button-side-nav-bar" class="">

</div>
<section>

    <div class="row w-100">


        <?php
        $activePage = 'myprofile';
        $query = "SELECT  `age`, `location`, `phone`, `qualification`, `experience_level`, `category`, `resume`, `description` FROM users_candidate WHERE username = ?";
        $stmt = $con->prepare($query);

        if ($stmt) {
            $stmt->bind_param("s", $username);
            $username = $_SESSION['username']; // Assuming you have a 'username' session variable

            $stmt->execute();
            $stmt->bind_result($age, $location, $phone, $qualification, $experience_level, $category, $resume, $description);
            $stmt->fetch();
            $stmt->close();

            if (
                empty($age) ||
                empty($location) || empty($phone) ||
                empty($qualification) ||
                !isset($experience_level) ||
                empty($category) || empty($resume) || empty($description)
            ) {
                // -----2 nd nav-----
                include './candidate-sidenavbar2.php';
            } else {

                include './candidate-sidenavbar.php';
            }
        }
        ?>

        <?php
        $sql1 = "SELECT * FROM users_candidate  WHERE username='$username' ";
        $query1 = mysqli_query($con, $sql1);
        $result_fetch1 = mysqli_fetch_assoc($query1);
        $row1 = mysqli_num_rows($query1);
        ?>


        <div class="col ms-4">
            <h4 class="mt-3 mb-5 fw-normal">
                My Profile
            </h4>
            <div class="custom-border ms-auto me-auto">
                <form action="login_register.php" method="POST" enctype="multipart/form-data" class="px-5">
                    <div class="row mt-3">
                        <div class="mb-3  col-md-6">
                            <label for="candiatename" class="form-label">Name*</label>
                            <input type="text" value="<?= $result_fetch1['name'] ?>" class="form-control" id="candiatename" name="name">
                        </div>
                        <div class="mb-3  col-md-6">
                            <label for="candiateage" class="form-label">Birthdate*</label>
                            <input type="date" value="<?= $result_fetch1['age'] ?>" class="form-control" id="candiateage" name="age">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3  col-md-6">
                            <label for="location" class="form-label">Current Location*</label>
                            <input type="text" value="<?= $result_fetch1['location'] ?>" class="form-control" id="location" name="location">
                        </div>
                        <div class="mb-3  col-md-6">
                            <label for="c_no" class="form-label">Phone Number*</label>
                            <input type="number" value="<?= $result_fetch1['phone'] ?>" class="form-control" id="c_no" name="phone">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3  col-md-6">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" class="form-control" value="<?= $result_fetch1['email'] ?>" id="email" name="email" disabled>
                        </div>

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
                                <input type="Number" min="1" max="100" value="<?= $result_fetch1['experience_level'] ?>" placeholder="In years" class="form-control" id="exprience" name="exprience">
                            </div>

                            <div class="mb-3  col-md-6">
                                <label for="cu-job-place" class="form-label">Current Job Place(Optional)</label>
                                <input type="text" value="<?= $result_fetch1['currentjob'] ?>" class="form-control" id="cu-job-place" name="currentjob">
                            </div>
                            <div class="mb-3  col-md-6">
                                <label for="designation" class="form-label">Designation(Optional)</label>
                                <input type="text" value="<?= $result_fetch1['designation'] ?>" class="form-control" id="designation" name="designation">
                            </div>

                        </div>

                    </div>
                    <?php
                    $sql = "SELECT * FROM `category`                        ";
                    $result4 = $con->query($sql);
                    ?>
                    <div class="row">
                        <div class="mb-3  col-md-6">
                            <label for="linkedin" class="form-label">Serching Job As a</label>
                            <input type="text" value="<?= $result_fetch1['category'] ?>" class="form-control" id="designation" name="category1" hidden>
                            <select value="<?= $result_fetch1['category'] ?>" onchange="handlesearchjob(this.value)" class="form-select" name="category" aria-label="Default select example">
                                <option selected value=""><?= $result_fetch1['category']; ?></option>
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
                            <label for="linkedin" class="form-label">Qualification*</label>
                            <input type="text" value="<?= $result_fetch1['qualification'] ?>" class="form-control" id="designation" name="qualification1" hidden>
                            <select value="<?= $result_fetch1['qualification'] ?>" onchange="handlequalification(this.value)" class="form-select" aria-label="Default select example" name="qualification">

                                <option selected value=""><?= $result_fetch1['qualification']; ?></option>

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
                        <div id="otherqualification" style="display: none;" class="mb-3  col-md-6">

                            <label for="otherqualification1" class="form-label">Other Qualification*</label>
                            <input type="text" value="" class="form-control" id="otherqualification1" name="otherqualification">

                        </div>

                    </div>

                    <div class="row ">
                        <div class="mb-3  col-md-6 ">
                            <label for="formFile" class="form-label">Upload Resume</label>
                            <input class="form-control" type="file" id="formFile" accept="application/pdf" name="file">
                            <?php
                            if (!$result_fetch1['resume'] == null) { ?>
                                Your uploaded resume : <a href="uploaddocs/.<?php echo $result_fetch1['resume']; ?>" target="_blank"><?= $result_fetch1['name'] ?></a>
                            <?php }
                            ?>
                        </div>

                        <div class="mb-3  col-md-6">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input type="text" value="<?= $result_fetch1['linkedin'] ?>" class="form-control" name="linkedin" id="linkedin">

                        </div>
                        <!-- <div class="mb-3 col">
                                    <label for="pinterest" class="form-label">Pinterest</label>
                                    <input type="text" class="form-control" id="pinterest">

                                </div> -->
                    </div>



                    <div class="mb-3">
                        <label for="shortdesc" class="form-label">Description Yourself</label>
                        <textarea class="form-control" id="shortdesc" rows="5" name="description"><?php echo $result_fetch1['description']; ?></textarea>
                    </div>



                    <button type="submit" name="update" class="btn py-2 px-3 col-md-2 mb-3 text-white btn-lg" style="background-color: var(--primary);" name="update">Update Change</button>
                </form>

            </div>

        </div>
    </div>


</section>
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
<script src="./assets/js/candidate-sidenavbar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="assets/js/job-details.js"></script>
</body>

</html>