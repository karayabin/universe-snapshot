<?php


namespace Kamille\Mvc\Layout;


use Bat\StringTool;
use Core\Services\X;
use Kamille\Mvc\BodyEndSnippetsCollector\BodyEndSnippetsCollectorInterface;
use Kamille\Mvc\HtmlPageHelper\HtmlPageHelper;


class AjaxLayout extends Layout
{


    public function render(array $variables = [])
    {

        ob_start();


        /**
         * Note:
         * the HtmlPage assets collected during the rendering
         * should be rendered as well (otherwise we would potentially experiment loss of functionality).
         */
        $out = parent::render($variables);

        HtmlPageHelper::displayHeadAssets(); // displaying css links
        echo $out;
        HtmlPageHelper::displayBodyEndSection(false);
        return ob_get_clean();
    }


}