<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/phpmotors/css/css.css">
</head>

<body>
    <!-- BS: need the container div -->
    <div class="container">
        <header>
            <!-- BS: no nav container needed here. <nav id="header"> -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
            <!-- BS: no nav container needed here. </nav> -->


            <nav id="navigation">
                <?php // require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; 
                ?>
            </nav>

        </header>

        <!-- BS: need the navigation here. It is created in the accounts controller, and echoed here. -->
        <nav><?php echo $navList; ?></nav>

        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        ?>

        <?php
        if (isset($message)) {
            echo $message;
        }
        if (isset($classificationList)) {
            echo '<h2>Vehicles By Classification</h2>';
            echo '<p>Choose a classification to see those vehicles</p>';
            echo $classificationList;
        }
        ?>
        <noscript>
            <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
        </noscript>
        <table id="inventoryDisplay"></table>

        <!-- BS: Let's spice that up a little -->
        <div class="card vehicle-management">
            <a href="/phpmotors/vehicles/?action=addCar">Add Inventory!</a>
            <a href="/phpmotors/vehicles/?action=addClass">Add Classification!</a>
        </div>
        <footer>
            <!-- BS: no nav tag here. <nav id="footer"> -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
            <!-- BS: no nav tag here. </nav> -->
        </footer>
        <!-- BS: closing container -->
    </div>
    <script src="../js/inventory.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>