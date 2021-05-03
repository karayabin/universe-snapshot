<?php


/**
 * @var $this LightKitAdminChloroformWidget
 */


use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform_HeliumRenderer\HeliumRenderer;
use Ling\Light_Kit_Admin\Widget\Picasso\LightKitAdminChloroformWidget;


/**
 * @var $form Chloroform
 */
$form = $z['form'];
$title = $z['title'] ?? "Form";

$renderer = new HeliumRenderer([
    "useEnctypeMultiformData" => true,
    "printJsHandler" => false,
    "printSubmitButton" => false,
    "printFormTag" => false,
]);
$renderer->prepare($form->toArray());


$this->useHelium();

?>

<div class="kit-lka-chloroform container-fluid <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <?php $renderer->printFormTagOpening(); ?>
                <div class="card">
                    <div class="card-header">
                        <?php echo $title; ?>
                    </div>
                    <div class="card-body">

                        <?php
                        $renderer->printFormContent();
                        ?>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                            Submit
                        </button>
                        <button class="btn btn-sm btn-danger" type="reset">
                            Reset
                        </button>
                    </div>
                </div>

                <?php $renderer->printFormTagClosing(); ?>
            </div>


        </div>

    </div>
</div>