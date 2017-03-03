<?php
ob_start();
session_start();
include_once 'login and registration form\dbconnect.php';


$sql = "SELECT * FROM `teacher` WHERE t_id=3";
$basic_info = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($basic_info);


$name = $row['name'];
$designation = $row['designation'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $name ?></title>
    <link rel="shortcut icon" href="logo.gif" type="image/gif">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                <img src="zahid.png">
                    <a class="info">                        
                       <H5><br><strong style="text-transform: uppercase; color:LavenderBlush "><?php echo $name ?></strong><br><?php echo $designation ?><br>Computer Science &amp; Engineering Discipline<br>Khulna University<br>Khulna</H5>
                    </a>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
                <li>
                    <a href="education.php">Education</a>
                </li>
                <li>
                    <a href="research.php">Research Interest</a>
                </li>
                <li>
                    <a href="publication.php">Publication</a>
                </li>
                <li>
                    <a href="courses.php">Courses</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
                <?php if (isset($_SESSION['usr_id'])) { ?>        
                <li class="uName" style="color:LavenderBlush "><a style="text-transform: uppercase;" >Logged in as <?php echo $_SESSION['usr_name']; ?></a></li>
                <li class="menu-item"><a href="login and registration form\logout.php">Log Out</a></li>   
                <?php } else { ?>
                <li class="SignIn"><a href="login and registration form\login.php">Login</a></li>
                <li class="SignIn"><a href="login and registration form\register.php">Sign Up</a></li>
                <?php } ?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Courses I conducted:</h1>
                        <ol>
                            <li>CSE 2101 : Data Structures</li>
                            <li>CSE 2102 : Data Structure Laboratory</li>
                            <li>CSE 2203 : Computer Architecture</li>
                            <li>CSE 2208 : Assembly Language</li>
                            <li>CSE 2202 : Algorithms Laboratory</li>
                            <li>CSE 5403 : Machine Learning</li>
                        </ol>
                        <p><strong>Holding Problem Solving Sessions for ACM/ICPC</strong></p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
