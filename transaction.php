<?php
require('connection.php');
session_start();
if (empty($_SESSION['username']) || ($_SESSION['type'] != 'comp')) {
    header("Location: index.php");
}
$main_user = $_SESSION['username'];
$action=$_GET['action'];
if (!isset($_COOKIE['jobid'])) {
    $jobid = $_GET['id'];
    setcookie("jobid", $jobid, time() + 3600, "/");

    echo "
    <script>
      alert('Refreshing Data...Press OK...');
      window.location.href='company-joblist-candidate.php';
    </script>
  ";
} else {
    $jobid = $_COOKIE['jobid'];
}

function checkAmount(){

}

// Function to add funds to user's wallet
function addFunds($userId, $amount) {
    // Add funds to user's wallet in the database
}

// Function to deduct funds from user's wallet
function deductFunds($userId, $amount) {
    // Deduct funds from user's wallet in the database
}

// Function to get user's wallet balance
function getWalletBalance($userId) {
    // Retrieve user's wallet balance from the database
}

// Function to record transaction
function recordTransaction($userId, $type, $amount) {
    // Record transaction in the database
}
?>