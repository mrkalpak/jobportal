<?php
$env = parse_ini_file('../.env');

if(strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https') {
    $con = mysqli_connect(`$env[MySQL_SERVER_DB_HOST]`, $env['MySQL_SERVER_DB_USER_NAME'], $env['MySQL_SERVER_DB_PASSWORD'], $env['MySQL_SERVER_DB_NAME']);

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