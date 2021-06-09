<?php
    require "db.php";
    session_start();

    if(isset($_POST["option"])){
        $type = $_POST["option"];
        if ($type == "add") {
            if (isset($_SESSION["total"])) {
                
            } else {
                $_SESSION["total"] = 0;
            }
            if (isset($_POST["idProduct"])) {
                $_SESSION["listProduct"][$_SESSION["total"]] = $_POST["idProduct"];
            }
            if (isset($_POST["deliver"])) {
                $_SESSION["listDeliver"][$_SESSION["total"]] = $_POST["deliver"];
            } else {
                $_SESSION["listDeliver"][$_SESSION["total"]] = "null";
            }
            $_SESSION["total"]++;
        } if ($type == "delete") {
            $offset = $_POST["index"];
            unset( $_SESSION["listProduct"][$offset]);
            $_SESSION["listProduct"] = array_values( $_SESSION["listProduct"]);
            unset( $_SESSION["listDeliver"][$offset]);
            $_SESSION["listDeliver"] = array_values($_SESSION["listDeliver"]);
            $_SESSION["total"]--;
        } if ($type == "edit") {
            $id = $_POST["idProduct"];
            
            if (isset($_POST["deliver"])) {
                $_SESSION["listDeliver"][$id] = $_POST["deliver"];
            } else {
                $_SESSION["listDeliver"][$id] = "null";
            }
        }
  }

  
  $db = new Db();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view_cart.css">
    <title>View Cart</title>
</head>

<body>
    <div class="container">
    <table>
            <tr>
                <th style="width: 250px;">Image</th>
                <th>Software Title</th>
                <th>Deliverable</th>
                <th>Price</th>
            </tr>
            <?php
            if (isset($_SESSION["total"])) {
                for ($i = 0; $i < $_SESSION["total"]; $i++) {
                    $pd = $db->get_product_by_id($_SESSION["listProduct"][$i]);
                    print '<tr>';
                    print '<td><img src="' . $pd->img . '" width="200px" height="120" alt=""></td>';
                    print '<td>';
                    print '<p>' . $pd->name . '</p>';
                    print  '<form action="edit.php" method="POST">
                            <input type="hidden" name="index" value="' . $i . '">
                            <input type="submit" value="Edit">
                            </form>';
                    print  '<form action="" method="POST">
                            <input type="hidden" name="index" value="' . $i . '">
                            <input type="hidden" name="option" value="delete">
                            <input type="submit" value="Remove">
                            </form>';
                    print '</td>';
                    if ($_SESSION["listDeliver"][$i] == 0) {
                        print '<td>Download</td>';
                        print '<td>Free</td>';
                    } else if ($_SESSION["listDeliver"][$i] == 1) {
                        print '<td>Online</td>';
                        print '<td>999999 VND</td>';
                    } else {
                        print '<td>Unknown</td>';
                        print '<td>Unknown</td>';
                    }

                    print '</tr>';
                }
            }
            ?>
        </table>
        <div class="continue">
            <a href="./home.php">
                <button>
                    Continue Shopping
                </button>
            </a>
        </div>
    </div>
</body>

</html>