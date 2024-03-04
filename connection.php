<?php
$env = parse_ini_file('.env');
$header = $env["HEADER"];
$con = mysqli_connect(`$header`, "root", "", "job");

if (mysqli_connect_error()) {
    echo "<script>alert('cannot connect to the database');</script>";
    exit();
}
