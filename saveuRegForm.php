<?php
include "config.php";
						
	$sql="INSERT INTO users (FNAME,UNAME,UPASS,EMAIL,CONTACT) VALUES('{$_POST["fname"]}','{$_POST["uname"]}','{$_POST["upass"]}','{$_POST["email"]}','{$_POST["contact"]}')";
	if($con->query($sql))
	{
		echo "<p class='mes'>Registered Successfully</p>";
	}
	else
	{
		echo "<p class='error'>Please Try Again</p>";
	}
?>