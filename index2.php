<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Practice 2</title>
</head>
<body>
	
	<div class="container">
		
		<h1 id="demo">Ajax Practice 2</h1>


		<button id="user" onclick="loadUser()">Load User</button>
		<button id="users" onclick="loadUsers()">Load Users</button>

		<div id="divUser"></div>
		<div id="divUsers"></div>

	</div>




	<script>

		function loadUser(){

			var xhr = new XMLHttpRequest();

			xhr.open('GET', 'user.json', true);

			xhr.onload = function (){
				if(this.status == 200){
					// console.log(xhr.responseText);
					var user = JSON.parse(this.responseText);

					var output = "<ul>"+
					"<li>"+user.id+"</li>"+
					"<li>"+user.name+"</li>"+
					"<li>"+user.email+"</li>"+
					"</ul>";

					document.getElementById('divUser').innerHTML = output;
				}
			}

			xhr.send();

		}


		function loadUsers(){

			var xhr = new XMLHttpRequest();

			xhr.open('GET','users.json',true);

			xhr.onload = function(){

				if (this.status == 200){

					console.log(this.responseText);
					var users = JSON.parse(this.responseText);

					var outputs= "";

					for (var i = 0; i < users.length; i++) {
						
						outputs += "<ul>"+
							"<li>" + users[i].id + "</li>"+
							"<li>" + users[i].name + "</li>"+
							"<li>" + users[i].email + "</li>"+
							"</ul>";

					};
					
				document.getElementById('divUsers').innerHTML = outputs;
				}


			}

			xhr.send();

		}

	</script>
</body>
</html>