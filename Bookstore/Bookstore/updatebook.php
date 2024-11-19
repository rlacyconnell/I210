<?php

/*
 * Author: your name
 * Date: today's date
 * File: updatebook.php
 * Description: this script updates book details in the database.
 *
 */
 
//Do not proceed if there are no post data
if (!$_POST) {
    $error = "Direct access to this script is not allowed.";
    header("Location: error.php?m=$error");
    die();
}

//retrieve book id. Do not proceed if id was not found.
if (!filter_has_var(INPUT_POST, 'id')) {
    $error = "There was a problem retrieving book id.";
    header("Location: error.php?m=$error");
    die();
}

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

//include code from the database.php file
require_once('includes/database.php');

/* Proceed since id was successfully retrieved. 
 * Retrieve book details. 
 * For security purpose, call the built-in function real_escape_string to 
 * escape special characters in a string for use in SQL statement.
 */
$title = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
$author = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING)));
$category_id = $conn->real_escape_string(filter_input(INPUT_POST, 'category', FILTER_DEFAULT));
$isbn = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING)));
$publish_date = $conn->real_escape_string(filter_input(INPUT_POST, 'publish_date', FILTER_DEFAULT));
$publisher = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

//add your code below
