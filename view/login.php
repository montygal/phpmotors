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

            <!-- BS: the nav needs to be outside of the header 
    <nav id="navigation">
        <?php // require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; 
        ?> 
    </nav>
-->
        </header>

        <!-- BS: need the navigation here. It is created in the accounts controller, and echoed here. -->
        <nav><?php echo $navList; ?></nav>


        <div class="login">


            <h1>PHP Motors Login</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>

            <form method="post" action="/phpmotors/accounts/index.php">
                <label for="clientEmail">Email</label>
                <input type="email" name="clientEmail" id="clientEmail" <?php if (isset($clientEmail)) {
                                                                            echo "value='$clientEmail'";
                                                                        } ?> required>
                <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                <label for="clientPassword">Password</label>
                <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                <input type="submit" value="Submit">
                <input type="hidden" name="action" value="login">
            </form>
        </div>


        <!-- BS: this should look like below for a register link <a href="/phpmotors/accounts/index.php?action=login"></a> -->
        <a href="/phpmotors/accounts/?action=registration">Register today!</a>
        <?php unset($_SESSION['message']); ?>
        <footer>
            <!-- BS: no nav tag here. <nav id="footer"> -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
            <!-- BS: no nav tag here. </nav> -->
        </footer>
        <!-- BS: closing container -->
    </div>
</body>

</html>