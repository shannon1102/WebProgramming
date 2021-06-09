<?php
//session_start();
if (!isset($_SESSION['login'])) {
    ?>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, intial-scale=1.0"/>
            <title>Bookstore</title>
            <link rel="stylesheet" href="./View/css/custom.css">
         

        </head>
        <body style="height: 100vh;">
            <h3 style="text-align:center;"> BookStore</h3>
            <div style="height: 100vh" class ="navbar navbar-inverse narbar-fixed-top" role="navigation" data-toggle="collapse" data-target=".nav-collapse">
                <div class ="navbar-header">

                    <ul style="display: flex; align-items: center; justify-content: center;"
                        <li class="active">
                        <a href="index.php" style="padding: 0px 10px;;">
                            HOME
                        </a>
                        </li>
 
                        <li>
                            <a href="./View/User/Login.php">
                                Log in
                            </a>
                        </li>
                    </ul>
                <?php } else {
                    ?>

                    <html>
                        <head>
                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, intial-scale=1.0"/>
                            <title>Bookstore</title>
                            <link rel="stylesheet" href=".View/css/custom.css">

                        </head>
                        <body style="height: 100vh;">
                            <h3 style="text-align:center;"> BookStore</h3>
                            <div style="height: 100vh" class ="navbar navbar-inverse narbar-fixed-top" role="navigation" data-toggle="collapse" data-target=".nav-collapse">
                                <div class ="navbar-header">

                                    <ul style="display: flex; align-items: center; justify-content: center;"
                                        <li class="active">
                                        <a href="index.php" style="padding: 0px 10px;;">
                                            HOME 
                                        </a>
                                        </li>

                                        <li>
                                            <a href="../../editproject/View/User/Logout.php">
                                                Log out
                                            </a>
                                        </li>
                                        <li style="padding: 0px 10px;">WELCOME<strong> <?php echo $_SESSION['login']; ?></strong> </li>
                                    </ul>
                                    <a href="../../editproject/View/User/invoicesHistory.php"><strong> INVOICES HISTORY</strong></a>
                                <?php } ?>