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
        <nav id="header">
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        </nav>

        <nav id="navigation">
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
        </nav>
    </header>
    <div class="register">



        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        } ?>
        <form method="post" action="/phpmotors/accounts/index.php">
            <label for="fname">First Name</label>
            <input type="text" name="clientFirstname" id="clientFirstname" <?php if (isset($clientFirstname)) {
                                                                                echo "value='$clientFirstname'";
                                                                            } ?> required>
            <label for="lname">Last Name</label>
            <input type="text" name="clientLastname" id="lname" <?php if (isset($clientLastname)) {
                                                                    echo "value='$clientLastname'";
                                                                } ?> required>
            <label for="email">Email</label>
            <input type="email" name="clientEmail" id="email" <?php if (isset($clientEmail)) {
                                                                    echo "value='$clientEmail'";
                                                                } ?> required>
            <label for="password">Password</label>
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
            <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <!-- Add the action name - value pair -->
            <input type="submit" value="Register">
            <input type="hidden" name="action" value="register">
            <a href="/phpmotors/accounts/index.php?action=logout"></a>
            <input type="hidden" name="action" value="logout">
        </form>
    </div>
    <a href="/phpmotors/accounts/index.php?action=registration"></a>
    <footer>
        <nav id="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </nav>
        <?php unset($_SESSION['message']); ?>
    </footer>
</body>

</html>