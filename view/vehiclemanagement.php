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
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php';
        ?>
        <?php
        echo $navList;
        ?>
    </header>

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
</body>

</html>