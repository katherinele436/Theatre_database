
<?php include_once "./includes/functions.php"; ?>
<?php
  session_start();
  require 'db.php';
  $_SESSION['logged_in'] = true;

  $user_number = $_SESSION['1234567894'];
 
  if (isset($_POST['Submit'])){
    $first = mysql_real_escape_string($_POST["first"]);
    $last = mysql_real_escape_string($_POST["last"]);
    $password = mysql_real_escape_string($_POST["password"]);
    $address = mysql_real_escape_string($_POST["address"]);
    $city = mysql_real_escape_string($_POST["city"]);
    $postal = mysql_real_escape_string($_POST["postal"]);
    $card_number = mysql_real_escape_string($_POST["card_number"]);
    $name = mysql_real_escape_string($_POST["name"]);
    $expiry_date= mysql_real_escape_string($_POST["expiry_date"]);

  echo "Sucess";
  $sql="UPDATE Customer
  SET password = '$password', FName ='$first', LName='$last', street='$street',city='$city',postalCode='$postal',cardNumber='$card_number',nameOnCard='$name',expiryDate='$expiry_date'
  WHERE accountNum='$user_number'";
  if (mysqli_query($conn, $sql)){

    header("Location:profile.php");
    exit();
  }
  }
 ?>
 <html>

 <head>
 	<?php printHeadContents("Update profile"); ?>
 </head>

 <body>
 	<?php include_once "./includes/header.php"; ?>
</body>
</html>
