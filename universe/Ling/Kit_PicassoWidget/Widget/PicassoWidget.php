<?php

namespace Ling\Kit_PicassoWidget\Widget;


use Ling\Bat\StringTool;
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
     * Builds the PicassoWidget instance.
     */
    public function __construct()
    {
        $this->libraries = [];
        $this->attr = [];
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
        $this->libraries[$libraryName] = [
            "css" => $css,
            "js" => $js,
        ];
    }

}