<?php


namespace DocTools\ClassParser;


use DocTools\Exception\ClassParserException;
use DocTools\GenericParser\GenericParserInterface;
use DocTools\Info\InfoInterface;
use DocTools\Report\ReportInterface;

/**
 * The ClassParserInterface interface represents a class parser.
 *
 * A class parser will parse a class and return a @page(ClassInfo) object, which gives us info
 * about the class, such as its name,  its comment, its properties, its methods, ...
 *
 *
 * A class parser will by default interpret the @doc(docTool markup language).
 *
 * A class parser speaks markdown language only.
 * Html conversion is done by the client at a later step if necessary.
 *
 *
 */
interface ClassParserInterface extends GenericParserInterface
{

    /**
     * Returns a ClassInfo object from the given $className.
     * Note that this method overrides a method of the same name
     * defined in the parent interface: DocTools\GenericParser\GenericParserInterface.
     *
     *
     *
     * @seeClass DocTools\Info\ClassInfo
     * @param string $className
     * @return InfoInterface
     * @throws ClassParserException
     */
    public function parse(string $className): InfoInterface;


    /**
     * Returns the parser report.
     * The parser report is only available after the parse method has been called.
     *
     * @seeMethod parse
     * @seeClass DocTools\Report\ReportInterface
     *
     * @return ReportInterface
     */
    public function getReport();
}