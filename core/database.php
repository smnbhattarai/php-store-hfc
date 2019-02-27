<?php

require_once 'config.php';

// global $db;

$db = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// check if db connection is successful
if(!$db) {
    die("Database connection error: " . "<strong>" . mysqli_connect_error() . "</strong>");
}


// Select all from table
function selectAll($table) {
    global $db;
    $table = mysqli_real_escape_string($db, $table);
    $query = "SELECT * FROM $table ORDER BY id DESC";
    $result = mysqli_query($db, $query);
    return $result;
}