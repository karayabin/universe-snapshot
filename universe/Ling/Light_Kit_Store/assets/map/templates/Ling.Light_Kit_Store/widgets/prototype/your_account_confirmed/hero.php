<?php


/**
 * @var $this LightKitPrototypeWidgetHandler
 */


use Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler;


$error = $z['error'] ?? null;


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
            Registration confirmed. </h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">
                You can now log in to your account :)
            </p>
        </div>
    <?php endif; ?>

</div>