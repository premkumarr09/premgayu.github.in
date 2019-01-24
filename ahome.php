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
				<h1>VIEW USERS</h1>
					<table id="">
						<tr>	
							<th>S.No</th>
							<th>Name</th>
							<th>User Name</th>
							<th>Email Id</th>
							<th>Contact No</th>
							<th>Status</th>
						</tr>
					<?php
						$sql="SELECT * FROM USERS";
						$res=$con->query($sql);
						if($res->num_rows>0)
						{
							$i=0;
							while($row=$res->fetch_assoc())
							{
								$i++;
								?>
								<tr>
										<td><?php echo $i; 	?></td>
										<td><?php echo $row["FNAME"]; ?></td>
								<td><?php echo $row["UNAME"]; ?></td>											
										<td><?php echo $row["EMAIL"]; ?></td>									
										<td><?php echo $row["CONTACT"]; ?></td>									
																		
										<td>
									<?php 
										if($row["STATUS"]==1)
										{
											?>
											<a  class="mes" href="updateStatus.php?uid=<?php echo $row["UID"]; ?>&status=0">User is active</a>
											<?php
										}
										else if($row["STATUS"]==0)
										{
										?>
											<a  class="error" href="updateStatus.php?uid=<?php echo $row["UID"]; ?>&status=1">User is not active</a>
									<?php
										}
									?>
										</td>
								</tr>
					<?php
							}
						}
					?>
					</table>
		</div>
	<?php include "foot.php";?>
	</body>
</html>