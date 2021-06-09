<?php
	$price = $_POST['price'];
	$name = $_POST['title'];
	$instock = $_POST['instock'];
	$imageURL = $_POST['image'];
	$author = $_POST['author'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$id =$_POST['idd'];
	include("../db/db.php");
	$conn = connectDatabase();
	
	$sql = "UPDATE books
			SET Price='".$price."', Name='".$name."',Description='".$description."',Instock='".$instock."',ImageURL='".$imageURL."',Category='".$category."',Author='".$author."' 
			WHERE BookID=".$id.";";
	if ($conn->query($sql)){
		?>
			<script type="text/javascript">
			alert("Edit Book Succesful!");
			window.location.replace("../View/Admin/index.php");
			</script>
		<?php
	}
	else {
		?>
		<script type="text/javascript">
			alert("Can not edit book");
			window.location.replace("./AdminBookPageController.php?action=update");
		</script>
		<?php
	}
?>
