<?php
if (!isset($_SESSION['loggedin'])) {
    header('Location: /phpmotors/accounts/index.php');
}
?><!DOCTYPE html>
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
    <div class="container">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        </header>
        <nav>
            <?php
            echo $navList;
            ?>
        </nav>


        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        ?>




        <main>
            <h1>You are logged in!<?php echo $_SESSION['clientData']['clientFirstname'] ?></h1>
            <ul>
                <li>Client First Name:<?php echo $_SESSION['clientData']['clientFirstname'] ?></li>
                <li>Client Last Name:<?php echo $_SESSION['clientData']['clientLastname'] ?></li>
                <li>Client Email:<?php echo $_SESSION['clientData']['clientEmail'] ?></li>
            </ul>
            <?php
            if ($_SESSION['clientData']['clientLevel'] > 1) {
                echo "<p>This is for administrative changes to the database.</p>
            <a href='/phpmotors/vehicles/index.php'>Vehicles</a>";
            }
            ?>
            <?php
            if ($_SESSION['clientData']['clientLevel'] < 2) {
                echo "<a href='/phpmotors/accounts/index.php?action=client-update'>Update Account Information</a>";
            }
            ?>    
        </main>
        <?php unset($_SESSION['message']); ?>
        <footer>

            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>