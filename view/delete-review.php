<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($invInfo['invMake'])) {
                echo "Delete $invInfo[invMake] $invInfo[invModel]";
            } ?> | PHP Motors</title>

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
     
        <?php echo $message;
        ?>
        <?php
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
        }
        ?>
        <p>Confirm Review Deletion. The delete is permanent.</p>
        <form method="post" action="/phpmotors/reviews/index.php">
            <label for="review"> <a href="/phpmotors/reviewss/?action=review">Customer reviews</label>
            <textarea id="reviewDescription" name="reviewDescription" rows="10"></textarea>

            <input type="submit" class="regbtn" name="submit" value="Delete Review">

            <input type="hidden" name="action" value="delete-review">
            <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                            echo $invInfo['invId'];
                                                        } ?>">

            </fieldset>
        </form>
        <?php
                echo "<a href='/phpmotors/reviews/index.php?action=delete-review'>Delete your review</a>";
            ?> 
        <footer>
            <!-- BS: no nav tag here. <nav id="footer"> -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
        <!-- BS: closing container -->
    </div>
</body>

</html>
<?php unset($_SESSION['message']); ?>