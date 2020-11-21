<?php

require_once 'db_connect.php';

if (isset($_SESSION['user_id'])) {
	
	$id = $_SESSION['user_id'];

	$sql = "SELECT * FROM users WHERE user_id = {$id}";
	$result = $connect->query($sql);

	$data = $result->fetch_assoc();


?>



<!DOCTYPE html>
<html>
<head>
   <title>Library - Add to Inventory</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">New Animal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="update.php">Update</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="create.php">Add new Animal</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container mt-4">

<?php 

if($_POST){
  $user_id= $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_status = $_POST['user_status'];
    $user_email = $_POST['user_email'];
    
    $sql ="UPDATE users SET user_name='$user_name', user_status='$user_status', user_email='$user_email' WHERE user_id = {$user_id}";
    if($connect->query($sql)) {

        echo "<div class='alert alert-success' role='alert'>
        Updating User successful!
      </div>";
		echo "<a href='../sadmin.php'><button type='button' class='btn btn-success'>Home</button></a>";


    } else {
        echo "<br>Add to inventory not succesfull<br>";
    }

}

$connect->close();
}
?>
</body>
</html>
