<?php
ob_start();
session_start();

require_once 'actions/db_connect.php';
echo "</br> sadmin.php";

if( !isset($_SESSION['admin']) && !isset($_SESSION['user'])  && !isset($_SESSION['s_admin']) ) {
    header("Location: login.php");
    exit;
   } 
   if (!isset($_SESSION['s_admin'])){
       header("Location: index.php");
   }

?>