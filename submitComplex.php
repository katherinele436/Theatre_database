<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>

<html>

<head>
	<?php printHeadContents("SubmitReview"); ?>
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
if (!isset($_SESSION)){
	$_SESSION['user_number'] = "1234567894";
}

$CmplxNmbr = $_SERVER['REQUEST_URI'];
$Q_Mark = strpos($CmplxNmbr, "?");
$CmplxNmbr = substr($CmplxNmbr, $Q_Mark +1);


$sql = "INSERT INTO theatrecomplex (name, complexNumber, street, city, postalCode) Values
( '" .$_POST['cxname'] ."' , '" .$CmplxNmbr ."' , '"
.$_POST["cxstreet"] ."', '" .$_POST['cxcity'] ."' , '" .$_POST['cxpostal'] ."');";
echo ($sql);
$result = $conn->query($sql);
Redirect("/omts2/omts2/complex.php")?>
<body>
	
</body>

</html>