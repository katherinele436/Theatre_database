<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>

<html>

<head>
	<?php printHeadContents("Cancel Reservations"); ?>
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
	if (!isset($_SESSION)){
	$_SESSION['user_number'] = "1234567894";
	}
	 $date = date('Y/m/d H:i:s');
	$sql = "SELECT * FROM reservation where accountNum = " .$_SESSION['user_number'] ." AND startingTime > '" .$date ."'";

	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$Complex_Data = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["movieTitle"],$row["startingTime"],$row["complexNumber"],$row['theatreNumber'],$row['reservationID'],$row['numTicket']);
		array_push($Complex_Data, $Temp_array);
    }
	
	?>
		<ul class="listoftheatres">
		<li> <div class = "theatre-flex">
		<div class = "theatrenumber">Movie Title</div>
		<div class = "theatrenumber">Starting Time</div>
		<div class = "theatrenumber">Complex Number</div>
		<div class ="theatrenumber">Theatre Number</div>
		<div class ="theatrenumber">#of tickets </div>
		<div class ="theatrenumber"> Cancel </div>
		</div></li>
		<hr>
		<?php for ($i = 0; $i < count($Complex_Data); $i++){ ?>
		<li> <div class = "theatre-flex">
		<div class = "theatrenumber"> <?php echo$Complex_Data[$i][0]?></div>
		<div class = "theatrenumber"> <?php echo$Complex_Data[$i][1] ?></div>
		<div class = "theatrenumber"> <?php echo$Complex_Data[$i][2] ?></div>
		<div class = "theatrenumber"> <?php echo$Complex_Data[$i][3] ?></div>
		<div class = "theatrenumber"> <?php echo$Complex_Data[$i][5]?></div>
		<div class = "theatrenumber">
		<form action="/omts2/omts2/cancelreservation.php" method="post">
		<input type="hidden" name="resID" value= <?php echo($Complex_Data[$i][4])?>>
		<input type="submit" value="Cancel!">
		</form>
		</div>
		</div></li>
		<hr>
		<?php } ?>
	</ul><?php
	}
	?>
</body>

</html>