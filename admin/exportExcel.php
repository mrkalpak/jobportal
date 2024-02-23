<?php
    require('connection.php');
    session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}
$username = $_SESSION['username'];
    $url= $_SERVER['REQUEST_URI'];  
    $urlArray = explode('=',$url);
    $last = $urlArray[sizeof($urlArray)-1];
    if(isset($_GET['AppliedCandidate'])){
        $query = "SELECT * FROM cardcandidate Where jobId=".$last."";
        $result = mysqli_query($con, $query);
    
        $query2 = "SELECT * FROM admin_jobpost Where id=".$last."";
        $result2 = mysqli_query($con, $query2);
        $jobName=$result2->fetch_assoc();
        if($jobName>0){
            $filename = "Candidate_Applied_For-".$jobName['companyName'].".xls"; // File Name
        }
        // Download file
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");
    
        $flag = false;
        while ($row = $result->fetch_assoc()) {
            if (!$flag) {
                // display field/column names as first row
                echo implode("\t", array_keys($row)) . "\r\n";
                $flag = true;
            }
            echo implode("\t", array_values($row)) . "\r\n";
        }
    }else{
        $query = "SELECT * FROM job_faircandidate Where fairId=".$last."";
        $result = mysqli_query($con, $query);
    
        $query2 = "SELECT * FROM job_fair Where id=".$last."";
        $result2 = mysqli_query($con, $query2);
        $jobName=$result2->fetch_assoc();
        if($jobName>0){
            $filename = "Candidate_Applied_For-".$jobName['fairName'].".xls"; // File Name
        }
        // Download file
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");
    
        $flag = false;
        while ($row = $result->fetch_assoc()) {
            if (!$flag) {
                // display field/column names as first row
                echo implode("\t", array_keys($row)) . "\r\n";
                $flag = true;
            }
            echo implode("\t", array_values($row)) . "\r\n";
        }

    }
   
?>