<?php
  session_start();
  if (!isset($_SESSION['role'])){
      ?>
      <script type="text/javascript">
          window.location.replace('../View/User/Login.php');
      </script>
      <?php
  }

  $id = $_GET['id'];
  include('../../Model/Book.php');
  $res = getBookById($id);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>BookStore</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div style="text-align: right">
    <nav>
    	<a href="../Admin/index.php">DARSHBOARD</a>||
        <a href="./ShowInformation.php">YOUR INFORMATION</a> ||
        <a href="../../Controller/user/LogoutController.php" >LOG OUT</a>
    </nav> 
</div>

<h1 class="titleh1">Edit Book Form</h1>

<div class="container">
    <form action="../../Controller/EditBookController.php" method ="post">

   <div class="row">
    <!-- <div class="col-25">
      <label for="id">Book ID</label>
    </div>  -->
    <div class="col-75">
      <input type="hidden" id="idd" name="idd" value="<?php echo $id ?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="title">Title</label>
    </div>
    <div class="col-75">
      <input type="text" id="title" name="title" value="<?php echo $res['Name'] ?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="price">Price</label>
    </div>
    <div class="col-75">
      <input type="text" id="price" name="price" value="<?php echo $res['Price'] ?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="instock">Instock</label>
    </div>
    <div class="col-75">
      <input type="text" id="instock" name="instock" value="<?php echo $res['Instock'] ?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="image">Image URL</label>
    </div>
    <div class="col-75">
      <input type="text" id="image" name="image" value="<?php echo $res['ImageURL'] ?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="author">Author</label>
    </div>
    <div class="col-75">
      <input type="text" id="author" name="author" value="<?php echo $res['Author'] ?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
    <label for="category">Category</label>
    </div>
    <div class="col-75">
      <select id="category" name="category">
      	<!-- <option value="<?php echo $res['Category'] ?>" selected> <?php echo $res['Category'] ?> </option> -->
        <option value="Comic" <?php if ($res['Category']=="Comic") echo "selected" ?> >Comic</option>
        <option value="Novel" <?php if ($res['Category']=="Novel") echo "selected" ?>>Novel</option>
        <option value="Drama" <?php if ($res['Category']=="Drama") echo "selected" ?>>Drama</option>
        <option value="Sci-Fic" <?php if ($res['Category']=="Sci-Fic") echo "selected" ?>>Sci-Fic</option>
        <option value="Other" <?php if ($res['Category']=="Other") echo "selected" ?>>Other</option>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="description">Description</label>
    </div>
    <div class="col-75">
      <textarea id="description" name="description" style="height:200px"> <?php echo $res['Description'] ?></textarea>
    </div>
  </div>

  <div class="row">
      <input type="submit" value="Xác nhận">

  </div>
  </form>
</div>

</body>
</html>