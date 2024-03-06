<?php
date_default_timezone_set("Asia/Calcutta");
error_reporting(E_ALL); ini_set('display_errors', 1);
$env = parse_ini_file('../.env');
// print_r($_SERVER['SERVER_PORT']);
if($_SERVER['SERVER_PORT']==443) {
    $con = mysqli_connect(`$env[HEADER_SERVER]`, $env['MySQL_SERVER_DB_USER_NAME'], $env['MySQL_SERVER_DB_PASSWORD'], $env['MySQL_SERVER_DB_NAME']);

    if (mysqli_connect_error()) {
        echo "<script>alert('cannot connect to the database');</script>";
        exit();
    }
}
else {
    $con = mysqli_connect(`$env[HEADER]`, $env['MySQL_LOCAL_DB_USER_NAME'], $env['MySQL_LOCAL_DB_PASSWORD'], $env['MySQL_LOCAL_DB_NAME']);

    if (mysqli_connect_error()) {
        echo "<script>alert('cannot connect to the database');</script>";
        exit();
    }
}



