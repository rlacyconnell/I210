<?php
/**
 * Author: your name
 * Date: today's date
 * File: bookdetails.php
 *  Description: This script displays details of a particular book in a form.
 */
$page_title = "Edit Book Details";
require_once ('includes/header.php');
require_once('includes/database.php');

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, "id")) {
    $error = "Your request cannot be processed since there was a problem retrieving book id.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

//retrieve book id from a query string variable.
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//MySQL SELECT statement
$sql = "SELECT * 
      FROM $tblBook, $tblCategory 
      WHERE books.category_id = categories.category_id
      AND id=$id";


//execute the query
$query = @$conn->query($sql);

//Handle errors
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$row = $query->fetch_assoc();
if (!$row) {
    $error = "Book not found";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
?>

<h2>Edit Book Details</h2>
<form action="updatebook.php" method="post">
    <div class="bookdetails">
        <div class="label">
            <!-- display book attributes  -->
            <div>Title:</div>
            <div>Author:</div>
            <div>Category</div>
            <div>ISBN:</div>
            <div>Date:</div>
            <div>Publisher:</div>
            <div>Price:</div>
            <div>Image:</div>
            <div>Description</div>
        </div>

        <div class="content">
            <!-- display book details -->
            <div><input name="title" size="80" value="<?php echo $row['title'] ?>" required></div>
            <div><input name="author" value="<?php echo $row['author'] ?>" required></div>
            <div><select name="category">
                    <option value="1" <?= $row['category'] == 'Education' ? 'selected' : ''; ?>>Education</option>
                    <option value="2" <?= $row['category'] == 'History' ? 'selected' : ''; ?>>History</option>
                    <option value="3" <?= $row['category'] == 'Science' ? 'selected' : ''; ?>>Science</option>
                    <option value="4" <?= $row['category'] == 'Technology' ? 'selected' : ''; ?>>Technology</option>
                </select>
            </div>
            <div><input name="isbn" value="<?php echo $row['isbn'] ?>" required></div>
            <div><input name="publish_date" value="<?php echo $row['publish_date'] ?>" required></div>
            <div><input name="publisher" value="<?php echo $row['publisher'] ?>" required></div>
            <div><input name="price" type="number" step="0.01" value="<?php echo $row['price'] ?>" required></div>
            <div><input name="image" size="100" value="<?php echo $row['image'] ?>" required></div>
            <div><textarea name="description" rows="6" cols="65"><?php echo $row['description'] ?></textarea></div>
        </div>
    </div>
    <div class="bookstore-button">
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <input type="submit" value=" Update " />
        <input type="button" value="Cancel" onclick="window.location.href = 'bookdetails.php?id=<?= $id ?>'" />
    </div>
</form>
<?php
// close the connection.
$conn->close();
require_once 'includes/footer.php';