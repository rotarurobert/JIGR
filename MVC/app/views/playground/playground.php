<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>jigr.</title>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/playground.css">
<script src="./script/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="./script/paper.js" type="text/javascript"></script>
<script src="./script/playground.js" type="text/paperscript" canvas="canvas"></script>
</head>

<body>
<ul class="topnav">
	  <li><img alt="logo" src="./images/puzzle-logo.jpg"><p class="title">jigr.</p></li>
	  <li><a href="/MVC/public/main">Home</a></li>
	  <li><a href="/MVC/public/upload">Upload</a></li>
	  <li><a href="/MVC/public/search">Search</a></li>
	  <li><a class="active" href="/MVC/public/playground">Playground</a></li>
	</ul>
	<div class="menu">
	 	<button onclick="drawPiesa();">Play</button>
	 	<button>Preview image</button>
	 	<button>Reset</button>
	 	<button>Save & Resume later</button>
 	</div>
    <div class="item main">
		<canvas id="canvas" class="canvas" resize></canvas>
		<img id="puzzle-image" style="display: none;"class="puzzle-image"  src="./images/<?php echo $_GET['image'] ?>" />
		<img id="empty" style="display: none;"src="./images/empty.png" />
 	</div>
</body>
</html>
