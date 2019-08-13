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
if (!(isset($_Session))){
	$_SESSION['user_number'] = "1234567895";
}
$_SESSION['user_number'] = "1234567895";

$sql = "INSERT INTO showing (movieTitle, startTime, seatAvailable, complexNumber, theatreNumber) 
Values ((select title from movie where title = '" . $_POST['MovieTitle'] . "' 
), '" .$_POST["ST"] ."'
, '" .$_POST["SA"] ."'
,'" .$_POST['CN'] ."'
,'" .$_POST['TN'] ."');";
$result = $conn->query($sql);
echo($sql);

Redirect("/omts2/omts2/showings.php")?>
<body>
	
</body>

</html>