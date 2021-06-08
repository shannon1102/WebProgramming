<?php
	include('../modules/admin/config.php');
	$conn = connectDatabase();
	if (isset($_POST['BookID'])){
		foreach ($_POST['BookID'] as $id):
			echo $id;
 			$sql = "DELETE FROM books WHERE BookID=".$id.";";
 			$conn->query($sql);
		endforeach; 
	?>
		<script type="text/javascript">
			alert("Delete successful!");
			window.location.replace("../views/Admin/index.php");			
		</script>
<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Please select book to delete!");
			window.location.replace("./AdminBookPageController.php?action=delete");
		</script>
		<?php
	}
?>