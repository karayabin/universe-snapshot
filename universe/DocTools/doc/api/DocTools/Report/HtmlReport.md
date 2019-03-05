[Back to the DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md)



The HtmlReport class
================
2019-02-21 --> 2019-03-05






Introduction
============

The HtmlReport class is an html implementation of the ReportInterface.
It produces an html string which looks like this:

![report](http://lingtalfi.com/img/universe/DocTools/doctools-report.png)



Class synopsis
==============


class <span class="pl-k">HtmlReport</span> extends [AbstractReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport.md) implements [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) {

- Properties
    - protected string [$template](#property-template) ;
    - protected array [$options](#property-options) ;

- Inherited properties
    - protected array [AbstractReport::$parsedInlineFunctions](#property-parsedInlineFunctions) ;
    - protected array [AbstractReport::$parsedBlockLevelTags](#property-parsedBlockLevelTags) ;
    - protected array [AbstractReport::$unknownInlineFunctions](#property-unknownInlineFunctions) ;
    - protected array [AbstractReport::$undefinedInlineKeywords](#property-undefinedInlineKeywords) ;
    - protected array [AbstractReport::$undefinedInlineClasses](#property-undefinedInlineClasses) ;
    - protected array [AbstractReport::$unresolvedImplementationTags](#property-unresolvedImplementationTags) ;
    - protected array [AbstractReport::$unresolvedOverridesTags](#property-unresolvedOverridesTags) ;
    - protected array [AbstractReport::$classesWithoutComment](#property-classesWithoutComment) ;
    - protected array [AbstractReport::$methodsWithoutComment](#property-methodsWithoutComment) ;
    - protected array [AbstractReport::$methodsWithoutReturnTag](#property-methodsWithoutReturnTag) ;
    - protected array [AbstractReport::$parametersWithoutParamTag](#property-parametersWithoutParamTag) ;
    - protected array [AbstractReport::$propertiesWithoutComment](#property-propertiesWithoutComment) ;
    - protected array [AbstractReport::$propertiesWithoutVarTag](#property-propertiesWithoutVarTag) ;
    - protected array [AbstractReport::$unresolvedClassReferences](#property-unresolvedClassReferences) ;
    - protected array [AbstractReport::$unresolvedMethodReferences](#property-unresolvedMethodReferences) ;
    - protected array [AbstractReport::$classesWithEmptyMainText](#property-classesWithEmptyMainText) ;
    - protected array [AbstractReport::$propertiesWithEmptyMainText](#property-propertiesWithEmptyMainText) ;
    - protected array [AbstractReport::$methodsWithEmptyMainText](#property-methodsWithEmptyMainText) ;
    - protected array [AbstractReport::$ignore](#property-ignore) ;
    - protected null|string [AbstractReport::$currentContext](#property-currentContext) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/HtmlReport/__construct.md)() : void
    - public [setTemplate](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/HtmlReport/setTemplate.md)(string $template) : void
    - public [setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/HtmlReport/setOptions.md)(array $options) : void
    - public [__toString](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/HtmlReport/__toString.md)() : string
    - private [getTableSection](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/HtmlReport/getTableSection.md)(string $title, string $id, array $headers, array $rows, $nbItems = null, $acceptWarning = true) : array

- Inherited methods
    - public [AbstractReport::setCurrentContext](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/setCurrentContext.md)(string $context) : void
    - public [AbstractReport::setIgnore](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/setIgnore.md)(array $ignore) : void
    - public [AbstractReport::addParsedInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addParsedInlineFunction.md)(string $functionName, array $argsList = []) : void
    - public [AbstractReport::addParsedBlockLevelTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addParsedBlockLevelTag.md)(string $tagName) : void
    - public [AbstractReport::addUnknownInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUnknownInlineFunction.md)(string $functionName) : void
    - public [AbstractReport::addUndefinedInlineKeyword](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUndefinedInlineKeyword.md)(string $keyword, string $functionName) : void
    - public [AbstractReport::addUndefinedInlineClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUndefinedInlineClass.md)(string $className) : void
    - public [AbstractReport::addUnresolvedImplementationTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUnresolvedImplementationTag.md)(string $methodName) : void
    - public [AbstractReport::addUnresolvedOverridesTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUnresolvedOverridesTag.md)(string $methodName) : void
    - public [AbstractReport::addClassWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addClassWithoutComment.md)(string $className) : void
    - public [AbstractReport::addMethodWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addMethodWithoutComment.md)(string $methodName, string $visibility) : void
    - public [AbstractReport::addMethodWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addMethodWithoutReturnTag.md)(string $methodName) : void
    - public [AbstractReport::addParameterWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addParameterWithoutParamTag.md)(string $parameterName, string $methodName) : void
    - public [AbstractReport::addPropertyWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addPropertyWithoutComment.md)(string $propertyName, string $visibility) : void
    - public [AbstractReport::addPropertyWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addPropertyWithoutVarTag.md)(string $propertyName) : void
    - public [AbstractReport::addUnresolvedClassReference](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUnresolvedClassReference.md)(string $className, string $hint = null) : void
    - public [AbstractReport::addUnresolvedMethodReference](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUnresolvedMethodReference.md)(string $className, string $methodName, string $hint = null) : void
    - public [AbstractReport::addClassWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addClassWithEmptyMainText.md)(string $className) : void
    - public [AbstractReport::addPropertyWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addPropertyWithEmptyMainText.md)(string $className, string $propertyName) : void
    - public [AbstractReport::addMethodWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addMethodWithEmptyMainText.md)(string $className, string $methodName) : void

}




Properties
=============

- <span id="property-template"><b>template</b></span>

    This property holds the path to the Zeus template to use to render the report.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    The following options are available:
    - showMethodsWithoutReturn: bool=true, whether to show the methods without return
    
    

- <span id="property-parsedInlineFunctions"><b>parsedInlineFunctions</b></span>

    This property holds the array of the inline function parsed during this session.
    Each item of the array has the following structure:
    
    - 0: name of the inline function
    - 1: array of arguments passed to the function
    - 2: location (class name) where it was written
    
    

- <span id="property-parsedBlockLevelTags"><b>parsedBlockLevelTags</b></span>

    This property holds the array of the [block-level tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags) parsed during this session.
    Each item of the array has the following structure:
    
    - 0: name of the block-level tag
    - 1: location (class name) where it was written
    
    

- <span id="property-unknownInlineFunctions"><b>unknownInlineFunctions</b></span>

    This property holds the array of unknown inline function items (found during the parsing session), each of which being the following array:
    
    - 0: name of the unknown inline function
    - 1: location (class name) where it was written
    
    

- <span id="property-undefinedInlineKeywords"><b>undefinedInlineKeywords</b></span>

    This property holds an array of undefined keyword items, along with the function name, each of which being the following array:
    
    - 0: name of the undefined keyword
    - 0: name of the inline function called
    - 1: location (class name) where it was found
    
    

- <span id="property-undefinedInlineClasses"><b>undefinedInlineClasses</b></span>

    This property holds the array of class names not found items, each of which being the following array:
    
    - 0: name of the not found class
    - 1: location (class name) where it was written
    
    

- <span id="property-unresolvedImplementationTags"><b>unresolvedImplementationTags</b></span>

    This property holds the array of method and class names for methods which contains an
    unresolved @implementation tag.
    
    - 0: name of the failing method
    - 1: location (class name) where it was written
    
    

- <span id="property-unresolvedOverridesTags"><b>unresolvedOverridesTags</b></span>

    This property holds the array of method and class names for methods which contains an
    unresolved @overrides tag.
    
    - 0: name of the failing method
    - 1: location (class name) where it was written
    
    

- <span id="property-classesWithoutComment"><b>classesWithoutComment</b></span>

    This property holds the array of classes (class names) which
    don't have a doc comment (or with an empty doc comment).
    
    

- <span id="property-methodsWithoutComment"><b>methodsWithoutComment</b></span>

    This property holds the array of methods without a doc comment (or with an empty doc comment).
    Each item has the following structure:
    
    - 0: name of the method without comment
    - 1: visibility of the method
    - 2: location (class name) where it was written
    
    

- <span id="property-methodsWithoutReturnTag"><b>methodsWithoutReturnTag</b></span>

    This property holds the array of methods with a doc comment, but without a "@return" tag.
    Each item has the following structure:
    
    - 0: name of the method without comment
    - 1: location (class name) where it was written
    
    

- <span id="property-parametersWithoutParamTag"><b>parametersWithoutParamTag</b></span>

    This property holds the array of parameters without a "@param" tag.
    Each item has the following structure:
    
    - 0: name of the parameter
    - 1: name of the method
    - 2: location (class name) where it was written
    
    

- <span id="property-propertiesWithoutComment"><b>propertiesWithoutComment</b></span>

    This property holds the array of properties without a doc comment (or with an empty doc comment).
    Each item has the following structure:
    
    - 0: name of the property without comment
    - 1: location (class name) where it was written
    
    

- <span id="property-propertiesWithoutVarTag"><b>propertiesWithoutVarTag</b></span>

    This property holds the array of properties without a "@var" tag specified.
    
    Each item has the following structure:
    
    - 0: name of the property without comment
    - 1: location (class name) where it was written
    
    

- <span id="property-unresolvedClassReferences"><b>unresolvedClassReferences</b></span>

    This property holds the array of unresolved class references.
    
    

- <span id="property-unresolvedMethodReferences"><b>unresolvedMethodReferences</b></span>

    This property holds the array of unresolved method references.
    
    

- <span id="property-classesWithEmptyMainText"><b>classesWithEmptyMainText</b></span>

    This property holds an array of the classes with an empty main text.
    
    

- <span id="property-propertiesWithEmptyMainText"><b>propertiesWithEmptyMainText</b></span>

    This property holds an array of the properties with an empty main text.
    
    

- <span id="property-methodsWithEmptyMainText"><b>methodsWithEmptyMainText</b></span>

    This property holds an array of the methods with an empty main text.
    
    

- <span id="property-ignore"><b>ignore</b></span>

    This property holds the array of class names for which we don't want to report anything.
    This might happen if your class inherits an external class on which you don't have control.
    
    Example: the DocTools\Translator\ParseDownTranslator of this planet extends the Parsedown class
    from https://github.com/erusev/parsedown/blob/master/Parsedown.php.
    
    

- <span id="property-currentContext"><b>currentContext</b></span>

    The name of the current class being visited.
    
    



Methods
==============

- [HtmlReport::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/HtmlReport/__construct.md) &ndash; Builds the HtmlReport instance.
- [HtmlReport::setTemplate](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/HtmlReport/setTemplate.md) &ndash; Sets the template.
- [HtmlReport::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/HtmlReport/setOptions.md) &ndash; Sets the options.
- [HtmlReport::__toString](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/HtmlReport/__toString.md) &ndash; Builds and returns the rendered report as an html string.
- [HtmlReport::getTableSection](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/HtmlReport/getTableSection.md) &ndash; Returns a table widget.
- [AbstractReport::setCurrentContext](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/setCurrentContext.md) &ndash; Sets the current context.
- [AbstractReport::setIgnore](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/setIgnore.md) &ndash; Sets the ignore array.
- [AbstractReport::addParsedInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addParsedInlineFunction.md) &ndash; Adds the function name and the args of an [inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions).
- [AbstractReport::addParsedBlockLevelTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addParsedBlockLevelTag.md) &ndash; Adds the [block-level tag](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags) to an internal collection.
- [AbstractReport::addUnknownInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUnknownInlineFunction.md) &ndash; Adds an unknown inline function.
- [AbstractReport::addUndefinedInlineKeyword](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUndefinedInlineKeyword.md) &ndash; Adds an undefined keyword (defined with the [keyword inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) or alike).
- [AbstractReport::addUndefinedInlineClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUndefinedInlineClass.md) &ndash; Adds an undefined class (defined with the [class inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions)).
- [AbstractReport::addUnresolvedImplementationTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUnresolvedImplementationTag.md) &ndash; an unresolved @implementation tag.
- [AbstractReport::addUnresolvedOverridesTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUnresolvedOverridesTag.md) &ndash; an unresolved @overrides tag.
- [AbstractReport::addClassWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addClassWithoutComment.md) &ndash; Adds the name of a class which doesn't have a non-empty doc comment.
- [AbstractReport::addMethodWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addMethodWithoutComment.md) &ndash; Adds the name and the visibility of a method which doesn't have a non-empty doc comment.
- [AbstractReport::addMethodWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addMethodWithoutReturnTag.md) &ndash; Adds the name of a method which doesn't have a "@return" tag.
- [AbstractReport::addParameterWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addParameterWithoutParamTag.md) &ndash; Adds the name of a property (and method) which doesn't have a "@param" tag specified.
- [AbstractReport::addPropertyWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addPropertyWithoutComment.md) &ndash; Adds the name and the visibility of a property which doesn't have a non-empty doc comment.
- [AbstractReport::addPropertyWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addPropertyWithoutVarTag.md) &ndash; Adds the name of a property which doesn't have a "@var" tag specified.
- [AbstractReport::addUnresolvedClassReference](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUnresolvedClassReference.md) &ndash; Adds an unresolved class reference.
- [AbstractReport::addUnresolvedMethodReference](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addUnresolvedMethodReference.md) &ndash; Adds an unresolved method reference.
- [AbstractReport::addClassWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addClassWithEmptyMainText.md) &ndash; Adds a class with an empty [main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md#the-doc-comment-structure).
- [AbstractReport::addPropertyWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addPropertyWithEmptyMainText.md) &ndash; Adds a property with an empty [main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md#the-doc-comment-structure).
- [AbstractReport::addMethodWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport/addMethodWithEmptyMainText.md) &ndash; Adds a method with an empty [main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md#the-doc-comment-structure).





Location
=============
DocTools\Report\HtmlReport


SeeAlso
==============
Previous class: [AbstractReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/AbstractReport.md)<br>Next class: [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md)<br>
