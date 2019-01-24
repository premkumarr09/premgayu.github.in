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
						 $sql="SELECT * FROM users WHERE 
						 UNAME='{$_POST["uname"]}' AND UPASS='{$_POST["upass"]}' AND STATUS=1 OR
						 EMAIL='{$_POST["uname"]}' AND UPASS='{$_POST["upass"]}'   AND STATUS=1 OR
						 CONTACT='{$_POST["uname"]}' AND UPASS='{$_POST["upass"]}' AND STATUS=1 ";
							$res=$con->query($sql);
							if($res->num_rows>0)
							{
								$row=$res->fetch_assoc();
								$_SESSION["UID"]=$row["UID"];
								$_SESSION["UNAME"]=$row["UNAME"];
								header("location:uhome.php") ;
								//echo "<p class='mes'>LOGIN SUCCESS</p>";
							}
							else
							{
								echo "<p class='error'>Invalid User or Password</p>";
							}
						}
					?>
				</p>
				<fieldset>
					<legend>User Login</legend>
					<form method="post" action="ulogin.php">
					<label>User Name</label>
					<input type="text" name="uname" placeholder="Enter User Name/Email Id/Contact No" required /> 
					<label>Password</label>
					<input type="password" name="upass" placeholder="Enter User Password" required /> 
					<button type="submit" name="submit"><i class="fa fa-sign-in"></i> Login</button>
					<p class='flink'>
						<i class="fa fa-user"></i>  <a href='uNewReg.php'>New User</a>&nbsp;&nbsp;&nbsp;
					</p>
					</form>
				</fieldset>
			</div>
		</div>
		<?php include "foot.php";?>
	</body>
</html>