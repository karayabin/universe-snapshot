<?php

namespace Ling\Kit_PicassoWidget\Widget;


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
     * Builds the PicassoWidget instance.
     */
    public function __construct()
    {
        $this->libraries = [];
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