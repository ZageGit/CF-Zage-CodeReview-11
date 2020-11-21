<?php

require_once 'actions/db_connect.php';
require_once 'helper/UserHelper.php';

if(!isLoggedIn()) {
  header("Location: login.php");
 } 
 if (!isSadmin()){
  header("Location: index.php");
}

      if ($_GET['user_id']) {
        $user_id = $_GET['user_id'];
        $user_sql = "SELECT * FROM users WHERE user_id = {$user_id}";
        $user_result = $connect->query($user_sql);
        $user_data = $user_result->fetch_assoc();
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
<h2 class="p-4">Update user </h2>
<!-- Extended default form grid -->
<form action="actions/a_user_update.php" method= "post">
  <!-- Grid row -->
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" name="user_name" class="form-control" id="inputEmail4" placeholder="Title" value="<?php echo $user_data['user_name'] ?>">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputPassword4">Status</label>
      <select class="form-control" id="exampleFormControlSelect1" name="user_status">
      <option><?php echo $user_data['user_status'] ?></option>
      <option>user</option>
      <option>admin</option>
      <option>s_admin</option>
    </select>
    </div>
  </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail4">user_email</label>
      <input type="text" name="user_email" class="form-control" id="inputEmail4" placeholder="User-Email" value="<?php echo $user_data['user_email'] ?>">
    </div>
    <!-- Default input -->
  <div class="form-row">
    <!-- Default input -->
    <input type="hidden" name="user_id" value="<?php echo $user_data['user_id'] ?>">

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