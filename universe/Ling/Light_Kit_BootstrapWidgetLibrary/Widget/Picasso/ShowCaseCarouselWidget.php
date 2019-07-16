<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso;


use Ling\Bat\BDotTool;
use Ling\Bat\StringTool;
use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


/**
 * The ShowCaseCarouselWidget class.
 */
class ShowCaseCarouselWidget extends PicassoWidget
{


    /**
     * @overrides
     */
    public function prepare(array &$widgetConf, HtmlPageCopilot $copilot)
    {
        BDotTool::setDotValue("vars._carousel_id", StringTool::getUniqueCssId("showcase_carousel-"), $widgetConf);
    }


}