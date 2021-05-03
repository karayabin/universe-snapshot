<?php


/**
 * @var $this ChloroformWidget
 */


use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform_HeliumLightRenderer\HeliumLightRenderer;
use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ChloroformWidget;


/**
 * @var $form Chloroform
 */
$form = $z['form'];
$title = $z['title'] ?? "Form";
$container = $this->getContainer();

?>

<div class="kit-bwl-chloroform container-fluid <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>

    <div class="row">
        <div class="col m-auto">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo $title; ?></h5>
                </div>
                <div class="card-body">

                    <?php


                    $renderer = new HeliumLightRenderer([
                        "useEnctypeMultiformData" => true,
                        "renderPrintsJsHandler" => false,
                    ]);
                    $renderer->setContainer($container);
                    echo $renderer->render($form->toArray());


                    ?>
                </div>
            </div>
        </div>
    </div>
</div>