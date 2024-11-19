<?php
require_once 'console_php.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="www/css/bookstorestyle.css" />
        <title><?php echo $page_title; ?></title>
    </head>
    <body>
        <div id="wrapper">
            <div id="curdate">
                <?php
                date_default_timezone_set('America/New_York');
                echo date("l, F d, Y", time());
                ?>
            </div>

            <!-- navigation bar -->
            <div id="navbar">
                <a href="index.php">Home</a>  ||
                <a href="listbooks.php">List Books</a> ||
                <a href="searchbooks.php">Search</a> ||
                <a href="addbook.php">Add Book</a>
            </div>

            <!-- Logo image and banner text -->
            <div id="banner">
                <div class="logo">
                    <img src="www/img/bookstore.gif" alt="PHP Online Bookstore">
                </div>
                <div class="banner-text">
                    <div id="maintitle">PHP Online Bookstore</div>
                    <div id="subtitle">Learn how to build an online bookstore <br>with PHP and MySQL</div>
                </div>
                <div class="shoppingcart">
                    <a href="#">
                        <img src='www/img/shoppingcart_full.gif' alt='Shopping cart' style='width: 50px; border: none'><br>
                        3 item(s)
                    </a>
                </div>
            </div>
            <!-- main content body starts -->
            <div id="mainbody">