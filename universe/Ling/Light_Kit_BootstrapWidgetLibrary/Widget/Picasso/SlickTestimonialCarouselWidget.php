<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso;


use Ling\Bat\BDotTool;
use Ling\Bat\StringTool;
use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


/**
 * The SlickTestimonialCarouselWidget class.
 */
class SlickTestimonialCarouselWidget extends PicassoWidget {


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->registerLibrary("slick", [
            'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css',
        ], [
            'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',
        ]);
    }

    /**
     * @overrides
     */
    public function prepare(array &$widgetConf, HtmlPageCopilot $copilot)
    {
        BDotTool::setDotValue("vars._slider_id", StringTool::getUniqueCssId("slick_testimonial_carousel_slider-"), $widgetConf);
    }


}