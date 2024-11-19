<?php
/**
 * Author: River Lacy-Connell
 * Date: 11/7/2024
 * File: console_php.php
 * Description:
 */

function console_php($data) {
    echo "<script>console.dir(", json_encode($data) ,")</script>";
}