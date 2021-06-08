<?php
	$category = $_POST['category'];
	include('../models/Categories.php');
	if (addCategory($category)==1){
		?>
		<script type="text/javascript">
			alert("Add category success!");
			window.location.replace("../views/Admin/index.php");
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Can not add category!");
			window.location.replace("./AdminBookPageController.php?action=category");
		</script>
		<?php
	}
?>