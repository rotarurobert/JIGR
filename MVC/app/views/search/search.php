<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>jigr.</title>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/search.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="./script/search.js"></script>

</head>

<body>
<ul class="topnav">
	  <li><img alt="logo" src="./images/puzzle-logo.jpg"><p class="title">jigr.</p></li>
	  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/main">Home</a></li>
	  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/upload">Upload</a></li>
	  <li><a class="active" href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/search">Search</a></li>
	  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']?>/MVC/public/playground">Playground</a></li>
	</ul>
	<h2>Scroll or type a title name below to see already saved puzzels, click and play!</h2>

	<input type="text" id="myInput" onkeyup="myFunction()" placeholder=" Search for names.." title="Type in a name">

	<div class="grid-container" id = "myGrid">
	  <div><a href="./images/1.jpg"><img alt="1" src="./images/1.jpg"></a><p>Moonlight</p></div>
	  <div><a href="./images/2.jpg"><img alt="2" src="./images/2.png"></a><p>Full Universe</p></div>
	  <div><a href="./images/3.jpg"><img alt="3" src="./images/3.jpg"></a><p>Over the Hills</p></div>
	  <div><a href="./images/4.jpg"><img alt="4" src="./images/4.jpg"></a><p>Sunset from Amsterdam</p></div>
	  <div><a href="./images/5.jpg"><img alt="5" src="./images/5.jpg"></a><p>Underwater World</p></div>
	  <div><a href="./images/6.png"><img alt="6" src="./images/6.jpg"></a><p>To.. Venice!</p></div>
	</div>
</body>

</html>