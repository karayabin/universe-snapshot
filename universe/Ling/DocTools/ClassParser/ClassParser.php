<?php


namespace Ling\DocTools\ClassParser;


use Ling\Bat\ClassTool;
use Ling\Bat\DebugTool;
use Ling\DocTools\Exception\ClassParserException;
use Ling\DocTools\Helper\ClassNameHelper;
use Ling\DocTools\Helper\CommentHelper;
use Ling\DocTools\Helper\TagHelper;
use Ling\DocTools\Info\ClassInfo;
use Ling\DocTools\Info\CommentInfo;
use Ling\DocTools\Info\InfoInterface;
use Ling\DocTools\Info\MethodInfo;
use Ling\DocTools\Info\ParameterInfo;
use Ling\DocTools\Info\PropertyInfo;
use Ling\DocTools\Info\ThrownExceptionInfo;
use Ling\DocTools\Interpreter\NotationInterpreterInterface;
use Ling\DocTools\Report\ReportInterface;
use Ling\TokenFun\TokenFinder\Tool\TokenFinderTool;


/**
 * The ClassParser class is a generic implementation of the ClassParserInterface.
 *
 * Quick example:
 * ```php
 * $baseUrl = "http://mysite/doc/api";
 * $report = new HtmlReport();
 * $parser = new ClassParser();
 * $interpreter = new DocToolInterpreter();
 * $interpreter->setAvailableClassNames(["DocTools\Widget\ClassSynopsis\ClassSynopsisWidget"]);
 * $interpreter->setGeneratedClassBaseUrl($baseUrl);
 * $parser->setGeneratedClassBaseUrl($baseUrl);
 * $parser->setReport($report);
 * $parser->setDocToolInterpreter($interpreter);
 * $classInfo = $parser->parse("DocTools\Widget\ClassSynopsis\ClassSynopsisWidget");
 * az($classInfo);
 * ```
 *
 */
class ClassParser implements ClassParserInterface
{

    /**
     * This property holds the parser report for this instance.
     * The report will only be available after the parse method has been called.
     *
     *
     * @var ReportInterface
     */
    protected $report;

    /**
     * This property holds whether @keyword(inline tags) should be resolved.
     * The default value is true.
     *
     * @var bool
     */
    protected $resolveInlineTags;


    /**
     * This property holds the docTool markup language interpreter for this instance.
     *
     * @var NotationInterpreterInterface
     */
    protected $notationInterpreter;


    /**
     * This property holds the array of className and/or className::methodName => url.
     * @var array
     */
    protected $generatedItems2Url;


    /**
     * This property holds the \Reflection instance of the class currently being parsed.
     * It's an internal property, as denoted with the underscore prefix.
     *
     * @var \ReflectionClass
     */
    protected $_reflectionClass;

    /**
     * This property holds the name of the method currently being parsed.
     *
     * It's an internal property, as denoted with the underscore prefix.
     *
     * @var string
     */
    protected $_method;


    /**
     * This property holds the array of use statements found in the class file..
     *
     * It's an internal property, as denoted with the underscore prefix.
     *
     * @var array
     */
    protected $_useStatements;


    /**
     * Builds the ClassParser instance.
     */
    public function __construct()
    {
        $this->report = null;
        $this->resolveInlineTags = true;
        $this->notationInterpreter = null;
        $this->_useStatements = null;
        $this->generatedItems2Url = [];
    }


