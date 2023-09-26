<img src="/phpmotors/images/site/logo.png" alt="picture of a tire">
<div class="garrik">
    <?php if (isset($_SESSION)) {
        echo "<a href='/phpmotors/accounts/index.php'> Welcome $_SESSION ['clientData']['clientFirstname']</a>";
    } ?>
</div>
<?php
if (isset($_SESSION['loggedin'])) {
    "<a href=/phpmotors/accounts/?action=login>Logout</a>";
}
?>
<?php

if (!isset($_SESSION['loggedin'])) {
    "<a href=/phpmotors/index.php>Login</a>";
}
?>

<a href="/phpmotors/accounts/?action=login">My Account</a>


<!-- BS: You should only have a My Account link. The register link is on the login page.
<a href="/phpmotors/accounts/?action=registration">Register today!</a>
-->