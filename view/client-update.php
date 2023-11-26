<?php
if (!isset($_SESSION['loggedin'])) {
    header('Location: /phpmotors/accounts/index.php');
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
        echo $message ?>

        <!--This form is for updating a client's name-->
        <form method="post" action="/phpmotors/accounts/index.php">
            <label for="clientFirstname">Update First Name</label>
            <input type="text" name="clientFirstname" id="clientFirstname" <?php if (isset($clientFirstname)) {
                                                                                echo "value='$clientFirstname'";
                                                                            } ?> required>
            <label for="clientLastname">Update Last Name</label>
            <input type="text" name="clientLastname" id="clientLastname" <?php if (isset($clientLastname)) {
                                                                                echo "value='$clientLastname'";
                                                                            } ?> required>
            <label for="clientEmail">Update Email</label>
            <input type="email" name="clientEmail" id="clientEmail" <?php if (isset($clientEmail)) {
                                                                        echo "value='$clientEmail'";
                                                                    } ?> required>
            <input type="submit" name="submit"value="Update Info">
            <input type="hidden" name="action" value="client-update">
            
        </form>
        <!-- <a href="/phpmotors/accounts/index.php?action=client-update"></a> -->
        <!--This form is for updating a client password-->
        <form method="post" action="/phpmotors/accounts/index.php">
            <label for="clientPassword">Update Password</label>
            <span>You are changing your password. Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character.</span>
            <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <input type="submit" name="submit"value="Update Password">
            <input type="hidden" name="action" value="password-update">
        </form>
        <!-- <a href="/phpmotors/accounts/index.php?action=password-update"></a> -->
    </div>
    <footer>
        <nav id="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </nav>
        <?php unset($_SESSION['message']); ?>
    </footer>
</body>

</html>