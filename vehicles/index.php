<?php

// Create or access a Session
session_start();

include '../model/main-model.php';
include '../model/vehicles.php';
include '../library/connections.php';
// Get the functions library
require_once '../library/functions.php';
require_once '../model/reviews-model.php';

$classifications = getClassifications();
$navList = navigation($classifications);

// $dropDownList = '<select name="classificationId" id="classificationId">';
// foreach ($classificationList as $inventoryTwo) {
//   $dropDownList .= '<option value="' . $inventoryTwo['classificationId'] . '">' . $inventoryTwo['classificationName'] . '</option>';
// }
// $dropDownList .= '</select>';

// BS: You need to have the create navigation code here, too.
// BS: This way is more simple. Just a tags, rather than an unordered list 
// $navList = "<a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a>";
// foreach ($classificationList as $classification) {
//   $navList .= "<a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a>";
// }

// $navList = navigation($classificationList);

// Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

    // BS: You need a case to deliver just the add classification form, and one to deliver just the vehicle form.
  case 'addClass':
    include '../view/addclassification.php';
    break;

  case 'addCar':
    include '../view/addvehicle.php';
    break;

    // BS: end adding two cases. The other cases are to handle the data when the form is submitted.
    // Code to deliver the views will be here
  case 'cars':
    // Filter and store the data
    $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_ALLOW_FRACTION));
    $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    // BS: You also need to get the classificationId from the form
    $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    $invMake = checkinvMake($invMake);
    $invModel = checkinvModel($invModel);
    $invDescription = checkinvDescription($invDescription);
    $invImage = checkinvImage($invImage);
    $invThumbnail = checkinvThumbnail($invThumbnail);
    $invPrice = checkinvPrice($invPrice);
    $invStock = checkinvStock($invStock);
    $invColor = checkinvColor($invColor);
    $classificationId = checkclassificationId($classificationId);
    //Check for missing data

    // BS: Need to also check if the classificationId is empty
    if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/addvehicle.php';
      exit;
    }

    // Send the data to the model
    //$carsOutCome = addCars($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor);
    //BS: also need to send the classificationId
    $carsOutCome = addCars($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);

    // Check and report the result
    if ($carsOutCome === 1) {
      $message = "<p>Thank you for adding to our inventory!</p>";
      include '../view/addvehicle.php';
      exit;
    } else {
      $message = "<p>Sorry, but your entry failed.</p>";
      include '../view/addvehicle.php';
      exit;
    }
    break;

  case 'classification':
    // Filter and store the data
    $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    // Check for missing data
    if (empty($classificationName)) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/addclassification.php';
      exit;
    }

    // Send the data to the model
    $classificationOutCome = addClassification($classificationName);

    // Check and report the result
    if ($classificationOutCome === 1) {
      header("Location: /phpmotors/vehicles/index.php");
      exit;
    } else {
      $message = "<p>Sorry, but your entry failed.</p>";
      include '../view/addclassification.php';
      exit;
    }
    break;


    //Get vehicles by classificationId 
    //Used for starting Update & Delete process 
    //********************************** */ 
  case 'updateVehicle':
    // Filter and store the data
    $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_ALLOW_FRACTION));
    $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
    // BS: You also need to get the classificationId from the form
    $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    $invMake = checkinvMake($invMake);
    $invModel = checkinvModel($invModel);
    $invDescription = checkinvDescription($invDescription);
    $invImage = checkinvImage($invImage);
    $invThumbnail = checkinvThumbnail($invThumbnail);
    $invPrice = checkinvPrice($invPrice);
    $invStock = checkinvStock($invStock);
    $invColor = checkinvColor($invColor);
    $classificationId = checkclassificationId($classificationId);

    //Check for missing data

    // BS: Need to also check if the classificationId is empty
    if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/addvehicle.php';
      exit;
    }
    $updateResult = updateVehicle($classificationId, $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $invId);

    if ($updateResult) {
      $message = "<p class='notify'>Congratulations, the $invMake $invModel was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p>Error. The new vehicle was not added.</p>";
      include '../view/vehicle-update.php';
      exit;
    }
    break;

  case 'getInventoryItems':
    // Get the classificationId 
    $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
    // Fetch the vehicles by classificationId from the DB 
    $inventoryArray = getInventoryByClassification($classificationId);
    // Convert the array to a JSON object and send it back 
    echo json_encode($inventoryArray);
    break;

  case 'mod':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '../view/vehicle-update.php';
    exit;
    break;

  case 'delete':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '../view/vehicle-delete.php';
    exit;
    break;

  case 'deleteVehicle':
    $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    $deleteResult = deleteVehicle($invId);

    if ($deleteResult) {
      $message = "<p class='notify'>Congratulations, the $invMake $invModel was successfully deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p>Error. The new vehicle was not deleted.</p>";
      include '../view/vehicle-delete.php';
      exit;
    }
    break;

  case 'classificationOne':
    $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $vehicles = getVehiclesByClassification($classificationName);
    if (!count($vehicles)) {
      $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
    } else {
      $vehicleDisplay = buildVehiclesDisplay($vehicles);
    }
    include '../view/classification.php';
    break;

    case 'classificationTwo':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
        
        $vehiclesDetail = getVehicleInformation($invId);
     
        if (empty($vehiclesDetail)){
          $message = "<p>There was an error while getting the vehicle's information</p>";
        } else{
          $vehicleDisplay = clickVehiclesDisplay($vehiclesDetail);  
        
        }
        include '../view/vehicle-detail.php';
        break;
    

  default:
    $classificationList = buildClassificationList($classifications);
    include '../view/vehiclemanagement.php';
    break;
}
