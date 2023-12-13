<img src="/phpmotors/images/site/logo.png" alt="picture of a tire">
<div class="garrik">
</div>
<?php
if (isset($_SESSION['loggedin'])) {
    echo "<a href='/phpmotors/accounts/?action=Logout'>Logout</a>";
    echo "<a href='/phpmotors/accounts/index.php'> Welcome".$_SESSION ['clientData']['clientFirstname']."</a>";
    echo "<a href='/phpmotors/reviews/?action=review'>Please leave a review!</a>";
}
else{
    echo "<a href='/phpmotors/accounts/?action=Login'>My Account</a>";

}
?>



<!-- BS: You should only have a My Account link. The register link is on the login page.
<a href="/phpmotors/accounts/?action=registration">Register today!</a>
-->