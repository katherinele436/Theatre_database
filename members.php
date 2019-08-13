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

$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$Customer_Data = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["FName"],$row["LName"],$row["accountNum"]);
		array_push($Customer_Data, $Temp_array);
    } 
	?>
		<ul class="listofcustomers">
		<li> <div class = "customer-flex"><div class ="customername"> Member Name: </div><div class = "customernumber">
		Account Number</div><div class = "custpurchhist">View Purchase History</div><div class = "customerdelete">Delete Member</div></div></li>
		<hr>
		<?php for ($i = 0; $i < count($Customer_Data); $i++){ ?>
		<li> <div class = "customer-flex">
		<div class ="customername"><?php echo$Customer_Data[$i][1] ?>, <?php echo$Customer_Data[$i][0] ?></div>
		<div class = "customernumber"> <?php echo$Customer_Data[$i][2] ?> </div>
		<div class = "custpurchhist"> <a href="/omts2/omts2/purchasehistory.php?<?php echo $Customer_Data[$i][2]?>" style= "color:blue;">Purchase History</a></div>
		<div class = "customerdelete"><a href="/omts2/omts2/deleteMember.php?<?php echo $Customer_Data[$i][2]?>" style="color:red;">DELETE ME</a></div>
		</div></li>
		<hr>
		<?php} ?>
	<?php } ?>
	</ul>
	<?php } ?>
<?php}?>
</html>