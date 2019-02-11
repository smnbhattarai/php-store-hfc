<?php

require_once 'config.php';

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// check if db connection is successful
if(mysqli_connect_errno()) {
    die("Database connection error" . mysqli_connect_error());
}