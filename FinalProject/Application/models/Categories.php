<?php
	include("../modules/admin/config.php");
	function getAllCategories(){
		$conn = connectDatabase();
		$sql = "select * from Categories;";
		$res = $conn->query($sql);
		$listCategories=[];
		if ($res->num_rows>0){
			while ($row = $res->fetch_assoc()){
				$listCategories[]=$row['Category'];
			}
			return $listCategories;
		}
		return -1;
	}
?>