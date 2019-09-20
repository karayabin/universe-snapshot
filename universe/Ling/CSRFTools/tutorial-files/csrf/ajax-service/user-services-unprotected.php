<?php


require_once __DIR__ . "/../setup.php";


?>

    <a href="service-one-unprotected.php" target="my_iframe">Access service one</a><br>
    <a href="service-two-unprotected.php" target="my_iframe">Access service two</a><br>


<?php iframe(); ?>


<?php back_to_summary(); ?>