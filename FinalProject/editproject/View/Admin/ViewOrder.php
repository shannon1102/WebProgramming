<?php
	include('../db/db.php');
	$conn = connectDatabase();

  	session_start();
	  if (!isset($_SESSION['role'])){
	      ?>
	      <script type="text/javascript">
	          window.location.replace('../View/User/Login.php');
	      </script>
	      <?php
	  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>BookStore</title>
	<link rel="stylesheet" href="../View/css/style.css">
</head>
<body>
	<div style="text-align: right">
	    <nav>
	    	<a href="../View/Admin/index.php">DARSHBOARD</a>||
	        <a href="../View/Admin/ShowInformation.php">YOUR INFORMATION</a> ||
	        <a href="./user/LogoutController.php" >LOG OUT</a>
	    </nav> 
	</div>
	<h2 class="titleh1">View Order</h2>
	<div class="container">
	<form>
		<table border="2" width="100%">
			<th>User Name</th>
			<th>Book ID</th>
			<th>Quantity</th>
			<th>Date Buy</th>
			<th>Price</th>
 
			<?php
				$query=$conn->query("select * from `invoices`");
				while($row=$query->fetch_assoc()){
					?>
					<tr>
						<td><?php echo $row['UserName']; ?></td>
						<td><?php echo $row['BookID']; ?></td>
						<td><?php echo $row['Quantity']; ?></td>
						<td><?php echo $row['DateBuy'] ?></td>
						<td><?php echo $row['Price'] ?></td>
					</tr>
					<?php
				}
			?> 
		</table>
	<br>
	</form>
	</div>
</body>
</html>
