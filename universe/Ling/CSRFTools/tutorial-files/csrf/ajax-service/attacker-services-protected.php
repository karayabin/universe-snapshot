<?php


require_once __DIR__ . "/../setup.php";


$serviceOneUrl = "service-one-protected.php";
$serviceTwoUrl = "service-two-protected.php";
?>


<div>
    Access Service One:
    <form method="get" action="<?php echo htmlspecialchars($serviceOneUrl); ?>"
    target="my_iframe"
    >
        <input type="text" name="token-s1" value="">
        <input type="submit" value="Submit"/>
    </form>
<?php iframe('my_iframe'); ?>
</div>

<div>
    Access Service Two:
    <form method="get" action="<?php echo htmlspecialchars($serviceTwoUrl); ?>"
    target="my_iframe2"
    >
        <input type="text" name="token-s2" value="">
        <input type="submit" value="Submit"/>
    </form>
<?php iframe('my_iframe2'); ?>
</div>

<?php back_to_summary(); ?>