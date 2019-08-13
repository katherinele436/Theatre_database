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

$sql = "DELETE FROM reservation WHERE reservationID = '". $_POST['resID']."'";
echo ($sql);
$result = $conn->query($sql);
echo ($result);
Redirect("/omts2/omts2/cancel.php")?>
<body>
	
</body>

</html>