<?php
	include "config.php";
	$sql="SELECT * FROM users WHERE CONTACT='{$_POST["contact"]}'";
	$res=$con->query($sql);
	if($res->num_rows>0)
	{
		echo 'false';
	}
	else
	{
		echo 'true';
	}
	

?>