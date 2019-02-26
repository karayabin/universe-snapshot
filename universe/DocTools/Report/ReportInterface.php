<?php


namespace DocTools\Report;


/**
 *
 * The ReportInterface interface is the interface for all reports.
 *
 * A report contains two kinds of data:
 * - documentation errors
 * - statistical data
 *
 * Documentation errors are the things you forgot to make a fully covered documentation.
 * For instance if you forgot to comment a class, this will appear as an error in the report.
 * The thing is: if the report show no error, you know for sure that your documentation is perfectly covered :)
 *
 *
 * Statistical data gives an overview of your documentation in terms of how many doc comment tags you've used,
 * what are the most popular tags used in your documentation, those kind of things...
 *
 *
 * ![A report screenshot](http://lingtalfi.com/img/universe/DocTools/doctools-report.png)
 *
 *
 *
 *
 *
 * The information potentially stored in the report is the following (i.e. you don't need to implement all in your concrete Report subclass).
 *
 *
 * Note: a context (like the class name for instance) is generally provided with all this information,
 * so that the reader can spot where the problem was found more quickly.
 * This context is set via the setCurrentContext method of this interface.
 *
 *
 *
 *
 * Missing comments
 * ----------------
 * - classes without comments: the names of the classes without a doc comment (or with an empty doc comment).
 * - methods without comments: the name and visibility of the methods without a doc comment (or with an empty doc comment).
 * - properties without comments: the name and visibility of the properties without a doc comment (or with an empty doc comment).
 *
 *
 * Missing tags
 * ---------------
 * - properties without @var: the names of the properties without a "@var" tag.
 * - parameters without @param: the names of the method parameters without a "@param" tag.
 *
 *
 * Empty main texts
 * ---------------
 * - classes without main text: the names of the classes with an empty @concept(main text) comment.
 * - properties without main text: the names of the properties with an empty @concept(main text) comment.
 * - methods without main text: the names of the methods with an empty @concept(main text) comment.
 *
 *
 * Linkage
 * -----------------
 * - unresolved class references: the class names not found in the @concept(generatedItems2Url) array or its derivatives.
 * - unresolved method references: the method names not found in the @concept(generatedItems2Url) array or its derivatives.
 *
 *
 * Inline functions
 * ---------------
 * - unresolved @keyword: calls to the keyword @kw(inline function) which didn't resolve, and what function was used.
 * - unresolved @class: calls to the class @kw(inline function) which didn't resolve.
 *          Note that this can create doublons with the "unresolved class references".
 * - unknown functions: the names of the unknown @kw(inline functions) used by the client.
 * - inline functions usage: this is a statistical data showing the inline functions used in your documentation, and how many times they have been used.
 * - inline functions usage details: this is the expanded version of the "inline function usage" data, showing the inline functions used along with the arguments
 *      they were called with.
 *
 *
 * Block-level tags
 * ------------------
 * - unresolved @implementation: the names of the methods using an unresolved @keyword("@implementation" tag) (no abstract
 *      parent or interface class with the same method name was found).
 *
 * - unresolved @overrides: the names of the methods using an unresolved @keyword("@overrides" tag) (no ancestor class with the same method name was found)
 * - block-level tags usage: this is a statistical data showing the block-level tags used in your documentation, and how many times they have been used.
 * - block-level tags usage details: this is the expanded version of the "block-level tags usage" data, showing the block-level tags used and where they were called.
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 * The report can be displayed as a string (via the __toString method).
 *
 *
 *
 *
 */
interface ReportInterface
{


    /**
     * Sets the name of the current context being parsed.
     * So that when we add an error to the report, the context information is already there.
     *
     * The context is generally a class name or a file name.
     *
     *
     *
     * @param string $context
     * @return void
     */
    public function setCurrentContext(string $context);


    /**
     * Adds the function name and the args of an @keyword(inline function).
     * This is use to collect statistical information about the planet.
     *
     *
     * @param string $functionName
     * @param array $argsList . Resolved args list.
     * @return void
     */
    public function addParsedInlineFunction(string $functionName, array $argsList = []);


