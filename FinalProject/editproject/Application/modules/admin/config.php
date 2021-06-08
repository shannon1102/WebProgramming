<?php
	function connectDatabase($host="localhost:3307", $user ="root", $pass ="", $db="book1"){
		$conn = new mysqli($host, $user ,$pass, $db) or die("Connection failed: " . $conn->connect_error);
		return $conn;
	}
?>