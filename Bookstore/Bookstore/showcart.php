<?php
/**
 * Author: your name
 * Date: today's date
 * Description: this script displays shopping cart content.
 */
$page_title = "Shopping Cart";
require_once('includes/header.php');
require_once('includes/database.php');

if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "Your shopping cart is empty.<br><br>";
    include('includes/footer.php');
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];

?>
    <h2> My Shopping Cart</h2>
    <!--  display shopping cart content -->
    <div class="booklist">
        <div class="row header">
            <div class="col1">Title</div>
            <div class="col2">Price</div>
            <div class="col3">Quantity</div>
            <div class="col4">Subtotal</div>
        </div>

        <?php
		//add code to display the shopping cart content
        
        ?>
    </div>

    <div class="bookstore-button">
        <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
        <input type="button" value="Cancel" onclick="window.location.href = 'listbooks.php'"/>
    </div>
    <br><br>

    <!-- page footer for copyright information -->
<?php
include('includes/footer.php');
