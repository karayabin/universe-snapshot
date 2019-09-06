<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit_PicassoWidget\Widget\EasyLightPicassoWidget;


/**
 * The ChloroformWidget class.
 */
class ChloroformWidget extends EasyLightPicassoWidget
{
    /**
     * @overrides
     */
    public function prepare(array &$widgetConf, HtmlPageCopilot $copilot)
    {
        $this->registerLibrary("Chloroform_HeliumRenderer", [
            "/plugins/Light_Kit_BootstrapWidgetLibrary/Chloroform_HeliumRenderer/helium.css",
        ], [
            "/plugins/Light_Kit_BootstrapWidgetLibrary/Chloroform_HeliumRenderer/helium.js",
        ]);
    }


}