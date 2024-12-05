<?php
require_once 'console_php.php';
$bgcolor = "";
if (isset($_GET['bgcolor'])) {
    $bgcolor = $_GET['bgcolor'];
    setcookie("bgcolor", $bgcolor, time() + 60 );
} else {
    if (isset($_COOKIE['bgcolor']))
        $bgcolor = $_COOKIE["bgcolor"];
}

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

//number of copies
$count = '0';

//retrieve shopping cart content
if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    $count = "";
    if($cart) {
        $count = array_sum($cart);
    }
}

//set shopping cart image
$shoppingcart_img = ($count == 0) ? "shoppingcart_empty.gif" : "shoppingcart_full.gif";

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="www/css/bookstorestyle.css" />
        <title><?php echo $page_title; ?></title>
    </head>
    <body style="background-color: <?=$bgcolor ?>">
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
                    <a href="showcart.php">
                        <img src='www/img/<?=$shoppingcart_img?>' alt='Shopping cart' style='width: 50px; border: none'><br>
                        <?= $count ?>
                    </a>
                </div>
            </div>
            <!-- main content body starts -->
            <div id="mainbody">