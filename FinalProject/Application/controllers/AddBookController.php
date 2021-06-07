<?php
	$price = $_POST['price'];
	$name = $_POST['title'];
	$instock = $_POST['instock'];
	$imageURL = $_POST['image'];
	$author = $_POST['author'];
	$category = $_POST['category'];
	$description = $_POST['description'];

	include("../modules/admin/config.php");
	$conn = connectDatabase();
	$sql = "INSERT INTO books(
			Price, Name, Description, Instock, ImageURL, Category, Author)
			VALUES ('".$price."', '".$name."', '".$description."', '".$instock."', '".$imageURL."', '".$category."', '".$author."');";
	if ($conn->query($sql)) print("Succesful");
	else echo $conn->error;
?>

<script type="text/javascript">
	alert("Add Book Succesful!");
	window.location.replace("../views/Admin/index.php");
</script>
