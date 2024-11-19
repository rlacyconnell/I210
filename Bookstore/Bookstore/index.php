<?php
/**
 * Author: your name
 * DDate: today's date
 * Description: homepage of the PHP Online Book Store application
 */
$page_title = "PHP Online Bookstore Home";

include ('includes/header.php');
?>

<h2>Welcome to PHP Online Bookstore</h2>
<p>This web site demonstrates a simple shopping cart application. It uses sessions to maintain states.
    Click links at the top navigation bar to try different features. The shopping cart content can be displayed by clicking the link at the upper-right corner.
</p>
<p>Major features include:</p>
<ul>
    <li>List books</li>
    <li>Search books with keywords in book titles</li>
    <li>Login/logout</li>
    <li>Register/create new accounts</li>
    <li>Add new books (administrators only)</li>
</ul>

<p>Demo account user name and password:</p>
<p>Guest account: guest, password <br />
    Admin account: admin, password
</p>

<p><i>Note: To check out, you need to login with the <strong>guest</strong> account credentials.
        The <strong>admin</strong> account allows editing book details and deleting books.
        Please note that book details are stored in a MySQL database and changes are permanent.</i></p>

<p>
    <i>For the purpose of this demo application, editing and deleting features are disallowed for existing books. You need to add a new book first and then try these features on the new book.
    </i>
</p>
<br>
<p style="text-align: center"><strong>Disclaimer</strong></p>
<p>This application has been created as a course project for I210. It is solely for teaching and learning purposes. As a course project, the goal is to learn how to do things, but not to get things done. Therefore, the code used in this project may not be most efficient or most effective. Furthermore, the code has not been tested in any production environment. If you want to use any code in this project in any production environment, use it at your own risk.</p>

<?php
include ('includes/footer.php');