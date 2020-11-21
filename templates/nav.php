<?php 
require_once 'helper/UserHelper.php';


    if (isLoggedIn()) {
	$sql = "SELECT * FROM users WHERE user_id = " . $_SESSION['user_id'];
	$result = $connect->query($sql);
	$data = $result->fetch_assoc();
}
?>

<script>
// AJAX call for autocomplete 
$(document).ready(function(){
	$("#search_input").keyup(function(){
        console.log('keyup');
		$.ajax({
		type: "POST",
		url: "AjaxSearch.php",
		data:'search='+$(this).val(),
		
		success: function(data){
            $("#search_input").value=data;
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			
		}
		});
	});
});
function selectResult(val) {
$("#search_input").val(val);
$("#suggesstion-box").hide();}
</script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
        <a class="nav-link" href="general.php">General</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="senior.php">Senior</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sadmin.php">S_ADMIN - SEE USER</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">ADMN - Create animal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_update.php">ADMIN - Update animal</a>
      </li>
     <li>
      <?php  
      if (isLoggedIn()) 
      {?>
      <p class="nav-link text-dark font-weight-bold">Welcome <?php echo $data['user_name'] ?> you are logged in as <?php echo $data['user_status'] ?></p>
      <?php } else {?>
        <p class="nav-link text-dark font-weight-bold">Please log in <a href="login.php">here</a></p>
        <?php 
      }
      ?>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 ">
      <input class="form-control mr-sm-2" name="search_input" id="search_input" type="search" placeholder="Search" aria-label="Search">
      <div id="suggesstion-box"></div>
    </form>
  </div>
</nav>
