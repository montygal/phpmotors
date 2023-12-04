<?php
/*
This is the reviews controller
*/

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the phpmotors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
require_once '../library/functions.php';
require_once '../model/reviews-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

        //case for adding a review
    case 'review':
        $clientReview = trim(filter_input(INPUT_POST, 'clientReview', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        // Send the data to the model
        $regOutcome = clientReview($clientReview);
        // Check and report the result
        if ($regOutcome === 1) {
            $_SESSION['message'] = "Thank you for leaving a review!";
            exit;
        } else {
            $message = "<p>Sorry, but the review did not post. Please try again.</p>";
            include '../view/vehicledetail.php';
            exit;

        }

        break;
        // case 'delete':
        //     $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        //     $invInfo = getInvItemInfo($invId);
        //     if (count($invInfo) < 1) {
        //       $message = 'Sorry, no vehicle information could be found.';
        //     }
        //     include '../view/vehicle-delete.php';
        //     exit;
        //     break;

            default:
            $_SESSION['loggedin'] = TRUE;
            include '../view/admin.php';
            $_SESSION['loggedin'] = FALSE;
            include '../view/home.php';
            break;
}
