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
		
				<p id="out"></p>
				<fieldset>
					<legend>User Registration</legend>
					<form id="urform" method="post">
					
					<label>Full Name</label>
					<input type="text" name="fname" id="fname" placeholder="Enter Your Full Name"/> 
					<label>User Name</label>
					<input type="text" name="uname" id="uname" placeholder="Enter User Name" /> 
					<label>Password</label>
					<input type="password" name="upass" id="upass" placeholder="Enter User Password" />
					<label>Confirm Password</label>
					<input type="password" name="cpass" id="cpass" placeholder="Enter Confirm Password"/>
					<label>Email Id</label>
					<input type="email" name="email" id="email" placeholder="Enter Your Valid Email Id"/> 
					<label>Contact No</label>
					<input type="text" name="contact" id="contact" placeholder="Enter Valid Contact No"/> 
					
					<button type="submit" name="submit" id="submit"><i class="fa fa-sign-in"></i> Register</button>
					<p class='flink'>
						<i class="fa fa-user"></i>  <a href="ulogin.php">Already User</a>&nbsp;&nbsp;&nbsp;
					</p>
					</form>
				</fieldset>
			</div>
		</div>
		<script>
			$.validator.setDefaults({
		submitHandler: function(){
			$.ajax({
				type:'POST',
				url:'saveuRegForm.php',
				data:$("#urform").serialize(),
				beforeSend:function()
				{
					$('#out').html(' Please Wait loading...');
				},
				success: function(data)
				{
					$('#out').html(data);
					$('#urform')[0].reset();
				},
				error: function(xhr)
				{	
					$('#out').html(xhr);
				}	
			});
		}
	});

			$(document).ready(function()
			{
				$("#urform").validate({
					rules:
					{
						fname:"required",
						uname: 
						{
							required: true,
							remote: 
							{
								url: "checkUname.php",
								type: "post"
							},
							minlength: 3
						},
						upass: 
						{
							required: true,
							minlength: 5
						},
						cpass: 
						{
							required: true,
							minlength: 5,
							equalTo:"#upass"
						},
						contact:
						{
							required: true,
							digits: true,
							remote: {
								url: "checkContact.php",
								type: "post"
							},
							minlength: 10
						},
						email: 
						{
							required: true,
							email: true,
							remote: 
							{
								url: "checkEmail.php",
								type: "post"
							}
						}
					},
					messages:
					{
						fname:"Please Enter Your Full Name",
						uname:
						{
							required: "Please Enter Your Username",
							remote: "User Name already in use!",
							minlength: "Your Username must consist of atleast 3 characters"
						},
						upass:
						{
							required: "Please Enter Password",
							minlength: "Your Password must consist of atleast 5 characters"
						},
						cpass:
						{
							required: "Please Enter Confirm Password",
							equalTo:"Miss Match Password"
						},
						contact:
						{
							required: "Please Enter a valid contact No",
							digits: "Please Enter Numeric Values Only",
							remote: "User Contact already in use!",
							minlength: "Contact No must consist of atleast 10 digits"
						},
						email:
						{
							required: "Please Enter a valid Email Id",
							email:"Enter Email in Correct Format",
							remote: "User Email already in use!"
						}
					}
				});	
			});
		</script>
		<?php include "foot.php";?>
	</body>
</html> 