<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
    header("Location: index.php");
}
$main_user = $_SESSION['username'];
$action=$_GET['action'];
if($action==1){

    $jobid='';

}else{
if (!isset($_COOKIE['jobid'])) {
    $jobid = $_GET['id'];
    setcookie("jobid", $jobid, time() + 3600, "/");
    echo "
    <script>
      alert('Refreshing Data...Press OK...');
      window.location.href='company-joblist-candidate.php';
    </script>
//   ";
} else {
    $jobid = $_COOKIE['jobid'];
}
}
// var_dump($jobid);
// return;

// var_dump($main_user);
// var_dump($jobid);

if($main_user && $jobid){
    $query = "SELECT mu.*, uc.* FROM $main_user AS mu 
    INNER JOIN users_candidate AS uc ON mu.username = uc.username 
    WHERE mu.usertype = 0 AND mu.jobid = $jobid AND mu.action = $action 
    ORDER BY mu.card DESC";
    $result = mysqli_query($con, $query);
    $filename = "Candidate_Applied.xls"; // File Name
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
if($jobid==''){
    $query = "SELECT mu.*, uc.* FROM $main_user AS mu 
    INNER JOIN users_candidate AS uc ON mu.username = uc.username 
    WHERE mu.usertype = 0 AND mu.action = $action 
    ORDER BY mu.card DESC";
    $result = mysqli_query($con, $query);
    $filename = "Candidate_Selected.xls"; // File Name
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