    /**
     * Adds the @kw(block-level tag) to an internal collection.
     * This is use to provide statistical information about the parsed items.
     *
     *
     * @param string $tagName
     * @return void
     */
    public function addParsedBlockLevelTag(string $tagName);


    /**
     * Adds an unknown inline function.
     *
     * @param string $functionName
     * @return void
     */
    public function addUnknownInlineFunction(string $functionName);

    /**
     * Adds an undefined keyword (defined with the @keyword(keyword inline function) or alike).
     *
     * @param string $keyword
     * The keyword which couldn't resolve.
     *
     * @param string $functionName
     * The name of the function used to call the keyword.
     *
     * @return void
     */
    public function addUndefinedInlineKeyword(string $keyword, string $functionName);


    /**
     * Adds an undefined class (defined with the @keyword(class inline function)).
     *
     * @param string $className
     * @return void
     */
    public function addUndefinedInlineClass(string $className);


    /**
     * Adds the name of the method (and class) which doc comment contains
     * an unresolved @implementation tag.
     *
     * @param string $methodName
     * @return void
     */
    public function addUnresolvedImplementationTag(string $methodName);


    /**
     * Adds the name of the method (and class) which doc comment contains
     * an unresolved @overrides tag.
     *
     * See @kw(docTool markup language page) for more info.
     *
     * @param string $methodName
     * @return void
     */
    public function addUnresolvedOverridesTag(string $methodName);


    /**
     * Adds the name of a class which doesn't have a non-empty doc comment.
     *
     * @param string $className
     * @return void
     */
    public function addClassWithoutComment(string $className);


    /**
     * Adds the name and the visibility of a method which doesn't have a non-empty doc comment.
     *
     *
     * @param string $methodName
     * @param string $visibility
     * @return void
     */
    public function addMethodWithoutComment(string $methodName, string $visibility);

    /**
     * Adds the name of a method which doesn't have a "@return" tag.
     *
     *
     * @param string $methodName
     * @return void
     */
    public function addMethodWithoutReturnTag(string $methodName);


    /**
     * Adds the name and the visibility of a property which doesn't have a non-empty doc comment.
     *
     *
     * @param string $propertyName
     * @param string $visibility
     * @return void
     */
    public function addPropertyWithoutComment(string $propertyName, string $visibility);


    /**
     * Adds the name of a property which doesn't have a "@var" tag specified.
     *
     *
     * @param string $propertyName
     * @return void
     */
    public function addPropertyWithoutVarTag(string $propertyName);


    /**
     * Adds the name of a property (and method) which doesn't have a "@param" tag specified.
     *
     *
     * @param string $parameterName
     * @param string $methodName
     * @return void
     */
    public function addParameterWithoutParamTag(string $parameterName, string $methodName);


    /**
     * Adds an unresolved class reference.
     *
     *
     * @param string $className
     * @param string $hint
     *      A hint to help locate the unresolved class reference.
     *
     * @return void
     */
    public function addUnresolvedClassReference(string $className, string $hint = null);

    /**
     * Adds an unresolved method reference.
     *
     *
     * @param string $className
     * @param string $methodName
     * @param string $hint
     *      A hint to help locate the unresolved method reference.
     *
     * @return void
     */
    public function addUnresolvedMethodReference(string $className, string $methodName, string $hint = null);


    /**
     * Adds a class with an empty @kw(main text).
     *
     * @param string $className . The name of the culprit class.
     * @return void
     */
    public function addClassWithEmptyMainText(string $className);

    /**
     * Adds a property with an empty @kw(main text).
     *
     * @param string $className . The name of the culprit class.
     * @param string $propertyName
     * @return void
     */
    public function addPropertyWithEmptyMainText(string $className, string $propertyName);

    /**
     * Adds a method with an empty @kw(main text).
     *
     * @param string $className . The name of the culprit class.
     * @param string $methodName
     * @return void
     */
    public function addMethodWithEmptyMainText(string $className, string $methodName);


    /**
     * Builds and returns the rendered report as a string.
     * @return string
     */
    public function __toString();
}