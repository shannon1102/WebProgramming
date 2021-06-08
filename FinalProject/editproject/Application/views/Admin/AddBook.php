<?php
	include("../models/Categories.php");
	$res =getAllCategories();
  session_start();
  if (!isset($_SESSION['role'])){
      ?>
      <script type="text/javascript">
          window.location.replace('../views/User/Login.php');
      </script>
      <?php
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add book</title>
	<link rel="stylesheet" type="text/css" href="../views/css/style.css">
	<style type="text/css">
		body {font-family: Arial, Helvetica, sans-serif;}
	</style>
</head>
<body id="addBook">
<div style="text-align: right">
    <nav>
    	<a href="../views/Admin/index.php">DARSHBOARD</a>||
        <a href="Profile.php">YOUR INFORMATION</a> ||
        <a href="./LogoutController.php" >LOG OUT</a>
    </nav> 
</div>

<h1 class="titleh1">Add Book Form</h1>

<div class="container">
  <form action="./AddBookController.php" method ="post">
  <div class="row">
    <div class="col-25">
      <label for="title">Title</label>
    </div>
    <div class="col-75">
      <input type="text" id="title" name="title" placeholder="Input title of book">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="price">Price</label>
    </div>
    <div class="col-75">
      <input type="text" id="price" name="price" placeholder="Input Price">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="instock">Instock</label>
    </div>
    <div class="col-75">
      <input type="text" id="instock" name="instock" placeholder="Instock">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="image">Image URL</label>
    </div>
    <div class="col-75">
      <input type="text" id="image" name="image" placeholder="Input Image URL">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="author">Author</label>
    </div>
    <div class="col-75">
      <input type="text" id="author" name="author" placeholder="Input Author">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
    <label for="category">Category</label>
    </div>
    <div class="col-75">
      <select id="category" name="category">
        <?php
        	foreach ($res as $key => $value) {
        		echo "<option value= ".$value.">".$value."</option>";
        	}
        ?>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="description">Description</label>
    </div>
    <div class="col-75">
      <textarea id="description" name="description" placeholder="Some Description..." 
      style="height:200px"></textarea>
    </div>
  </div>

  <div class="row">
      <input type="submit" value="Xác nhận">

  </div>
  </form>
</div>

</body>
</html>