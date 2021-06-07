<?php 

	function getUserByUserNameAndPassWord($user,$password){
		$conn = new mysqli("localhost","root","","webprogramming") or die("Connection failed: " . $conn->connect_error);
		$sql = "select *from users where UserName='".$user."' and Password='".$password."';";
		$res= $conn->query($sql);
		if ($res){
			$row = $res->fetch_assoc();
			// var_dump($row);
			if ($row['Role']==1) return 1;
			else return 0;
		}
		return -1;
	}
