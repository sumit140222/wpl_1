<?php
ob_start();
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['usr_id'])!="") {
	header("Location:/wpl_1/about.php");
}

//check if form is submitted
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$_SESSION['email'] = $email;
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	$_SESSION['password'] = $password;
	$result = mysqli_query($connection, "SELECT * FROM teacher WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

	if ($row = mysqli_fetch_array($result)) {

		$_SESSION['usr_id'] = $row['t_id'];
		$_SESSION['usr_name'] = $row['name'];
		$_SESSION['usr_typ'] = $row['user_type'];
		
		mysqli_query($connection, "UPDATE teacher SET last_login=now() WHERE email = '" . $email. "' and password = '" . md5($password) . "' ");		
			header("Location: /wpl_1/about.php");
	} 
	else {
		$errormsg = "Incorrect Email or Password!!!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>	
	<meta http-equiv="Content-Type" content="width=device-width, initial-scale=1.0" name="viewport" charset="UTF-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

<header class="site-header">
			<div class="container">
				<a href="/wpl_1/about.php" id="branding">
					<img src="user.png" alt="" class="logo">
					<div class="logo-copy">
						<h1 class="site-title">Teacher Authentication</h1>
						<small class="site-description">Computer Science &amp; Engineering Discipline</small>
					</div>
				</a> <!-- #branding -->

				<div class="main-navigation">
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item current-menu-item"><a href="login.php">Login</a></li>
						<li class="menu-item"><a href="register.php">Sign Up</a></li>						
					</ul> <!-- .menu -->					
				</div> <!-- .main-navigation -->				
			</div>
		</header>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Your Email" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		New User? <a href="register.php">Sign Up Here</a>
		</div>
	</div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
