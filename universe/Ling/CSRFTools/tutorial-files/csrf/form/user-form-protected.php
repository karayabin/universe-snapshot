<?php


use Ling\CSRFTools\CSRFProtector;

require_once __DIR__ . "/../setup.php";


$tokenName = "token";
$tokenValue = CSRFProtector::inst()->createToken($tokenName);


if (count($_POST) > 0) {
    if (array_key_exists($tokenName, $_POST)) {
        $postTokenValue = $_POST[$tokenName];
        if (true === CSRFProtector::inst()->isValid($tokenName, $postTokenValue)) {
            success_message($postTokenValue);
        } else {
            error_message("The given csrf token is not valid ($postTokenValue).");
        }
    }
}


?>
    <form action="" method="post">
        <input type="text" name="<?php echo htmlspecialchars($tokenName); ?>"
               value="<?php echo htmlspecialchars($tokenValue); ?>"/>
        <input type="submit" value="Submit"/>
    </form>


<?php


back_to_summary();