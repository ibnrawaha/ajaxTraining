<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Practice</title>
</head>
<body>
	
	<div class="container">
		
		<h1 id="demo">Ajax Practice</h1>


		<button id="btn" onclick="clk()">Click here</button>

		<div id="text"></div>

	</div>


<script>
	
	function clk(){

		var xhr = new XMLHttpRequest();

		xhr.open('GET','user.json',true);

		xhr.onload = function(){

			if(this.status == 200){

				console.log(this.responseText);

				var text = document.getElementById('text');

				var p = document.createElement('P');

				var user = JSON.parse(this.responseText);

				var output = "";
				output += user.id + "<br>";
				output += user.name + "<br>";
				output += user.email;

				text.appendChild(p);

				p.innerHTML = output;


			}

		}

		xhr.send();


	}


</script>


<!-- 



	<script>

		function clk(){
			
			var xhr = new XMLHttpRequest();

			console.log(xhr);

			// open xhr ('method', 'file location', asyncorounous)
			xhr.open('GET', 'sample.txt', true);

			// onloading the xhr object
			xhr.onload = function(){

				// checking the HTTP Statuses
			    // 200: "OK"
			    // 403: "Forbidden"
			    // 404: "Not Found"
				if(this.status == 200) {
					
					// console.log(xhr.responseText);

					// creating a paragraph element
					var p = document.createElement("P");

					var t = document.getElementById('text');

					// assigning the xhr.responseText value to the paragraph
					p.innerHTML = this.responseText;

					//append the paragraph to the div#text
					t.appendChild(p);
				}
				else if(this.status == 404){

					// creating a paragraph element
					var p = document.createElement("P");

					var t = document.getElementById('text');

					// assigning the xhr.responseText value to the paragraph
					p.innerHTML = "Not Found";

					//append the paragraph to the div#text
					t.appendChild(p);

				}


			};

			// send request to the browser
			xhr.send();
			// console.log(xhrOpen);

		}

	</script>
 -->

</body>
</html>