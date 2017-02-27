<?php
session_start();

if(isset($_SESSION['usr_id'])) {
	header("Location:\startbootstrap-simple-sidebar-gh-pages\index.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	$cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}


	if (!$error) {
		if(mysqli_query($connection, "INSERT INTO teacher(name,email,password,last_login) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "',now())")) {

			$result = mysqli_query($connection, "SELECT * FROM teacher WHERE email = '" . $email. "' and password = '" . md5($password) . "'");
			$row = mysqli_fetch_array($result);
			$_SESSION['usr_id'] = $row['t_id'];
			$_SESSION['usr_name'] = $row['name'];
			$successmsg = "Successfully Registered! <a href='\startbootstrap-simple-sidebar-gh-pages\index.php'>Click here to redirect...</a>";
		} else {
			$errormsg = "Error in registering...Please try again later!";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration Form</title>	
	<meta http-equiv="Content-Type" content="width=device-width, initial-scale=1.0" name="viewport" charset="UTF-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
	<body>
		<header class="site-header">
			<div class="container">
				<a href="\startbootstrap-simple-sidebar-gh-pages\index.php" id="branding">
					<img src="user.png" alt="" class="logo">
					<div class="logo-copy">
						<h1 class="site-title">Teacher Authentication</h1>
						<small class="site-description">Computer Science &amp; Engineering Discipline</small>
					</div>
				</a> <!-- #branding -->

				<div class="main-navigation">
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item"><a href="login.php">Login</a></li>
						<li class="menu-item current-menu-item"><a href="register.php">Sign Up</a></li>						
					</ul> <!-- .menu -->					
				</div> <!-- .main-navigation -->				
			</div>
		</header>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Sign Up</legend>

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Already Registered? <a href="login.php">Login Here</a>
		</div>
	</div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>



