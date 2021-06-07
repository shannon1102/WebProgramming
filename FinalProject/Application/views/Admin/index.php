 <?php
//     session_start();
// if (!isset($_SESSION["boss"]) )
// {
//     header("location:Index.php");
// }
 	$path = 'localhost/WebPro/FinalProject/Application';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QUẢN LÝ</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<section>
    <div class="body">
        <div style="text-align: right">
            <nav>
                <a href="Profile.php">THÔNG TIN CÁ NHÂN</a> ||
                <a href="Logout.php" >ĐĂNG XUẤT </a>
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
                    <button class="quan-ly" onclick="location.replace('../../controllers/AdminBookPageController.php?action=delete')">DELETE BOOKS</button><br>
                    <button class="quan-ly" onclick="window.open('QUANLYHANGHOA.php', '_self')">QUẢN LÝ HÀNG HÓA</button><br>
                    <button class="quan-ly" onclick="window.open('QUANLY_HOADON.php', '_self')">QUẢN LÝ HÓA ĐƠN</button><br>
                    <button class="quan-ly" onclick="window.open('LAPHOADON.php', '_self')">LẬP HÓA ĐƠN</button>
                    <br>
                    <button class="quan-ly" onclick="window.open('THONGKE.php', '_self')">THỐNG KÊ</button>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
