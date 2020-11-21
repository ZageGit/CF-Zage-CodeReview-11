<?php

require_once 'actions/db_connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css\style.css">

</head>
<body id="index_body">
<?php 
include 'templates/nav.php';
?>


<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <h1 class="display-4">Please adopt them</h1>
    <p class="lead">This lovely animals are looking for a place to stay, please take them!!!</p>
  </div>
</div>


<div class="container">
<h2>Small and large Animals</h2>
<div class="row d-flex justify-content-around">
<?php
          $sql = "SELECT * FROM animals WHERE animal_size='small' OR animal_size='large'";
          $result =  mysqli_query($connect, $sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo  "
                <div class='card col-3'>
                <img class='card-img-top' src='".$row['animal_image']."' alt='Card image cap'>
                  <div class='card-body'>
                    <h5 class='card-title'>".$row['animal_name']."</h5>
                    <p class='card-text'>".$row['animal_description']."</p>
                    </div>
                      <ul class='list-group list-group-flush'>
                          <li class='list-group-item'>Size: ".$row['animal_size']."</li>
                          <li class='list-group-item'>Location: ".$row['animal_location']."</li>
                      </ul>
                <div class='card-body'>
                <a href='details.php?animal_id=".$row['animal_id']."'><button type='button' class='btn btn-primary'>Details</button></a>
                </div>
            </div>
          " ;
            
              }
            } else {
              echo "No date available!";
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

