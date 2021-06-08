<?php
	if (isset($_POST)){
		$user = $_POST['user'];
		$pass = $_POST['password'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		if (isset($_POST['isAdmin'])){
			$isAdmin = 1;
		}else $isAdmin =0;

		include_once("Model/User.php");
		$res = addNewUser($user, $pass, $email, $phone , $isAdmin);
		if ($res==1){ ?>
			<script type="text/javascript">
			alert("Register Success!");
			window.location.replace("../../views/User/Login.php");
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
			alert("Can not Register!");
			window.location.replace("../../views/User/Register.php");
			</script>
			<?php
		}
	}else {
		?>
		<script type="text/javascript">
			alert("Something wrong!");
			window.location.replace("../../views/User/Register.php");
		</script>
		<?php
	}

?>