<?php
ob_start();
session_start();

require_once 'actions/db_connect.php';
echo "</br> update.php";

if (isset($_SESSION['user_id'])) {
	
	$id = $_SESSION['user_id'];

	$sql = "SELECT * FROM users WHERE user_id = {$id}";
	$result = $connect->query($sql);

	$data = $result->fetch_assoc();

?>