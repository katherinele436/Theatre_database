<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>

<html>

<head>
	<?php printHeadContents("Reservations"); ?>
</head>

<body>
	<?php include_once "./includes/header.php"; ?>
	
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "theatredb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sel = 0;
	?>
	
	<div class="reservationsText">
		<h1>Reservations</h1> 
		<p>The Online Movie Ticket Service is the go-to place to reserve a spot at the hottest new films. 
		Select one of our associated theatre complexes, the film you'd like to see, and a showing.<p>
	</div>
	
	<div class="reservationsData">
		<h2>Make A Reservation</h2> 
				<form id="reservationForm" method="get" action="./reservations2.php">
					<div class="reservationFormComplex">
						<label for="reservationFormComplex">Complex:</label>
						<select name="reservationFormComplex" class="reservationFormComplex">
							<option value="Default">-</option>
							<?php
							$sql = "SELECT name,complexNumber FROM theatrecomplex";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								unset($complex);
								$complex = $row['name'];
								$complex_num =$row['complexNumber'];
								echo '<option value="'.$complex.'">'.$complex.'</option>';								
								}
							} 
							else {
								echo "0 results";
							}
							$conn->close();
							?>
						</select>
					</div>
					<div class="submit">
						<input type="submit" class="submit" value="Reserve Tickets" />
					</div>
				<input type="hidden" name ="compoundNumber" value = <?php echo($complex_num)?>>
				</form>
	</div>
</body>

</html>