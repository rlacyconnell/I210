<?php
/*
* Author: your name
* Date: today's date
* Name: searchbook.php
* Description: This script displays a search form.
*/
$page_title = "Search book";

include ('includes/header.php');
?>
<h2>Search Books by Title</h2>
<p>Enter one or more words in book title.</p>
<form action="searchbookresults.php" method="get">
    <input type="text" name="q" size="40" required />&nbsp;&nbsp;
    <input type="submit" name="Submit" id="Submit" value="Search Book" />
</form>
<?php
include ('includes/footer.php');