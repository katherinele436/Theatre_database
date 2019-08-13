<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>

<html>

<head>
	<?php printHeadContents("submitTheatre"); ?>
</head>
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

$sql = "Update theatre SET maxSeat= '" .$_POST['thtrseats'] . "',
		screenSize = '" .$_POST['thtrscreensize'] . "'  WHERE complexNumber = " .$_POST['ComNo'] . " AND theatreNumber = " .$_POST['thtrNo'];

echo ($sql);
$result = $conn->query($sql);
/*Redirect("/omts2/omts2/theatreinfo.php?".$_POST['thtrNO']."~".$_POST['ComNo'] )*/ ?>
<body>
	
</body>

</html>