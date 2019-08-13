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
				<form id="reservationForm" method="get" action="./reservations4.php">
					<div class="reservationFormComplex">
						<label for="reservationFormComplex">Complex:</label>
						<input type="text" name="reservationFormComplex" class="reservationFormComplex" value="<?php echo $_GET['reservationFormComplex'] ?>" size="30" maxlength="3" readonly />
					</div>
					<div class="reservationFormMovie">
					<label for="reservationFormMovie">Movie:</label>
						<input type="text" name="reservationFormMovie" class="reservationFormMovie" value="<?php echo $_GET['reservationFormMovie'] ?>" size="30" maxlength="3" readonly />
					</div>
					<div class="reservationFormDay">
						<label for="reservationFormDay">Day:</label>
						<select name="reservationFormDay" class="reservationFormDay">
							<option value="Default">-</option>
							<?php
							$sql = "SELECT DISTINCT startTime FROM showing JOIN theatrecomplex ON showing.complexNumber = theatrecomplex.complexNumber WHERE name = '".$_GET['reservationFormComplex']."' AND showing.movieTitle = '".$_GET['reservationFormMovie']."'";	
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								unset($day);
								$day = $row['startTime'];
								echo '<option value="'.$day.'">'.$day.'</option>';								
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
				<input type="hidden" name ="compoundNumber" value = <?php echo($_GET['compoundNumber'])?>>
				</form>
	</div>
</body>
</body>

</html>