<?php

/*
 * Author: your name
 * Date: today's date
 * File: removebook.php
 * Description: this script deletes a book from the database.
 *
 */
$page_title = "Delete Book";
require_once 'includes/header.php';
require_once('includes/database.php');

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, 'id')) {
    $error = "There was a problem retrieving book id.";
    header("Location: error.php?m=$error");
    die();
}

//retrieve book id from a query string variable.
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//add your code here