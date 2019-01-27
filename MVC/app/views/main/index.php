<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>jigr.</title>
<link rel="stylesheet" href="./css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<ul class="topnav">
	  <li><img alt="logo" src="./images/puzzle-logo.jpg"><p class="title">jigr.</p></li>
	  <li><a class="active" href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/main">Home</a></li>
	  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/upload">Upload</a></li>
	  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/search">Search</a></li>
	  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/playground">Playground</a></li>
	</ul>
	<h1>Welcome to jigr.</h1>
	<h2>Select from below and solve one of our most popular puzzles or <br/> make one with your own picture on <u>Upload</u> page.</h2>
	<div class="grid-container">
		<?php mainModel::items(); ?>
	</div>
</body>

</html>
