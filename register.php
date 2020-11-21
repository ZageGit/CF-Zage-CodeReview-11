<?php 
include_once 'actions/db_connect.php';
require_once 'helper/UserHelper.php';
if(isLoggedIn()) {
  header("Location: index.php");
 } 



$error = false;
if(isset($_POST['btn-signup'])){

  //sanitizing inputs
 $name = trim($_POST['name']);
 $name = strip_tags($name);
 $name = htmlspecialchars($name);

 $email = trim($_POST[ 'email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 if (empty($name)) {
    $error = true ;
    $nameError = "Please enter your full name.";
   } else if (strlen($name) < 3) {
    $error = true;
    $nameError = "Name must have at least 3 characters.";
   } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
    $error = true ;
    $nameError = "Name must contain alphabets and space.";
   }
//basic email validation
if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
    $error = true;
    $emailError = "Please enter valid email address." ;
   } else {
    // checks whether the email exists or not
    $query = "SELECT user_email FROM users WHERE user_email='$email'";
    $result = mysqli_query($connect, $query);
    $count = mysqli_num_rows($result);
    if($count!=0){
     $error = true;
     $emailError = "Provided Email is already in use.";
    }
   }
   // password validation
  if (empty($pass)){
    $error = true;
    $passError = "Please enter password.";
   } else if(strlen($pass) < 6) {
    $error = true;
    $passError = "Password must have atleast 6 characters." ;
   }
// password hashing for security
$password = hash('sha256' , $pass);
// if there's no error, continue to signup
if( !$error ) {
 
    $query = "INSERT INTO users(user_name,user_email,user_pass) VALUES('$name','$email','$password')";
    $res = mysqli_query($connect, $query);
   
    if ($res) {
     $errTyp = "success";
     $errMSG = "Successfully registered, you may login now";
     unset($name);
      unset($email);
     unset($pass);
    } else  {
     $errTyp = "danger";
     $errMSG = "Something went wrong, try again later..." ;
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
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



<div class="container ">
<div class="row centered-form d-flex justify-content-center m-5">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Please sign up for XTREME LIBRARY <small>It's free!</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form"method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >


<?php
   if ( isset($errMSG) ) {
 
   ?>
           <div class="alert alert-<?php echo $errTyp ?>" >
                         <?php echo $errMSG; ?>
       </div>

<?php
  }
  ?>

			    			<div class="row">
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			                <input type="text" name="name" id="Name" class="form-control input-sm" placeholder="Enter Name" maxlength="50" value="<?php echo $name; ?>">
                         <span class="text-danger"> <?php echo $nameError; ?> </span>
                            </div>
			    				</div>
			    			</div>
			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Enter Email Address">
                         <span  class="text-danger"> <?php echo $emailError; ?> </span>
                      </div>

			    			<div class="row">
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			    						<input type="password" name="pass" id="password" class="form-control input-sm" placeholder="Enter Password"maxlength="15" >
                               <span class="text-danger"> <?php echo $passError; ?> </span>
                            </div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="Register" class="btn btn-info btn-block" name="btn-signup">
                      <a href="login.php">Sign in Here...</a>
                      </form>
               </div>
	    		</div>
			    	</div>
	    		</div>
    		</div>
    	</div>
      

    </div>
    <nav class="navbar navbar-dark bg-dark sticky-bottom text-white mt-2">
  <a class="navbar-brand">PetAdoption</a>
    <a class="nav-link" href="logout.php?logout"><button type="button" class="btn btn-danger">Logout</button></a>
</nav>

</body>
</html>
<?php ob_end_flush(); ?>
