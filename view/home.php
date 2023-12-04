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
    <!-- BS: You need a container to hold all of the content on the page. This allows you to center things -->
    <div class="container">

        <header>
            <div class="header">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
            </div>
        </header>
        <nav>
            <!-- BS: you need this to style the navigation -->
            <div class="navigation">
                <?php
                echo $navList;
                ?>
            </div><!-- BS: end navigation class -->
        </nav>

        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        ?>
        <!-- BS: You don't need this because it's created above with echo $navList;
    <div class="navigation">
         //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; 
         
    </div>
-->
        <h1>Welcome to PHP motors!</h1>
        <div class="delorean">
            <h2>DMC Delorean</h2>
            <p>3 Cup Holders!</p>
            <p>Superman Doors!</p>
            <p>Fuzzy Dice!</p>
        </div>
        <img src="/phpmotors/images/site/own_today.png" alt="banner own today">
        <div class="car">
            <img src="/phpmotors/images/delorean.jpg" alt="a car">
        </div>
        <h2>Dolorean Upgrades:</h2>
        <div class="mainbox">
            <div class="left">
                <div class="upgrade1">
                    <img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="bumper sticker">
                    <h3>Bumpber Stickers</h3>
                    <img src="/phpmotors/images/upgrades/flame.jpg" alt="flames">
                    <h3>Flame Decals</h3>
                </div>
                <div class="upgrade2">
                    <img src="/phpmotors/images/upgrades/flux-cap.png" alt="flux cap">
                    <h3>Flux Capacitator</h3>
                    <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="hub cap">
                    <h3>Hub Caps</h3>
                </div>
            </div>
            <div class="right">
                <h2>DMC Delorean Reviews</h2>
                <h3>"So fast, it's almost like travelling in time." (4/5)</h3>
                <h3>"Coolest car on the road!" (4/5)</h3>
                <h3>"I'm feeling Marty McFly!" (5/5)</h3>
                <h3>"The most futuristic car of today!" (4.5/5)</h3>
                <h3>"80's livin and I love it!" (5/5)</h3>
            </div>
        </div>
        <footer>
            <nav id="footer">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
            </nav>
        </footer>
    </div><!-- BS: closing container -->
</body>

</html>