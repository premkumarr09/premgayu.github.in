<?php
include "config.php";
$sql="DELETE FROM POST WHERE PID={$_GET["pid"]}";
if($con->query($sql))
{
	header("location:delpost.php");
}
else
{
	echo "Error in Deleting Post's";
}
?>