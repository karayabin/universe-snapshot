<?php


namespace DocTools\GeneratedDocStyle;


/**
 * The DefaultGeneratedDocStyle class.
 */
class DefaultGeneratedDocStyle implements GeneratedDocStyleInterface
{


    /**
     * This property holds the file extension for all generated files (default=md).
     * @var string
     */
    protected $extension;


    /**
     * Builds the DefaultGeneratedDocStyle instance.
     */
    public function __construct()
    {
        $this->extension = "md";
    }

    /**
     * Sets the extension.
     *
     * @param string $extension
     */
    public function setExtension(string $extension)
    {
        $this->extension = $extension;
    }


    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * @implementation
     */
    public function getClassUrl(string $planetName, string $generatedClassBaseUrl, string $className): string
    {
        return $generatedClassBaseUrl . "/" . str_replace('\\', '/', $className) . "." . $this->extension;
    }

    /**
     * @implementation
     */
    public function getMethodUrl(string $planetName, string $generatedClassBaseUrl, string $className, string $methodName): string
    {
        return $generatedClassBaseUrl . "/" . str_replace('\\', '/', $className) . "/$methodName." . $this->extension;
    }

    /**
     * @implementation
     */
    public function getPlanetPageRelativePath(string $planetName): string
    {
        return $planetName . "." . $this->extension;
    }

    /**
     * @implementation
     */
    public function getClassPageRelativePath(string $planetName, string $className): string
    {
        return str_replace('\\', '/', $className) . "." . $this->extension;
    }


    /**
     * @implementation
     */
    public function getMethodPageRelativePath(string $planetName, string $className, string $methodName): string
    {
        return str_replace('\\', '/', $className) . "/$methodName." . $this->extension;
    }


}