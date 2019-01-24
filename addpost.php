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
			
				<h1>ADD YOUR POST</h1>
				<div id="rbox">
				<fieldset>
					<legend>Add Post</legend>
					<form method="post" enctype="multipart/form-data">
						<label>Title</label>
						<input type="text" name="ptitle" placeholder="Type Your Title" required>
						
						<label>Category</label>
						<select name="pcategory" required>
							<option value="">Select Category</option>
							<?php
								echo $sql="SELECT * FROM CATEGORY";
								$res=$con->query($sql);
								if($res->num_rows>0)
								{
									while($row=$res->fetch_assoc())
									{
										echo "<option value='{$row["CID"]}'>{$row["CNAME"]}</option>";
									}
								}
							?>
						</select>
						<label>Tag Lines </label>
						<input type="text" name="ptag" placeholder="Type Your Tag Lines" required>
						<label>Content</label>
						<textarea name="pcontent" cols="50" rows="7" placeholder="Type Your Content" required></textarea>
						<label>Upload Image</label>
						<input type="file" name="fileToUpload" id="fileToUpload" required>
						<button type="submit" name="submit"><i class="fa fa-bookmark"></i> ADD POST</button>
 					</form>
					</fieldset>
					</div>
					
<?php
if(isset($_POST["submit"]))
{
$target_dir = "postimage/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Allow certain file formats
if($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "png" && $imageFileType != "JPEG" && $imageFileType != "jpeg" && $imageFileType != "GIF"  && $imageFileType != "gif" ) 
{
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else
	{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		 $sql="INSERT INTO post(PTITLE,PCATEGORY,PTAG,PCONTENT,PIMG,ANAME,TIME) VALUES('{$_POST["ptitle"]}','{$_POST["pcategory"]}','{$_POST["ptag"]}','{$_POST["pcontent"]}','{$target_file}','{$_SESSION["ANAME"]}',NOW())";
									if($con->query($sql))
									{
										echo "<div class='mes'>Details Posted Successfully..!</div>";
									}
									else
									{
										echo "<div class='error'>Adding Post Failed ...!</div>";
									}
    }
	else
	{
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>
		</div>
	<?php include "foot.php";?>
	</body>
</html>