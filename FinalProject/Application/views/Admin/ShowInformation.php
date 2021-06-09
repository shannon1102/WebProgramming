<?php
  session_start();
  if (!isset($_SESSION['role'])){
      ?>
      <script type="text/javascript">
          window.location.replace('../views/User/Login.php');
      </script>
      <?php
  }
  $user = $_SESSION['login'];
  include('../../models/User.php');
  $profile = getUserByUserName($user);

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
        <a href="../../controllers/user/LogoutController.php" >LOG OUT</a>
    </nav> 
</div>

<h1 class="titleh1">Profile</h1>

<div class="container">
  <form action="../../controllers/EditAdminAccountController.php" method ="post">

  <div class="row">
    <div class="col-25">
      <label for="title">User Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="user" name="user" value="<?php echo $profile['UserName'] ?>" disabled>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="price">Password</label>
    </div>
    <div class="col-75">
      <input type="text" id="pass" name="pass" value="<?php echo $profile['Password'] ?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="instock">Email</label>
    </div>
    <div class="col-75">
      <input type="text" id="email" name="email" value="<?php echo $profile['Email'] ?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="image">Phone Number</label>
    </div>
    <div class="col-75">
      <input type="text" id="phone" name="phone" value="<?php echo $profile['PhoneNumber'] ?>">
    </div>
  </div>
  

  <div class="row">
      <input type="submit" value="Change">

  </div>
  </form>
</div>

</body>
</html>