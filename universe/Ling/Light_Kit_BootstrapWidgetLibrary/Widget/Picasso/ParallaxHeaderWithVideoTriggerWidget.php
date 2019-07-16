<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso;


use Ling\Bat\BDotTool;
use Ling\Bat\StringTool;
use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


/**
 * The ParallaxHeaderWithVideoTriggerWidget class.
 */
class ParallaxHeaderWithVideoTriggerWidget extends PicassoWidget {


    /**
     * @overrides
     */
    public function prepare(array &$widgetConf, HtmlPageCopilot $copilot)
    {
        BDotTool::setDotValue("vars._video_id", StringTool::getUniqueCssId("parallax_header_with_video_trigger_video-"), $widgetConf);
    }


}