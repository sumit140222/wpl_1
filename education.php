<?php
ob_start();
session_start();
include_once 'login and registration form\dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Md Zahidul Islam</title>
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
                       <H5><br><strong style="text-transform: uppercase; color:LavenderBlush ">Md. Zahidul Islam</strong><br>Assistant Professor<br>Computer Science &amp; Engineering Discipline<br>Khulna University<br>Khulna</H5>
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
                        <ul>
                            <li>
                                <h3>Master of Science in Computer Science</h3>
                                <p><strong>St. Francis Xavier University, Antigonish, NS, Canada.</strong></p>
                                <p><strong>Passing Year: 2012</strong></p>
                                <p><strong>Department: Mathematics, Statistics and Computer Science,.</strong></p>
                            </li>
                            <li>
                                <h3>Bachelor of Science in Computer Science and Engineering</h3>
                                <p><strong> Khulna University, Khulna, Bangladesh.</strong></p>
                                <p><strong>Passing Year: 2007</strong></p>
                                <p><strong>Department: Department of Computer Science and Engineering</strong></p>
                            </li>
                            <li>
                                <h3>Higher Secondary Certiﬁcate (HSC)</h3>
                                <p><strong> Jhenidah Cadet College, Jhenidah, Bangladesh.</strong></p>
                                <p><strong>Passing Year: 2001</strong></p>
                                <p><strong>Group : Science.</strong></p>
                            </li>
                            <li>
                                <h3>Secondary School Certiﬁcate (SSC)</h3>
                                <p><strong> Jhenidah Cadet College, Jhenidah, Bangladesh.</strong></p>
                                <p><strong>Passing Year: 1999</strong></p>
                                <p><strong>Group : Science.</strong></p>
                            </li>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        </ul>
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
