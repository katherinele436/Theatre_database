<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>
<html>
	
	<link rel="stylesheet" href="omts/omts/css/OMTS.css">
<head>
	<?php printHeadContents("addMovie"); ?>
</head>
<?php include_once "./includes/headeradmin.php"; ?>
<?php
require 'db.php';
$sql = "SELECT * FROM movie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$Movie_Data = array();
    while($row = $result->fetch_assoc()) {
		$Temp_array = array($row["title"],$row["rating"],$row["plotSynopsis"], $row["poster"]);
		array_push($Movie_Data, $Temp_array);
    } ?>

	<ul class="listofmovies">
		<?php for ($i = 0; $i < count($Movie_Data); $i++){ ?>
			<li class = "movielistitem"><div class = "flex-movie">
			<div class ="movie-name"><?php echo $Movie_Data[$i][0]; ?></div>
			<div class = "movie-rating"><?php echo $Movie_Data[$i][1]; ?></div>
			<div class = "movie-description"><?php echo $Movie_Data[$i][2]; ?></div>
			</div></li>
			<hr />
		<?php }
     ?>
	</ul>
    <div>
      <h4><a href="addmoviesinfo.php" style="color:black;">Add movie</a></h4>
    </div>
	<?php

} else {
    echo "0 results";
}
$conn->close();
?>
</html