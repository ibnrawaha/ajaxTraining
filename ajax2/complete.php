<?php 
$conn = mysqli_connect('localhost','root','','cms');

function showDataBaseTable(){

	global $conn;

	/**
	 * // <!-- SHOWING DATABASE TABLE -->
	 */

	$query = "SELECT * FROM ajax ORDER BY id DESC";
	$result = mysqli_query($conn, $query);
	?>

	<table>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
		while($rows = mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td><?php echo $rows['name']; ?></td>
				<td><?php echo $rows['email']; ?></td>
				<td><button id="edit" value="<?php echo $rows['id']; ?>">Edit</button></td>
				<td><button id="delete" value="<?php echo $rows['id']; ?>">Delete</button></td>
			</tr>
			<?php
		}
		?>
	</table>
	<?php
}
?>



<?php

	if(isset($_POST) && !empty($_POST)){
		var_dump($_REQUEST);
		$name = mysqli_escape_string($conn, $_POST['name'] );
		$email = mysqli_escape_string($conn, $_POST['email']);
		
		// POST Query
		$query = "INSERT INTO `ajax` (`name`,`email`) VALUES ('".$name."' , '".$email."')";
		// echo $query;
		$result = mysqli_query($conn, $query);

		$msg = "Successfully Added User: $name with Email: $email.";
		?>
		<div class="msg">
			<?php echo $msg; ?>
		</div>

		<?php
		showDataBaseTable();

	} 
	elseif(isset($_POST) && !empty($_POST) && isset($_POST['userId'])){
		echo "Delete";
	}
	else {
var_dump($_REQUEST);
		echo "<div class='msg'></div>";

		showDataBaseTable();
	}

?>