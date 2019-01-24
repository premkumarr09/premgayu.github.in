<?php
include "config.php";
$sql="DELETE FROM COMMENTS WHERE CID={$_GET["coid"]}";
if($con->query($sql))
{
	header("location:viewcomments.php");
}
else
{
	echo "Error in Deleting Comments";
}
?>