<?php


namespace DocTools\Report;


/**
 * The AbstractReport class is an abstract implementation of the ReportInterface.
 *
 */
abstract class AbstractReport implements ReportInterface
{


    /**
     * This property holds the array of the inline function parsed during this session.
     * Each item of the array has the following structure:
     *
     * - 0: name of the inline function
     * - 1: array of arguments passed to the function
     * - 2: location (class name) where it was written
     *
     *
     * @var array
     */
    protected $parsedInlineFunctions;


    /**
     * This property holds the array of the @kw(block-level tags) parsed during this session.
     * Each item of the array has the following structure:
     *
     * - 0: name of the block-level tag
     * - 1: location (class name) where it was written
     *
     *
     * @var array
     */
    protected $parsedBlockLevelTags;


    /**
     * This property holds the array of unknown inline function items (found during the parsing session), each of which being the following array:
     *
     * - 0: name of the unknown inline function
     * - 1: location (class name) where it was written
     *
     *
     * @var array
     */
    protected $unknownInlineFunctions;


    /**
     * This property holds an array of undefined keyword items, along with the function name, each of which being the following array:
     *
     * - 0: name of the undefined keyword
     * - 0: name of the inline function called
     * - 1: location (class name) where it was found
     *
     * @var array
     */
    protected $undefinedInlineKeywords;

    /**
     * This property holds the array of class names not found items, each of which being the following array:
     *
     * - 0: name of the not found class
     * - 1: location (class name) where it was written
     *
     *
     * @var array
     */
    protected $undefinedInlineClasses;


    /**
     * This property holds the array of method and class names for methods which contains an
     * unresolved @implementation tag.
     *
     * - 0: name of the failing method
     * - 1: location (class name) where it was written
     *
     *
     * @var array
     */
    protected $unresolvedImplementationTags;


    /**
     * This property holds the array of method and class names for methods which contains an
     * unresolved @overrides tag.
     *
     * - 0: name of the failing method
     * - 1: location (class name) where it was written
     *
     *
     * @var array
     */
    protected $unresolvedOverridesTags;


    /**
     * This property holds the array of classes (class names) which
     * don't have a doc comment (or with an empty doc comment).
     *
     * @var array
     */
    protected $classesWithoutComment;

    /**
     * This property holds the array of methods without a doc comment (or with an empty doc comment).
     * Each item has the following structure:
     *
     * - 0: name of the method without comment
     * - 1: visibility of the method
     * - 2: location (class name) where it was written
     *
     *
     * @var array
     */
    protected $methodsWithoutComment;

    /**
     * This property holds the array of methods with a doc comment, but without a "@return" tag.
     * Each item has the following structure:
     *
     * - 0: name of the method without comment
     * - 1: location (class name) where it was written
     *
     *
     * @var array
     */
    protected $methodsWithoutReturnTag;


    /**
     * This property holds the array of parameters without a "@param" tag.
     * Each item has the following structure:
     *
     * - 0: name of the parameter
     * - 1: name of the method
     * - 2: location (class name) where it was written
     *
     *
     * @var array
     */
    protected $parametersWithoutParamTag;

    /**
     * This property holds the array of properties without a doc comment (or with an empty doc comment).
     * Each item has the following structure:
     *
     * - 0: name of the property without comment
     * - 1: location (class name) where it was written
     *
     *
     * @var array
     */
    protected $propertiesWithoutComment;


    /**
     * This property holds the array of properties without a "@var" tag specified.
     *
     * Each item has the following structure:
     *
     * - 0: name of the property without comment
     * - 1: location (class name) where it was written
     *
     *
     * @var array
     */
    protected $propertiesWithoutVarTag;

    /**
     * This property holds the array of unresolved class references.
     *
     * @var array
     * - 0: referenced class name
     * - 1: location (class name) where it was written
     *
     */
    protected $unresolvedClassReferences;

    /**
     * This property holds the array of unresolved method references.
     *
     * @var array
     * - 0: referenced class name
     * - 1: referenced method name
     *
     */
    protected $unresolvedMethodReferences;


    /**
     * This property holds an array of the classes with an empty main text.
     *
     * @var array
     * - 0: class name
     * - 1: context (generally class name) where it was written
     *
     */
    protected $classesWithEmptyMainText;


    /**
     *
     * This property holds an array of the properties with an empty main text.
     *
     * @var array
     * - 0: class name
     * - 1: property name
     * - 2: context (generally class name) where it was written
     *
     */
    protected $propertiesWithEmptyMainText;

    /**
     *
     * This property holds an array of the methods with an empty main text.
     *
     * @var array
     * - 0: class name
     * - 1: method name
     * - 2: context (generally class name) where it was written
     *
     */
    protected $methodsWithEmptyMainText;


    /**
     * This property holds the array of class names for which we don't want to report anything.
     * This might happen if your class inherits an external class on which you don't have control.
     *
     * Example: the DocTools\Translator\ParseDownTranslator of this planet extends the Parsedown class
     * from https://github.com/erusev/parsedown/blob/master/Parsedown.php.
     *
     *
     * @var array
     */
    protected $ignore;


    /**
     * The name of the current class being visited.
     *
     * @var null|string
     */
    protected $currentContext;


