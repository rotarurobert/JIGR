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
	  <li><a href="/MVC/public/main">Home</a></li>
	  <li><a href="/MVC/public/upload">Upload</a></li>
	  <li><a class="active" href="/MVC/public/search">Search</a></li>
	  <li><a href="/MVC/public/playground">Playground</a></li>
	</ul>
	<h2>Scroll or type a title name below to see already saved puzzels, click and play!</h2>

	<input type="text" id="myInput" onkeyup="myFunction()" placeholder=" Search for names.." title="Type in a name">

	<div class="grid-container" id = "myGrid">
	  <?php searchModel::items(); ?>
	</div>
</body>

</html>