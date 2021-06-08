<style>
    th{
        background-color:#999;
    }
    div.table {margin-bottom: 0.4em;}
    div.action {margin-bottom: 0;}
</style>
<?php $ItemID = $book['BookID'];?>
<?php require 'header.php'; ?>
<link rel="stylesheet" href="DetailBookStyle.css">
<p><button class ="btn btn-default" type"submit" onclick="location.href='cart.php'" >Go to Cart</button></p>
<div class ="table">
    <table width="450" border="1" style="border-collapse:collapse">
        <tr>
            <th height="46" colspan="2" align="center">Detail</th>
        </tr>
        <tr>
            <td rowspan="7"><img src="<?php echo $book['ImageURL'] ?>" width="200" height="300" /></td>
            <td>Book Name: <?php echo $book['Name'] ?></td>
        </tr>

        <tr>
            <td>Author: <?php echo $book['Author'] ?></td>
        </tr>
        <tr>
            <td>Category: <?php echo $book['Category'] ?></td>
        </tr>
        <tr>
            <td >Instock : <?php echo $book['Instock'] ?> </td>
        </tr>

        <tr>
            <td style="color:#F30">Price: <?php echo $book['Price'] ?>VND</td>
        </tr>
        <tr>
            <th colspan="2" align="center">Description</th>
        </tr>
        <tr>
            <td colspan="2"><?php echo $book['Description'] ?></td>
        </tr>
    </table>
</div>
<div class="action">
    <!-- <button class="add-to-cart btn btn-default" id="btnThemVaoGioHang">Add to cart</button> -->
    <form action="addToCart.php" method="post">
        <input type="hidden" name="idbooks" value="<?= $ItemID ?>">
        <input type="submit" value="Add This to Cart"> <br><br>
    </form>
<!--                                <a class="like btn btn-default" href="#"><span class="fa fa-heart"></span></a>-->
</div>
</body>
</html>