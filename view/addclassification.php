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
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        </header>

        <nav>
            <?php
            // BS: Navigation should go outside of the header tag
            echo $navList;
            ?>
        </nav>


        <?php echo $message
        ?>
        <form method="post" action="/phpmotors/vehicles/index.php">
            <div class="classification">
                <p>Names cannot exceed 30 characters.</p>
                <p>Name</p>
                <input type="text" id="classificationName" name="classificationName" maxlength="30" <?php if (isset($classificationName)) {
                                                                                                        echo "value='$classificationName'";
                                                                                                    } ?> required>
                <input type="submit" name="submit">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="classification">
                <!-- <input type="hidden" name="action" value="logout"> <input type="submit" value="Logout">
                <input type="hidden" name="action" value="logout"> -->
            </div>
        </form>
        <a href="/phpmotors/accounts/index.php?action=classification"></a>
        <footer>
            <!-- BS: no nav tag here. <nav id="footer"> -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
            <!-- BS: no nav tag here. </nav> -->
            <?php unset($_SESSION['message']); ?>
        </footer>
        <!-- BS: closing container -->
    </div>
</body>

</html>