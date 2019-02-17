<?php

require_once 'config.php';

// global $db;

$db = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// check if db connection is successful
if(!$db) {
    die("Database connection error: " . "<strong>" . mysqli_connect_error() . "</strong>");
}