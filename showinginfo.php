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
	$ComNo = $_SERVER['REQUEST_URI'];
	$Q_Mark = strpos($ComNo, "?");
	$ComNo = substr($ComNo, $Q_Mark +1);?>
	<hr>
	<form action="/omts2/omts2/editshowings.php?"method ="post" class ="flexwritComplex"> 
	<select name="MovieTitle" class="cxstreet">
	<option value="Default"><?php $_POST['MT'] ?></option>
	<?php
	$date = date('Y-m-d');
	$sql = "SELECT * FROM movie";	
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
	?>
	</select>
	Start Time<input name ="ST" class="thtrin" type ="text" value="<?php echo ($_POST['ST'])?>">
	Seats Available: <input name ="SA" class="thtrin" type ="text" value="50">
	Complex Number: <input name ="CN" class="thtrin" type ="text" value="<?php echo ($_POST['CN'])?>">
	Theatre Number: <input name ="TN" class="thtrin" type ="text" value="<?php echo ($_POST['TN'])?>">
	<input type= "submit" value="submit!" class ="thtrin">
	</form>

	Original Settings: <br>
	Movie: <?php echo ($_POST['MT']) ?> <br>
	Start Time: <?php echo ($_POST['ST'])?> <br>
	Seats Available: 50 <br>
	Complex Number: <?php echo ($_POST['CN'])?> <br>
	Theatre Number: <?php echo ($_POST['TN'])?> <br>
</html>