<?php

function checkEmail($clientEmail)
{
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

/*Check the password for a minimum of 8 characters,
 at least one 1 capital letter, at least 1 number and
 at least 1 special character
*/
function checkPassword($clientPassword)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
}

function checkInvMake($invMake)
{
    $valMake = filter_var($invMake, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $valMake;
}

function checkInvModel($invModel)
{
    $valModel = filter_var($invModel, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $valModel;
}

function checkInvDescription($invDescription)
{
    $valDescription = filter_var($invDescription, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $valDescription;
}

function checkInvImage($invImage)
{
    $valImage = filter_var($invImage, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $valImage;
}

function checkInvThumbnail($invThumbnail)
{
    $valThumbnail = filter_var($invThumbnail, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $valThumbnail;
}

function checkInvPrice($invPrice)
{
    $valPrice = filter_var($invPrice, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $valPrice;
}

function checkInvStock($invStock)
{
    $valStock = filter_var($invStock, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $valStock;
}

function checkInvColor($invColor)
{
    $valColor = filter_var($invColor, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $valColor;
}

function checkClassificationName($classificationName)
{
    $valClassification = filter_var($classificationName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $valClassification;
}

function checkclassificationId($classificationId)
{
    $valClassification = filter_var($classificationId, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $valClassification;
}

//This function receives the $carclassifications array as a parameter
//and builds the navigation list HTML around the values in the array:
function navigation($classificationList)
{
    $navList = "<a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a>";
    foreach ($classificationList as $classification) {
        $navList .= "<a href='/phpmotors/vehicles/?action=classificationOne&classificationName=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a>";
    }
    return $navList;
}

// Build the classifications select list 
function buildClassificationList($classifications)
{
    $classificationList = '<select name="classificationId" id="classificationList">';
    $classificationList .= "<option>Choose a Classification</option>";
    foreach ($classifications as $classification) {
        $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
    }
    $classificationList .= '</select>';
    return $classificationList;
}

function buildVehiclesDisplay($vehicles)
{
    $dv = '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {
        $dv .= '<li>';
        $dv .= "<a href='/phpmotors/vehicles/?action=classificationTwo&invId=$vehicle[invId]'><img src='$vehicle[invThumbnail]' alt='$vehicle[invMake] $vehicle[invModel]'></a>";
        $dv .= '<hr>';
        $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
        $dv .= "<span>$vehicle[invPrice]</span>";
        $dv .= '</li>';
    }
    $dv .= '</ul>';
    return $dv;
}

//Take vehicles information and wrap it in HTML
function clickVehiclesDisplay($displays)
{
    $dv = '<ul>';
    foreach ($displays as $display) {
        $dv .= '<li>';
        $dv .= "<img class= 'imgDisplay' src='{$display['invImage']}' alt= 'Image of {$display['invMake']} {$display['invModel']}'>";
        $dv .= "<h3>{$display['invMake']} {$display['invModel']}</h3>";
        $dv .= "<p>Price: $" . number_format($display['invPrice'], 2) . "</p>";
        $dv .= "<span class='word-wrap'>Description: <br>{$display['invDescription']}</span>";
        $dv .= "<p>Color: {$display['invColor']}</p>";
        $dv .= "<p>Number in Stock: {$display['invStock']}</p>";
        $dv .= '</li>';
        $dv .= '</ul>';
        return $dv;
    }
}

function getById($clientReview){
    $dv = 'ul';
    foreach ($clientReview as $clientReviews){
        $dv .= '<li>';
        $dv .= "<h3>{$clientReviews['clientReviews']}</h3>";
        $dv .= '</li>';
        $dv .= '</ul>';
        return $dv;
    }
}
// Adds "-tn" designation to file name
function makeThumbnailName($image)
{
    $i = strrpos($image, '.');
    $image_name = substr($image, 0, $i);
    $ext = substr($image, $i);
    $image = $image_name . '-tn' . $ext;
    return $image;
}

// Build images display for image management view
function buildImageDisplay($imageArray)
{
    $id = '<ul id="image-display">';
    foreach ($imageArray as $image) {
        $id .= '<li>';
        $id .= "<img src='$image[imgPath]' title='$image[invMake] $image[invModel] image on PHP Motors.com' alt='$image[invMake] $image[invModel] image on PHP Motors.com'>";
        $id .= "<p><a href='/phpmotors/uploads?action=delete&imgId=$image[imgId]&filename=$image[imgName]' title='Delete the image'>Delete $image[imgName]</a></p>";
        $id .= '</li>';
    }
    $id .= '</ul>';
    return $id;
}

// Build the vehicles select list
function buildVehiclesSelect($vehicles)
{
    $prodList = '<select name="invId" id="invId">';
    $prodList .= "<option>Choose a Vehicle</option>";
    foreach ($vehicles as $vehicle) {
        $prodList .= "<option value='$vehicle[invId]'>$vehicle[invMake] $vehicle[invModel]</option>";
    }
    $prodList .= '</select>';
    return $prodList;
}

// Handles the file upload process and returns the path
// The file path is stored into the database
function uploadFile($name)
{
    // Gets the paths, full and local directory
    global $image_dir, $image_dir_path;
    if (isset($_FILES[$name])) {
        // Gets the actual file name
        $filename = $_FILES[$name]['name'];
        if (empty($filename)) {
            return;
        }
        // Get the file from the temp folder on the server
        $source = $_FILES[$name]['tmp_name'];
        // Sets the new path - images folder in this directory
        $target = $image_dir_path . '/' . $filename;
        // Moves the file to the target folder
        move_uploaded_file($source, $target);
        // Send file for further processing
        processImage($image_dir_path, $filename);
        // Sets the path for the image for Database storage
        $filepath = $image_dir . '/' . $filename;
        // Returns the path where the file is stored
        return $filepath;
    }
}

// Processes images by getting paths and 
// creating smaller versions of the image
function processImage($dir, $filename)
{
    // Set up the variables
    $dir = $dir . '/';

    // Set up the image path
    $image_path = $dir . $filename;

    // Set up the thumbnail image path
    $image_path_tn = $dir . makeThumbnailName($filename);

    // Create a thumbnail image that's a maximum of 200 pixels square
    resizeImage($image_path, $image_path_tn, 200, 200);

    // Resize original to a maximum of 500 pixels square
    resizeImage($image_path, $image_path, 500, 500);
}

// Checks and Resizes image
function resizeImage($old_image_path, $new_image_path, $max_width, $max_height)
{

    // Get image type
    $image_info = getimagesize($old_image_path);
    $image_type = $image_info[2];

    // Set up the function names
    switch ($image_type) {
        case IMAGETYPE_JPEG:
            $image_from_file = 'imagecreatefromjpeg';
            $image_to_file = 'imagejpeg';
            break;
        case IMAGETYPE_GIF:
            $image_from_file = 'imagecreatefromgif';
            $image_to_file = 'imagegif';
            break;
        case IMAGETYPE_PNG:
            $image_from_file = 'imagecreatefrompng';
            $image_to_file = 'imagepng';
            break;
        default:
            return;
    } // ends the swith

    // Get the old image and its height and width
    $old_image = $image_from_file($old_image_path);
    $old_width = imagesx($old_image);
    $old_height = imagesy($old_image);

    // Calculate height and width ratios
    $width_ratio = $old_width / $max_width;
    $height_ratio = $old_height / $max_height;

    // If image is larger than specified ratio, create the new image
    if ($width_ratio > 1 || $height_ratio > 1) {

        // Calculate height and width for the new image
        $ratio = max($width_ratio, $height_ratio);
        $new_height = round($old_height / $ratio);
        $new_width = round($old_width / $ratio);

        // Create the new image
        $new_image = imagecreatetruecolor($new_width, $new_height);

        // Set transparency according to image type
        if ($image_type == IMAGETYPE_GIF) {
            $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
            imagecolortransparent($new_image, $alpha);
        }

        if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
            imagealphablending($new_image, false);
            imagesavealpha($new_image, true);
        }

        // Copy old image to new image - this resizes the image
        $new_x = 0;
        $new_y = 0;
        $old_x = 0;
        $old_y = 0;
        imagecopyresampled($new_image, $old_image, $new_x, $new_y, $old_x, $old_y, $new_width, $new_height, $old_width, $old_height);

        // Write the new image to a new file
        $image_to_file($new_image, $new_image_path);
        // Free any memory associated with the new image
        imagedestroy($new_image);
    } else {
        // Write the old image to a new file
        $image_to_file($old_image, $new_image_path);
    }
    // Free any memory associated with the old image
    imagedestroy($old_image);
} // ends resizeImage function


function checkReviewId($reviewId){
    $valStock = filter_var($reviewId, FILTER_SANITIZE_NUMBER_INT);
    return $valStock;
}

function checkReviewText($reviewText){
    $valStock = filter_var($reviewText, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $valStock;
}

function checkReviewDate($reviewDate){
    $valStock = filter_var($reviewDate, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $valStock;
}

function checkInvId($invId){
    $valStock = filter_var($invId, FILTER_SANITIZE_NUMBER_INT);
    return $valStock;
}

function checkClientId($clientId){
    $valStock = filter_var($clientId, FILTER_SANITIZE_NUMBER_INT);
    return $valStock;
}