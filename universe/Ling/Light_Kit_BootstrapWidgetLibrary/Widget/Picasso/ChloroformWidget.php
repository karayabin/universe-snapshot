<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso;


use Ling\Kit_PicassoWidget\Widget\EasyLightPicassoWidget;


/**
 * The ChloroformWidget class.
 */
class ChloroformWidget extends EasyLightPicassoWidget
{
    /**
     * Registers the helium assets to the @page(html page copilot).
     */
    protected function useHelium()
    {
        $this->registerLibrary("Chloroform_HeliumRenderer", [
            "/plugins/Light_Kit_BootstrapWidgetLibrary/Chloroform_HeliumRenderer/helium.css",
        ], [
            "/plugins/Light_Kit_BootstrapWidgetLibrary/Chloroform_HeliumRenderer/helium.js",
        ]);
    }


}