    /**
     * Builds the PlanetReport instance.
     */
    public function __construct()
    {
        $this->currentContext = null;
        $this->undefinedInlineClasses = [];
        $this->undefinedInlineKeywords = [];
        $this->unknownInlineFunctions = [];
        $this->parsedInlineFunctions = [];
        $this->unresolvedImplementationTags = [];
        $this->unresolvedOverridesTags = [];

        //
        $this->classesWithoutComment = [];
        $this->methodsWithoutComment = [];
        $this->methodsWithoutReturnTag = [];
        $this->propertiesWithoutComment = [];
        $this->propertiesWithoutVarTag = [];
        $this->parametersWithoutParamTag = [];


        //
        $this->unresolvedClassReferences = [];
        $this->unresolvedMethodReferences = [];

        //
        $this->classesWithEmptyMainText = [];
        $this->propertiesWithEmptyMainText = [];
        $this->methodsWithEmptyMainText = [];


        $this->ignore = [];

    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the current context.
     * The context is represented by a string.
     *
     * @param string $context
     */
    public function setCurrentContext(string $context)
    {
        $this->currentContext = $context;
    }

    /**
     * Sets the ignore array.
     *
     * @param array $ignore
     */
    public function setIgnore(array $ignore)
    {
        $this->ignore = $ignore;
    }


    /**
     * @implementation
     */
    public function addParsedInlineFunction(string $functionName, array $argsList = [])
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->parsedInlineFunctions[] = [
                $functionName,
                $argsList,
                $this->currentContext,
            ];
        }
    }


    /**
     * @implementation
     */
    public function addParsedBlockLevelTag(string $tagName)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->parsedBlockLevelTags[] = [
                $tagName,
                $this->currentContext,
            ];
        }
    }


    /**
     * @implementation
     */
    public function addUnknownInlineFunction(string $functionName)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->unknownInlineFunctions[] = [
                $functionName,
                $this->currentContext,
            ];
        }
    }

    /**
     * @implementation
     */
    public function addUndefinedInlineKeyword(string $keyword, string $functionName)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->undefinedInlineKeywords[] = [
                $keyword,
                $functionName,
                $this->currentContext,
            ];
        }
    }

    /**
     * @implementation
     */
    public function addUndefinedInlineClass(string $className)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->undefinedInlineClasses[] = [
                $className,
                $this->currentContext,
            ];
        }
    }


    /**
     * @implementation
     */
    public function addUnresolvedImplementationTag(string $methodName)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->unresolvedImplementationTags[] = [
                $methodName,
                $this->currentContext,
            ];
        }
    }

    /**
     * @implementation
     */
    public function addUnresolvedOverridesTag(string $methodName)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->unresolvedOverridesTags[] = [
                $methodName,
                $this->currentContext,
            ];
        }
    }


    /**
     * @implementation
     */
    public function addClassWithoutComment(string $className)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->classesWithoutComment[] = [
                $className,
            ];
        }
    }

    /**
     * @implementation
     */
    public function addMethodWithoutComment(string $methodName, string $visibility)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->methodsWithoutComment[] = [
                $methodName,
                $visibility,
                $this->currentContext,
            ];
        }
    }

    /**
     * @implementation
     */
    public function addMethodWithoutReturnTag(string $methodName)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->methodsWithoutReturnTag[] = [
                $methodName,
                $this->currentContext,
            ];
        }
    }


    /**
     * @implementation
     */
    public function addParameterWithoutParamTag(string $parameterName, string $methodName)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->parametersWithoutParamTag[] = [
                $parameterName,
                $methodName,
                $this->currentContext,
            ];
        }
    }

    /**
     * @implementation
     */
    public function addPropertyWithoutComment(string $propertyName, string $visibility)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->propertiesWithoutComment[] = [
                $propertyName,
                $visibility,
                $this->currentContext,
            ];
        }
    }

    /**
     * @implementation
     */
    public function addPropertyWithoutVarTag(string $propertyName)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->propertiesWithoutVarTag[] = [
                $propertyName,
                $this->currentContext,
            ];
        }
    }

    /**
     * @implementation
     */
    public function addUnresolvedClassReference(string $className, string $hint = null)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->unresolvedClassReferences[] = [
                $className,
                $this->currentContext,
                $hint,
            ];
        }
    }

    /**
     * @implementation
     */
    public function addUnresolvedMethodReference(string $className, string $methodName, string $hint = null)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->unresolvedMethodReferences[] = [
                $className,
                $methodName,
                $this->currentContext,
                $hint,
            ];
        }
    }


    /**
     * @implementation
     */
    public function addClassWithEmptyMainText(string $className)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->classesWithEmptyMainText[] = [
                $className,
                $this->currentContext,
            ];
        }
    }


    /**
     * @implementation
     */
    public function addPropertyWithEmptyMainText(string $className, string $propertyName)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->propertiesWithEmptyMainText[] = [
                $className,
                $propertyName,
                $this->currentContext,
            ];
        }
    }

    /**
     * @implementation
     */
    public function addMethodWithEmptyMainText(string $className, string $methodName)
    {
        if (false === in_array($this->currentContext, $this->ignore, true)) {
            $this->methodsWithEmptyMainText[] = [
                $className,
                $methodName,
                $this->currentContext,
            ];
        }
    }


}