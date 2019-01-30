<?php
UploadModel::upload();
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
	  <li><a href="/MVC/public/main">Home</a></li>
	  <li><a class="active" href="/MVC/public/upload">Upload</a></li>
	  <li><a href="/MVC/public/search">Search</a></li>
	  <li><a href="/MVC/public/playground">Playground</a></li>
	</ul>
	<div class="intro">
		<p>Choose your favourite picture and let us puzzle it for you!</p><br>
		<span>*only images not bigger than 300Kb</span>
	</div>
	<button id = "change">Change upload type.</button>
	<form method="post" enctype="multipart/form-data">
		<div  class="upload-form">
			<img alt="logo" src="./images/search.jpg">
	  		<label id = "labelpic" for="pic">Browse image from your computer...
	  			<input type="file" name="pic" id = "pic" accept="image/*">
	  		</label>
			<label style = "display:none" id = "labelurl" for="pic">Enter image URL...
	  			<input type="url" name="url" id = "url">
	  		</label>
	  		<img alt="logo" src="./images/pen.jpg">
	  			<input type="text" name="picName" id= "picName" placeholder="Insert new puzzle name..." require>
	  		<input type = "submit" id = "submitpic" name ="submitpic">
			<input style = "display:none" type = "submit" id = "submiturl" name = "submiturl"> 
	  	</div>
	  	<div>
	  	<img id="animated-pic" alt="logo" src="./images/image.png">
	  	</div>

	</form>
</body>

<script>


document.getElementById("change").addEventListener("click",function (){
        var labelFile = document.getElementById("labelpic");
        var labelUrl = document.getElementById("labelurl");
        var submitFile = document.getElementById("submitpic");
		var submitUrl = document.getElementById("submiturl");
		
        if(labelUrl.style.display === "none"){
            labelFile.style.display = "none";
            submitFile.style.display = "none";
            labelUrl.style.display = "table";
            submitUrl.style.display = "inline-block";
        }else{
            if(labelFile.style.display === "none"){
                labelFile.style.display = "table";
                submitFile.style.display = "inline-block";
                labelUrl.style.display = "none";
                submitUrl.style.display = "none";
            }
        }
    });


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
