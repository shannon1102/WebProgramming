<?php
include './db/db.php';
//session_start();
// $username = $_SESSION['username'];

// if (!isset($_SESSION['username'])){
//     header('Location: loginPage.php');
// }
$query = "SELECT Invoices.InvoiceID, Invoices.DateBuy, Invoices.Price, Books.Name, Books.Quantity from `Invoices`,`Books` where Invoices.UserName = '$username' AND and ItemsBuy.ItemID = Invoices.BookID order by InvoiceID ASC";
$query_number_invoice = "SELECT count(ItemsBuy.InvoiceID) from ItemsBuy group by ItemsBuy.InvoiceID having ItemsBuy.InvoiceID in (SELECT Invoices.InvoiceID from ItemsBuy,Invoices,Items where Invoices.InvoiceID = ItemsBuy.InvoiceID and ItemsBuy.ItemID = Items.ItemID AND UserName = '$username' order by InvoiceID ASC)";
$result = $conn->query($query);
$rows = $result->fetch_all();
$number_row = $result->num_rows;

$result = $conn->query($query_number_invoice);
$rows_number_invoice = $result->fetch_all();
$number_row_number_invoice = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices History Report</title>
    <link rel="stylesheet" href="./css/topbar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/invoicesHistory.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- <?php include 'topbar.php'?> -->
    <div class="main-wrapper-invoice">
    <h1>YOUR ALL INVOICE</h1><hr>
    <div class="table-list">
        <table>
        <tr>
            <th>Invoice Number</th>
            <th>Date Buy</th>
            <th>Payments</th>
            <th>Product Name</th>
            <th>Quantity</th>
        </tr>
        <?php
        $index = 0;
        for ($i=0; $i < $number_row_number_invoice; $i++) { 
            $rowspan = $rows_number_invoice[$i][0];
            $invoiceID = $rows[$index][0];
            $date = $rows[$index][1];
            $payment = $rows[$index][2];
            echo("
                <tr>
                    <td rowspan=\"$rowspan\">#$invoiceID</td>
                    <td rowspan=\"$rowspan\">$date</td>
                    <td rowspan=\"$rowspan\">$$payment</td>
                ");
            for ($j=0; $j < $rowspan; $j++) { 
                $name_product = $rows[$index][3];
                $quantity = $rows[$index][4];
                echo("            
                <td>$name_product</td>
                <td>$quantity</td></tr>");
                $index++;
            }
        }
        ?>
        </table>
</div>
</div>
<!-- <?php include 'footer.php'?> -->
</body>
</html>