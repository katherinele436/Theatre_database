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

	$sql = "SELECT * FROM theatrecomplex";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$Complex_Data = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["name"],$row["complexNumber"],$row["city"],$row["street"],$row["postalCode"]);
		array_push($Complex_Data, $Temp_array);
    } 
	?>
		<ul class="listofcomplexes">
		<li> <div class = "complex-flex">
		<div class ="complexname"> Location Name: </div>
		<div class = "complexnumber">Complex Number</div>
		<div class = "cmplxcity">City</div>
		<div class = "cmplxstrt">Street</div>
		<div class ="cmplxpstl">Postal Code</div>
		<div class ="editcmplx">Edit Complex</div>
		</div></li>
		<hr>
		<?php for ($i = 0; $i < count($Complex_Data); $i++){ ?>
		<li> <div class = "complex-flex">
		<div class ="complexname"> <?php echo$Complex_Data[$i][0] ?></div>
		<div class = "complexnumber"> <?php echo$Complex_Data[$i][1] ?> </div>
		<div class = "cmplxcity"> <?php echo$Complex_Data[$i][2] ?></div>
		<div class = "cmplxstrt"> <?php echo$Complex_Data[$i][3]?></div>
		<div class = "cmplxpstl"> <?php echo$Complex_Data[$i][4]?></div>
		<div class ="editcmplx">
		<a href="/omts2/omts2/complexinfo.php?<?php echo$Complex_Data[$i][1]?>" style="color:blue;"> Edit Complex</a></div>
		</div></li>
		<hr>
		
		<?php} ?>
	<?php } ?>
	</ul>
	<?php } ?>
<?php}?>
<br>
<?php
	$sql = "SELECT MAX(complexNumber) FROM theatrecomplex";
	$result = $conn->query($sql);	
	$max =$result->fetch_assoc();
	$max['MAX(complexNumber)'] = $max['MAX(complexNumber)'] +1;?>

<form action="/omts2/omts2/submitComplex.php?0<?php echo ($max['MAX(complexNumber)'])?>" method ="post" class ="flexwritComplex">
Add New Complex <br><br>
Complex Location Name:<input name ="cxname" class="cxname" type = "text">
Street:<input name ="cxstreet" class="cxstreet" type ="text">
City:<input name ="cxcity" class="cxcity" type="text">
Postal Code:<input name ="cxpostal" class="cxpostal" type ="text">
<input type ="submit" value ="Add New Complex" class = "ComplexSubmitButton">

</form>
</html>