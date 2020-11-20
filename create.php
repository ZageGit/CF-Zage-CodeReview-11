<?php
ob_start();
session_start();

require_once 'actions/db_connect.php';
echo "</br> create.php";
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

<!DOCTYPE html>
<html>
<head>
   <title>Petadoption - Add Animal</title>
    
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

<div class="container"> 
<h2 class="p-4">Add a new animal to petadoption</h2>
<!-- Extended default form grid -->
<form action="actions/a_create.php" method= "post">
  <!-- Grid row -->
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" name="animal_name" class="form-control" id="inputEmail4" placeholder="Title">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputPassword4">Type</label>
      <select class="form-control" id="exampleFormControlSelect1" name="animal_size">
      <option>small</option>
      <option>large</option>
      <option>senior</option>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">IMAGE LINK</label>
    <input type="text" name="animal_image" class="form-control" id="exampleFormControlInput1" placeholder="imagelink">
  </div>

  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail4">Animal Location</label>
      <input type="text" name= "animal_location" class="form-control" id="inputEmail4" placeholder="Animal Location">
    </div>

    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputPassword4">Animal Age</label>
      <input type="text" name= "animal_age" class="form-control" id="inputPassword4" placeholder="Animal Age">
    </div>
  </div>
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail4">Hobbies</label>
      <input type="text" name="animal_hobies" class="form-control" id="inputEmail4" placeholder="Animal Hobbies">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputPassword4">Animal Breed</label>
      <input type="text" name="animal_breed" class="form-control" id="inputPassword4" placeholder="Animal breed">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Short Description</label>
    <textarea type="text" class="form-control"name="short_description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-row">
    <!-- Default input -->

</form>


    </div>
    </div>
    <nav class="navbar navbar-dark bg-dark fixed-bottom text-white mt-2">
  <a class="navbar-brand">Petadoption</a>
    <a class="nav-link" href="logout.php?logout"><button type="button" class="btn btn-danger">Logout</button></a>
</nav>

</body>
</html>