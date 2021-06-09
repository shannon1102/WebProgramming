<?php
    require "db.php";
    if (isset($_GET["product"])) {
        $select = $_GET["product"];
      }
    if (isset($_POST["option"])) {
        $option = $_POST["option"];
    } else {
        $option = "see";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <style>
        .title {
            display: flex;
            margin-top: 30px;
        }
        .container {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            max-width: 1170px;
        }
        .container h2 {
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 18px;
            flex: none;
            margin-right: 20px;
        }
        .container select {
            width: 100%;
            margin-right: 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .container input {
            width: 100px;
            flex: none;
            cursor: pointer;
            border-radius: 5px;
        }
        table.delivery {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .delivery td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .delivery tr:nth-child(even) {
            background-color: #dddddd;
        }
        .product_detail {
            display: flex;
            border: 1px solid #cccccc;
        }
        .product_detail .left {
            flex: 1;
            padding: 20px;
            border: 0px solid #cccccc;
            border-right-width: 1px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .product_detail .left tr{
            margin-bottom: 20px;
            font-size: 18px;
            display: block;
        }
        .product_detail .left td{
            padding-right: 30px;
            width: 120px;
        }
        .product_detail .right {
            padding: 20px;
        }
        .submit_btn {
            text-align: right;
        }
        .submit_btn input {
            padding: 10px 0px;
        }
        .view_cart a {
            text-decoration: none;
        }
        .view_cart button {
            padding: 20px 30px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            $db = new Db(); 
        ?>
        <!-- SELECT PRODUCT -->
        <form action="" method="GET">
            <div class="title">
                <h2>Select the product : </h2>
                <select name="product" id="">
                    <?php 
                        $db->get_all_products($select);
                    ?>
                </select>
                <input type="submit" value="Go">
            </div>
        </form>

        <!-- PRODUCT DETAILS -->
        <?php 
            if(isset($_GET["product"])){
                $pd = $db->get_product_by_id($_GET["product"]);

                print '<form action="./view_cart.php" method = "POST">';
                print ('<h2 class="description">Product Details</h2>');
                print '<div class="product_detail">';
                print '<div class="left">';
                print '<table class="details">';
                print '<tr><td>Product Name:</td><td>'. $pd->name .'</td></tr>';
                print '<tr><td>Publisher:</td><td>'. $pd->publisher  .'  </td></tr>';
                print '<tr><td>SKU:</td><td> '. $pd->sku .' </td></tr>';
                print '<tr><td>Platform:</td><td> '. $pd->platform .' </td></tr>';
                print '</table>';
                print '</div>';
                print '<div class="right"> ';
                print '<img class="image_thumnail" src="'. $pd->img .'" width="300" height="200">';
                print '</div>';
                print " </div><br>";
                print '<table class="delivery" border = 1 style="text-align: center">';
                print '<tr><th style="color: red">*</th><th>Deliverable</th><th>Description</th><th>Price</th></tr>';
                print '<tr><td><input type="radio" name="deliver" value="0" checked></td><td>Download</td><td>Choose this option if you want to download via Internet</td><td>Free!</td></tr>';
                print '<tr><td><input type="radio" name="deliver" value="1"></td><td>Online</td><td>Choose this option if you want to using online </td><td>999999 VND</td></tr>';
                print '</table><br>';
                print '<input type="hidden" name="idProduct" value="'. $select .'">';
                print '<input type="hidden" name="option" value="add">';
                print '<div class="submit_btn"><input type="submit" value="Add To Cart"></div>';
                print '</form>';
            }
        ?>
        <div class="view_cart">
            <a href="./view_cart.php">
                <button>
                    View Cart
                </button>
            </a>
        </div>
    </div>
</body>
</html>