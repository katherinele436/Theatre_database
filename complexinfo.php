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
	$ComNo = substr($ComNo, $Q_Mark +1);

	$sql = "SELECT * FROM theatrecomplex join theatre on theatre.complexNumber = theatrecomplex.complexNumber
	WHERE theatre.complexNumber = " .$ComNo;
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$Complex_Data = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["theatreNumber"],$row["maxSeat"],$row["screenSize"]);
		array_push($Complex_Data, $Temp_array);
    }
		?>
		<ul class="listoftheatres">
		<li> <div class = "theatre-flex">
		<div class = "theatrenumber">Theatre Number</div>
		<div class = "thtrseat">Maximum Seating</div>
		<div class = "thtrsize">Screen Size</div>
		<div class ="editthtr">Edit Theatre</div>
		</div>
		</div></li>
		<hr>
		<?php for ($i = 0; $i < count($Complex_Data); $i++){ ?>
		<li> <div class = "theatre-flex">
		<div class ="theatrenumber"> <?php echo$Complex_Data[$i][0] ?></div>
		<div class = "thtrseat"> <?php echo$Complex_Data[$i][1] ?> </div>
		<div class = "thtrsize"> <?php echo$Complex_Data[$i][2] ?></div>
		<div class ="editthtr">
		<a href="/omts2/omts2/theatreinfo.php?<?php echo$Complex_Data[$i][0]?>~<?php echo$ComNo?>" style="color:blue;"> Edit Theatre</a></div>
		</div></li>
		<hr>
		<?php }?>
	<?php }?>
<?php ?>
<br><?php
$sql = "SELECT * FROM theatrecomplex WHERE theatrecomplex.complexNumber = " .$ComNo;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$updtcmplx = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["name"],$row["street"],$row["city"],$row["postalCode"]);
		array_push($updtcmplx, $Temp_array);
    } ?>
	<hr>
	<form action="/omts2/omts2/editcomplex.php?<?php echo($ComNo)?>"method ="post" class ="flexwritComplex">
	Complex Location Name: <input name ="cplxlocname" class="thtrin" type ="text" value="<?php echo ($updtcmplx[0][0])?>">
	street: <input name ="cplxstrt" class="thtrin" type ="text" value="<?php echo ($updtcmplx[0][1])?>">
	city: <input name ="cplxcity" class="thtrin" type ="text" value="<?php echo ($updtcmplx[0][2])?>">
	postalCode: <input name ="cplxpostal" class="thtrin" type ="text" value="<?php echo ($updtcmplx[0][3])?>">
	<input type="hidden" name="cmplxNo" value=<?php echo($ComNo)?> />
	<input type ="submit" value ="Update Complex" class = "thtrin">
	</form>
	<?php
	}?>
<?php
$sql = "SELECT MAX(thtrcount.theatreNumber) FROM (SELECT theatreNumber FROM
theatrecomplex join theatre on theatrecomplex.complexNumber = theatre.complexNumber
WHERE theatrecomplex.complexNumber = " .$ComNo .") AS thtrcount;";
$result = $conn->query($sql);
$max =$result->fetch_assoc();
$max['MAX(thtrcount.theatreNumber)'] = $max['MAX(thtrcount.theatreNumber)'] +1;
?>


<form action="/omts2/omts2/submitTheatre.php?0<?php echo ($max['MAX(thtrcount.theatreNumber)'])?>~<?php echo$ComNo?>" method ="post" class ="flexwritComplex">
Add New Theatre <br><br>
Maximum Seating: <input name ="mxseat" class="thtrin" type ="text">
Screen Size:<input name ="scrnsize" class="thtrin" type="text">
<input type ="submit" value ="Add New Theatre" class = "thtrin">

</form>
</html>
