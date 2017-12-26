<?php 
	$conn = mysqli_connect('localhost','root','','cms');

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Complete Ajax Training</title>
	
	<style type="text/css">
		th, td {
			width: 20%;
			text-align: center;
			margin: 5px;
			border: 1px solid ;
		}

		tr {
			background-color: lightgray;
			height: 10px;
			
		}

		.msg{
			height:30px;
		}
	</style>

 </head>
 <body>
 	<h1>Complete Ajax Training</h1>


	<h4>Add User</h4>
	<form id="addUser">
		<input type="text" id="name">
		<input type="text" id="email">
		<button>Add User</button>
	</form>
	
	<div id="delete"></div>
	<div id="container"></div>

	<script type="text/javascript">

		/**
		 * Load Mysql Table
		 */
		window.onload = function() {
		    
		var xhr = new XMLHttpRequest();

		xhr.open('GET','complete.php',true);

		xhr.onload = function(){
			document.getElementById('container').innerHTML = xhr.responseText;

			console.log(this.responseType);

			var parser=new DOMParser();
			var xmlDoc=parser.parseFromString(this.responseText,"text/html");
			var del = xmlDoc.getElementById('delete');
			console.log(del);
		}

		xhr.send();

		}; // MYSLQ Table Loaded

		/**
		 * Post to Mysql Table
		 */
		
		document.getElementById('addUser').addEventListener('submit', addUser);

		function addUser(e){
			e.preventDefault();

			var xhr = new XMLHttpRequest();

			var name = document.getElementById('name').value;
			var email = document.getElementById('email').value;
			var params = "name="+name+"&email="+email ;

			xhr.open('POST','complete.php',true);

			// MUST Add When submitting a form
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhr.onload = function(){
				if(xhr.status == 200){
					document.getElementById('container').innerHTML = xhr.responseText;
				}
			}

			xhr.send(params);


		}


		

		document.getElementById('delete').addEventListener('click', deleteUser);

		function deleteUser(){

			var xhr = new XMLHttpRequest();

			var delUser = document.getElementById('delete').value;
			var params = "userId="+delUser;

			xhr.open('DELETE' , 'complete.php', true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhr.onload = function(){
				if(xhr.status == 200){
					document.getElementById('container').innerHTML = xhr.responseText;
				}
			}

			xhr.send(params)

		}


	</script>
 </body>
 </html>