<?php 
	session_start();
	unset($_SESSION["AID"]);
	unset($_SESSION["ANAME"]);
	session_destroy();
	header("location:index.php");
?>