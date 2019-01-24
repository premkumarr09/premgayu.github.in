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
		<div id="container"style='background:#2f353f;color:orange' >
			<div id="sidenav">
				<ul>
					<li id="dash"> &nbsp DASHBOARD</li>
					<li><a href="uhome.php"><i class="fa fa-pencil-square-o"></i> VIEW POST &nbsp &nbsp &nbsp &nbsp &nbsp </a></li>
					<li><a href="uprofile.php"><i class="fa fa-user"></i> PROFILE  &nbsp &nbsp &nbsp &nbsp &nbsp </a></li>
					<li><a href="contact.php"><i class="fa fa-envelope-o"></i> CONTACT</a></li>
				</ul>
			</div>
			<div>
				<h1>UPDATE YOUR PROFILE</h1>
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="update users set FNAME='{$_POST["fname"]}',UNAME='{$_POST["uname"]}',EMAIL='{$_POST["email"]}',UPASS='{$_POST["upass"]}',CONTACT='{$_POST["contact"]}' where UID={$_SESSION["UID"]}";
						
						if($con->query($sql))
						{
							echo "<p class='mes'>Updated Successfully... !</p>";
						}
						else
						{
							echo "<p class='error'>Try Again Later...!</p>";
						}
						
					}
					$sql="SELECT * FROM USERS WHERE UID={$_SESSION["UID"]}";
					
						$res=$con->query($sql);
						if($res->num_rows>0)
						{
							$row=$res->fetch_assoc();
						}
				?>
				<fieldset>
					<legend>Profile Updation</legend>
					<form method="post">
						<label>Full Name</label>
					<input type="text" name="fname" id="fname" value="<?php echo $row["FNAME"];?>" placeholder="Enter Your Full Name"/> 
					<label>User Name</label>                       
					<input type="text" name="uname" id="uname" value="<?php echo $row["UNAME"];?>" placeholder="Enter User Name" /> 
					<label>Password</label>                        
					<input type="text" name="upass" id="upass" value="<?php echo $row["UPASS"];?> "placeholder="Enter User Password" />
					<label>Email Id</label>                      
					<input type="email" name="email" id="email" value="<?php echo $row["EMAIL"];?> "placeholder="Enter Your Valid Email Id"/> 
					<label>Contact No</label>                      
					<input type="text" name="contact" id="contact" value="<?php echo $row["CONTACT"];?> " placeholder="Enter Valid Contact No"/> 
						                                                 
						<button type="submit" name="submit"><i class="fa fa-plus"></i>  Update</button>
					</form>
				</fieldset>

			</div>
		</div>
		<?php include "foot.php";?>
	</body>
</html>