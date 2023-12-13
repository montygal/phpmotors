<?php
//This is the vehicles model
//Reviews Model 
//This file is included in the reviews controller (reviews/index.php).
  
function clientReview($reviewText, $invId, $clientId)
{
  // Create a connection object using the phpmotors connection function
  $db = phpmotorsConnect();
  // The SQL statement
  $sql = 'INSERT INTO reviews (reviewText, invId, clientId)
        VALUES (:reviewText, :invId, :clientId)';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
  // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function getReviewsByName($clientReview)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM reviews WHERE clientReview IN (SELECT clientId FROM clientId WHERE clientReview = :clientReview)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientReview', $clientReview, PDO::PARAM_STR);
    $stmt->execute();
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicles;
}

function updateReview($reviewId, $reviewText, $reviewDate, $invId, $clientId){
  $db = phpmotorsConnect();
  $sql = 'UPDATE reviews SET reviewId = :reviewId, reviewText = :reviewText, reviewDate = :reviewDate, invId = :invId, clientId = :clientId WHERE invId = :invId'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_STR);
  $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
  $stmt->bindValue(':reviewDate', $reviewDate, PDO::PARAM_STR);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function deleteReview($clientReview)
 {
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM reviews WHERE clientReview = :clientReview';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientReview', $clientReview, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
  }


  function getReviewById($invId)
  {
      $db = phpmotorsConnect();
      $sql = 'SELECT * FROM reviews WHERE invId = :invId';
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':invId', $invId, PDO::PARAM_STR);
      $stmt->execute();
      $invId = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stmt->closeCursor();
      return $invId;
  }

