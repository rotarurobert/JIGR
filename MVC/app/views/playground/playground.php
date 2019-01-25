<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>jigr.</title>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/playground.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<body>
<ul class="topnav">
	  <li><img alt="logo" src="./images/puzzle-logo.jpg"><p class="title">jigr.</p></li>
	  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/main">Home</a></li>
	  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/upload">Upload</a></li>
	  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/search">Search</a></li>
	  <li><a class="active" href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/playground">Playground</a></li>
	</ul>
	<div class="menu">
	 	<button onclick="drawPiesa();">Play</button>
	 	<button>Preview image</button>
	 	<button>Reset</button>
	 	<button>Save & Resume later</button>
 	</div>
    <div class="item main">
			<div class="container">Loading...
			</div>
			<div class="container2">
			</div>
 	</div>
</body>
<script src="./script/blocks.js"></script>
</html>
