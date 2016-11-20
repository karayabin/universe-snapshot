<?php



session_start();

if (!isset($_SESSION['beautyDemo'])) {
    $_SESSION['beautyDemo'] = true;
    echo '_BEAST_TEST_NOT_FINISHED_RETRY_LATER__';
}
else {
    echo '_BEAST_TEST_RESULTS:s=5;f=0;e=0;na=0;sk=0__';
    unset($_SESSION['beautyDemo']);
}






