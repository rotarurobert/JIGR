<?php
if(isset($_POST["submit"])) {
	$target_dir = "./images/";
	$target_file = $target_dir . basename($_FILES["pic"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["pic"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script>alert("File is not an image.");</script>';
        $uploadOk = 0;
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo '<script>alert("Sorry, file already exists.");</script>';
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["pic"]["size"] > 500000) {
		echo '<script>alert("Sorry, your file is too large.");</script>';
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>';
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo '<script>alert("Sorry, your file was not uploaded.");</script>';
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
			echo '<script>alert("The file '. basename( $_FILES["pic"]["name"]). ' has been uploaded.");</script>';
		} else {
			echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>jigr.</title>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/upload.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<ul class="topnav">
	  <li><img alt="logo" src="./images/puzzle-logo.jpg"><p class="title">jigr.</p></li>
	  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/main">Home</a></li>
	  <li><a class="active" href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/upload">Upload</a></li>
	  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/search">Search</a></li>
	  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/playground">Playground</a></li>
	</ul>
	<div class="intro">
		<p>Choose your favourite picture and let us puzzle it for you!</p><br>
		<span>*only .png and .jpg formats accepted</span>
	</div>
	<form method="post" enctype="multipart/form-data">
		<div  class="upload-form">
	  		<img alt="logo" src="./images/search.jpg">
	  		<label for="pic">Browse image from your computer...
	  			<input type="file" name="pic" id = "pic" accept="image/*">
	  		</label>
	  		<img alt="logo" src="./images/pen.jpg">
	  			<input type="text" name="Name" placeholder="Insert new puzzle name...">
	  		<input type="submit" name="submit">
	  	</div>
	  	<div>
	  	<img id="animated-pic" alt="logo" src="./images/image.png">
	  	</div>

	</form>
</body>

<script>
var profilePic = document.getElementById('pic'); /* finds the input */

function changeLabelText() {
    var profilePicValue = profilePic.value; /* gets the filepath and filename from the input */
    var fileNameStart = profilePicValue.lastIndexOf('\\'); /* finds the end of the filepath */
    profilePicValue = profilePicValue.substr(fileNameStart + 1); /* isolates the filename */
    var profilePicLabelText = document.querySelector('label[for="pic"]').childNodes[0]; /* finds the label text */
    if (profilePicValue !== '') {
        profilePicLabelText.textContent = profilePicValue; /* changes the label text */
    }
}

profilePic.addEventListener('change',changeLabelText,false); /* runs the function whenever the filename in the input is changed */
</script>

</html>
