<?php


use Ling\CSRFTools\CSRFProtector;

require_once __DIR__ . "/../setup.php";


$tokenServiceOneValue = CSRFProtector::inst()->createToken('token-s1');
$tokenServiceTwoValue = CSRFProtector::inst()->createToken('token-s2');


?>

    <a href="service-one-protected.php?token-s1=<?php echo htmlspecialchars($tokenServiceOneValue); ?>"
       target="my_iframe">
        Access service one
    </a>
    <br>
    Ps: token-s1=<?php echo $tokenServiceOneValue; ?>
    <br>
    <br>
    <a href="service-two-protected.php?token-s2=<?php echo htmlspecialchars($tokenServiceTwoValue); ?>"
       target="my_iframe">
        Access service two
    </a>
    <br>
    Ps: token-s2=<?php echo $tokenServiceTwoValue; ?>
    <br>
    <br>

    <a href="another-page-without-page-security.php">Go to another page without page security</a>
    <br>
    <br>
    <a href="another-page-with-page-security.php">Go to another page with page security</a>
    <br>
    <br>


<?php iframe(); ?>


<?php back_to_summary(); ?>