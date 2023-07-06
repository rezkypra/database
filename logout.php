<?php 

session_start();

if (isset($_SESSION['superadmin'])) {

	unset($_SESSION['superadmin']);

	if (empty($_SESSION['superadmin'])) {
		header("location:login.php");
	}
}
else if (isset($_SESSION['admin'])) {

	unset($_SESSION['admin']);

	if (empty($_SESSION['admin'])) {
		header("location:login.php");
	}
}