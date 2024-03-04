<?php
$env = parse_ini_file('.env');
$header = $env["HEADER"];
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
    header("Location: index.php");
}
$main_user = $_SESSION['username'];



$query6 = "SELECT mu.*, uc.* FROM $main_user AS mu 
        INNER JOIN users_candidate AS uc ON mu.username = uc.username 
        WHERE mu.usertype = 0  AND mu.action = 1 
        ORDER BY mu.card DESC";

$result6 = mysqli_query($con, $query6);
?>

<?php include './header.php'; ?>

<!-- page -->
<link rel="stylesheet" href="./assets/css/company-dashboard.css">
<link rel="stylesheet" href="./assets/css/company-joblist.css">
<!-- navbar -->
<?php include './profileNavbar.php'; ?>

<!-- comapany Navbar -->
<?php
$activePage = "candidatelist";
include './company-navbar.php';
?>

<div class="container mt-3">

    <div class="col fs-4 fw-semibold">
        Selected Candidates
    </div>

    <div class="col d-flex justify-content-end">
        <a href="./companyExportExcel.php?action=1"><button id="downloadexcel" class="btn btn-dark" type="button" style="background:#4A0063;">Export to Excel</button></a>
    </div>
</div>
<?php

    if (mysqli_num_rows($result6) > 0) {
        while ($row = mysqli_fetch_assoc($result6)) {
            // var_dump($row['jobid']);
            $jobPostion="SELECT jobtitle FROM jobs WHERE jobid=".$row['jobid']."";
            $postion = mysqli_query($con, $jobPostion);
            if (mysqli_num_rows($postion) > 0) {
                while ($rowData = mysqli_fetch_assoc($postion)) {
                    $selectedFor=$rowData["jobtitle"];
                }
            }

    ?>
            <!-- Your candidate information display code here -->
            <div class="border border-1 candidate-card mt-3 rounded ms-auto me-auto p-3">
                <div class="row">
                    <div class="col fw-bold">
                        <?= $row['name'] ?> &nbsp; &nbsp;


                        <!-- ----code for card or not----- -->
                        <?php
                        if ($row['card'] == true) { ?>
                            <i class="bi bi-star-fill text-warning"></i>
                        <?php } ?>



                    </div>
                    <?php
                    if (!$row['resume'] == null) { ?>
                        <div class="col d-flex justify-content-end">
                            <a href="uploaddocs/.<?php echo $row['resume']; ?>" target="_blank" class="btn btn-sm btn-outline-secondary ">
                                <i class="bi bi-download"></i>&nbsp;
                                Resume
                            </a>
                        </div>
                        </a>
                    <?php } else { ?>

                        <div class="col d-flex justify-content-end">
                            <!-- <a href="uploaddocs/.<?php echo $row['resume']; ?>" target="_blank" class="btn btn-sm btn-outline-secondary "> -->
                            <i class="bi bi-download"></i>&nbsp;
                            Pending
                            </a>
                        </div>
                    <?php
                    } ?>
                </div>

                <div class="row">
                    <div class="col-md-8 row text-secondary">
                        <div class="col-auto"><span class="badge bg-secondary ">Fresher</span></div>
                        <div class="col-auto"> <i class="bi bi-geo-alt-fill"></i> <?php echo $row['location']; ?> </div>

                        <div class="col-auto">

                        Birth Date :<?php echo $row['age']; ?> .</div>
                    </div>
                </div>



                <div class="row mt-2 col-md-11">
                    <div class="col-md-2">
                        <i class="bi bi-mortarboard-fill"></i>&nbsp; Qualification :
                    </div>
                    <div class="col-auto">
                        <?php echo $row['qualification']; ?>
                    </div>
                </div>
                <div class="row mt-2 col-md-11">
                    <div class="col-md-2">
                        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 6.32247V0H0V6.32247C0 6.58498 0.18 6.83248 0.49 6.96748L4.67001 8.84997L3.68001 10.605L0.27 10.8225L2.85999 12.5025L2.07 15L5.00001 13.6725L7.93 15L7.15 12.5025L9.74001 10.8225L6.33 10.605L5.34 8.84997L9.52 6.96748C9.82 6.83248 10 6.59247 10 6.32247ZM6 7.67247L5.00001 8.12247L4 7.67247V0.750001H6V7.67247Z" fill="black" />
                        </svg>
                        </i>
                        &nbsp; Domain :
                    </div>
                    <div class="col-auto">
                        <?php echo $row['category']; ?>
                    </div>
                </div>
                <div class="row mt-2 col-md-11">
                    <div class="col-md-2">
                        <i class="bi bi-telephone-fill"></i>&nbsp; Phone Number :
                    </div>
                    <div class="col-auto">
                        <?php echo $row['phone']; ?>
                    </div>
                </div>
                <div class="row mt-2 col-md-11">
                    <div class="col-md-2">
                        <i class="bi bi-envelope-fill"></i>&nbsp; Email :
                    </div>
                    <div class="col-auto">
                        <?php echo $row['email']; ?>
                    </div>
                </div>


                <div class="row mt-2 col-md-11 bg-light">
                    <div class="col-md-2">
                        <i class="bi bi-card-text"></i>&nbsp; Description :
                    </div>
                    <div class="col-auto">
                        <?php echo $row['description']; ?>
                    </div>
                </div>
                <div class="row mt-2 col-md-11">
                    <div class="col-md-2">
                    <i class="bi bi-crosshair"></i>&nbsp; Selected for :
                        
                    </div>
                    <div class="col-auto">
                        <?=$selectedFor?>
                    </div>
                </div>


            </div>


<?php
        }
    } else {
        echo "No matching records found.";
    }
