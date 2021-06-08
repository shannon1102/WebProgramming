<?php
session_start();
include './db/db.php';
if (isset($_SESSION['login'])) {
//if (!isset($_SESSION['username'])) {
    if (isset($_POST['idbooks'])) {
        $username = $_SESSION['login'];
        $book_id = $_POST['idbooks'];
        $shipping_price = 5;
        $checkquery = 0;

//    $query_all = "SELECT b.*, c.Quantity FROM `Carts` as c, `Books` as b WHERE b.BookID = c.BookID AND c.UserName = '$username' ";
//    $remove_cart_all = "DELETE FROM `Carts` Where Carts.UserName = '$username'";
//    $query_book = "SELECT b.*, c.Quantity FROM `Carts` as c, `Books` as b WHERE b.BookID = c.BookID AND c.UserName = '$username' HAVING b.BookID = '$book_id' ";
//    $remove_cart_Book = "DELETE FROM `Carts` Where Carts.UserName = '$username' AND '$book_id' = Carts.BookID";
//    $get_max_invoice_id = "SELECT * FROM `Invoices` as i GROUP BY InvoiceID HAVING InvoiceID >= (SELECT MAX(i.InvoiceID) FROM `Invoices` as i)";

        $query_all = "SELECT b.*, c.Quantity FROM `Carts` as c, `Books` as b WHERE b.BookID = c.BookID AND c.UserName = '$username' ";
        $remove_cart_all = "DELETE FROM `Carts` Where Carts.UserName = '$username'";
        //delete one cart
        $query_book = "SELECT b.*, c.Quantity FROM `Carts` as c, `Books` as b WHERE b.BookID = c.BookID AND c.UserName = '$username' HAVING b.BookID = '$book_id' ";
        $remove_cart_book = "DELETE FROM `Carts` Where Carts.UserName = '$username' AND '$book_id' = Carts.BookID";
        $get_max_invoice_id = "SELECT * FROM `Invoices` as i GROUP BY InvoiceID HAVING InvoiceID >= (SELECT MAX(i.InvoiceID) FROM `Invoices` as i)";

        if ($book_id == 'all') {
            $result = $conn->query($query_all);
            $result_tmp = $conn->query($query_all);
            $rows = $result->fetch_all();
            if ($result->num_rows) {
                $now = date_create()->format('Y-m-d H:i:s');
                for ($i = 0; $i < $result->num_rows; $i++) {
                    $book_id_ip = $rows[$i][0];
                    $unit_price = $rows[$i][1];
                    $quantity = $rows[$i][8];
                    $total_price = $unit_price * $quantity;
                    //$input_invoices = "INSERT INTO `Invoices` (`UserName`,`BookID`,`Quantity`,`DateBuy`,`Price`) VALUES ($username','$book_id','$quantity','$now','$total_price')";
                    $input_invoices = "INSERT INTO `Invoices` (`UserName`,`BookID`,`Quantity`,`DateBuy`,`Price`) VALUES ('$username','$book_id_ip','$quantity','$now','$total_price')";
                    $conn->query($input_invoices);
                }
                $remove = $conn->query($remove_cart_all);
            } else {
                // header('Location: homePage.php');
            }
        } else {
            $checkquery = 1;
            $result = $conn->query($query_book);
            $result_tmp = $conn->query($query_book);
            $rows = $result->fetch_all();
            if ($result->num_rows) {
                $now = date_create()->format('Y-m-d H:i:s');

                $unit_price = $rows[0][1];
                $book_id = $rows[0][0];
                $quantity = $rows[0][8];
                $total_price = $unit_price * $quantity;
                //$input_invoices = "INSERT INTO `Invoices` (`UserName`,`BookID`,`Quantity`,`DateBuy`,`Price`) VALUES ($username','$book_id','$quantity','$now','$total_price')";
                $input_invoices = "INSERT INTO `Invoices` (`UserName`,`BookID`,`Quantity`,`DateBuy`,`Price`) VALUES ('$username','$book_id','$quantity','$now','$total_price')";
                $conn->query($input_invoices);
//                
                $remove = $conn->query($remove_cart_book);
            } else {
                // header('Location: homePage.php');
            }
        }
    }
} else {
        header('Location: index.php');
}
//
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Checkout</title>
            <link rel="stylesheet" href="./css/checkout.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
        <body>

            <div class="main-wrapper-checkout">
                <h1>YOUR INVOICE</h1><hr>
                <div class="table-list">
                    <table>
                        <tr>
                            <th>Index</th>
                            <th>Name Product </th>
                            <th>Quantity </th>
                            <th>Unit Price </th>
                            <th>Amount </th>
                        </tr>
    <?php
    $rows = $result_tmp->fetch_all();
    $number_of_different_item_in_cart = $result_tmp->num_rows;
//      echo "<p> .$result->num_rows. </p>";
    $shipping_price = 5;
    $total_price_all_cart = 0;
    for ($i = 0; $i < $number_of_different_item_in_cart; $i++) {
//        $book_id_ip = $rows[$i][0];
        $name = $rows[$i][2];
        $unit_price = $rows[$i][1];
        $quantity = $rows[$i][8];

        $total_price = $unit_price * $quantity;
        $total_price_all_cart += $total_price;
        $i1 = $i + 1;

        echo("
          <tr>
            <td>$i1</td>
            <td>$name</td>
            <td>$quantity</td>
            <td>$unit_price</td>
            <td>$total_price</td>
          </tr>
        ");
    }
    ?>
                        <tr>
                            <td id="total-price"colspan="4">Total (price of product + shipping cost)</td>
                            <td>
    <?php
    $total = $total_price_all_cart + $shipping_price;
    echo("$total_price_all_cart + $shipping_price = $total");
    ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="back-home">
            <a href="index.php" >Back Home</a>
        </div>
    </body>
</html>
