<?php
ob_start();
session_start();

require_once 'actions/db_connect.php';
ob_start();
session_start();

if( !isset($_SESSION['admin']) && !isset($_SESSION['user'])  && !isset($_SESSION['s_admin']) ) {
    header("Location: login.php");
    exit;
   } 
   if (isset($_SESSION['user'])){
       header("Location: index.php");
   }


	$sql = "SELECT * FROM animals";
	$result = $connect->query($sql);
	$data = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page | </title>

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
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="container">
           <?php 

$sql = "SELECT * from animals";
$result =  mysqli_query($connect, $sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     echo  "
<ul class='list-group list-group-flush'>
  <li class='list-group-item'>1. ID: ".$row['animal_id']." </li>
  <li class='list-group-item'>2. type: ".$row['animal_size']." </li>
  <li class='list-group-item'>3. title: ".$row['animal_name']." </li>
  <li class='list-group-item'>4. author: ".$row['animal_image']." </li>
  <li class='list-group-item'>5. ISBN: ".$row['animal_descripton']." </li>
  <li class='list-group-item'>6. publishing date: ".$row['animal_location']." </li>
  <li class='list-group-item'>7. publisher: ".$row['animal_age']." </li>
  <li class='list-group-item'>8. publisher address: ".$row['animal_hobbies']." </li>
  <li class='list-group-item'>9. publisher size: ".$row['animal_breed']." </li>
</ul>
" ;

  }
} else {
   echo "No data available!";
}

           ?>
</div>
<nav class="navbar navbar-dark bg-dark sticky-bottom text-white mt-2">
  <a class="navbar-brand">PetAdoption</a>
    <a class="nav-link" href="logout.php?logout"><button type="button" class="btn btn-danger">Logout</button></a>
</nav>

</body>
</html>




