<?php
$dropDownList = '<select name="classificationId" id="classificationId">';
foreach ($classificationList as $inventoryTwo) {
    $dropDownList .= "<option value='$inventoryTwo[classificationId]'";
    if (isset($classificationId)) {
        if ($inventoryTwo['classificationId'] === $classificationId) {
            $dropDownList .= ' selected ';
        }
    }
    $dropDownList .= ">$inventoryTwo[classificationName]</option>";
}
$dropDownList .= '</select>';
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
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        </header>

        <nav>
            <?php
            // BS: Navigation should go outside of the header tag
            echo $navList;
            ?>
        </nav>


        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        ?>
        <!-- BS: no need to add an image  here: <img src="/phpmotors/images/no-image.png" alt="no image available"> -->
        <form method="post" action="/phpmotors/vehicles/index.php">
            <div class="cars">
                <label for="invMake">Make</label><br>
                <input type="text" id="invMake" name="invMake" <?php if (isset($invMake)) {
                                                                    echo "value='$invMake'";
                                                                } ?> required>
                <label for="invModel">Model</label>
                <input type="text" id="invModel" name="invModel" <?php if (isset($invModel)) {
                                                                        echo "value='$invModel'";
                                                                    } ?>required>
                <label for="invDescription">Description</label>
                <!-- BS: The description should be a textarea tag <input type="text" id="invDescription" name="invDescription" required> -->
                <textarea id="invDescription" name="invDescription" rows="10" <?php if (isset($invDescription)) {
                                                                                    echo "value='$invDescription'";
                                                                                } ?>required></textarea>
                <label for="invImage">Image</label>
                <input type="text" id="invImage" name="invImage" <?php if (isset($invImage)) {
                                                                        echo "value='$invImage'";
                                                                    } ?>required>
                <label for="invThumbnail">Thumbnail</label>
                <input type="text" id="invThumbnail" name="invThumbnail" <?php if (isset($invThumbnail)) {
                                                                                echo "value='$invThumbnail'";
                                                                            } ?>required>
                <label for="invPrice">Price</label>
                <input type="text" id="invPrice" name="invPrice" <?php if (isset($invPrice)) {
                                                                        echo "value='$invPrice'";
                                                                    } ?>required>
                <label for="invStock">Stock</label>
                <input type="text" id="invStock" name="invStock" <?php if (isset($invStock)) {
                                                                        echo "value='$invStock'";
                                                                    } ?>required>
                <label for="invColor">Color</label>
                <input type="text" id="invColor" name="invColor" <?php if (isset($invColor)) {
                                                                        echo "value='$invColor'";
                                                                    } ?> required>
                <!-- BS: we want a classification, not a car <label for="cars">Choose a car:</label> -->
                <!-- BS: and let's put the dropdown in the same box as the other options -->
                <label for="cars">Choose a classification:</label>
                <?php echo $dropDownList; ?>
            </div>
            <input type="submit" name="submit">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="cars">
            <a href="/phpmotors/accounts/index.php?action=logout"></a>
            <input type="hidden" name="action" value="logout">
        </form>
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