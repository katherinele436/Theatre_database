<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>

<html>

<head>
	<?php printHeadContents("editComplex"); ?>
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
$CmplxNo = $_SERVER['REQUEST_URI'];
$Q_Mark = strpos($CmplxNo, "?");
$CmplxNo = substr($CmplxNo, $Q_Mark +1);
$sql = "Update theatrecomplex SET name= '" .$_POST['cplxlocname'] . "',
		street = '" .$_POST['cplxstrt'] . "',
		city = '" .$_POST['cplxcity'] ."', 
		postalCode = '" .$_POST['cplxpostal'] . "' WHERE complexNumber = " .$CmplxNo;

echo ($sql);
$result = $conn->query($sql);
Redirect("/omts2/omts2/complexinfo.php?".$CmplxNo ) ?>
<body>
	
</body>

</html>