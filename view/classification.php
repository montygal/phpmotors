<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/phpmotors/css/css.css">
</head>

<body>
    <main>
        <h1><?php echo $classificationName; ?> vehicles</h1>

        <?php if (isset($message)) {
            echo $message;
        }
        ?>

        <?php if (isset($vehicleDisplay)) {
            echo $vehicleDisplay;
        } ?>
    </main>
</body>

</html>