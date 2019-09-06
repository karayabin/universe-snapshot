<?php

namespace Ling\Kit_PicassoWidget\Widget;


use Ling\Bat\StringTool;
use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\ZephyrTemplateEngine\ZephyrTemplateEngine;

/**
 * The PicassoWidget class.
 */
class PicassoWidget extends ZephyrTemplateEngine
{


    /**
     * This property holds the libraries for this instance.
     *
     * It's an array of library name => assets.
     *
     * Assets is the following array:
     *
     * - css: array of css urls
     * - js: array of js urls
     *
     *
     *
     *
     * @var array
     */
    protected $libraries;

    /**
     * This property holds the attr for this instance.
     * This is an array of html attributes to add to the widget's outer tag.
     *
     * For instance:
     * - id: my_id
     * - class: my_class1 my_class2
     * - data-example-value: 668
     *
     * @var array
     */
    protected $attr;

    /**
     * This property holds the copilot for this instance.
     * Sometimes, templates might need to access the copilot directly,
     * hence the existence of this property.
     *
     * @var HtmlPageCopilot
     */
    protected $copilot;


    /**
     * Builds the PicassoWidget instance.
     */
    public function __construct()
    {
        $this->libraries = [];
        $this->attr = [];
        $this->copilot = null;
    }

    /**
     * Returns the libraries of this instance.
     *
     * @return array
     */
    public function getLibraries(): array
    {
        return $this->libraries;
    }

    /**
     * Sets the copilot.
     *
     * @param HtmlPageCopilot $copilot
     */
    public function setCopilot(HtmlPageCopilot $copilot)
    {
        $this->copilot = $copilot;
    }


    /**
     * @overrides
     */
    public function renderFile(string $filePath, array $variables = [])
    {
        if (array_key_exists('attr', $variables)) {
            $this->attr = $variables["attr"];
        }
        return parent::renderFile($filePath, $variables);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Prepares the widget according to the given widget configuration.
     *
     * Sometimes, you want the user (via the widget conf) to be able to activate
     * or de-activate some js features, and so basically depending on the widget conf, you will
     * act on the copilot instance.
     * This is the original use case why this method was created.
     *
     *
     * A second use case is that you want to transform the widget configuration, for instance
     * to allow the user to use a custom notation.
     * For instance, when the user types $year, it converts automatically to the current year.
     * The prepare method is a good place to do just that.
     *
     *
     * @param array $widgetConf
     * @param HtmlPageCopilot $copilot
     * @overrideMe
     */
    public function prepare(array &$widgetConf, HtmlPageCopilot $copilot)
    {

    }


    //--------------------------------------------
    // TEMPLATE HELPERS
    //--------------------------------------------
    /**
     * Returns the string of html attributes defined in the widget attributes (attr property in the @page(widget configuration array)).
     *
     *
     *
     * @param bool $excludeClass
     * @return string
     */
    protected function getAttributesHtml(bool $excludeClass = true): string
    {
        $attr = $this->attr;
        if (true === $excludeClass) {
            unset($attr['class']);
        }
        if (empty($attr)) {
            return "";
        }
        return StringTool::htmlAttributes($attr);
    }


    /**
     * Returns the css class defined in the widget attributes (attr property in the @page(widget configuration array))
     * @return string
     */
    protected function getCssClass(): string
    {
        return $this->attr['class'] ?? "";
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Registers an (external) library that this widget uses.
     *
     * @param string $libraryName
     * @param array $css
     * @param array $js
     */
    protected function registerLibrary(string $libraryName, array $css, array $js)
    {
        $this->copilot->registerLibrary($libraryName, $js, $css);
    }

}