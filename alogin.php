<?php
include "config.php";
session_start();
?>
<html>
	<head>
		<?php include "head.php" ?>
	</head>
	<body>
	<?php include "nav.php";?>
		<div id="container">
			<?php
						if(isset($_POST["submit"]))
						{
							$sql="SELECT * FROM admin WHERE ANAME='{$_POST["aname"]}' AND APASS='{$_POST["apass"]}'";
							$res=$con->query($sql);
							if($res->num_rows>0)
							{
								$row=$res->fetch_assoc();
								$_SESSION["AID"]=$row["AID"];
								$_SESSION["ANAME"]=$row["ANAME"];
								header("location:ahome.php") ;
								//echo "<p class='mes'>Login Success</p>";
							}
							else
							{
								echo "<p class='error'>Invalid User Na or Password</p>";
							}
						}
					?>
				</p>
				<fieldset>
					<legend>Admin Login</legend>
					<form method="post" action="alogin.php">
					<label>Admin Name</label>
					<input type="text" name="aname" placeholder="Enter Admin Name" required /> 
					<label>Password</label>
					<input type="password" name="apass" placeholder="Enter Admin Password" required /> 
					<button type="submit" name="submit"><i class="fa fa-sign-in"></i> Login</button>
					</form>
				</fieldset>
			</div>
		</div>
		<?php include "foot.php";?>
	</body>
</html>