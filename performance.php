<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>

<html>

<head>
	<?php printHeadContents("Performance"); ?>
</head>

<body>
	<?php include_once "./includes/headeradmin.php"; ?>

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
	$sql = "SELECT movie.title, SUM(reservation.numTicket) FROM movie join reservation on movie.title = reservation.movieTitle GROUP BY title;";

	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$Complex_Data = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["title"],$row["SUM(reservation.numTicket)"]);
		array_push($Complex_Data, $Temp_array);
    }
	
	?>
		<ol class="listoftheatres">
		Ticket Sales!
		<li> <div class = "theatre-flex">
		<div class = "theatrenumber">Movie Title</div>
		<div class = "theatrenumber">Sales</div>
		</div></li>
		<hr>
		<?php for ($i = 0; $i < count($Complex_Data); $i++){ ?>
		<li> <div class = "theatre-flex">
		<div class = "theatrenumber"> <?php echo$Complex_Data[$i][0]?></div>
		<div class = "theatrenumber"> <?php echo$Complex_Data[$i][1] ?></div>
		</div></li>
		<hr>
		<?php } ?>
	</ol><?php
	}
	?>

	<?php $sql = "SELECT theatrecomplex.name, SUM(reservation.numTicket) FROM theatrecomplex join reservation on theatrecomplex.complexNumber = reservation.complexNumber GROUP BY
	name;";

	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$Complex_Data = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["name"],$row["SUM(reservation.numTicket)"]);
		array_push($Complex_Data, $Temp_array);
    }
	
	?>
		<ol class="listoftheatres">
		Complex Sales!
		<li> <div class = "theatre-flex">
		<div class = "theatrenumber">Complex Name</div>
		<div class = "theatrenumber">Sales</div>
		</div></li>
		<hr>
		<?php for ($i = 0; $i < count($Complex_Data); $i++){ ?>
		<li> <div class = "theatre-flex">
		<div class = "theatrenumber"> <?php echo$Complex_Data[$i][0]?></div>
		<div class = "theatrenumber"> <?php echo$Complex_Data[$i][1] ?></div>
		</div></li>
		<hr>
		<?php } ?>
	</ol><?php
	}
	?>
</body>

</html>