<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Page</title>
</head>
<body>
	<h1>PHP Page</h1>
	
	<div id="welcome">
		<?php 
			if (isset($_GET['name']) && !empty(trim($_GET['name']))) {
				echo "Welcome Back " . $_GET['name'];
			} 
		 ?>
		
	</div>
</body>
</html>