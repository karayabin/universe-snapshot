<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


/**
 * The BlogenHeaderWithModalActionButtonsWidget class.
 */
class BlogenHeaderWithModalActionButtonsWidget extends PicassoWidget
{

    /**
     * @overrides
     */
    public function prepare(array &$widgetConf, HtmlPageCopilot $copilot)
    {
        $this->registerLibrary("ckeditor", [], [
            'https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js',
        ]);
    }


}