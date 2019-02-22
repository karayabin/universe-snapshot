<?php


namespace DocTools\GeneratedDocStyle;


/**
 * The GeneratedDocStyleInterface interface.
 *
 * See the @kw(generated documentation styles) page for more info.
 *
 *
 */
interface GeneratedDocStyleInterface
{


    /**
     * Returns the class url.
     *
     * @param string $planetName . The planet name.
     * @param string $generatedClassBaseUrl . The generated class base url.
     * @param string $className . The class name.
     * @return string
     */
    public function getClassUrl(string $planetName, string $generatedClassBaseUrl, string $className): string;


    /**
     * Returns the method url.
     *
     * @param string $planetName . The planet name.
     * @param string $generatedClassBaseUrl . The generated class base url.
     * @param string $className . The class name.
     * @param string $methodName . The method name.
     * @return string
     */
    public function getMethodUrl(string $planetName, string $generatedClassBaseUrl, string $className, string $methodName): string;


    /**
     * Returns the relative path to the planet documentation page.
     *
     * @param string $planetName
     * @return string
     */
    public function getPlanetPageRelativePath(string $planetName): string;


    /**
     * Returns the relative path to the class documentation page.
     *
     * @param string $planetName
     * @param string $className
     * @return string
     */
    public function getClassPageRelativePath(string $planetName, string $className): string;


    /**
     * Returns the relative path to the method documentation page.
     *
     * @param string $planetName
     * @param string $className
     * @param string $methodName
     * @return string
     */
    public function getMethodPageRelativePath(string $planetName, string $className, string $methodName): string;
}