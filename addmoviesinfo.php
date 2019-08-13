<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>
<html>
	
	<link rel="stylesheet" href="omts/omts/css/OMTS.css">
<head>
	<?php printHeadContents("addMovie"); ?>
</head>
<?php include_once "./includes/headeradmin.php"; ?>

<head>

<body>
  <div class="reservationsData">
		<h2>Add a movie</h2>
    <form id="editForm" method="POST" action="add.php">
    <div>
  	   <label>Title </label><input type="text" name="title" size="100" maxlength="200"/>
    </div>
    <div>
  	   <label>Running time </label><input type="text" name="runningtime" size="10" maxlength="10"/>
    </div>
    <div>
  	   <label>Rating </label><input type="text" name="rating" size="10" maxlength="10"/>
    </div>
    <div>
  	   <label>Plot synopsis </label><textarea name="plot" rows="4" cols="50"></textarea>
    </div>
    <div>
  	   <label>Director </label><input type="text" name="director" size="25" maxlength="100"/>
    </div>
    <div>
  	   <label>Production company </label><input type="text" name="company" size="25" maxlength="100"/>
    </div>
    <div>
  	   <label>Start date </label><input type="date" name="start" size="70" maxlength="10"/>
    </div>
    <div>
  	   <label>End date </label><input type="date" name="end" size="25" maxlength="10"/>
    </div>
    <div>
  	   <label>Poster </label><input type="url" name="post" size="25" maxlength="200"/>
    </div>
      <div>
        <input type="submit" value="Add" name="add" />
      </div>
    </form>
  </h2>
</div>
</body>

</html>
