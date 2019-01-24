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
				<h1>DELETE POSTS</h1>
					<table id="">
						<tr>	
							<th>S.No</th>
							<th>Title</th>
							<th>Category</th>
							<th>Posted @ </th>
							<th>Delete</th>
						</tr>
					<?php
						$sql="SELECT post.PID, post.ANAME, post.TIME, post.PCATEGORY, post.PTITLE, post.PIMG, post.PCONTENT,post.PTAG,category.CID,category.CNAME FROM post
				        INNER JOIN  category on post.PCATEGORY=category.CID ORDER BY PID DESC";
					$res=$con->query($sql);
					if($res->num_rows>0)
					{
						$i=0;
						while($row=$res->fetch_assoc())
						{
							$i++;
							echo" 
								<tr>
									<td>{$i}</td>
									<td>{$row["PTITLE"]}</td>
									<td>{$row["CNAME"]}</td>
									<td>{$row["TIME"]}</td>
									<td><a style='text-decoration:none;color:red;' href='deletePost.php?pid={$row["PID"]}'><i class='fa fa-trash-o'></i> </a></td>
								</tr>
								";
							
						}
					}
					?>
					</table>
					<br>
					<br>
		</div>
	<?php include "foot.php";?>
	</body>
</html>