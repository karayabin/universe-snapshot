<?php


/**
 * @var $this LightKitAdminChloroformWidget
 */


use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform_HeliumLightRenderer\HeliumLightRenderer;
use Ling\Light_Kit_Admin\Widget\Picasso\LightKitAdminChloroformWidget;


/**
 * @var $form Chloroform
 */
$form = $z['form'];
$title = $z['title'] ?? "Form";
$relatedLinks = $z['related_links'] ?? [];
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

                    <?php if ($relatedLinks): ?>
                        <ul class="list-unstyled">

                            <?php foreach ($relatedLinks as $item):
                                $text = $item['text'];
                                $url = $item['url'];
                                $icon = $item['icon'] ?? null;
                                ?>

                                <li>
                                    <a href="<?php echo htmlspecialchars($url); ?>">
                                        <?php if ($icon): ?>
                                            <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                                        <?php endif; ?>
                                        <?php echo $text; ?>
                                    </a>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>


                    <?php


                    $renderer = new HeliumLightRenderer([
                        "useEnctypeMultiformData" => true,
                        "printJsHandler" => true,
                    ]);
                    $renderer->setContainer($container);
                    echo $renderer->render($form->toArray());


                    ?>
                </div>
            </div>
        </div>
    </div>
</div>