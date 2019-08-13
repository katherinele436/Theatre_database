<?php require 'login.php'; ?>
<!DOCTYPE html>
<?php include_once "./includes/functions.php"; ?>

<html>

<head>
	<?php printHeadContents("Login"); ?>
</head>

<body>
	<?php include_once "./includes/altHeader.php"; ?>
	<div class="login">
		<section>
				<h1>Login</h1>
				<form id="loginForm" method="POST" action=" index.php">
					<div>
						<label for="userName">Username:</label> <input type="text" name="userName" id="userName" size="25" maxlength="100"/>
					</div>
					<div>
						<label for="userPassword">Password:</label> <input type="text" name="userPassword" id="userPassword" size="25" required />
					</div>
					<div class="submit">
						<input type="submit" name="Login" />
					</div>
				</form>

				<h4><a href="./newAccount.php">No Account? Make One!</a></h4>

		</section>
	</div>
</body>
