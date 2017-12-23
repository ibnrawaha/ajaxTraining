<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Practice</title>
</head>
<body>

	<h1>Ajax Practice : Get Data From APIs</h1>

	<button id="btn" onclick="getUsers()">Fetch Users</button>

	<div id="users"></div>
	

	<?php 

	 ?>

	<script>


		function getUsers(){
			var xhr = new XMLHttpRequest;
			xhr.open('GET','https://api.github.com/users',true);
			xhr.onload = function(){
				if(this.status == 200){
					users = JSON.parse(this.responseText);
					// console.log(users);
					var output = ""; 
					for(var i in users){
						output += "<img src='"+users[i].avatar_url+"' style='width:70px; height:70px;'>";
						output += users[i].login +"<br>";
					}
					document.getElementById('users').innerHTML = output;

				}
			}
			xhr.send();
		}
	</script>
</body>
</html>