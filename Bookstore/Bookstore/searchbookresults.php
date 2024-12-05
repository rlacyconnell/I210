<?php
/*
 * Author: your name
 * Date: today's date
 * Name: searchbookresults.php
 * Description: This script searches for books that match book titles in the database.
 */
$page_title = " Book Search results";

require_once ('includes/header.php');
require_once ('includes/database.php');
require_once ('console_php.php');

//retrieve the search terms
if(!filter_has_var(INPUT_GET, 'q')) {
    $error = "There was no search terms found.";
    $conn->close();
    header("Location:error.php?m=$error");
    die();
}

$term = filter_input(INPUT_GET, 'q');
console_php($term);
//exit($term)

$terms = explode(' ', $term);
console_php($terms);

//select statement
$sql = "SELECT id, title, author, price, category
        FROM $tblBook, $tblCategory
        WHERE $tblBook.category_id = $tblCategory.category_id AND ";

foreach($terms as $t) {
    $sql .= "title LIKE '%$t%' AND ";
}
$sql = rtrim($sql,"AND ");
console_php($sql);

//execute the query
$query = $conn->query($sql);
if(!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
}

?>
	<h2>Book search results for: <?= $term ?></h2>
	<div class="booklist">
        <div class="row header">
            <div class="col1">Title</div>
            <div class="col2">Author</div>
            <div class="col3">Category</div>
            <div class="col4">Price</div>
        </div>
        <?php
        while($row = $query->fetch_assoc()) {

            ?>
            <div class = "row">
                <div class = "col1"> <a href="bookdetails.php?id=<?= $row['id'] ?>"><?=$row['title'] ?></a></div>
                <div class = "col2"> <?= $row['author'] ?></div>
                <div class = "col3"> <?= $row['category'] ?></div>
                <div class = "col4"> <?= $row['price'] ?></div>
            <div>
            <?php
        }
        ?>
	</div>
<?php
include ('includes/footer.php');
