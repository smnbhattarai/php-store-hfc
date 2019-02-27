<?php

// base URL for website
defined('BASE_URL') OR define('BASE_URL', 'http://localhost/store/');

// base path
defined('BASE_PATH') OR define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/store/');

// website name
defined('SITE_NAME') OR define('SITE_NAME', 'PHP Store');

// Define database details
defined('DB_HOST') OR define('DB_HOST', 'localhost');
defined('DB_NAME') OR define('DB_NAME', 'store');
defined('DB_USER') OR define('DB_USER', 'root');
defined('DB_PASS') OR define('DB_PASS', '');

// Define error variable
$errors = array();

// Set timezones
date_default_timezone_set('Asia/Kathmandu');