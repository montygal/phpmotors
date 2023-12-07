<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($invInfo['invMake'])) {
                echo "$invInfo[invMake] $invInfo[invModel]";
            } ?> | PHP Motors</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/phpmotors/css/css.css">
</head>

<body>
  <div>
    <!-- header section -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <!-- Navigation section -->
    <nav>
      <?php echo $navList; ?>
    </nav>


  </div>

  <main>
 
  
<?php if(isset($message)){
 echo $message; }
 ?>


<?php if(isset($vehicleDisplay)){
 echo $vehicleDisplay;
} ?>



  </main>

  <!-- Footer section -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>

</body>

</html>