<?php
session_start();

if(isset($_SESSION['usr_id'])) {
	session_destroy();
	unset($_SESSION['usr_id']);
	unset($_SESSION['usr_name']);
	header("Location: /wpl_1/about.php");
} else {
	header("Location: about.php");
}
?>