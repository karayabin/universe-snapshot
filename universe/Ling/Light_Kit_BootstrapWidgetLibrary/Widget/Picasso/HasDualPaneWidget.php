<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso;


use Ling\Kit_PicassoWidget\Widget\EasyLightPicassoWidget;


/**
 * The HasDualPaneWidget class.
 */
class HasDualPaneWidget extends EasyLightPicassoWidget
{
    /**
     * Registers the @page(jAcpHep) assets.
     */
    protected function useAcpHep()
    {
        $this->registerLibrary("JAcpHep", [], [
            "/libs/universe/Ling/JAcpHep/acphep-helper.js",
        ]);
    }

}