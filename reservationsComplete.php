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
	if (!isset($_SESSION)){
	$_SESSION['user_number'] = "1234567894";
	}
	$sql = "Select Max(reservationID) FROM reservation";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
	$Max_Data = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["Max(reservationID)"]);
		array_push($Max_Data, $Temp_array);
    }
	$Max = $Max_Data[0][0] + 1;
	$sql = "INSERT INTO reservation (accountNum, reservationID,numTicket,movieTitle, startingTime, complexNumber, theatreNumber) Values
	((Select accountNum from customer where accountNum = '".$_SESSION['user_number'] . "'), '". $Max ."', '" .$_POST['reservationFormNumTickets'] ."', '"
	.$_POST['reservationFormMovie'] ."','" .$_POST['reservationFormDay'] ."','" .$_POST['compoundNumber'] ."', '01');" ;
	$result = $conn->query($sql);
	}
	?>

	<div class="profile">
		<h1>Reservation Complete!</h1>
		<h2>Film: <?php echo $_POST['reservationFormMovie'] ?></h2>
		<h4>Theatre Complex: <?php echo $_POST['reservationFormComplex'] ?></h4>
		<h4>Date and Time: <?php echo $_POST['reservationFormDay'] ?></h4>
		<h4><?php echo $_POST['reservationFormNumTickets'] ?> x Tickets<h4>
	</div>
</body>

</html>
