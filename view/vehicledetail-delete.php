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


        <form method="post" action="/phpmotors/reviews/index.php">

            <label for="review">Leave a review!</label>
            <textarea id="reviewDescription" name="reviewDescription" rows="10"></textarea>
            <input type="submit" value="review" name="Submit">
            <input type="hidden" name="action" value="delete-review">
        </form>
    </div>
    <footer>
        <nav id="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </nav>
        <?php unset($_SESSION['message']); ?>
    </footer>
</body>

</html>