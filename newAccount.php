<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>

<html>

<head>
	<?php printHeadContents("Create Account"); ?>
</head>

<body>
	<?php include_once "./includes/altHeader.php"; ?>
	<div class="login">
		<section>
				<h1>Create An Account</h1>
				<form id="newAccountForm" method="POST" action="signup.php">
					<div>
						<label for="userName">Username:</label> <input type="text" name="userName" id="userName" size="25" maxlength="100"/>
					</div>
					<div>
						<label for="userPassword">Password:</label> <input type="text" name="userPassword" id="userPassword" size="25" required />
					</div>
					<div>
						<label for="first">First Name:</label> <input type="text" name="first" id="first" size="25" required />
					</div>
					<div>
						<label for="last">Last Name:</label> <input type="text" name="last" id="last" size="25" required />
					</div>
					<div class="submit">
						<input type="submit" name="submit" value="Create Account" />
					</div>
				</form>

				<h4><a href="./index.php">Or, log into an existing account!</a></h4>
		</section>
	</div>
</body>
