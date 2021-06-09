<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/user.css">
</head>
<body>
	<div class="hero">
		<div class="form-box">
			<!-- <div class=button-box>
				<div id="btn"></div>
				<button type="button" class ="toggle-btn">Log In</button>
				<button type="button" class ="toggle-btn">Register</button>
			</div> -->
			<h1 id="h1title">Register</h1><br>
			<h2 id="h2title">Book Page</h2>
                        <form class="input-group" id="login-form" action="../../Controller/user/RegisterController.php" method="post">
				<input type="text" class="input-field" placeholder="User Name" required name="user">
				<input type="text" class="input-field" placeholder="Email" name="email" required>
				<input type="password" class="input-field" placeholder="Password" required name="password">
				<input type="text" class="input-field" placeholder="Phone number" name="phone" required>
				<div class="register-check-box"></div>
				<input type="submit" class="submit-register" name="register" value="Register"><br>
			</form>
		</div>
	</div>
</body>
</html>


