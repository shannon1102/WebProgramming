<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Category</title>
	<link rel="stylesheet" type="text/css" href="../views/css/style.css">
</head>
<body>
<div style="text-align: right">
    <nav>
    	<a href="../views/Admin/index.php">DARSHBOARD</a>||
        <a href="Profile.php">YOUR INFORMATION</a> ||
        <a href="Logout.php" >LOG OUT</a>
    </nav> 
</div>

<h1 class="titleh1">Add Category Form</h1>

<div class="container">
  <form action="./AddCategoryController.php" method ="post">

  <div class="row">
    <div class="col-25">
      <label for="title">Category</label>
    </div>
    <div class="col-75">
      <input type="text" id="title" name="category" placeholder="Input category" required>
    </div>
  </div>

  <div class="row">
      <input type="submit" value="Add Category">

  </div>
  </form>
</div>

</body>
</html>