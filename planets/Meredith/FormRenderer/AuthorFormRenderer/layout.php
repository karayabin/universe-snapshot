<?php


use Meredith\MainController\MainControllerInterface;

/**
 * @var MainControllerInterface $mc
 */

?>
<form data-meredith="{formId}" class="form-horizontal meredith-form" action="" method="post">
    <fieldset class="content-group">
        <legend class="text-bold">{title}</legend>
        {controls}
    </fieldset>

    <div class="text-right">
        <button id="reset" class="btn btn-default" type="reset">{reset} <i class="icon-reload-alt position-right"></i></button>
        <button type="submit" class="btn btn-primary">{validate} <i class="icon-arrow-right14 position-right"></i></button>
    </div>
</form>
