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
				<h1 >SEND US YOUR QUERIES AND WISHES AS MESSAGE</h1>
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="INSERT INTO contact (UID,CNAME,CEMAIL,CCONTACT,CMESS,CTIME) VALUES ('{$_SESSION["UID"]}','{$_POST["cname"]}','{$_POST["cemail"]}','{$_POST["ccontact"]}','{$_POST["cmess"]}',NOW())";
						if($con->query($sql))
						{
							echo "<p class='mes'>Your Message Has Been Sent Successfully... !</p>";
						}
						else
						{
							echo "<p class='error'>Try Again Later...!</p>";
						}
						
					}
				?>
				<fieldset>
					<legend>Contact Us</legend>
					<form method="post">
						<label>Name</label>
							<input type="text" name="cname" placeholder="Enter Your Name" required>
						<label>Email Id</label>
							<input type="email" name="cemail" placeholder="Enter Your Email Id" required>
						<label>Contact No</label>
							<input type="text" name="ccontact" placeholder="Enter Your Contact No" required>
						<label>Message</label>
							<textarea name="cmess" required placeholder="Enter Your Message"></textarea>
						<button type="submit" name="submit"><i class="fa fa-external-link"></i>  Send Message</button>
					</form>
				</fieldset>

			</div>
		</div>
		<?php include "foot.php";?>
	</body>
</html>