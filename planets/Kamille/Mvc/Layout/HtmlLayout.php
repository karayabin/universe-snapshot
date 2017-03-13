<?php


namespace Kamille\Mvc\Layout;


use Kamille\Mvc\HtmlPageHelper\HtmlPageHelper;


class HtmlLayout extends Layout
{


    private $lang;


    public function render(array $variables = [])
    {

        $out = parent::render($variables);


        $lang = $this->lang;
        if (null !== $lang) {
            $lang = ' lang="' . $lang . '"';
        }


        echo '<!DOCTYPE html>' . PHP_EOL;
        echo '<html' . $lang . '>' . PHP_EOL;
        HtmlPageHelper::displayHead();
        HtmlPageHelper::displayOpeningBodyTag();
        echo $out;
        HtmlPageHelper::displayBodyEndAssets(true);
        echo '</html>' . PHP_EOL;
    }


    /**
     * html lang attribute is important for screen readers (https://www.w3schools.com/html/html_attributes.asp)
     * Example of langs:
     * - en-US
     *
     */
    public function setHtmlLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }
}