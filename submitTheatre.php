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

$ThtrNo = $_SERVER['REQUEST_URI'];
$Q_Mark = strpos($ThtrNo, "?");
$ThtrNo = substr($ThtrNo, $Q_Mark +1,2);
$CxNo = $_SERVER['REQUEST_URI'];
$Q_Mark = strpos($CxNo, "~");
$CxNo = substr($CxNo, $Q_Mark+1,2);

$sql = "INSERT INTO theatre (complexNumber, theatreNumber, maxSeat, screenSize) Values
( '" .$CxNo ."' , '" .$ThtrNo ."' , '"
.$_POST["mxseat"] ."', '" .$_POST['scrnsize'] ."');";
echo ($sql);
$result = $conn->query($sql);
Redirect("/omts2/omts2/complex.php")?>
<body>
	
</body>

</html>