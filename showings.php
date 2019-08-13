<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>
<html>
	<link rel="stylesheet" href="omts/omts/css/OMTS.css">
<head>
	<?php printHeadContents("Showings"); ?>
</head>

<body>
	<?php include_once "./includes/headeradmin.php"; ?>
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
if (isset($_SESSION)){
	$AccountNumber = $_SESSION['user_number'];
}
else{
	$AccountNumber = 1234567894;
}
$sql = "SELECT * FROM showing";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$Customer_Data = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["movieTitle"],$row["startTime"],$row["seatAvailable"],$row["complexNumber"],$row["theatreNumber"]);
		array_push($Customer_Data, $Temp_array);
    } 		?>
		<ul class="listofcustomers">
		<li> <div class = "customer-flex"><div class ="customername"> Movie Title: </div>
		<div class = "customernumber">Start Time</div>
		<div class = "customernumber">Seats Available</div>
		<div class = "customernumber">Complex Number</div>
		<div class = "customernumber">Theatre Number</div>
		<div class = "customernumber">Edit</div>
		</div></li>
		<hr>
		<?php for ($i = 0; $i < count($Customer_Data); $i++){ ?>
		<li> <div class = "customer-flex">
		<div class ="customername"><?php echo$Customer_Data[$i][0] ?></div>
		<div class = "customernumber"><?php echo$Customer_Data[$i][1] ?> </div>
		<div class = "customernumber"> <?php echo $Customer_Data[$i][2]?></div>
		<div class = "customernumber"><?php echo $Customer_Data[$i][3]?></div>
		<div class = "customernumber"><?php echo $Customer_Data[$i][4]?></div>
		<div class = "customernumber">
		<form action="/omts2/omts2/showinginfo.php" method="post">
		<input type="hidden" name="MT" value= <?php echo($Customer_Data[$i][0])?>>
		<input type="hidden" name="ST" value= <?php echo($Customer_Data[$i][1])?>>
		<input type="hidden" name="SA" value= <?php echo($Customer_Data[$i][2])?>>
		<input type="hidden" name="CN" value= <?php echo($Customer_Data[$i][3])?>>
		<input type="hidden" name="TN" value= <?php echo($Customer_Data[$i][4])?>>
		<input type="submit" value="Edit!">
		</form>
		</div>


		</div></li>
		<hr>

<?php } ?>
<?php } ?>

<form action="/omts2/omts2/submitShowing.php?>" method ="post" class ="flexwritComplex">
Add New Showing <br><br>
Movie Name:
<select name="MovieTitle" class="cxstreet">
<option value="Default">-</option>
<?php
$date = date('Y-m-d');
$sql = "SELECT * FROM movie ORDER BY title;";	
echo($sql);
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	unset($movie);
	$movie = $row['title'];
	echo '<option value="'.$movie.'">'.$movie.'</option>';								
	}
} 
else {
	echo "0 results";
}
$conn->close();
?>
</select>
startTime:<input name ="ST" class="cxstreet" type ="text">
Seats Available:<input name ="SA" class="cxcity" type="text">
Complex Number:<input name ="CN" class="cxpostal" type ="text">
Theatre Number:<input name ="TN" class="cxpostal" type ="text">
<input type ="submit" value ="Add New Showing" class = "ComplexSubmitButton">
</html>