<?php 

	function getUserByUserNameAndPassWord($user,$password){
		$conn = new mysqli("localhost","root","","webprogramming") or die("Connection failed: " . $conn->connect_error);
		$sql = "select *from users where UserName='".$user."' and Password='".$password."';";
		$res= $conn->query($sql);
		if ($res){
			if ($res->num_rows>0){
				$row = $res->fetch_assoc();
				// var_dump($row);
				if ($row['Role']==1) return 1;
				else return 0;
			}else return -1;
		}
		return -1;
	}

	function addNewUser($userName, $pass, $email, $phone, $isAdmin){
		$conn = new mysqli("localhost","root","","webprogramming") or die("Connection failed: " . $conn->connect_error);
		$sql = "INSERT INTO users (UserName, Password, Email, PhoneNumber, Role)
				VALUES ('".$userName."','".$pass."','".$email."','".$phone."',".$isAdmin.")";
		if ($conn->query($sql)) return 1;
		return -1;
	}

	function getUserByUserName($user){
		$conn = new mysqli("localhost","root","","webprogramming") or die("Connection failed: " . $conn->connect_error);
		$sql = "select *from users where UserName='".$user."';";
		$res = $conn->query($sql);
		if ($res){
			if($res->num_rows>0){
				$row = $res->fetch_assoc();
				return $row;
			}
		}
		return 0;
	}