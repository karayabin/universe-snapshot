<?php


use Ling\CSRFTools\CSRFProtector;

require_once __DIR__ . "/../setup.php";


CSRFProtector::inst()->deletePageUnusedTokens();

?>
<a href="user-services-protected.php">Go back to the user services protected page</a>