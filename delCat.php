<?php
include "config.php";
$sql="DELETE FROM CATEGORY WHERE CID={$_GET["cid"]}";
if($con->query($sql))
{
	header("location:addcat.php");
}
else
{
	echo "Error in Deleting Category";
}
?>