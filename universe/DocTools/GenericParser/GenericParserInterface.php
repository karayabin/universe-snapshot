<?php


namespace DocTools\GenericParser;


use DocTools\Info\InfoInterface;

/**
 * The GenericParserInterface interface is a generic interface for parsers.
 * It's implemented by the @class(DocTools\ClassParser\ClassParser) class and the @class(DocTools\PlanetParser\PlanetParser) class.
 *
 */
interface GenericParserInterface
{


    /**
     * Parses the given $element and returns a @class(DocTools\Info\InfoInterface) object.
     *
     * @param string $element . The element to parse.
     * @return InfoInterface. The info interface.
     */
    public function parse(string $element): InfoInterface;
}