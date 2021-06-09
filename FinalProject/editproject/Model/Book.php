<?php
	function getBookById($id){
		$conn = new mysqli("localhost:3307", "root" ,"","books") or die("Connection failed: " . $conn->connect_error);
		$sql = "select *from books where BookID=".$id.";";
		$res = $conn->query($sql);
		return $res->fetch_assoc();
	}
?>