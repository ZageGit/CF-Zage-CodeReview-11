<?php
ob_start();
session_start();

require_once 'actions/db_connect.php';
echo "</br> delete.php";

if( !isset($_SESSION['admin']) && !isset($_SESSION['user'])  && !isset($_SESSION['s_admin']) ) {
    header("Location: login.php");
    exit;
   } 
   if (isset($_SESSION['user'])){
       header("Location: index.php");
   }
   if (isset($_SESSION['user_id'])) {
	
	$id = $_SESSION['user_id'];

	$sql = "SELECT * FROM users WHERE user_id = {$id}";
	$result = $connect->query($sql);

	$data = $result->fetch_assoc();


?>