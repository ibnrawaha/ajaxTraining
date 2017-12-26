<?php 
	$conn = mysqli_connect('localhost','root','','cms');

	if($conn){
		echo "connection success";
	}
	else {
		echo "Failed";
		echo mysqli_connect_error() ." == " . mysqli_connect_errno();
	}

	if(!empty($_POST)){
		$name = $_POST['name'];
		$email = $_POST['email'];

		var_dump($_POST);
		$query  = "INSERT INTO `ajax` (`name`,`email`) VALUES  ('".$name."', '".$email."')";
		echo $query;
		$result  = mysqli_query($conn , $query);
		echo $result;
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Post Ajax</title>
</head>
<body>
	<form id="postAjax" >
		<input type="text" name="name" id="name" placeholder="Enter Name">
		<input type="text" name="email" id="email" placeholder="Enter E-mail">
		<button id="submit">Submit</button>
	</form>

	<div id="text"></div>
	

	<?php 
		if(!empty($_POST) ){
			echo "Your Name is: " . $_POST['name'];
			echo "<br>";
			echo "Your Email is: " . $_POST['email'];
		}
	 ?>

	<script type="text/javascript">
		
		document.getElementById("postAjax").addEventListener('submit', myFunc);

		function myFunc(e){
			// prevent the form from making any action
			e.preventDefault();

			// assigning name input to a variable
			var name = document.getElementById('name').value;
			// assigning email input to a variable
			var email = document.getElementById('email').value;

			// setting parametars to be sent as POST Request for PHP
			var params = "name="+name+"&email="+email;

			// instantiating ne XHR object
			var xhr = new XMLHttpRequest();

			// 'The method' , 'Action URL' , 'Asynchronous'
			xhr.open('POST','postAjax.php', true);

			//
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhr.onload = function(){
				if(xhr.status == 200){
					// console.log(xhr.responseText);
					document.getElementById('text').innerHTML = xhr.responseText;
					
				}
			};

			xhr.send(params);


		}

	</script>
</body>
</html>