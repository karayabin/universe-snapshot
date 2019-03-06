<?php


namespace Ling\Kamille\Mvc\Layout;


use Ling\Bat\StringTool;
use Core\Services\X;
use Ling\Kamille\Mvc\BodyEndSnippetsCollector\BodyEndSnippetsCollectorInterface;
use Ling\Kamille\Mvc\HtmlPageHelper\HtmlPageHelper;


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