<?php

use Ling\Light_Kit\WidgetHandler\LightKitPicassoWidgetHandler;
use Ling\Light_Kit_Editor\Service\LightKitEditorService;

/**
 * @var $this LightKitPicassoWidgetHandler
 */
$container = $this->getContainer();


/**
 * @var $ke LightKitEditorService
 */


$ke = $container->get("kit_editor");
$websites = $ke->getWebsites();



$vars['websites'] = $websites;




