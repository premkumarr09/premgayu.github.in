<?php
include "config.php";
session_start();
if(!isset($_SESSION["UID"]))
{
	header("location:ulogin.php");
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
					<li><a href="uhome.php"><i class="fa fa-pencil-square-o"></i> VIEW POST &nbsp &nbsp &nbsp &nbsp &nbsp </a></li>
					<li><a href="uprofile.php"><i class="fa fa-user"></i> PROFILE  &nbsp &nbsp &nbsp &nbsp &nbsp </a></li>
					<li><a href="contact.php"><i class="fa fa-envelope-o"></i> CONTACT</a></li>
				</ul>
			
			</div>
			<br>
			<?php
			if(isset($_POST["submit"]))
					{
						if(!isset($_SESSION["UID"]))
						{
							header("location:ulogin.php");
						}
						else
						{
							$sql="INSERT INTO comments (PID,UID,COMMENT,COTIME) VALUES ('{$_POST["pid"]}','{$_SESSION["UID"]}','{$_POST["comment"]}',NOW())";
							
							if($con->query($sql))
							{
								echo "<p class='mes' Comment Posted Successfully... </p>";
							}
							else
							{
								echo "<p class='error'>Try Again Later..</p>";
							}
						}
					}
			
			
					 $sql="SELECT post.PID, post.ANAME, post.TIME, post.PCATEGORY, post.PTITLE, post.PIMG, post.PCONTENT,post.PTAG,category.CID,category.CNAME FROM post
				INNER JOIN  category on post.PCATEGORY=category.CID;";
					$res=$con->query($sql);
					if($res->num_rows>0)
					{
						while($row=$res->fetch_assoc())
						{
							echo" <div id='post'>
									<b>Title: </b><i>{$row["PTITLE"]}</i> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									<b>Posted By : <b><i>{$row["ANAME"]}</i></br></br>
									<b>Category : <b><i>{$row["CNAME"]}</i>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									<b>Posted @ :       </b><i>{$row["TIME"]}</i></br></br>
									
									
									<b style='margin-left:125px;'><img src='{$row["PIMG"]}' height='300px' width='450px'></br></br>
									<b>Content : </b><i>{$row["PTAG"]}</i>&nbsp<a href='viewSPost.php?pid={$row["PID"]}'> Read More</a></br></br>
									<p id='remco'>
									<a href='viewSPost.php?pid={$row["PID"]}'> View Comments</a>&nbsp &nbsp
									</p>
									
									<form method='post' id='po'>
									<label>Comment</label><input type='text' name='comment' required>
									<input type='hidden' name='pid' value='{$row["PID"]}'>
									<button type='submit' name='submit'>Comment</button></form></br></br>
								</div></br></br>
								";
						}
					}
				?>
				
		</div>
		<?php include "foot.php";?>
	</body>
</html>