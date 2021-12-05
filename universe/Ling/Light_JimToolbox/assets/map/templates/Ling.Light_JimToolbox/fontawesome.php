<?php

use Ling\Light_JimToolbox\Service\LightJimToolboxService;
use Ling\Light_Kit\Service\LightKitService;


/**
 *
 *
 *
 * Hi, don't forget to call our assets before including this template in your workflow:
 *
 * - /libs/universe/Ling/JimToolbox/jim-toolbox.css
 * - /libs/universe/Ling/JimToolbox/jim-toolbox.js
 *
 * Good luck!
 *
 *
 * This template is designed to work with font-awesome icons.
 *
 *
 */

/**
 * @var $this LightKitService
 */
$container = $this->getContainer();





//--------------------------------------------
// CONFIG
//--------------------------------------------
if (false === isset($_jimToolboxExecute)) {
    $_jimToolboxExecute = 'Ling\Light_JimToolbox\Controller\JimToolboxController->render';
}

if (false === isset($_jimToolboxIsVisible)) {
    $_jimToolboxIsVisible = true;
}

if (false === isset($_jimToolboxOffset50)) {
    $_jimToolboxOffset50 = false;
}


//--------------------------------------------
//
//--------------------------------------------
/**
 * @var $_ji LightJimToolboxService
 */
$_ji = $container->get("jim_toolbox");
$items = $_ji->getJimToolboxItems([
    'execute' => $_jimToolboxExecute,
]);


?>


<style>
    .toolbox-wordbreak {
        word-break: break-word;
    }
</style>


<div class="jim-toolbox toolbox-close">
    <div class="toolbox-toggle">


        <div class="toolbox-toggle-top d-flex flex-column justify-content-center align-items-center mb-1">
            <i class="far fa-plus-square text-toggle-plus"></i>
            <i class="far fa-minus-square text-toggle-minus"></i>
            <i class="fas fa-arrow-up mt-3 arrow-icon arrow-icon-up"></i>
        </div>

        <div class="toolbox-toggle-container">

            <div class="toolbox-toggle-container-slider">

                <?php foreach ($items as $item): ?>
                    <div class="toolbox-toggle-item" title="<?php echo htmlspecialchars($item['label']); ?>"
                         data-acp="<?php echo htmlspecialchars($item['url']); ?>"
                    >

                        <i class="<?php echo htmlspecialchars($item['icon']); ?>"></i>
                        <div class="toolbox-toggle-item-name"><?php echo $item['label']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-1">
            <i class="fas fa-arrow-down arrow-icon arrow-icon-down"></i>
        </div>
    </div>

    <div class="toolbox-panel">


        <div class="toolbox-content <?php echo $_jimToolboxOffset50 ? "offset-50" : ""; ?>">


            <div class="toolbox-module" data-id="_acp">
                <div class="toolbox-title">
                    <button type="button" class="close float-right toolbox-close-btn" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                    <h4 class="mb-0 d-inline-block toolbox-title-text">Title</h4>


                    <div class="toolbox-loader spinner-border spinner-border-sm ml-2" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <div class="toolbox-body">
                </div>
            </div>

        </div>
    </div>
</div>


<script>

    document.addEventListener("DOMContentLoaded", function (event) {
        $(document).ready(function () {


            var jToolbox = $('.jim-toolbox');
            JimToolbox.init({
                context: jToolbox,
                isVisible: <?php echo $_jimToolboxIsVisible ? 'true' : 'false'; ?>,
            });
        });
    });

</script>