<?php

// for debugging 
function nice_dump($array) {
    echo '<pre>';
    var_dump($array);
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