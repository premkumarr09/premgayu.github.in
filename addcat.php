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
				<h1>ADD CATEGORY</h1>
				<div id="r1">
					<form name="addcat" method="post" id="aCat" action="<?php echo $_SERVER["REQUEST_URI"]?>">
						<label style="color:orange;">Category</label>
						<input type="text" name="cat" placeholder="Enter New Category" required>
						<button type="submit" name="addcat" id="addcat"><i class="fa fa-plus"></i> ADD CATEGORY</button>
					</form>
					<?php
						if(isset($_POST["addcat"]))
						{
							 $sql="INSERT INTO CATEGORY (CNAME) VALUES('{$_POST["cat"]}')";
							if($con->query($sql))
							{
								echo "<p class='mes'>Category Inserted Successfully</p>";
							}
							else
							{
								echo "<p class='error'>Error in Inserting category</p>";
							}
						}
					?>
				</div>
					<div id="r2">
						<table>
							<tr>
								<th>S.No</th>
								<th>Category Name</th>
								<th>Delete</th>
							</tr>
							<?php
								$sql="SELECT * FROM CATEGORY";
								$res=$con->query($sql);
								if($res->num_rows>0)
								{
									$i=0;
									While($row=$res->fetch_assoc())
									{
										$i++;
										echo "<tr>
											<td>{$i}</td>
											<td>{$row["CNAME"]}</td>
											<td><a style='text-decoration:none;color:red;' href='delCat.php?cid={$row["CID"]}'><i class='fa fa-trash-o'></i> </a></td>
										</tr>";
									}
								}
							?>
							</table>
			</div>
		</div>
	<?php include "foot.php";?>
	</body>
</html>