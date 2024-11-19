<?php

/*
 * Author: your name
 * Date: today's date
 * Description:
 * This script validates username and password against a database record. It then sets session variables
 * accordingly and redirects the user to loginform.php to display a correct message and update nav bar.
 * login status code:
 * 1 -- last login attempt success
 * 2 -- last login attempt failed.
 * 3 -- user just registered. Logged in automatically.
 * other -- new login attempt
 *
 */

//include code from database.php
require_once('includes/database.php');

//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//create variable login status.
$_SESSION['login_status'] = 2;

//initialize variables for username and password
$username = $passcode = "";

//retrieve user name and password from the form in the registerform.php 
if (isset($_POST['username']))
    $username = $conn->real_escape_string(trim($_POST['username']));

if (isset($_POST['password']))
    $password = $conn->real_escape_string(trim($_POST['password']));

//validate user name and password against a record in the users table in the database. If they are valid, create session variables.




//close the connection
$conn->close();

//redirect to the loginform.php page
header("Location: loginform.php");
