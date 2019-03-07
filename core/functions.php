<?php

// for debugging 
function nice_dump($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}


// clean user input 
function sanitize($string) {
    global $db;
    // xss
    $string = strip_tags($string, '<p><h1><h2><h3><h4><h5><h6><strong><em><i><table><tr><th><td><small><sup><sub><ul><li><ol><blockquote><b><mark><del><ins>');
    $string = mysqli_real_escape_string($db, $string);
    return $string;
}


// redirect users
function redirect_to($url) {
    header("Location:" . $url);
    exit;
}


// Check if user is logged in
function is_logged_in() {
    if(isset($_SESSION['user_id'])) {
        return true;
    } 
    return false;
}


// redirect if user id not logged in
function redirect_if_not_logged_in() {
    if(!is_logged_in()) {
        redirect_to("login.php");
    }
}