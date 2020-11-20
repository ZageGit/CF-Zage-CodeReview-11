<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );


$localhost = "localhost";
$username ="root";
$password = "";
$dbname = "cr11_zage_petadoption";




$connect = new mysqli ($localhost, $username,$password, $dbname);


if($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}