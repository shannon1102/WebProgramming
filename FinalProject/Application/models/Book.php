<?php
	function getBookById($id){
		$conn = new mysqli("localhost", "root" ,"","webprogramming") or die("Connection failed: " . $conn->connect_error);
		$sql = "select *from books where BookID=".$id.";";
		$res = $conn->query($sql);
		return $res->fetch_assoc();
	}
?>