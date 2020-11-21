<?php

require_once 'actions/db_connect.php';
echo "</br> delete.php";

// if(isset($_SESSION['user_id']))  {
//     header("Location: login.php");
//     exit;
//    } 
//    if (isset($_SESSION['user'])){
//        header("Location: index.php");
//    }

// getting user ID from $_SESSION to display values of logged in User
   if (isset($_SESSION['user_id'])) {
	$id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = {$id}";
	$result = $connect->query($sql);
	$data = $result->fetch_assoc();
?>

<html>
<head>
   <title >Delete meal</title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

<div class="container">
<div class="alert alert-danger mt-4 mb-4" role="alert">
Do you really want to delete this item from the Inventory?
</div>
<div class="row d-flex justify-content-center">

<?php if ($_GET['animal_id']) {
	
	$id = $_GET['animal_id'];
   $sql = "SELECT * from animals WHERE animal_id = {$id}";
   $result =  mysqli_query($connect, $sql);


if ($result->num_rows > 0) {
    while($row= $result->fetch_assoc()) {
       echo  "
       <div class='card col-3'>
       <img class='card-img-top' src='".$row['animal_image']."' alt='Card image cap'>
         <div class='card-body'>
           <h5 class='card-title'>".$row['animal_name']."</h5>
           <p class='card-text'>".$row['animal_description']."</p>
           </div>
             <ul class='list-group list-group-flush'>
             <li class='list-group-item'>Size: ".$row['animal_size']."</li>
             <li class='list-group-item'>Breed: ".$row['animal_breed']."</li>
          </ul>
       <div class='card-body'>
       <form action ='actions/a_delete.php' method='post'>
   <input type='hidden' name= 'animal_id' value='". $row['animal_id']."' />
   <button type='submit' class='btn btn-success'>Yes, delete</button>
   <a href='admin_update.php'><button type='button' class='btn btn-danger'>Go back</button></a>
</form>

  " ;
    }
  } else {
     echo "No date available!";
  }
  

?>



       </div>
   </div>
</div>
</div>
<nav class="navbar navbar-dark bg-dark sticky-bottom text-white mt-2">
  <a class="navbar-brand">XTREME LIBRARY</a>
    <a class="nav-link" href="logout.php?logout"><button type="button" class="btn btn-danger">Logout</button></a>
</nav>

</body>
</html>


<?php
}
   }
?>