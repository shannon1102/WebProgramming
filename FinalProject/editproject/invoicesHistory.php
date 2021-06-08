<?php
include './db/db.php';
session_start();
 $username = $_SESSION['login'];
 if (!isset($_SESSION['login'])){
     header('Location: login.php');
 }

//$query = "select I.InvoiceID,I.DateBuy,B.Name,I.Quantity,I.Price from `Invoices` as I,`Books` as B  where UserName='$username' and I.BookID = B.BookID Order by InvoiceID";
$query = "select I.InvoiceID,I.DateBuy,B.Name,I.Quantity,I.Price from `Invoices` as I,`Books` as B  where UserName='$username' and I.BookID = B.BookID Order by InvoiceID";

$result = $conn->query($query);
$number_row = $result->num_rows;
$rows = $result->fetch_all();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoices History Report</title>
        <link rel="stylesheet" href="./css/invoicesHistory.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="main-wrapper-invoice">
            <h1>YOUR ALL INVOICE</h1><hr>
            <div class="table-list">
                <table>
                    <tr>
                        <th>Invoice Number</th>
                        <th>Date Buy</th>
                        <th>Book Name</th>
                        <th>Quantity</th>
                        <th>Payments</th>
                    </tr>
                    <?php
                    for ($i = 0; $i < $number_row; $i++) {
                        $invoiceID = $rows[$i][0];
                        $date = $rows[$i][1];
                        $book_name = $rows[$i][2];
                        $quantity = $rows[$i][3];
                        $payment = $rows[$i][4];
                        echo("
                <tr>
                    <td>#$invoiceID</td>
                    <td>$date</td>
                    <td>$book_name</td>
                    <td>$quantity</td>
                    <td>$payment</td>  
                </tr>
");
                    }
                    ?>
                </table>
                 <div class="back-home">
            <a href="index.php" >Back Home</a>
        </div>
            </div>
        </div>

    </body>
</html>