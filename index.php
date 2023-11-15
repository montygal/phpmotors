<?php
//PHP main controller
//This file is accessed at http://lvh.me/phpmotors/
//This file controls all traffic to the http://lvh.me/phpmotors/ URL

// Create or access a Session
session_start();

// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';
// require_once 'library/functions.php';


//Get the array of classifications
$classifications = getClassifications();


// BS: This way is more simple. Just a tags, rather than an unordered list 
$navList = "<a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a>";
foreach ($classifications as $classification) {
  $navList .= "<a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a>";
}


// Check if the firstname cookie exists, get its value
if (isset($_COOKIE['firstname'])) {
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'something':

        break;

    default:
        include 'view/home.php';
}
