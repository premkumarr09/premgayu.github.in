<?php
include "config.php";
session_start();
if(!isset($_SESSION["AID"]))
{
	header("location:alogin.php");
}
?>
<html>
	<head>
		<?php include "head.php" ?>
	</head>
	<body>
	<?php include "nav.php";?>
		<div id="container">
			<div id="sidenav">
				<ul>
					<li id="dash"> &nbsp DASHBOARD</li>
					<li><a href="ahome.php"><i class="fa fa-users"></i> &nbsp VIEW USERS </a></li>
					<li><a href="addpost.php"><i class="fa fa-pencil-square-o"></i> ADD POST &nbsp </a></li>
					<li><a href="delpost.php"><i class="fa fa-trash-o"></i> DELETE POST </a></li>
					<li><a href="addcat.php"><i class="fa fa-plus"></i> ADD CATEGORY</a></li>
					<li><a href="viewcomments.php"><i class="fa fa-comments"></i> VIEW POST COMMENTS</a></li>
					<li><a href="message.php"><i class="fa fa-envelope-o"></i> VIEW MESSAGE</a></li>
				</ul>
			</div>
				<h1>VIEW MESSAGES</h1><br>
					
						<?php
							$sql="SELECT * FROM contact";
							$res=$con->query($sql);
							if($res->num_rows>0)
							{
								while($row=$res->fetch_assoc())
								{
									echo "
										<div id='vm'>
										<b>Message Sent By &nbsp &nbsp:&nbsp </b> <i> {$row["CNAME"]}</i></br>
										<b>Email Id	&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp :&nbsp</b> <i> {$row["CEMAIL"]}</i></br> 
										<b>Message Content&nbsp &nbsp :&nbsp</b> <i> {$row["CMESS"]}</i></br> 
										<b>Sent @ &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   :&nbsp</b> <i> {$row["CTIME"]}</i></br></br>
										</div>
										</br>
									";
									
								}
							}
						?>
				<br>	
				<br>	
		</div>
	<?php include "foot.php";?>
	</body>
</html>