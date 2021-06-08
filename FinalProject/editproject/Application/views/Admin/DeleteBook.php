<?php
	include('../modules/admin/config.php');
	$conn = connectDatabase();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete book</title>
	<link rel="stylesheet" href="../views/css/style.css">
</head>
<body>
	<div style="text-align: right">
	    <nav>
	    	<a href="../views/Admin/index.php">DARSHBOARD</a>||
	        <a href="Profile.php">YOUR INFORMATION</a> ||
	        <a href="Logout.php" >LOG OUT</a>
	    </nav> 
	</div>
	<h2 class="titleh1">Select Delete Books:</h2>
	<div class="container">
	<form action ="./DeleteBookController.php" method="post">
		<table border="2" width="100%">
			<th></th>
			<th>Title</th>
			<th>Price</th>
			<th>Instock</th>
			<th>Category</th>
			<th>Author</th>
			<th>Image URL</th>
			<th>Description</th>
 
			<?php
				$query=$conn->query("select * from `books`");
				while($row=$query->fetch_assoc()){
					?>
					<tr>
						<td><input type="checkbox" value="<?php echo $row['BookID']; ?>" name="BookID[]"></td>
						<td><?php echo $row['Name']; ?></td>
						<td><?php echo $row['Price']; ?></td>
						<td><?php echo $row['Instock']; ?></td>
						<td><?php echo $row['Category'] ?></td>
						<td><?php echo $row['Author'] ?></td>
						<td><?php echo $row['ImageURL'] ?></td>
						<td><?php echo $row['Description'] ?></td>
					</tr>
					<?php
				}
			?> 
		</table>
	<br>
	<input type="submit" name="submit" value="Delete">
	</form>
	</div>

</body>
</html>