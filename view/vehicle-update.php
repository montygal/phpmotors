<?php
$dropDownList = '<select name="classificationId" id="classificationId">';
foreach ($classificationList as $inventoryTwo) {
    $dropDownList .= "<option value='$inventoryTwo[classificationId]'";
    if (isset($classificationId)) {
        if ($inventoryTwo['classificationId'] === $classificationId) {
            $dropDownList .= ' selected ';
        }
    }

    elseif(isset($invInfo['classificationId'])){
    if($classification['classificationId'] === $invInfo['classificationId']){
    $dropDownList .= ' selected ';}

$dropDownList .= ">$inventoryTwo[classificationName]</option>";}
$dropDownList .= '</select>';
?>
<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
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
    <!-- BS: need the container div -->
    <div class="container">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
            <h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
elseif(isset($invMake) && isset($invModel)) { 
	echo "Modify $invMake $invModel"; }?></h1>
        </header>

        <nav>
            <?php
            // BS: Navigation should go outside of the header tag
            echo $navList;
            ?>
        </nav>

            <?php echo $message;
            ?>

<title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	 echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel))) { 
		echo "Modify $invMake $invModel"; }?> | PHP Motors</title>
        <!-- BS: no need to add an image  here: <img src="/phpmotors/images/no-image.png" alt="no image available"> -->
        <form method="post" action="/phpmotors/vehicles/index.php">
            <div class="cars">
                
                <label for="invMake">Make</label><br>
                <input type="text" name="invMake" id="invMake" required <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>

                <label for="invModel">Model</label>
                <input type="text" name="invModel" id="invModel" required <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>
	
                                                                    
                <label for="invDescription">Description</label>
                <!-- BS: The description should be a textarea tag <input type="text" id="invDescription" name="invDescription" required> -->
                <textarea name="invDescription" id="invDescription" required><?php if(isset($invDescription)){ echo $invDescription; } elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea></textarea>
                
                <label for="invImage">Image</label>
                <input type="text" name="invImage" id="invImage" <?php if(isset($invImage)){ echo "value='$invImage'"; } elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; }?>>
                
                <label for="invThumbnail">Thumbnail</label>
                <input type="text" id="invThumbnail" name="invThumbnail" <?php if(isset($invThumbnail)){ echo "value='$invThumbnail'"; } elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; }?>>
                
                <label for="invPrice">Price</label>
                <input type="text" id="invPrice" name="invPrice" required <?php if(isset($invPrice)){ echo "value='$invPrice'"; } elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; }?>>
                
                <label for="invStock">Stock</label>
                <input type="text" id="invStock" name="invStock" required <?php if(isset($invStock)){ echo "value='$invStock'"; } elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; }?>>
                
                <input type="text" id="invColor" name="invColor" required <?php if(isset($invColor)){ echo "value='$invColor'"; } elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; }?>>
                <!-- BS: we want a classification, not a car <label for="cars">Choose a car:</label> -->
                <!-- BS: and let's put the dropdown in the same box as the other options -->
                <label for="cars">Choose a classification:</label>
                <?php echo $dropDownList; ?>
            </div>
            <input type="submit" name="submit">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="cars">
            <input type="submit" name="submit" value="Update Vehicle">
            <input type="hidden" name="action" value="updateVehicle">

            <!-- <a href="/phpmotors/accounts/index.php?action=logout"></a>
            <input type="hidden" name="action" value="logout"> -->
        </form>
        <a href="/phpmotors/vehicles/index.php?action=cars"></a>
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