<?php
session_start();
include '../../db/db.php';
if(isset($_SESSION['login'])) {
    $username = $_SESSION['login'];
    $book_id = $_POST['idbooks'];
    if(isset($_POST['status']))
    {$status = $_POST['status'];}
    else $status = null;
     if(isset($_POST['quantity']))
    {$quantity = $_POST['quantity'];}
    else $quantity = -1;
   $query = "SELECT * FROM `Carts` WHERE UserName = '$username' AND `BookId`='$book_id'";
//    $query = "SELECT * FROM `Carts` WHERE UserName = 'hoavan' AND `BookID`='$book_id'";
    $result = $conn->query($query);

    if($result->num_rows == 0) {
        $query = "INSERT INTO `Carts` (UserName,BookID,Quantity) VALUES('$username','$book_id',1)";

        $result2 = $conn->query($query);
        $affected_rows = $conn->affected_rows;
        if($affected_rows==1) {
            echo ("<script type='text/javascript'>alert('Item added to Cart Successfully!')</script>");
            header('Location: ../../View/User/cart.php');
        }else {

            echo ("<script type='text/javascript'>alert('Something was wrong while adding to Cart! 1 $username')</script>");
            // /header('Location: itemPage.php');
        }
    }else if($status != "update") {
        $query = "UPDATE `Carts` SET `Quantity` = `Quantity` + 1 WHERE UserName = '$username' AND `BookID` = '$book_id'";
          //$query = "UPDATE `Carts` SET `Quantity` = `Quantity` + 1 WHERE UserName = 'hoavan' AND `BookID` = '$book_id'";
        $result2 = $conn->query($query);
        $affected_rows = $conn->affected_rows;
        if ($affected_rows == 1) {
            echo ("<script type='text/javascript'>alert('Item added to Cart Successfully!')</script>");
           header('Location: ../../View/User/cart.php');
        } else {
            echo ("<script type='text/javascript'>alert('Something was wrong while adding to Cart! 2')</script>");
            //header('Location: itemPage.php');
        }
    }else {
        if($quantity == 0) {
               $query = "DELETE FROM `Carts` WHERE Carts.UserName= '$username' AND Carts.BookID = '$book_id'";
//            $query = "DELETE FROM `Carts` WHERE Carts.UserName= $us AND Carts.BookID = '$book_id'";
                $conn->query($query);
                header('Location: ../../View/User/cart.php');
                die("here");
        }
        $query = "UPDATE `Carts` SET `Quantity` = $quantity WHERE  UserName = '$username' AND Carts.BookID = '$book_id'";
       // $query = "UPDATE `Carts` SET `Quantity` = $quantity WHERE  UserName = 'hoavan' AND Carts.BookID = '$book_id'";
        $result2 = $conn->query($query);
        $affected_rows = $conn->affected_rows;
      header('Location: ../../View/User/cart.php');
    }
}
   else {
       header('Location: ../../View/User/Login.php');
}
?>