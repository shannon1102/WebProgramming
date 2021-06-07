<?php
session_start();
include './db/db.php';
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $book_id = $_POST['bookOD'];
    $status = $_POST['status'];
    $quantity = $_POST['quantity'];
    $query = "SELECT * FROM `Carts` WHERE UserName = '$usernam' AND `bookId`='$book_id'";
    $result = $conn->query($query);

    if($result->num_rows == 0) {
        $query = "INSERT INTO `Carts` VALUES('$username','$book_id',1)";

        $result2 = $conn->query($query);
        $affected_rows = $conn->affected_rows;

        if($affected_rows==1) {
            echo ("<script type='text/javascript'>alert('Item added to Cart Successfully!')</script>");
            header('Location: cart.php');
        }else {

            echo ("<script type='text/javascript'>alert('Something was wrong while adding to Cart! 1 $username')</script>");
            // /header('Location: itemPage.php');
        }
    }else if($status != "update") {
        $query = "UPDATE `Carts` SET `quantity` = `quantity` + 1 WHERE UserName = '$username' AND `bookID` = '$book_id'";
        $result2 = $conn->query($query);
        $affected_rows = $conn->affected_rows;
        if ($affected_rows == 1) {
            echo ("<script type='text/javascript'>alert('Item added to Cart Successfully!')</script>");
            header('Location: cart.php');
        } else {
            echo ("<script type='text/javascript'>alert('Something was wrong while adding to Cart! 2')</script>");
            //header('Location: itemPage.php');
        }
    }else {
        if($quantity == 0) {
                $query = "DELETE `Carts` WHERE Carts.UserName= '$username' AND Carts.bookID = '$book_id'";
                $conn->query($query);
                header('Location: cart.php');
                die("here");
        }
        $query = "UPDATE `Carts` SET `quantity` = $quantity WHERE  UserName = '$username'";
        $result2 = $conn->query($query);
        $affected_rows = $conn->affected_rows;
        header('Location: cart.php');
    }
}
   else {
       header('Location: loginPage.php');
}
?>