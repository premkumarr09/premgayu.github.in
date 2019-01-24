<?php
include "config.php";
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
					<li id="dash"> &nbsp Categories</li>
					<?php
								$sql="SELECT * FROM CATEGORY";
								$res=$con->query($sql);
								if($res->num_rows>0)
								{
									While($row=$res->fetch_assoc())
									{
										echo "<li><a href='viewcatwise.php?cid={$row["CID"]}'>{$row["CNAME"]}&nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp</a></li>
											
										";
									}
								}
					?>
					<li id="dash"> &nbsp Popular Posts</li>
					<?php
								$sq="SELECT * FROM POST ORDER BY PID DESC LIMIT 0,5 ";
								$re=$con->query($sq);
								if($re->num_rows>0)
								{
									While($ro=$re->fetch_assoc())
									{
										echo "<li><a href='viewSPost.php?pid={$ro["PID"]}'>{$ro["PTITLE"]}&nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp </a></li>
										
											
										";
									}
								}
					?>
				</ul>
			
			</div>
			<h1>Welcome to Content Management System</h1></br></br>
		<div id="index">
		<?php
					$sql="SELECT post.PID, post.ANAME, post.TIME, post.PCATEGORY, post.PTITLE, post.PIMG, post.PCONTENT,post.PTAG,category.CID,category.CNAME FROM post
				    INNER JOIN  category on post.PCATEGORY=category.CID WHERE PCATEGORY='{$_GET["cid"]}'";
					
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
					else
					{
						echo "<p class='mes'>No Posts Found in this Category...</p>";
					}
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
								echo "<p class='mes'> Comment Posted Successfully... </p>";
							}
							else
							{
								echo "<p class='error'>Try Again Later..</p>";
							}
						}
					}
					
				?>
		</div>
		</div>
		<?php include "foot.php";?>
	</body>
</html>