?>
</div>

<!-- footer -->
<?php include './footer.php'; ?>

<!-- Script to export to Excel -->
<script>
    document.getElementById('downloadexcel').addEventListener('click', function() {
        var candidates = [];
        var candidateElements = document.querySelectorAll(".candidate-card");

        var domain = `<?=$header;?>`;
console.log(domain);
        // Loop through candidate elements and extract data
        candidateElements.forEach(function(candidateElement) {
            var candidateData = {};
            // Extract and populate candidate data here
            candidateData.name = candidateElement.querySelector(".col.fw-bold").textContent.trim();
            var resumeLink = candidateElement.querySelector("a.btn.btn-sm.btn-outline-secondary").getAttribute("href");
            candidateData.resumeLink = domain + resumeLink;
            var phoneElement = candidateElement.querySelector(".row.mt-2.col-md-11");
            // Extract Phone Number
            var phoneElement = candidateElement.querySelector(".bi-telephone-fill").parentNode.nextElementSibling;
            candidateData["Phone Number"] = phoneElement ? phoneElement.textContent.trim() : '';

            // Extract Email
            var emailElement = candidateElement.querySelector(".bi-envelope-fill").parentNode.nextElementSibling;
            candidateData["Email"] = emailElement ? emailElement.textContent.trim() : '';

            // Extract Description
            var descriptionElement = candidateElement.querySelector(".bi-card-text").parentNode.nextElementSibling;
            candidateData["Description"] = descriptionElement ? descriptionElement.textContent.trim() : '';
            // Extract Qualification
            var qualificationElement = candidateElement.querySelector(".bi-mortarboard-fill").parentNode.nextElementSibling;
            candidateData["Qualification"] = qualificationElement ? qualificationElement.textContent.trim() : '';
            // Extract Location
            var locationElement = candidateElement.querySelector(".col-auto:has(.bi-geo-alt-fill)");
            var locationText = locationElement ? locationElement.textContent.trim().replace('Location', '') : '';
            candidateData["Location"] = locationText;










            // Extract Location
            var locationElement = candidateElement.querySelector(".bi.bi-geo-alt-fill + div");
            if (locationElement) {
                candidateData.location = locationElement.textContent.trim();
            }

            // Extract Age
            var ageElement = candidateElement.querySelector(".col-md-8.row.text-secondary .col-auto:nth-child(3)");
            if (ageElement) {
                // Extract the text content
                var ageText = ageElement.textContent.trim();

                // Use a regular expression to extract the age
                var ageMatch = ageText.match(/Age\s*:\s*(\d+)/);

                if (ageMatch) {
                    candidateData.age = ageMatch[1]; // Extracted age
                }
            }







            candidates.push(candidateData);
        });

        // Create a worksheet and populate it with the data
        var ws = XLSX.utils.json_to_sheet(candidates);

        // Create a workbook and add the worksheet to it
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Candidates");

        // Save the workbook as an Excel file
        XLSX.writeFile(wb, "selected_candidates.xlsx");
    });
</script>
<!-- <script src="./assets/js/showrows.js"></script> -->

 