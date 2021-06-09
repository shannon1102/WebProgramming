<?php
	if (isset($_GET['action'])){
		$action = $_GET['action'];
	}else{
		$action='';
	}
	
	if ($action == 'add'){
		include('../View/Admin/AddBook.php');
	}
	else if($action == 'delete'){
		include('../View/Admin/DeleteBook.php');
	}
	else if ($action == 'category'){
		include('../View/Admin/AddCategory.php');
	}
	else if ($action == 'update'){
		include('../View/Admin/EditBook.php');
	}
	else if ($action == 'viewOrder'){
		include('../View/Admin/ViewOrder.php');
	}
?>