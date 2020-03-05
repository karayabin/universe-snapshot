<?php


use Ling\Bat\StringTool;
use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LightRealistWidget;
use Ling\Light_Realist\Rendering\RealistListRendererInterface;
use Ling\Light_Realist\Service\LightRealistService;


/**
 * @var $this LightRealistWidget
 */

/**
 * @var $renderer RealistListRendererInterface
 */

$renderer = $z['renderer'] ?? null;
$requestDeclarationId = $z['request_declaration_id'] ?? null;


if (null === $renderer) {
    if (null !== $requestDeclarationId) {
        $container = $this->kitPageRenderer->getContainer();
        /**
         * @var $realist LightRealistService
         */
        $realist = $container->get('realist');
        $renderer = $realist->getListRendererByRequestId($requestDeclarationId);
    } else {
        throw new \RuntimeException("Bad LightRealistWidget widget configuration: missing the property renderer or request_declaration_id from " . __FILE__ . ".");
    }
}



$cssId = StringTool::getUniqueCssId('realist-');
$renderer->setContainerCssId($cssId);
?>


<div class="kit-bwl-light_realist <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>>
    <div class="container-fluid" id="<?php echo htmlspecialchars($cssId); ?>">
        <div class="row">
            <div class="col">
                <div class="card">

                    <div class="card-header d-flex">
                        <h5><?php $renderer->renderTitle(); ?></h5>
                        <?php $renderer->renderListGeneralActions(); ?>
                    </div>
                    <div class="card-body">
                        <?php $renderer->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

