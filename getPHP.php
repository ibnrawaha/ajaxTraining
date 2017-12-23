<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Get PHP</title>
</head>
<body>
	<form id="getForm" >
		<input id="name1" type="text" name="name">
		<button id="btn">submit</button>
	</form>

	<div id="text"></div>


	<script type="text/javascript">
		
		// We are working on the FORM ID
		document.getElementById('getForm').addEventListener('submit', myFunc);

		function myFunc(e){

			// Prevent the FORM ID from submitting
			e.preventDefault();

			var xhr = new XMLHttpRequest();

			var name = document.getElementById('name1').value;

			xhr.open("GET", "phpPage.php?name="+name , true);

			xhr.onload = function(){
				// if (this.status == 200) {
					// console.log(this.responseText);
					document.getElementById('text').innerHTML = this.responseText;
				// }
			}

			xhr.send();

		}

	</script>
</body>
</html>