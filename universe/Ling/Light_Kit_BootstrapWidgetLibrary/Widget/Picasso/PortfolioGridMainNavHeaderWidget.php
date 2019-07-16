<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso;


use Ling\BabyYaml\Helper\BdotTool;
use Ling\Bat\StringTool;
use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


/**
 * The PortfolioGridMainNavHeaderWidget class.
 */
class PortfolioGridMainNavHeaderWidget extends PicassoWidget
{

    /**
     * @overrides
     */
    public function prepare(array &$widgetConf, HtmlPageCopilot $copilot)
    {
        $id = StringTool::getUniqueCssId("PortfolioGridMainNavHeaderWidget-");
        BdotTool::setDotValue("vars._js_container_id", $id, $widgetConf);
    }


}