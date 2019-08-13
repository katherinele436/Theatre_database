<!DOCTYPE html>

<?php include_once "./includes/functions.php"; ?>
<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
}
else {

    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $user_number = $_SESSION['user_number'];
    $street = $_SESSION['street'];
    $city = $_SESSION['city'];
    $postal_code = $_SESSION['postalCode'] ;
    $card_number = $_SESSION['card_number'];
    $name_on_card = $_SESSION['name_on_card'] ;
    $expiry_date = $_SESSION['expiry_date'];

}
?>
<html>

<head>
	<?php printHeadContents("Profile"); ?>
</head>

<body>
	<?php include_once "./includes/header.php"; ?>

	<div class="profile">
		<h1>Profile</h1>

    <h2><?php echo $first_name.' '.$last_name; ?></h2>
    <h2>Address: <?php echo $street.', '.$city.', '.$postal_code; ?></h2>
    <h2><?php echo 'Credit card: XXXX-XXXX-XXXX-'.substr($card_number,-4); ?></h2>
    <h2><?php echo 'Name on card: '.$name_on_card; ?></h2>
    <h2><?php echo 'Expiry date: '.$expiry_date; ?></h2>
		<div class="submit">
      <a href="index.php">
        <input type="submit" value="Logout" />
      </a>
      <a href = "update.php">
			 <input type="submit" value="Edit Profile" />
      </a>
		</div>
	</div>
</body>

</html>
