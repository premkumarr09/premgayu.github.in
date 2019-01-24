<div id="header">
<img src="images/27.jpg" height="250px" width="100%">
<?php 
if(isset($_SESSION["UID"]))
{
	?>
		<ul>
			<li style="float:right;"><a href="ulogout.php"><i class="fa fa-sign-out"></i> LOGOUT</a></li>
			
		</ul>
	<?php 
}
else if(isset($_SESSION["AID"]))
{
	?>
		<ul>
			<li style="float:right;"><a href="alogout.php"><i class="fa fa-sign-out"></i> LOGOUT</a></li>
		</ul>
	<?php
}
else
{
	?>
		<ul>
				<li><a href="index.php"><i class="fa fa-home "></i> HOME</a></li>
				<li><a href="alogin.php"><i class="fa fa-user-md"></i> ADMIN LOGIN</a></li>
				<li><a href="ulogin.php"><i class="fa fa-user"></i> USER LOGIN</a></li>
				<li><a href="about.php"><i class="fa fa-book"></i> ABOUT</a></li>
			</ul>
	<?php
}
?>
			
			
</div>