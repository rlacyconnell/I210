 <?php
/**
 * Author: your name
 * Date: today's date
 * File: bookdetails.php
 *  Description: This script displays details of a particular book.
 */
$page_title = "Book Details";
require_once ('includes/header.php');
require_once ('includes/database.php');

if(!filter_has_var(INPUT_GET, 'id')) {
    $error = "Your Request Cannot be Processed since there was a problem retrieving book id.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

//retrieve book id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
console_php($id);
//SELECT STATEMENT
$sql = "SELECT * FROM $tblBook, $tblCategory 
         WHERE $tblBook.category_id = $tblCategory.category_id AND $tblBook.id = '$id'";
console_php($sql);

$query = $conn->query($sql);

//handling errors
if(!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header(":Location: error.php?m=$error");
}

$row = $query->fetch_assoc();
if(!$row) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header(":Location: error.php?m=$error");
}

?>

    <h2>Book Details</h2>
    <div class="bookdetails">
        <div class="cover">
            <!-- display book image -->
            <img src="<?= $row['image'] ?>" alt="">
        </div>
        <div class="label">
            <!-- display book attributes  -->
            <div>Title:</div>
            <div>Author:</div>
            <div>Category</div>
            <div>ISBN:</div>
            <div>Date:</div>
            <div>Publisher:</div>
            <div>Price:</div>
            <div>Description</div>
        </div>
        <div class="content">
			<!-- display book details -->
            <div><?= $row['title']?></div>
            <div><?= $row['author']?></div>
            <div><?= $row['category']?></div>
            <div><?= $row['isbn']?></div>
            <div><?= $row['publish_date']?></div>
            <div><?= $row['publisher']?></div>
            <div><?= $row['price']?></div>
            <div><?= $row['description']?></div>
        </div>

        <div>
            <a href="addtocart.php?id=<?= $id ?>">
                <img src="www/img/addtocart_button.png" alt="">
            </a>
        </div>
    </div>

 <?php
    $confirm = "";
    if(isset($_GET['m'])) {
        if($_GET['m'] == "insert") {
            $confirm = "You have succesfully added the new book.";
        } else if($_GET['m'] == "update") {
             $confirm = "Your book has been successfully updated.";
            }

    }
 ?>
 <div class="bookstore-button">
     <div style="color:red; display: inline-block;"><?= $confirm ?></div>
     <input type="button" onclick="window.location.href='listbooks.php'" value="List Book">
     <input type="button" onclick="window.location.href='editbook.php?id=<?= $id ?>'" value="Edit Book">
     <input type="button" onclick="window.location.href='deletebook.php?id=<?= $id ?>'" value="Delete Book">
 </div>

<?php
require_once ('includes/footer.php');