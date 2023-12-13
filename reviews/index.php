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




// Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
        // Code to deliver the views will be here

    case 'addReview':
        include '../view/vehicledetail.php';
        break;

        //case for adding a review
    case 'review':
        $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invId = trim(filter_input(INPUT_POST, 'invId',  FILTER_SANITIZE_NUMBER_INT));
        $clientId = trim(filter_input(INPUT_POST, 'clientId',  FILTER_SANITIZE_NUMBER_INT));
        // Send the data to the model
        $results = clientReview($reviewText, $invId, $clientId);
        // Check and report the result
        if ($results === 1) {
            $_SESSION['message'] = "Thank you for leaving a review!";
            exit;
        } else {
            $message = "<p>Sorry, but the review did not post. Please try again.</p>";
            include '../view/vehicledetail.php';
            exit;
        }
        
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $formerReviews = getReviewsByName($clientReview);
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($formerReviews);
        // Store the array into the session
        $_SESSION['clientData'] = $formerReviews;
        // Send them to the admin view
        include '../view/admin.php';
        exit;

        break;

    case 'seeReviews':
        $clientReview = filter_input(INPUT_GET, 'clientReview', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $reviews = getReviewsByName($clientReview);
        if (count($reviews)) {
        $message = "<p>Here is $clientReview.</p>";
        } else {
            $message = "<p>Sorry, but that person has not created a review</p>";
            include '../view/vehicledetail.php';
            exit;
        }
        break;

    case 'update-review':
        // Filter and store the data
        $reviewId = trim(filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT));
        $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $reviewDate = trim(filter_input(INPUT_POST, 'reviewDate', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invId = trim(filter_input(INPUT_POST, 'invId',  FILTER_SANITIZE_NUMBER_INT));
        $clientId = trim(filter_input(INPUT_POST, 'clientId',  FILTER_SANITIZE_NUMBER_INT));


        $reviewId = checkReviewId($reviewId);
        $reviewText = checkReviewText($reviewText);
        $reviewDate = checkReviewDate($reviewDate);
        $invId = checkInvId($invId);
        $clientId = checkClientId($clientId);

        $updateResult = updateReview($reviewId, $reviewText, $reviewDate, $invId, $clientId);

        if ($updateResult) {
            $message = "<p>Your updated review was successful!</p>";
            $_SESSION['message'] = $message;
            include '../view/admin.php';
            exit;
        } else {
            $message = "<p>Error. The update was unsuccessful. Please try again.</p>";
            include '../view/vehicledetail.php';
            exit;
        }
        break;
    
    
    case 'review-by-id':
            $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
            
            $reviewId = getReviewById($invId);
         
            if (empty($reviewId)){
              $message = "<p>There was an error while getting the vehicle's information</p>";
            } else{
              $gettingById = getById($invId);  
            
            }
            include '../view/vehicledetail.php';
            break;
        

    case 'delete-review':
        $reviewText = filter_input(INPUT_GET, 'clientReview', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invInfo = deleteReview($clientReview);
        if ($invInfo === 1) {
            $_SESSION['message'] = "The delete has been successful.";
            include '../view/admin.php';
            exit;
        } else {
            $message = "<p>Sorry, but the delete was unsuccessful.</p>";
        }
        include '../view/vehicledetail.php';
        exit;
        break;

    default:
        $_SESSION['loggedin'] = TRUE;
        include '../view/admin.php';
        $_SESSION['loggedin'] = FALSE;
        include '../view/home.php';
        break;
}
