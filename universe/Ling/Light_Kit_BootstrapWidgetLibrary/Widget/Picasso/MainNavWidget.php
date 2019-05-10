<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


/**
 * The MainNavWidget class.
 */
class MainNavWidget extends PicassoWidget
{


    /**
     * @overrides
     */
    public function prepare(array &$widgetConf, HtmlPageCopilot $copilot)
    {
        $vars = $widgetConf['vars'];
        $attr = $vars['attr'] ?? [];
        $cssId = $attr['id'] ?? null;

        /**
         * ScrollSpy and smooth scrolling features only work if the css id has been defined.
         */
        if (null !== $cssId) {
            $code = '';
            $useScrollSpy = $vars['use_scrollspy'] ?? false;
            $useSmoothScrolling = $vars['use_smooth_scrolling'] ?? false;

            if (true === $useScrollSpy) {


                $copilot->setBodyTagAttribute("data-spy", 'scroll');
                $copilot->setBodyTagAttribute("data-target", '#' . $cssId);


                $code .= <<<EEE
                
        // Init Scrollspy
        $('body').scrollspy({target: '#$cssId'});
EEE;

            }

            if (true === $useSmoothScrolling) {
                $code .= <<<EEE
                
        // Smooth Scrolling
        $("#$cssId a").on('click', function (event) {
            if (this.hash !== "") {
                event.preventDefault();

                const hash = this.hash;

                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function () {

                    window.location.hash = hash;
                });
            }
        });
EEE;

            }

            if ('' !== $code) {
                $start = <<<EEE
    $(document).ready(function () {
EEE;
                $end = <<<EEE
    });
EEE;

                $code = PHP_EOL . $start . PHP_EOL . $code . PHP_EOL . $end . PHP_EOL;
                $copilot->addJsCodeBlock($code);

            }

        }
    }


}