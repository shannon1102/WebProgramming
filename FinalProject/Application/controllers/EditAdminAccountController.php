<?php
	session_start();
	$user = $_SESSION['login'];
	$pass = $_POST['pass'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	include("../modules/admin/config.php");
	$conn = connectDatabase();
	
	$sql = "UPDATE users
			SET Password='".$pass."',PhoneNumber='".$phone."',Email='".$email."'
			WHERE UserName='".$user."';";
	if ($conn->query($sql)){
		?>
			<script type="text/javascript">
			alert("Change information success!");
			window.location.replace("../views/Admin/index.php");
			</script>
		<?php
	}
	else {
		?>
		<script type="text/javascript">
			alert("Can not change information!");
			window.location.replace("../views/Admin/ShowInformation.php");
		</script>
		<?php
	}
?>