    /**
     * @implementation
     */
    public function parse(string $className): InfoInterface
    {

        if (null === $this->notationInterpreter) {
            throw new ClassParserException("docTool interpreter instance not found. Use the setDocToolInterpreter method.");
        }

        if (null !== $this->report) {
            $this->report->setCurrentContext($className);
        }


        $this->_useStatements = null;

        //--------------------------------------------
        // CLASS
        //--------------------------------------------
        $class = new \ReflectionClass($className);
        $this->_reflectionClass = $class;


        $oClass = new ClassInfo();
        $oClass->setReflectionClass($class);
        $oClass->setInterfaces($class->getInterfaceNames());


        //--------------------------------------------
        // ID
        //--------------------------------------------
        $oClass->setName($className);
        $oClass->setShortName($class->getShortName());
        $oClass->setSignature($this->getClassSignature($class));


        //--------------------------------------------
        // COMMENT
        //--------------------------------------------
        $docComment = $class->getDocComment();
        $comment = $this->parseDocComment($docComment, 'class', $className);

        if ($comment->isEmpty()) {
            if (null !== $this->report) {
                $this->report->addClassWithoutComment($className);
            }
        } elseif ($comment->hasEmptyMainText()) {
            if (null !== $this->report) {
                if (true === $class->isUserDefined()) {
                    $this->report->addClassWithEmptyMainText($class->getName());
                }
            }
        }

        $oClass->setComment($comment);


        //--------------------------------------------
        // PROPERTIES
        //--------------------------------------------
        $properties = $class->getProperties();
        foreach ($properties as $property) {
            $name = $property->getName();
            $propertyVisibility = $this->getPropertyVisibility($property);

            $docComment = $property->getDocComment();
            $comment = $this->parseDocComment($docComment, 'property', $className . ".$name");

            if ($comment->isEmpty()) {
                if (null !== $this->report) {

                    /**
                     * We don't want to report php classes (i.e. Exception, ...)
                     */
                    if (true === $property->getDeclaringClass()->isUserDefined()) {
                        $this->report->addPropertyWithoutComment($name, $propertyVisibility);
                    }
                }
            } elseif ($comment->hasEmptyMainText()) {
                if (null !== $this->report) {
                    if (true === $property->getDeclaringClass()->isUserDefined()) {
                        $this->report->addPropertyWithEmptyMainText($class->getName(), $property->getName());
                    }
                }
            }


            $propertyType = null;
            $varContent = $comment->getTagByName("var");
            if (null !== $varContent) {
                $propertyType = $varContent;
                if (preg_match('!([^$=\.\r\n\(]*)!', $propertyType, $match)) {
                    $propertyType = $match[1];
                }
                $types = explode('|', $propertyType);

                array_walk($types, function (&$v) use ($class, $property) {

                    $propertyClass = $property->getDeclaringClass();

                    $v = trim($v);

                    // if it's a class, we want to use the full class name.
                    if (false === in_array($v, CommentHelper::$propertyVarTagTypes, true)) {
                        if (0 === strpos($v, '\\')) {
                            // this is already a fully qualified namespace, we leave it as is
                        } else {

                            $isClassArray = false;
                            if ('[]' === substr($v, -2)) {// to parse MethodInfo[] as MethodInfo for instance.
                                $isClassArray = true;
                            }
                            $epuratedType = rtrim($v, '[]');


                            /**
                             * This is a user defined class, using an unqualified class name (aka class short name),
                             * we need to lookup the use statements to get the (fully qualified) class name.
                             */
                            $tokens = token_get_all(file_get_contents($propertyClass->getFileName()));
                            $useStatements = TokenFinderTool::getUseDependencies($tokens);


                            $useStatementHasMatched = false;
                            foreach ($useStatements as $statement) {
                                $p = explode('\\', $statement);
                                $unqualifiedName = array_pop($p);
                                if ($epuratedType === $unqualifiedName) {
                                    $useStatementHasMatched = true;
                                    $v = $statement;
                                    if (true === $isClassArray) {
                                        $v .= '[]';
                                    }
                                    break;
                                }
                            }

                            /**
                             * But sometimes, the unqualified name is not in the use statements, because
                             * the called class is in the same namespace, so if no use statements match,
                             * we then try the namespace.
                             */
                            if (false === $useStatementHasMatched) {
                                $namespace = $propertyClass->getNamespaceName();
                                $epuratedClassName = $namespace . "\\" . $epuratedType;
                                $v = $epuratedClassName;
                                if (true === $isClassArray) {
                                    $v .= '[]';
                                }
                            }
                        }
                    }
                });
                $propertyType = implode("|", $types);

            } else {
                if (null !== $this->report) {
                    /**
                     * We don't want to report php classes (i.e. Exception, ...)
                     */
                    if (true === $property->getDeclaringClass()->isUserDefined()) {
                        $this->report->addPropertyWithoutVarTag($name);
                    }
                }
            }


            $signature = $this->getPropertySignature($property);

            $oProp = new PropertyInfo();
            $oProp->setType($propertyType);
            $oProp->setReflectionProperty($property);
            $oProp->setComment($comment);
            $oProp->setName($name);
            $oProp->setSignature($signature);
            $oProp->setVisibility($propertyVisibility);
            $oClass->addProperty($oProp);
        }


        //--------------------------------------------
        // METHODS
        //--------------------------------------------
        $methods = $class->getMethods();
        foreach ($methods as $method) {

            if (false === $method->isUserDefined()) {
                continue;
            }

            $name = $method->getName();
            $this->_method = $name;
            $methodVisibility = $this->getMethodVisibility($method);


            $docComment = $method->getDocComment();
            $comment = $this->parseDocComment($docComment, "method", $className . "::$name");


            $thrownExceptions = [];


            if ($comment->isEmpty()) {
                if (null !== $this->report) {
                    $this->report->addMethodWithoutComment($name, $methodVisibility);
                }
            } else {
                if (false === $comment->hasTag("return")) {
                    if (null !== $this->report) {
                        $this->report->addMethodWithoutReturnTag($name);
                    }
                }

                if ($comment->hasEmptyMainText()) {
                    if (null !== $this->report) {
                        if (true === $method->getDeclaringClass()->isUserDefined()) {
                            $this->report->addMethodWithEmptyMainText($class->getName(), $method->getName());
                        }
                    }
                }


                if ($comment->hasTag("throws")) {


                    $tags = $comment->getTagsByName("throws");
                    foreach ($tags as $tag) {

                        list($tagDef, $tagCom) = TagHelper::getTagInfo($tag);


                        $useStatementFound = null;
                        $classInfo = ClassNameHelper::getClassNameInfo($tagDef, $method->getDeclaringClass(), $this->generatedItems2Url, $comment->getIncludeReferences(), $useStatementFound);

                        if (false !== $classInfo) {
                            $oException = new ThrownExceptionInfo();
                            $oException->setText($tagCom);
                            $oException->setShortName($classInfo[0]);
                            $oException->setLongName($classInfo[1]);
                            $oException->setUrl($classInfo[2]);
                            $thrownExceptions[] = $oException;


                        } else {
                            if (null !== $this->report) {
                                $theClassName = (null !== $useStatementFound) ? $useStatementFound : "$tagDef";
                                $this->report->addUnresolvedClassReference($theClassName, "@throws $tagDef, method " . $method->getName() . ' (hint from ClassParser)');
                            }
                        }
                    }


                }


            }


            $signature = $this->getMethodSignature($method);


            $returnType = "void";
            $returnDescription = "";
            $tagContent = $comment->getTagByName("return");


            if (null !== $tagContent) {

                $returnDescription = $this->getTagDescriptionByContent($tagContent);

                $_tagContent = explode(PHP_EOL, $tagContent, 2)[0]; // just the first line
                $types = explode('|', explode(".", $_tagContent, 2)[0]);

                array_walk($types, function (&$v) use ($class, $method) {
                    $v = trim($v);

                    // if it's a class, we want to use the full class name.
                    if (false === in_array($v, CommentHelper::$propertyReturnTagTypes, true)) {
                        if (0 === strpos($v, '\\')) {
                            // this is already a fully qualified namespace, we leave it as is
                        } else {

                            $methodClass = $method->getDeclaringClass();

                            if ('$this' === $v) {
                                $v = $methodClass->getName();
                            } else {


                                $isClassArray = false;
                                if ('[]' === substr($v, -2)) {// to parse MethodInfo[] as MethodInfo for instance.
                                    $isClassArray = true;
                                }
                                $epuratedType = rtrim($v, '[]');


                                /**
                                 * This is a user defined class, using an unqualified class name (aka class short name),
                                 * we need to lookup the use statements to get the (fully qualified) class name.
                                 */
                                $tokens = token_get_all(file_get_contents($methodClass->getFileName()));
                                $this->_useStatements = TokenFinderTool::getUseDependencies($tokens);


                                $useStatementHasMatched = false;
                                foreach ($this->_useStatements as $statement) {
                                    $p = explode('\\', $statement);
                                    $unqualifiedName = array_pop($p);
                                    if ($epuratedType === $unqualifiedName) {
                                        $useStatementHasMatched = true;
                                        $v = $statement;
                                        if (true === $isClassArray) {
                                            $v .= '[]';
                                        }
                                        break;
                                    }
                                }

                                /**
                                 * But sometimes, the unqualified name is not in the use statements, because
                                 * the called class is in the same namespace, so if no use statements match,
                                 * we then try the namespace.
                                 */
                                if (false === $useStatementHasMatched) {
                                    $namespace = $methodClass->getNamespaceName();
                                    $epuratedClassName = $namespace . "\\" . $epuratedType;
                                    $v = $epuratedClassName;
                                    if (true === $isClassArray) {
                                        $v .= '[]';
                                    }
                                }
                            }


                        }
                    }
                });
                $returnType = implode("|", $types);
            }


            $oMethod = new MethodInfo();
            $oMethod->setComment($comment);
            $oMethod->setReflectionMethod($method);
            $oMethod->setName($name);
            $oMethod->setReturnType($returnType);
            $oMethod->setReturnDescription($returnDescription);
            $oMethod->setSignature($signature);
            $oMethod->setVisibility($methodVisibility);
            $oMethod->setThrownExceptions($thrownExceptions);
            $oClass->addMethod($oMethod);


            //--------------------------------------------
            // PARAMETERS
            //--------------------------------------------
            $paramTags = [];
            $pts = $comment->getTagsByName("param");
            foreach ($pts as $param) {
                if (preg_match('! 
 
(?:
    (?P<type>[a-zA-Z0-9_\|\s]+)
    \s+
)?


\s*\$(?P<name>[a-zA-Z0-9_]+)

(?:
    \s*=\s*
    (?P<defaultValue>[^.\(]+)


    (?:
        \s*\(\s*
        (?P<alternatives>[^\)]+)
        \s*\)
    )?
)?

(?:\s*\.(?P<descriptiveText1>.*))?

(?s:\R(?P<descriptiveText2>.*))?





!x', $param, $match)) {


                    $type = (empty($match['type'])) ? null : trim($match['type']);


                    $defaultValue = (array_key_exists("defaultValue", $match)) ? trim($match['defaultValue']) : null;
                    if ("" === $defaultValue) {
                        $defaultValue = null;
                    }

                    $alternatives = (array_key_exists("alternatives", $match)) ? trim($match['alternatives']) : null;
                    if ("" === $alternatives) {
                        $alternatives = null;
                    }

                    $descriptiveText1 = (array_key_exists("descriptiveText1", $match)) ? trim($match['descriptiveText1']) : null;
                    if ("" === $descriptiveText1) {
                        $descriptiveText1 = null;
                    }

                    $descriptiveText2 = (array_key_exists("descriptiveText2", $match)) ? trim($match['descriptiveText2']) : null;
                    if ("" === $descriptiveText2) {
                        $descriptiveText2 = null;
                    }

                    $descriptiveText = $descriptiveText1;
                    if ($descriptiveText2) {
                        if ($descriptiveText) {
                            $descriptiveText .= PHP_EOL;
                        }
                        $descriptiveText .= $descriptiveText2;
                    }


                    $paramTags[$match['name']] = [
                        "type" => $type,
                        "defaultValue" => $defaultValue,
                        "alternatives" => $alternatives,
                        "descriptiveText" => $descriptiveText,
                    ];
                }
            }


            /**
             * We generally favor the user doc over the php real object properties.
             * So if the user defines a type, we trust her (even if she is wrong).
             * Php investigation (via reflection) is only used as a fallback in case the doc doesn't
             * provide enough information.
             *
             */
            foreach ($method->getParameters() as $param) {
                $paramName = $param->getName();
                if (array_key_exists($paramName, $paramTags)) {
                    $paramTag = $paramTags[$paramName];

                    $paramType = $paramTag['type'];
                    if (null === $paramType) {
                        $paramType = ($param->hasType()) ? $param->getType() : null;
                    }

                    $defaultValue = $paramTag['defaultValue'];
                    if (null === $defaultValue) {
                        if ($param->isOptional()) {
                            $defaultValue = $param->getDefaultValue();
                            if (is_array($defaultValue)) {
                                $defaultValue = DebugTool::toString($defaultValue);
                            }
                        }
                    }


                    $oParameter = new ParameterInfo();
                    $oParameter->setName($paramName);
                    $oParameter->setType($paramType);
                    $oParameter->setDefaultValue($defaultValue);
                    $oParameter->setValueAlternatives($paramTag['alternatives']);
                    $oParameter->setDescriptiveText($paramTag['descriptiveText']);
                    $oMethod->addParameter($oParameter);


                } else {
                    if (null !== $this->report) {
                        $this->report->addParameterWithoutParamTag($paramName, $method->getName());
                    }
                }

            }
        }
        return $oClass;
    }


    /**
     * Sets the resolveInlineTags.
     *
     * @param bool $resolveInlineTags
     */
    public function setResolveInlineTags(bool $resolveInlineTags)
    {
        $this->resolveInlineTags = $resolveInlineTags;
    }

    /**
     * Returns the report of this instance.
     *
     * @return ReportInterface
     */
    public function getReport(): ReportInterface
    {
        return $this->report;
    }

    /**
     * Sets the report.
     * @param ReportInterface $report
     */
    public function setReport(ReportInterface $report)
    {
        $this->report = $report;
    }


    /**
     * Sets the notationInterpreter.
     * @param NotationInterpreterInterface $notationInterpreter
     */
    public function setNotationlInterpreter(NotationInterpreterInterface $notationInterpreter)
    {
        $this->notationInterpreter = $notationInterpreter;
    }

    /**
     * Sets the generatedItems2Url.
     *
     * @param array $generatedItems2Url
     */
    public function setGeneratedItemsToUrl(array $generatedItems2Url)
    {
        $this->generatedItems2Url = $generatedItems2Url;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     *
     * Parses the raw doc comment and returns a DocTools\Info\CommentInfo object.
     *
     * The doc comment is parsed line after line, from top to bottom.
     *
     * By default, the text of the comment is considered as part of
     * the "main comment".
     *
     * When a tag is found however, it disrupts the flow and any subsequent content
     * is considered as part of this tag.
     * Until the next tag, and so on...
     *
     *
     *
     *
     *
     * @param string $rawComment
     * @param string $elementType
     * The type of the element the comment is written for, can be one of:
     * - class
     * - property (class property)
     * - method
     *
     * @param string $elementId
     * An element identifier
     *
     * @return CommentInfo
     */
    protected function parseDocComment(string $rawComment, string $elementType, string $elementId)
    {

        $includeReferences = [];
        if ("method" === $elementType) {
            /**
             * First expand @implementation and @overrides tags recursively
             */
            $resolved = false;
            $rawComment = $this->expandIncludes($rawComment, $resolved, $includeReferences);
        }


        //--------------------------------------------
        // TODOS...
        //--------------------------------------------
        if (preg_match('!todo:(.*)!i', $rawComment, $match)) {
            $todoText = trim($match[1]);
            if (null !== $this->report) {
                $this->report->addTodoText($todoText, $elementType . ": $elementId");
            }
        }


        $lines = explode(PHP_EOL, substr($rawComment, 3, -2));


        $tagName = null;
        $tagLines = [];
        $tags = [];
        $mainLines = [];
        $rawLines = [];
        $isMainText = true;
        $newTag = false;

        foreach ($lines as $line) {

            $line = ltrim($line, '* ');
            $rawLines[] = $line;


            if (preg_match('!^@([^\s]*)!', $line, $match)) {


                /**
                 * Registering captured tag
                 */
                if (count($tagLines) > 0) {
                    $trimmed = $this->trimLines($tagLines);
                    if (false === array_key_exists($tagName, $tags)) {
                        $tags[$tagName] = [];
                    }
                    $tags[$tagName][] = implode(PHP_EOL, $trimmed);
                }
                $tagLines = [];


                /**
                 * Once the tag section starts, the main text ends,
                 * and every line will belong to a tag ($tagName), which might be overridden by another tag and so forth...
                 * (i.e. there is no coming back to the main text).
                 *
                 */
                $isMainText = false;
                $newTag = true;
                $tagName = $match[1];


            }


            if ($tagName) {
                if (true === $newTag) {
                    // drop the tag name if it's the first line
                    $line = trim(substr($line, strlen($tagName) + 1));
                    $newTag = false;
                    if (null !== $this->report) {
                        $this->report->addParsedBlockLevelTag($tagName);
                    }
                }
                $tagLines[] = $line;
            }


            if (true === $isMainText) {
                $mainLines[] = $line;
            }

        }


        /**
         * Registering pending captured tag
         */
        if (count($tagLines) > 0) {
            $trimmed = $this->trimLines($tagLines);
            if (false === array_key_exists($tagName, $tags)) {
                $tags[$tagName] = [];
            }
            $tags[$tagName][] = implode(PHP_EOL, $trimmed);
        }


        $rawLines = $this->trimLines($rawLines);
        $rawText = implode(PHP_EOL, $rawLines);

        $mainLines = $this->trimLines($mainLines);
        $mainText = implode(PHP_EOL, $mainLines);

        if (true === $this->resolveInlineTags) {
            $mainText = $this->notationInterpreter->resolveInlineTags($mainText, $this->report);
        }


        if ($mainText) {
            $firstLine = explode(PHP_EOL, $mainText)[0];
        } else {
            $firstLine = "";
        }


        $firstSentence = "";
        if (preg_match('!(.*?)\.(?:\s|\Z)!m', $mainText, $match)) {
            $firstSentence = $match[1] . ".";
        }


        $comment = new CommentInfo();
        $comment
            ->setFirstLine($firstLine)
            ->setFirstSentence($firstSentence)
            ->setRawText($rawText)
            ->setMainText($mainText)
            ->setIncludeReferences($includeReferences)
            ->setTags($tags);


        //--------------------------------------------
        // INTERPRETING BLOCK LEVEL TAGS IF ANY
        //--------------------------------------------
        $this->notationInterpreter->interpretBlockLevelTags($tags, $comment, [
            "declaringClass" => $this->_reflectionClass->getName(),
        ], $this->report);


        return $comment;
    }


    /**
     * Returns the property signature, without the ending punctuation symbol.
     *
     * @param \ReflectionProperty $property
     * @return string
     */
    protected function getPropertySignature(\ReflectionProperty $property)
    {
        $s = '';
        if ($property->isPublic()) {
            $s .= 'public ';
        } elseif ($property->isProtected()) {
            $s .= 'protected ';
        } elseif ($property->isPrivate()) {
            $s .= 'private ';
        }
        if ($property->isStatic()) {
            $s .= 'static ';
        }
        $s .= '$' . $property->getName();
        return $s;
    }

    /**
     * Returns the method signature.
     *
     * @param \ReflectionMethod $method
     * @return string
     */
    protected function getMethodSignature(\ReflectionMethod $method)
    {

        return ClassTool::getMethodSignature($method);
    }


    /**
     * Returns the class signature.
     *
     * @param \ReflectionClass $class
     * @return string
     */
    protected function getClassSignature(\ReflectionClass $class)
    {
        return ClassTool::getClassSignature($class);
    }


    /**
     * Returns the visibility of the method.
     *
     * Possible return values are: public, protected, or private.
     *
     * @param \ReflectionMethod $method
     * @return string
     */
    protected function getMethodVisibility(\ReflectionMethod $method)
    {
        if ($method->isPrivate()) {
            return "private";
        }
        if ($method->isProtected()) {
            return "protected";
        }
        return 'public';
    }


    /**
     * Returns the visibility of the property.
     *
     * Possible return values are: public, protected, or private.
     *
     * @param \ReflectionProperty $property
     * @return string
     */
    protected function getPropertyVisibility(\ReflectionProperty $property)
    {
        if ($property->isPrivate()) {
            return "private";
        }
        if ($property->isProtected()) {
            return "protected";
        }
        return 'public';
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Takes an array of lines, and chops off the empty lines
     * from the very beginning or from the very end of that array.
     *
     * @param array $lines
     * @return array
     */
    private function trimLines(array $lines)
    {
        $c = 1;
        while (true) {
            $c++;
            if ($c > 20) {
                break;
            }
            if ($lines) {
                $lines = array_merge($lines);

                if ("" === trim($lines[0])) {
                    unset($lines[0]);
                }

                $lines = array_merge($lines);
                $n = count($lines);
                if ($n && "" === trim($lines[$n - 1])) {
                    unset($lines[$n - 1]);
                }


            } else {
                break;
            }
        }
        return $lines;
    }


    /**
     * Expands the @implementation and/or @overrides tags in the raw content recursively, and returns the result.
     *
     * Expanding means replacing the @implementation/@overrides stand-alone tags with their related ancestor recursively (i.e. the ancestor
     * could also use the @implementation/@overrides tag and so forth...).
     *
     * See the @kw(docTool markup language) page for more details.
     *
     *
     * @param string $rawContent
     *
     * @param bool $resolved
     * Whether the "@implementation tag" or "@overrides tag" has been expanded at least once.
     *
     * @param array $includeReferences
     * An array of the class names participating to the "@override/@implementation" tags resolution chain.
     *
     * @return string
     */
    private function expandIncludes(string $rawContent, &$resolved = false, array &$includeReferences = [])
    {
        //--------------------------------------------
        // IMPLEMENTATION
        //--------------------------------------------
        return preg_replace_callback('!^\s*\*\s*@(implementation|overrides)\s*$!m', function ($match) use (&$resolved, &$includeReferences) {

            $word = $match[1];

            //--------------------------------------------
            // @IMPLEMENTATION
            //--------------------------------------------
            if ('implementation' === $word) {

                $parentMainText = null;
                $class = $this->_reflectionClass;
                $method = $this->_method;


                /**
                 * First try interfaces
                 */
                $interfaces = $class->getInterfaces();
                foreach ($interfaces as $interface) {
                    if ($interface->hasMethod($method)) {
                        $parentMethod = $interface->getMethod($method);
                        $parentDocComment = $parentMethod->getDocComment();
                        $parentDocComment = substr($parentDocComment, 3, -2);
                        $resolved = true;
                        $includeReferences[] = $interface->getName();
                        return $this->expandIncludes($parentDocComment, $resolved, $includeReferences);
                        break;
                    }
                }
                /**
                 * Then try abstract classes
                 */
                if (false === $resolved) {
                    $abstractParents = ClassTool::getAbstractAncestors($class);
                    foreach ($abstractParents as $abstractParent) {
                        if ($abstractParent->hasMethod($method)) {
                            $parentMethod = $abstractParent->getMethod($method);
                            $parentDocComment = $parentMethod->getDocComment();
                            $parentDocComment = substr($parentDocComment, 3, -2);
                            $resolved = true;
                            $includeReferences[] = $abstractParent->getName();
                            return $this->expandIncludes($parentDocComment, $resolved, $includeReferences);
                            break;
                        }
                    }
                }


                if (false === $resolved) {
                    if (null !== $this->report) {
                        $this->report->addUnresolvedImplementationTag($method);
                    }
                }

            }
            //--------------------------------------------
            // @OVERRIDES
            //--------------------------------------------
            else {
                $parentMainText = null;
                $class = $this->_reflectionClass;
                $method = $this->_method;

                /**
                 * Then try abstract classes
                 */
                if (false === $resolved) {


                    $parent = $class->getParentClass();
                    if ($parent instanceof \ReflectionClass) {
                        if ($parent->hasMethod($method)) {
                            $parentMethod = $parent->getMethod($method);
                            $parentDocComment = $parentMethod->getDocComment();
                            $parentDocComment = substr($parentDocComment, 3, -2);
                            $resolved = true;
                            $includeReferences[] = $parent->getName();
                            return $this->expandIncludes($parentDocComment, $resolved, $includeReferences);
                        }
                    }
                }


                if (false === $resolved) {
                    if (null !== $this->report) {
                        $this->report->addUnresolvedOverridesTag($method);
                    }
                }

            }


        }, $rawContent);
    }


    /**
     * Returns the tag description from the given $content.
     * In this method, the tag description is composed of two elements:
     *
     * - the descriptive text
     * - the tag tail
     *
     * The descriptive text: the text located on the first line, starting after the first dot encountered on that line.
     * The idea being that a dot on the first line indicates the ending of a tag specific notation and the beginning
     * of a human short description.
     *
     *
     * The tag tail is any line of the tag except for the first line (which is reserved for tag specific notation).
     *
     *
     *
     * @param string $content
     * @return string
     */
    private function getTagDescriptionByContent(string $content)
    {
        $s = "";
        $lines = explode(PHP_EOL, $content);
        $firstLine = array_shift($lines);
        $tail = implode(PHP_EOL, $lines);
        $descriptiveText = "";
        $p = explode('.', $firstLine, 2);
        if (2 === count($p)) {
            $s .= $p[1];
        }

        if ($tail) {
            if ($descriptiveText) {
                $s .= PHP_EOL;
            }
            $s .= $tail;
        }
        return trim($s);
    }
}