<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'admin')) {
    header("Location: ../index.php");
}
$main_user = $_SESSION['username'];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $getEmail = "SELECT email from company WHERE `username` ='$username'";
    $data = mysqli_query($con, $getEmail);
    $sendJobAccpetanceMail = mysqli_fetch_assoc($data);
    if(isset($_POST['email'])){
        $email= $_POST['email'];
    }else{
        $email=$sendJobAccpetanceMail['email'];
        $id=$_POST['jobId'];
    }
    if($action=='Accept'){
        $takeAction=1;
        $subject="Approval Mail";
        $body="Your Company Approved By Admin";
        $table='company';
    }elseif($action=='Reject'){
        $takeAction=2;
        $subject="Rejection Mail";
        $body="Your Company Rejected By Admin";
        $table='company';
    }elseif($action=='Accept Job'){
        $takeAction=1;
        $subject="Job Approval Mail";
        $body="Your Company's Posted Job Approved By Admin";
        $table='jobs';
    }else{
        $takeAction=2;
        $subject="Job Rejection Mail";
        $body="Your Company's Posted Job Rejected By Admin";
        $table='jobs';
    }
    $to_email = $email;
    $subject = $subject;
    $body = $body;
    $headers = "From: nm371136@gmail.com";  
    if (mail($email, $subject, $body, $headers)) {
        if($table=='company'){
            $update = "UPDATE $table SET `active` = '$takeAction'  WHERE `username` ='$username'";
        }else{
            $update = "UPDATE $table SET `active` = '$takeAction'  WHERE `username` ='$username' AND `jobid`='$id'";
        }
        $run = mysqli_query($con, $update);
        echo 'Mail Sent';
    } else {
        
        if($table=='company'){
            $update = "UPDATE $table SET `active` = 0  WHERE `username` ='$username'";
        }else{
            $update = "UPDATE $table SET `active` = 0  WHERE `username` ='$username' AND `jobid`='$id'";
        }
        $run = mysqli_query($con, $update);
        echo "Mail Not Sent";
    }
}
?>