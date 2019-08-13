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

$sql = "INSERT INTO review (accountNum, movieTitle, review, rating) Values ((select accountNum from customer where accountNum = '" . $_SESSION['user_number'] . "' 
), (select title from movie where title = '" .$_POST["movie"] ."'
), '" .$_POST["review"] ."', " .$_POST['rating'] .");";
$result = $conn->query($sql);
Redirect("/omts2/movies.php")?>
<body>
	
</body>

</html>