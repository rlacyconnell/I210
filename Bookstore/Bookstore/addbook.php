<?php
/*
 * Author: your name
 * Date: today's date
 * File: addbook.php
 * Description: This script displays a form to accept a new book's details.
 * 
 */
$page_title = "PHP Online Bookstore Add Book";
require_once 'includes/header.php';
?>

<h2>Add New Book</h2>
<form action="insertbook.php" method="post">
    <table cellspacing="0" cellpadding="3" style="border: 1px solid silver; padding:5px; margin-bottom: 10px">
        <tr>
            <td style="text-align: right; width: 100px">Title: </td>
            <td><input name="title" type="text" size="100" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Author: </td>
            <td><input name="author" type="text" size="40" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Category:</td>
            <td>
                <select name="category">
                    <option value="1">Education</option>
                    <option value="2">History</option>
                    <option value="3">Science</option>
                    <option value="4">Technology</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">ISBN: </td>
            <td><input name="isbn" type="text" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Publish date: </td>
            <td><input name="publish_date" type="text" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Publisher:</td>
            <td><input name="publisher" type="text" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Price: </td>
            <td><input name="price" type="number" step="0.01" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Image: </td>
            <td><input name="image" type="text" size="100" required /></td>
        </tr>
        <tr>
            <td style="text-align: right; vertical-align: top">Description:</td>
            <td><textarea name="description" rows="6" cols="65"></textarea></td>
        </tr>
    </table>
    <div class="bookstore-button">
        <input type="submit" value="Add Book" />
        <input type="button" value="Cancel" onclick="window.location.href='listbooks.php'" />
    </div>
</form>

<?php
require_once 'includes/footer.php';