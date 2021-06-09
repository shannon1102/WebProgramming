 <?php
    session_start();
      if (!isset($_SESSION['role'])){
          ?>
          <script type="text/javascript">
              window.location.replace('../User/Login.php');
          </script>
          <?php
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<section>
    <div class="body">
        <div style="text-align: right">
            <nav>
                <a href="./ShowInformation.php">YOUR INFORMATION</a> ||
                <a href="../../controllers/user/LogoutController.php" >LOG OUT</a>
            </nav> 
        </div>
        <div class="noi-dung-1">
            <div class="form">
                <br><br>
                <h1 class="titleh1">ADMIN PAGE</h1>
                <div class="input-form">
                    <br>
                    <button class="quan-ly" onclick="location.replace('../../controllers/AdminBookPageController.php?action=add')">ADD BOOK</button>
                    <br>
                    <button class="quan-ly" onclick="location.replace('../../controllers/AdminBookPageController.php?action=delete')">DELETE BOOKS</button>
                    <br>
                    <button class="quan-ly" onclick="location.replace('../../controllers/AdminBookPageController.php?action=update')">UPDATE BOOK</button><br>
                    <button class="quan-ly" onclick="location.replace('../../controllers/AdminBookPageController.php?action=viewOrder')">VIEW ORDER</button>
                    <br>
                    <!-- <button class="quan-ly" onclick="window.open('THONGKE.php', '_self')">THỐNG KÊ</button> -->
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
