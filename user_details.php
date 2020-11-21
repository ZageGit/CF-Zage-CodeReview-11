<?php

require_once 'actions/db_connect.php';
require_once 'helper/UserHelper.php';

if(!isLoggedIn()) {
  header("Location: login.php");
 } 
 if (!isSadmin()){
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"  crossorigin="anonymous">
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
<h2>User Admnistration</h2>
<div class="row">
<?php
if ($_GET['user_id']) {
	
	$id = $_GET['user_id'];


   $sql = "SELECT * FROM users WHERE user_id = {$id}";
   $result =  mysqli_query($connect, $sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo  "
                <div class='card col-3'>
                <img class='card-img-top' src='https://cdn.pixabay.com/photo/2018/04/18/18/56/user-3331257_960_720.png' alt='Card image cap'>
                  <div class='card-body'>
                    <h5 class='card-title'>".$row['user_name']."</h5>
                    <p class='card-text'>".$row['user_email']."</p>
                    </div>
                    <div>
                    <a href='user_update.php?user_id=".$row['user_id']."'><button type='button' class='btn btn-primary'>Update</button></a>
                    <a href='user_delete.php?user_id=".$row['user_id']."'><button type='button' class='btn btn-danger'>Delete</button></a>                  
                    </div>
            </div>
          " ;
            
              }
            } else {
              echo "No data available!";
            }
?>
</div>
</div>

<nav class="navbar navbar-dark bg-dark sticky-bottom text-white mt-2">
  <a class="navbar-brand">PetAdoption</a>
    <a class="nav-link" href="logout.php?logout"><button type="button" class="btn btn-danger">Logout</button></a>
</nav>
   
</body>
</html>

<?php
}
?>