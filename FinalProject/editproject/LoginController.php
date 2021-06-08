<?php
	// var_dump($_POST);
	include("../editproject/Model/User.php");
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
				window.location.replace("../editproject/Application/views/Admin/adminpage.php");
			</script>
			<?php
		}
		else if (getUserByUserNameAndPassWord($user,$pass)==0){
			$_SESSION['login']=$user;
                        ?>
                        <script type="text/javascript">
				window.location.replace("../editproject/index.php");
			</script>
                        
                        <?php
                        
		}
		else{
			?>
			<script type="text/javascript">
				alert("User name or password wrong!");
				window.location.replace("../editproject/index.php")
			</script>
			<?php
		}
	}
	?>
