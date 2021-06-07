<?php
	function connectDatabase($host="localhost", $user ="root", $pass ="", $db="webprogramming"){
		$conn = new mysqli($host, $user ,$pass, $db) or die("Connection failed: " . $conn->connect_error);
		return $conn;
	}
?>