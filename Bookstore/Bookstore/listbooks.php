<?php
/** 
 * Author: your name
 * Date: today's date
 * File: listbooks.php
 * Description: this script lists all books from the books table.
 */
$page_title = "Books in Our Store";
require 'includes/header.php';
require 'includes/database.php';

//define the SQL statement
$sql = "SELECT id, title, author, price, category 
        FROM $tblBook, $tblCategory
        WHERE $tblBook.category_id = $tblCategory.category_id";
// exit($sql); for debugging

$query = $conn->query($sql);

//console_php($query);
//handeling errors
if(!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
}
?>

    <h2>Books in Our Store</h2>
    <div class="booklist">
        <div class="row header">
            <div class="col1">Title</div>
            <div class="col2">Author</div>
            <div class="col3">Category</div>
            <div class="col4">Price</div>
        </div>
		<!-- add PHP code here to list all books from the "books" table -->
        <?php
        while($row = $query->fetch_assoc()) {

        ;
        ?>
        <div class = "row">
            <div class = "col1">
                <a href="bookdetails.php?id=<?= $row['id'] ?>"><?=$row['title'] ?></a>
            </div>
            <div class = "col2"><?= $row['author'] ?></div>
            <div class = "col3"><?= $row['category'] ?></div>
            <div class = "col4"><?= $row['price'] ?></div>
        </div>
        <?php
        }

        ?>
	</div>

<?php
require 'includes/footer.php';