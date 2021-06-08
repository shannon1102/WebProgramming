<?php
include './db/db.php';
session_start();
$username = $_SESSION['login'];

$query = "SELECT b.*, c.Quantity FROM `Carts` as c, `Books` as b WHERE b.BookID = c.BookID AND c.UserName = '$username' ";

//Test query
//$query = "SELECT b.*, c.Quantity FROM `Carts` as c, `Books` as b WHERE b.BookID = c.BookID AND c.UserName = 'hoavan'";
//$query = "SELECT * from Carts";
$result = $conn->query($query);
$shipping_price = 5;
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./css/cart.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <main>
            <div class="main-wrapper-cart">
                <?php
                $rows = $result->fetch_all();
                $number_of_different_item_in_cart = $result->num_rows;
                $total_price_all_cart = 0;
                echo ("<div class=\"cart-header\">");
                echo ("<h1 id=\"cart-item-count\"> $number_of_different_item_in_cart item in your cart</h1>");
                echo ("<a href=\"index.php\" id=\"keep-shopping-btn\">Keep shopping</a>");
                echo ("</div>");
                ?>
                <div class="cart-panel-list">
                    <?php
                    for ($i = 0; $i < $number_of_different_item_in_cart; $i++) {
                        $bookID = $rows[$i][0];
                        $unit_price = $rows[$i][1];
                        $name = $rows[$i][2];
                        $description = $rows[$i][3];
                        $imageURL = $rows[$i][5];
                        $category = $rows[$i][6];
                        $author = $rows[$i][7];
                        $quantity = $rows[$i][8];


                        $total_price = $shipping_price + $unit_price * $quantity;
                        $total_price_all_cart += $total_price - $shipping_price;
                        echo("
                    <div class=\"cart-panel\">
                        <div class=\"cart-panel-detail\">
                            <div class=\"cart-panel-image\">
                                <img src=\"$imageURL\"style=\"width:200px;height:300px;\" alt=\"item\">
                            </div>
                            <div class=\"cart-panel-info\">
                                <strong>Name:</strong>
                                <a href=\"#\">$name</a>
                                <div class=\"item-info\">
                                    <strong>Description:</strong> $description
                                </div>
                                <div class=\"item-info\">
                                    <strong>Author: </strong> $author
                                </div>
                            </div>
                            <div class=\"cart-panel-quantity\">
                                <form action=\"addToCart.php\" method=\"post\">
                                <input type=\"hidden\" name=\"status\" value=\"update\">
                                <input type=\"hidden\" name=\"idbooks\" value=\"$bookID\">
                                <input type=\"number\" name=\"quantity\" min=\"0\" max=\"100\" value=\"$quantity\">
                                <input type=\"submit\" value=\"Update\">
                                </form>
                            </div>
                            <div class=\"cart-panel-price\">
                                US\$$unit_price
                            </div>
                        </div>
                        <div class=\"cart-panel-payment\">
                            <table>
                                <tr>
                                <tr>
                                    <th>Unit price</th>
                                    <td>US$$unit_price</td>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td>$quantity</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>US\$5.00</td>
                                </tr>
                                </tr>
                                <tr class=\"cart-order-total\">
                                    <th>Total($quantity item)</th>
                                    <td>US\$$total_price</td>
                                </tr>
                            </table>
                            <form action=\"checkout.php\" method=\"post\">
                            <input type=\"hidden\" name=\"idbooks\" id=\"idbooks\" value=\"$bookID\">
                            <input type=\"submit\" id=\"checkout-btn\" value=\"Proced to Checkout\">
                            </form>
                        </div>
                    </div>
                ");
                    }
                    ?>
                </div>
                <hr>
                <div class="cart-panel-payment-all">
                    <p> Total Price US$<?php
                    $total_price_all_cart += $shipping_price;
                    if ($number_of_different_item_in_cart != 0)
                        echo("$total_price_all_cart")
                        ?></p>
                    <form action="checkout.php" method="post">
                        <input type="hidden" name="idbooks" id="idbooks" value="all">
                        <input type="submit" id="checkout-btn-total" value="Proced to Checkout All">
                    </form>
                </div>
            </div>
        </main>

    </body>
</html>