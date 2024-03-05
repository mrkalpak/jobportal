<?php

$env = parse_ini_file('.env');

session_start();
session_unset();
session_destroy();
if($_SERVER['SERVER_PORT']==443) {
    header("location: ".$env['MySQL_SERVER_DB_HOST']."");
}
else {
    header("location: ".$env['HEADER']."");
}
