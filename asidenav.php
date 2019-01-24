<div id="sidenav">
<?php 
if(isset($_SESSION["AID"]))
{
	?>
		<ul>
			<li id="dash"> &nbsp DASHBOARD</li>
			<li><a href="viewusers.php"><i class="fa fa-users"></i> &nbsp VIEW USERS </a></li>
			<li><a href="addpost.php"><i class="fa fa-pencil-square-o"></i> ADD POST </a></li>
			<li><a href="addcat.php"><i class="fa fa-plus"></i> ADD CATEGORY</a></li>
			<li><a href="viewcomments.php"><i class="fa fa-comments"></i> VIEW POST COMMENTS</a></li>
			<li><a href="message.php"><i class="fa fa-envelope-o"></i> VIEW MESSAGE</a></li>
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