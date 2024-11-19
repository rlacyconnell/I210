<?php
/**
 * Author: River Lacy-Connell
 * Date: 11/5/2024
 * File: database.php
 * Description: Connect to the mysql server
 */
$host="localhost";
$login="phpuser";
$password="phpuser";
$database="bookstore_db";
$tblBook="books";
$tblCategory="categories";
$tblUser="users";
$tblRole="roles";

//make a connection to mysql
$conn = new mysqli($host, $login, $password, $database);

//handle connection errors before proceeding
if ($conn->connect_errno) {
    $error=$conn->connect_error;
    header("Location: error.php?m=$error");
    die();
}