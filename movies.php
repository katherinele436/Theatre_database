<?php
$_SESSION['logged_in'] = true;
if ($_SESSION['logged_in'] != true){
	Redirect("http://localhost/omts/omts/index.php");
}
 ?>
<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>
<html>
	<link rel="stylesheet" href="omts/omts/css/OMTS.css">
<head>
	<?php printHeadContents("Movies"); ?>
</head>

<body>
	<?php include_once "./includes/header.php"; ?>
</body>

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

$sql = "SELECT * FROM movie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$Movie_Data = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["title"],$row["rating"],$row["plotSynopsis"], $row["poster"]);
		array_push($Movie_Data, $Temp_array);
    } ?>
	<ul class="listofmovies">
		<?php for ($i = 0; $i < count($Movie_Data); $i++){ ?>
			<li class = "movielistitem"><div class = "flex-movie">
			<div class = "movie-poster"><img src="<?php echo $Movie_Data[$i][3];?>" alt = "Failed Poster"></div>
			<div class ="movie-name"><?php echo $Movie_Data[$i][0]; ?></div>
			<div class = "movie-rating"><?php echo $Movie_Data[$i][1]; ?></div>
			<div class = "movie-description"><?php echo $Movie_Data[$i][2]; ?><a href="review.php?<?php echo $Movie_Data[$i][0]?>" id = "movie-review" style="color:red;">  Click here to read user submitted reviews</a></div>
			</div></li>
			<hr />
		<?php } ?>
	</ul>
	<?php

} else {
    echo "0 results";
}
$conn->close();
?>
</html>

