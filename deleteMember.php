<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>

<html>

<head>
	<?php printHeadContents("SubmitReview"); ?>
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
$AccountNumber = $_SERVER['REQUEST_URI'];
$Q_Mark = strpos($AccountNumber, "?");
$AccountNumber =substr($AccountNumber, $Q_Mark +1);

$sql = "DELETE FROM customer where accountNum = " . $AccountNumber;
$result = $conn->query($sql);
echo ($result);
echo($sql);
Redirect("/omts2/omts2/members.php")?>?>
<body>
	
</body>

</html>