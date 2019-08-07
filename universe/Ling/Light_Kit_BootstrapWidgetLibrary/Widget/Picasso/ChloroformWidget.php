<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso;


use Ling\Kit_PicassoWidget\Widget\EasyLightPicassoWidget;


/**
 * The ChloroformWidget class.
 */
class ChloroformWidget extends EasyLightPicassoWidget
{
    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->registerLibrary("Chloroform_HeliumRenderer", [
            "/plugins/Light_Kit_BootstrapWidgetLibrary/Chloroform_HeliumRenderer/helium.css",
        ], [
            "/plugins/Light_Kit_BootstrapWidgetLibrary/Chloroform_HeliumRenderer/helium.js",
        ]);
    }


}