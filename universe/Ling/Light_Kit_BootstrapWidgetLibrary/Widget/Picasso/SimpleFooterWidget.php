<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


/**
 * The SimpleFooterWidget class.
 */
class SimpleFooterWidget extends PicassoWidget
{


    /**
     * @overrides
     */
    public function prepare(array &$widgetConf, HtmlPageCopilot $copilot)
    {
        $vars = $widgetConf['vars'] ?? [];
        if (array_key_exists("text", $vars)) {
            $vars['text'] = str_replace('$year', date('Y'), $vars['text']);
            $widgetConf['vars'] = $vars;
        }
    }
}