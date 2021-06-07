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
			<h1 id="h1title">Log In</h1><br>
			<h2 id="h2title">To Book Page</h2>
			<form class="input-group" id="login-form" action="../../controllers/user/LoginController.php" method="post">
				<input type="text" class="input-field" placeholder="User Name" required name="user">
				<input type="text" class="input-field" placeholder="Password" required name="password">
				<input type="checkbox" class="check-box"><span>Remember Password</span>
				<input type="submit" class="submit-login" name="login" value="Login"><br>
				<button type="button" class="submit-login">Register</button>
				<div id="adiv"><a href="" id="atag">Hehe</a></div>
			</form>
		</div>
	</div>
</body>
</html>

