<?php
	include'config.php';
	session_start();
	echo $sql="update users set STATUS={$_GET["status"]} WHERE UID={$_GET["uid"]}";
	$con->query($sql);
	header("location:ahome.php");
?>