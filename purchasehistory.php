<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>
<html>
	<link rel="stylesheet" href="omts/omts/css/OMTS.css">
<head>
	<?php printHeadContents("Members"); ?>
</head>

<body>
 <?php include_once "./includes/headerAdmin.php"; ?>
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
$AccountNumber = $_SERVER['REQUEST_URI'];
$Q_Mark = strpos($AccountNumber, "?");
$AccountNumber = str_replace("%20"," ",substr($AccountNumber, $Q_Mark +1));

$sql = "SELECT * FROM reservation join theatrecomplex on reservation.complexNumber = theatrecomplex.complexNumber where accountNum = " .$AccountNumber;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$Customer_Data = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["movieTitle"],$row["startingTime"],$row["name"]);
		array_push($Customer_Data, $Temp_array);
    }?>
	<ul class = "list-of-ph">
	<li class ="ph">
	<div class = "purchase-history-flex">
		<div class ="phmovie">Movie</div>
		<div class = "phDATETIME"> When </div>
		<div class = "phplace"> Place</div>
	</div></li>
	<hr>
	<?php for ($i = 0; $i < count($Customer_Data); $i++){ ?>
		<li> <div class = "purchase-history-flex">
		<div class ="phmovie"><?php echo$Customer_Data[$i][0]?>&nbsp </div>
		<div class = "phDATETIME"> on: <?php echo$Customer_Data[$i][1] ?> </div>
		<div class = "phplace"> At: <?php echo$Customer_Data[$i][2]?></div>
		</div></li>
		<hr>
	<?php }?>
	</ul>
	<?php }?>
<?php}?>
</html>