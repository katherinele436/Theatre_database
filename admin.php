
<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>
<?php
session_start();
?>
<?php


// Check if user is logged in using the session variable
  if ( $_SESSION['logged_in'] != 1 ) {
       $_SESSION['message'] = "You must log in before viewing your profile page!";
     }
     else {

         // Makes it easier to read
      $first_name = $_SESSION['first_name'];
      $last_name = $_SESSION['last_name'];
     }
 ?>
 <html>
 <head>
 	<?php printHeadContents("Profile"); ?>
 </head>
 <body>
 <?php include_once "./includes/headerAdmin.php"; ?>

 	<div class="profile">
 		<h1>Profile</h1>

     <h2><?php echo $first_name.' '.$last_name; ?></h2>
 		<div class="submit">
       <input type="submit" name="logout" value="Logout" />

 		</div>
 	</div>

 </html>
