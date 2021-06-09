<?php
	if (isset($_GET['action'])){
		$action = $_GET['action'];
	}else{
		$action='';
	}
	
	if ($action == 'add'){
		include('../views/Admin/AddBook.php');
	}
	else if($action == 'delete'){
		include('../views/Admin/DeleteBook.php');
	}
	else if ($action == 'category'){
		include('../views/Admin/AddCategory.php');
	}
	else if ($action == 'update'){
		include('../views/Admin/EditBook.php');
	}
	else if ($action == 'viewOrder'){
		include('../views/Admin/ViewOrder.php');
	}
?>