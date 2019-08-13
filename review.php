<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>

<html>
<head>
	<?php printHeadContents("Reviews"); ?>
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
$Movie_title = $_SERVER['REQUEST_URI'];
$Q_Mark = strpos($Movie_title, "?");
$Movie_title = str_replace("%20"," ",substr($Movie_title, $Q_Mark +1));
$sql = "SELECT * FROM review Join customer on customer.accountNum = review.accountNum WHERE movieTitle = '" . $Movie_title . "'";
$result = $conn->query($sql);
if ($result!= null){
	if ($result->num_rows > 0) {
		$Review_Data = array();
		while($row = $result->fetch_assoc()) {
			$Temp_array = array($row["FName"],$row["review"],$row["rating"]);
			array_push($Review_Data, $Temp_array);
		}
	?>
	<hr class ='divisor'>
	<p class = 'Review-Header'> Reviews for <?php echo $Movie_title?> </p>
	<ul>
	<?php for ($i = 0; $i < count($Review_Data); $i++){ ?>
	<li class ="review-areview"><div class = "flex-review">
	<div class ="review-name-rating">User: <?php echo $Review_Data[$i][0]; echo ("\n"); ?> <img src="images/<?php echo $Review_Data[$i][2];?>.jpg" alt = <?php echo $Review_Data[$i][2]; ?>><?php echo $Review_Data[$i][2]?> stars</div>
	<div class = "review-text"> <?php echo $Review_Data[$i][1];?></div>
	</div></li>
	<?php } ?>
	</ul>
	<?php } ?>

<?php } ?>
</body>
</html>