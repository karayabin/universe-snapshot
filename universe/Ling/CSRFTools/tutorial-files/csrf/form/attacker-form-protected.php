<?php


require_once __DIR__ . "/../setup.php";



$targetUrl = "user-form-protected.php";


?>
    <form action="<?php echo htmlspecialchars($targetUrl); ?>" method="post"
          target="my_iframe"
    >
        <input type="text" name="token" value="">
        <input name="any" type="submit" value="Submit"/>
    </form>



<?php iframe(); ?>
<?php back_to_summary(); ?>
