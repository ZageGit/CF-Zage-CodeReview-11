<?php

require_once 'actions/db_connect.php';
require_once 'helper/UserHelper.php';
if(!isLoggedIn()) {
  header("Location: login.php");
 } 
 if (!isAdmin() && !isSadmin()){
  header("Location: index.php");
}

      if ($_GET['animal_id']) {
        $animal_id = $_GET['animal_id'];
        $animal_sql = "SELECT * FROM animals WHERE animal_id = {$animal_id}";
        $animal_result = $connect->query($animal_sql);
        $animal_data = $animal_result->fetch_assoc();
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
<?php 
include 'templates/nav.php';
?>
<div class="container"> 
<h2 class="p-4">Update animal </h2>
<!-- Extended default form grid -->
<form action="actions/a_update.php" method= "post">
  <!-- Grid row -->
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" name="animal_name" class="form-control" id="inputEmail4" placeholder="Title" value="<?php echo $animal_data['animal_name'] ?>">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputPassword4">Type</label>
      <select class="form-control" id="exampleFormControlSelect1" name="animal_size">
      <option><?php echo $animal_data['animal_size'] ?></option>
      <option>small</option>
      <option>large</option>
      <option>senior</option>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">IMAGE LINK</label>
    <input type="text" name="animal_image" class="form-control" id="exampleFormControlInput1" placeholder="imagelink" value="<?php echo $animal_data['animal_image'] ?>">
  </div>

  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail4">Animal Location</label>
      <input type="text" name= "animal_location" class="form-control" id="inputEmail4" placeholder="Animal Location" value="<?php echo $animal_data['animal_location'] ?>">
    </div>

    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputPassword4">Animal Age</label>
      <input type="text" name= "animal_age" class="form-control" id="inputPassword4" placeholder="Animal Age" value="<?php echo $animal_data['animal_age'] ?>">
    </div>
  </div>
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail4">Hobbies</label>
      <input type="text" name="animal_hobbies" class="form-control" id="inputEmail4" placeholder="Animal Hobbies" value="<?php echo $animal_data['animal_hobbies'] ?>">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputPassword4">Animal Breed</label>
      <input type="text" name="animal_breed" class="form-control" id="inputPassword4" placeholder="Animal breed" value="<?php echo $animal_data['animal_breed'] ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Short Description</label>
    <textarea type="text" class="form-control"name="animal_description" id="exampleFormControlTextarea1" rows="3" ><?php echo $animal_data['animal_description'] ?></textarea>
  </div>
  <div class="form-row">
    <!-- Default input -->
    <input type="hidden" name="animal_id" value="<?php echo $animal_data['animal_id'] ?>">

    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">update</button>

</form>
    </div>
    </div>
    <nav class="navbar navbar-dark bg-dark fixed-bottom text-white mt-2">
  <a class="navbar-brand">Petadoption</a>
    <a class="nav-link" href="logout.php?logout"><button type="button" class="btn btn-danger">Logout</button></a>
</nav>

</body>
</html>

<?php
      }
     
?>