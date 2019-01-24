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
					<li><a href="viewpost.php"><i class="fa fa-pencil-square-o"></i> VIEW POST &nbsp &nbsp &nbsp &nbsp &nbsp </a></li>
					<li><a href="uprofile.php"><i class="fa fa-user"></i> PROFILE  &nbsp &nbsp &nbsp &nbsp &nbsp </a></li>
					<li><a href="contact.php"><i class="fa fa-envelope-o"></i> CONTACT</a></li>
				</ul>
			</div>
			
				<?php
					$sql="SELECT post.PID, post.ANAME, post.TIME, post.PCATEGORY, post.PTITLE, post.PIMG, post.PCONTENT,post.PTAG,category.CID,category.CNAME FROM post
				INNER JOIN  category on post.PCATEGORY=category.CID";
					$res=$con->query($sql);
					if($res->num_rows>0)
					{
						while($row=$res->fetch_assoc())
						{
							echo" 
								<div id='post'>
									<b>Time:       </b><i>{$row["TIME"]}</i></br></br>
									<b >Posted By : <b><i>{$row["ANAME"]}</i></br></br>
									<b>Category : <b><i>{$row["CNAME"]}</i></br></br>
									<b><img src='{$row["PIMG"]}' height='250px' width='350px'></br></br>
									<b>Title: </b><i>{$row["PTITLE"]}</i></br></br>
									<b>Content :</b><i>{$row["PCONTENT"]}</i></br></br>
									Comment<input type='text' name='comment'><button type='submit' name='submit'>Comment</button></br></br>
								</div></br></br>";
							
						}
					}
				?>
			</div>
		</div>
		<?php include "foot.php";?>
	</body>
</html>