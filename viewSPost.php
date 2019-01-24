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
								$resu=$con->query($sql);
								if($resu->num_rows>0)
								{
									While($roww=$resu->fetch_assoc())
									{
										echo "<li><a href='viewcatwise.php?cid={$roww["CID"]}'>{$roww["CNAME"]}&nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp</a></li>
																	
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
										echo "<li><a href='viewSPost.php?pid={$ro["PID"]}'>{$ro["PTITLE"]}&nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp </a></li>";
									}
								}
					?>
				</ul>
			
			</div>
			<h1>Welcome to Content Management System</h1></br>
			
			</br>
		<div id="index">
		<?php
					$sql="SELECT post.PID, post.ANAME, post.TIME, post.PCATEGORY, post.PTITLE, post.PIMG, post.PCONTENT,post.PTAG,category.CID,category.CNAME FROM post
				INNER JOIN  category on post.PCATEGORY=category.CID WHERE PID={$_GET["pid"]}";
					
					$res=$con->query($sql);
					if($res->num_rows>0)
					{
						while($row=$res->fetch_assoc())
						{
							echo" 
							<h1> {$row["PTITLE"]}</h1></br>
								<div id='post'>
								
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
									<b>Content : </b><i>{$row["PCONTENT"]}</i></br></br>
									
									<form method='post' id='po'>
									<label>Comment</label><input type='text' name='comment' required>
									<input type='hidden' name='pid' value='{$row["PID"]}'>
									<button type='submit' name='submit'>Comment</button></form></br></br>
									

								</div></br></br>
								";
							
						}
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
								echo "<p class='mes' Comment Posted Successfully... </p>";
							}
							else
							{
								echo "<p class='error'>Try Again Later..</p>";
							}
						}
					}
					
				?>
				
				<div id='vm'>
				
					<?php
						 $sql="SELECT comments.COMMENT,comments.PID,comments.UID,comments.COTIME,users.UID,users.FNAME 
						from comments inner join users on users.uid=comments.uid
						where comments.pid={$_GET["pid"]} ORDER BY comments.COTIME DESC";
						$rs=$con->query($sql);
						if($rs->num_rows>0)
						{
							while($rw=$rs->fetch_assoc())
							{
								echo "<p id='cmnt'>
								<b>Comment : </b> <i> {$rw["COMMENT"]} &nbsp 	</i> 
										<b>By :</b> <i> {$rw["FNAME"]}</i> &nbsp &nbsp
										<b> @ : </b> <i> {$rw["COTIME"]}</i></br></p>";
							}
						}	
						else
						{
							echo "<p class='mes'>No Comments Yet...</p>";
						}

					?>
				</div>
		</div>
		</div>
		<?php include "foot.php";?>
	</body>
</html>