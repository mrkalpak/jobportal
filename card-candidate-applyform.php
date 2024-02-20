<?php include './header.php'; ?>
<?php include './navbar.php' ?>
<?php
    require('connection.php');
    // print_r($_GET['job']);
    $query = "SELECT * FROM admin_jobpost where id=".$_GET['job']."";
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();
    $today=date("Y-m-d");

    $EducationData=[
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
?>
<div class="container">
    <div class="topimg d-flex justify-content-center">
        <!-- jobpost banner -->
        <img src="./assets/images/image 5.png" height="100px" class="" alt="">
    </div>
    <!-- heading -->
    <?php
    if($row>0){
    if( $today==$row['applyTill'] || $today<$row['applyTill'] ){
    ?>
    <h3 class="text-center mt-3"><?php echo $row['companyName']?></h3>
    
    <h5 class="text-center"><?php echo $row['jobTitle']?></h5>
    <?php
        }
    }
    ?>
    <?php
    if($row>0){
    if( $today==$row['applyTill'] || $today<$row['applyTill'] ){
    ?>
    <div class="border mt-5">
        <form action="./postdata.php" method="POST" enctype= multipart/form-data name="cardCandidate" class=" px-5">
            <div class="row mt-3">

                <div class="mb-3 col">
                    <label for="candiatename" class="form-label">Name*</label>
                    <input type="text" required name="candiatename" class="form-control" id="candiatename">

                </div>
                <div class="mb-3 col">
                    <label for="birthdate" class="form-label">Birth date*</label>
                    <input type="date" required class="form-control" name="birthdate" id="birthdate">
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col">
                    <label for="location" class="form-label">Current Location*</label>
                    <input type="text" required class="form-control" name="location" id="location">

                </div>
                <div class="mb-3 col">
                    <label for="c_no" class="form-label">Phone Number*</label>
                    <input type="number" required class="form-control" name="c_no" id="c_no">

                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="email" class="form-label">Email*</label>
                    <input type="email" required class="form-control" name="email" id="email">

                </div>
                <!-- <div class="mb-3 col">
                                <label for="weburl" class="form-label">Website Link*</label>
                                <input type="text" class="form-control" id="weburl">

                            </div> -->
                <div class="mb-3 col">
                    <label for="cu-job-place" class="form-label">Current Job Place(Optional)</label>
                    <input type="text" class="form-control" name="cu-job-place" id="cu-job-place">

                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="designation" class="form-label">Designation(Optional)</label>
                    <input type="text" class="form-control" name="designation" id="designation">

                </div>
                <div class="mb-3 col">
                    <label for="qualification" class="form-label">Qualification*</label>
                    <input type="number" value="<?php echo $_GET['job']?>" class="form-control" id="jobId" required name="jobId" hidden>
                    <select name="qualification" required class="form-select" id="qualification" aria-label="Default select example">
                        <Option value="">Select Education</Option>
                        <?php
                            for($i=0;$i<count($EducationData);$i++){
                                echo '<option  value="'.$EducationData[$i].'">'.$EducationData[$i].'</option>';
                            }
                        ?>  
                        </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="linkdin" class="form-label">Linkedin</label>
                    <input type="link" required name="linkedIn" class="form-control" id="linkdin">

                </div>
                <div class="mb-3 col">
                    <label for="exprience" class="form-label">Exprience*</label>
                    <input type="Number" required min="0" max="100"  placeholder="In years" class="form-control" id="exprience" name="exprience">
                </div>
            </div>
            <div class="mb-3 col">
                <label for="formFile" class="form-label">Upload Resume*</label>
                <input required class="form-control" required name="cardCandidateResume" type="file" id="formFile" accept="application/pdf">
            </div>


            <div class="mb-3">
                <label for="shortdesc" class="form-label">Describe Yourself</label>
                <textarea class="form-control" required name="describeYourSelf" id="shortdesc" rows="5"></textarea>
            </div>
            <button type="submit" name="cardCandidate" class="btn py-2 px-3 mb-3 text-white btn-lg" style="background-color: var(--primary);" value="">Apply</button>

        </form>
    </div>
    <?php
}
else{
?>
<section class="paddingTB60 job-details">
    <div class="container">
        <div class="row">
            
         <?php echo "Job Expired";?>
          
        </div>
    </div>
</section>

<?php
}
}
else{
?>
<section class="paddingTB60 job-details">
    <div class="container">
        <div class="row">
            
         <?php echo "No Job Found";?>
          
        </div>
    </div>
</section>
<?php
}
?>

</div>
</div>
</div>
<?php include './footer.php'; ?>