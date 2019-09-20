<?php


require_once __DIR__ . "/../setup.php";


if (count($_POST) > 0) {
    success_message();
}


?>
<form action="" method="post">
    <input name="any" type="submit" value="Submit"/>
</form>


<?php back_to_summary(); ?>