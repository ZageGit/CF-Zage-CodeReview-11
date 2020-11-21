<?php 
require_once 'helper/UserHelper.php';

    if (isLoggedIn()) {
	$sql = "SELECT * FROM users WHERE user_id = " . $_SESSION['user_id'];
	$result = $connect->query($sql);
	$data = $result->fetch_assoc();
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <span class="navbar-brand">Navbar</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sadmin.php">SuperAdmin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Create</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_update.php">Update Animals</a>
      </li>
     <li>
      <?php  
      if (isLoggedIn()) 
      {?>
      <p>Welcome <?php echo $data['user_name'] ?> you are logged in as <?php echo $data['user_status'] ?></p>
      <?php } else {?>
        <p>Please log in <a href="login.php">here</a></p>
        <?php 
      }
      ?>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
