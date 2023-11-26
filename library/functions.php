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
        $navList .= "<a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a>";
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

