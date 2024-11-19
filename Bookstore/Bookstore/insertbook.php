<?php

/*
 * Author: your name
 * Date: today's date
 * File: insertbook.php
 * Description: This script inserts a new book into the books table
 * 
 */

//Do not proceed if there are no post data
if (!$_POST) {
    $error = "Direct access to this script is not allowed.";
    header("Location: error.php?m=$error");
    die();
}

//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'title') ||
        !filter_has_var(INPUT_POST, 'author') ||
        !filter_has_var(INPUT_POST, 'category') ||
        !filter_has_var(INPUT_POST, 'isbn') ||
        !filter_has_var(INPUT_POST, 'publisher') ||
        !filter_has_var(INPUT_POST, 'price') ||
        !filter_has_var(INPUT_POST, 'image') ||
        !filter_has_var(INPUT_POST, 'description')) {
    
    $error = "There were problems retrieving book details. New book cannot be added.";
    header("Location: error.php?m=$error");
    die();
}

//include code from database.php file
require_once('includes/database.php');
require_once('console_php.php');

/* Retrieve book details. 
 * For security purpose, call the built-in function real_escape_string to 
 * escape special characters in a string for use in SQL statement.
 */
$title = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
$author = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING)));
$category = $conn->real_escape_string(filter_input(INPUT_POST, 'category', FILTER_DEFAULT));
$isbn = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING)));
$publish_date = $conn->real_escape_string(filter_input(INPUT_POST, 'publish_date', FILTER_DEFAULT));
$publisher = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

//add your code below
$sql = "INSERT INTO $tblBook VALUES (NULL, '$title', '$isbn', '$author', '$publish_date', '$publisher', '$price', '$category', '$image', '$description')";

//console_php($sql);
//exit($sql);

$query = $conn->query($sql);

if (!$query) {
    $error = "Insertion failed: $conn->error";
    $conn->close();
    header("Location: error.php?m=$error");
    exit;
}

//determine the book id
$id = $conn->insert_id;

//close the connection and redirect user to the book details page
$conn->close();
header("Location: bookdetails.php?id=$id&m=insert");

