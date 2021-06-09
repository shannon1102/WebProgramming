<?php
	// var_dump($_POST);
	include('../../Model/User.php');
	session_start();
	if (isset($_POST['login']))
	{
		$user = $_POST['user'];
		$pass = $_POST['password'];
		$res = getUserByUserNameAndPassWord($user,$pass);
		if (getUserByUserNameAndPassWord($user,$pass)==1){
			$_SESSION['login']=$user;
			$_SESSION['role']="admin";
			?>
			<script type="text/javascript">
				window.location.replace("../../View/Admin/index.php");
			</script>
			<?php
		}
		else if (getUserByUserNameAndPassWord($user,$pass)==0){
			$_SESSION['login']=$user;
                        ?>
                        <script type="text/javascript">
				window.location.replace("../../index.php")
			</script>
                        <?php
		}
		else{
			?>
			<script type="text/javascript">
				alert("User name or password wrong!");
				window.location.replace("../../View/User/Login.php")
			</script>
			<?php
		}
	}
	?>
