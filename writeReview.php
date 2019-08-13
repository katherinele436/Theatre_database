<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>

<html>

<head>
	<?php printHeadContents("Past Reservations"); ?>
</head>

<body>
	<?php$movie = "";?>
	<form action="./submitReview.php" method ="post" class ="flexwriteReview">
	<?php include_once "./includes/header.php"; ?>
	<hr>
	<h1 class = "WRheader"> Write a Review!</h1> 
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

	$sql = "SELECT title FROM movie";
	$result = $conn->query($sql);
	?><select name="movie" class = "WRmoviedropdown"><?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {?>
	<option value="<?php echo $row["title"] ?>"><?php echo $row["title"]?></option>

<?php	}
} ?>

	<textarea name ="review" rows ="10" cols ="50" class = "writeReviewTextBox">
	Write your review here!
	</textarea>
	<select name = "rating" class = "WRratingdropdown">
	<option value ="0">0</option>
	<option value ="1">1</option>
	<option value ="2">2</option>
	<option value ="3">3</option>
	<option value ="4">4</option>
	<option value ="5">5</option>
	</select>
	<input type ="submit" value ="Submit Review!" class = "WRsubmitbutton">

</form>
</body>

</html>