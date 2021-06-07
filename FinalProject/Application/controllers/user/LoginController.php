<?php
	// var_dump($_POST);
	include('../../models/User.php');
	session_start();
	if (isset($_POST['login']))
	{
		$user = $_POST['user'];
		$pass = $_POST['password'];
		$res = getUserByUserNameAndPassWord($user,$pass);
		echo $res;
		if (getUserByUserNameAndPassWord($user,$pass)==1){
			$_SESSION['login']=$user;
			$_SESSION['role']="admin";
			?>
			<script type="text/javascript">
				window.location.replace("../	../views/Admin/index.php");
			</script>
			<?php
		}
		else if (getUserByUserNameAndPassWord($user,$pass)==0){
			$_SESSION['login']=$user;
			$_SESSION['role']="user";
		}
		else{
			?>
			<script type="text/javascript">
				alert("User name or password wrong!");
				window.location.replace("../../views/User/Login.php")
			</script>
			<?php
		}
	}
	?>
