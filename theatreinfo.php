<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>

<html>

<head>
	<?php printHeadContents("submitTheatre"); ?>
</head>
</body>
 <?php include_once "./includes/headerAdmin.php"; 
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
$thtrNo = $_SERVER['REQUEST_URI'];
$Q_Mark = strpos($thtrNo, "?");
$thtrNo = substr($thtrNo, $Q_Mark +1,2);
$ComNo = $_SERVER['REQUEST_URI'];
$Q_Mark = strpos($ComNo, "~");
$ComNo = substr($ComNo, $Q_Mark +1);
$sql = "SELECT * FROM theatre WHERE theatreNumber = " .$thtrNo ." AND complexNumber = " .$ComNo;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$updtthtr = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["maxSeat"],$row['screenSize']);
		array_push($updtthtr, $Temp_array);
    }
	?>

	<hr>
	<form action="/omts2/omts2/editthtr.php" method ="post" class ="flexwritComplex"> 
	<input type="hidden" name ="ComNo" value ='<?php echo($ComNo) ?>'>
	<input type="hidden" name ="thtrNo" value ='<?php echo($thtrNo) ?>'>
	Max Seats: <input name ="thtrseats" class="thtrin" type ="text" value="<?php echo ($updtthtr[0][0])?>">
	screenSize: <input name ="thtrscreensize" class="thtrin" type ="text" value="<?php echo ($updtthtr[0][1])?>">
	<input type ="submit" value ="Update Complex" class = "thtrin">
	</form>
<?php }?>
</body>
</html>