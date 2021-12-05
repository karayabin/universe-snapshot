<?php


/**
 * @var $this LightKitPrototypeWidgetHandler
 */


use Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler;


$error = $z['error'] ?? null;
$plainPassword = $z['password'] ?? null;


?>

<div class="px-4 py-5 my-5 text-center">

    <?php if (null !== $error): ?>
        <h1 class="display-5 fw-bold">
            <i class="bi bi-bug-fill" style="color: #803131"></i>
            Oops, an error occurred.</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">
                <span class="text-danger"><?php echo $error; ?></span>
            </p>
        </div>
    <?php else: ?>
        <h1 class="display-5 fw-bold">
            <i class="bi bi-check-circle-fill" style="color: #44a244"></i>
            Your password has been reset.</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">
                Your new password is now:<br>
                <strong><?php echo $plainPassword; ?></strong><br>

                <span class="text-danger">This password will disappear as soon as you refresh this page!</span><br>


                You can change your password at anytime from your account :)
            </p>
        </div>
    <?php endif; ?>

</div>