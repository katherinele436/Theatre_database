<?php
session_start();
include_once "./includes/functions.php"; ?>

<html>

<head>
	<?php printHeadContents("Update profile"); ?>
</head>

<body>
	<?php include_once "./includes/header.php"; ?>
  <div class="reservationsData">
    <form action="updatecomplete.php" method="POST">
    <div>
      <label for="userPassword">Password:</label> <input type="text" name="userPassword" id="userPassword" size="25" required />
    </div>
    <div>
      <label for="first">First Name:</label> <input type="text" name="first" id="first" size="25" required />
    </div>
    <div>
      <label for="last">Last Name:</label> <input type="text" name="last" id="last" size="25" required />
    </div>
    <div>
      <label for="street">Address:</label> <input type="text" name="address" id="address" size="25" required />
    </div>
    <div>
      <label for="city">City:</label> <input type="text" name="city" id="first" size="25" required />
    </div>
    <div>
      <label for="postal">Postal Code:</label> <input type="text" name="postal" id="last" size="25" required />
    </div>
    <div>
      <label for="card_number">Credit card:</label> <input type="text" name="card_number" id="card_number" size="25" />
    </div>
    <div>
      <label for="name">Name on Card:</label> <input type="text" name="first" id="name" size="25" />
    </div>
    <div>
      <label for="expiry_date">Expiry date:</label> <input type="date" name="expiry_date" id="expiry_date" size="25"/>
    </div>
    <div>
      <input type="Submit" value="Update">
    </div>
    </form>
</div>
</body>

</html>
