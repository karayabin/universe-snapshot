[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The AbstractReport class
================
2019-02-21 --> 2021-03-23






Introduction
============

The AbstractReport class is an abstract implementation of the ReportInterface.



Class synopsis
==============


abstract class <span class="pl-k">AbstractReport</span> implements [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md), [\Stringable](https://wiki.php.net/rfc/stringable) {

- Properties
    - protected array [$parsedInlineFunctions](#property-parsedInlineFunctions) ;
    - protected array [$parsedBlockLevelTags](#property-parsedBlockLevelTags) ;
    - protected array [$unknownInlineFunctions](#property-unknownInlineFunctions) ;
    - protected array [$undefinedInlineKeywords](#property-undefinedInlineKeywords) ;
    - protected array [$undefinedInlineClasses](#property-undefinedInlineClasses) ;
    - protected array [$unresolvedImplementationTags](#property-unresolvedImplementationTags) ;
    - protected array [$unresolvedOverridesTags](#property-unresolvedOverridesTags) ;
    - protected array [$classesWithoutComment](#property-classesWithoutComment) ;
    - protected array [$methodsWithoutComment](#property-methodsWithoutComment) ;
    - protected array [$methodsWithoutReturnTag](#property-methodsWithoutReturnTag) ;
    - protected array [$parametersWithoutParamTag](#property-parametersWithoutParamTag) ;
    - protected array [$propertiesWithoutComment](#property-propertiesWithoutComment) ;
    - protected array [$propertiesWithoutVarTag](#property-propertiesWithoutVarTag) ;
    - protected array [$unresolvedClassReferences](#property-unresolvedClassReferences) ;
    - protected array [$unresolvedMethodReferences](#property-unresolvedMethodReferences) ;
    - protected array [$classesWithEmptyMainText](#property-classesWithEmptyMainText) ;
    - protected array [$todoTexts](#property-todoTexts) ;
    - protected array [$propertiesWithEmptyMainText](#property-propertiesWithEmptyMainText) ;
    - protected array [$methodsWithEmptyMainText](#property-methodsWithEmptyMainText) ;
    - protected array [$ignore](#property-ignore) ;
    - protected null|string [$currentContext](#property-currentContext) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/__construct.md)() : void
    - public [setCurrentContext](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/setCurrentContext.md)(string $context) : void
    - public [setIgnore](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/setIgnore.md)(array $ignore) : void
    - public [addParsedInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addParsedInlineFunction.md)(string $functionName, ?array $argsList = []) : void
    - public [addParsedBlockLevelTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addParsedBlockLevelTag.md)(string $tagName) : void
    - public [addUnknownInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUnknownInlineFunction.md)(string $functionName) : void
    - public [addUndefinedInlineKeyword](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUndefinedInlineKeyword.md)(string $keyword, string $functionName) : void
    - public [addUndefinedInlineClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUndefinedInlineClass.md)(string $className) : void
    - public [addUnresolvedImplementationTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUnresolvedImplementationTag.md)(string $methodName) : void
    - public [addUnresolvedOverridesTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUnresolvedOverridesTag.md)(string $methodName) : void
    - public [addClassWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addClassWithoutComment.md)(string $className) : void
    - public [addMethodWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addMethodWithoutComment.md)(string $methodName, string $visibility) : void
    - public [addMethodWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addMethodWithoutReturnTag.md)(string $methodName) : void
    - public [addParameterWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addParameterWithoutParamTag.md)(string $parameterName, string $methodName) : void
    - public [addPropertyWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addPropertyWithoutComment.md)(string $propertyName, string $visibility) : void
    - public [addPropertyWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addPropertyWithoutVarTag.md)(string $propertyName) : void
    - public [addUnresolvedClassReference](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUnresolvedClassReference.md)(string $className, ?string $hint = null) : void
    - public [addUnresolvedMethodReference](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUnresolvedMethodReference.md)(string $className, string $methodName, ?string $hint = null) : void
    - public [addClassWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addClassWithEmptyMainText.md)(string $className) : void
    - public [addTodoText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addTodoText.md)(string $todoText, string $hint) : mixed
    - public [addPropertyWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addPropertyWithEmptyMainText.md)(string $className, string $propertyName) : void
    - public [addMethodWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addMethodWithEmptyMainText.md)(string $className, string $methodName) : void
    - public [getParsedInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getParsedInlineFunctions.md)() : array
    - public [getParsedBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getParsedBlockLevelTags.md)() : array
    - public [getUnknownInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUnknownInlineFunctions.md)() : array
    - public [getUndefinedInlineKeywords](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUndefinedInlineKeywords.md)() : array
    - public [getUndefinedInlineClasses](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUndefinedInlineClasses.md)() : array
    - public [getUnresolvedImplementationTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUnresolvedImplementationTags.md)() : array
    - public [getUnresolvedOverridesTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUnresolvedOverridesTags.md)() : array
    - public [getClassesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getClassesWithoutComment.md)() : array
    - public [getMethodsWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getMethodsWithoutComment.md)() : array
    - public [getMethodsWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getMethodsWithoutReturnTag.md)() : array
    - public [getParametersWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getParametersWithoutParamTag.md)() : array
    - public [getPropertiesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getPropertiesWithoutComment.md)() : array
    - public [getPropertiesWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getPropertiesWithoutVarTag.md)() : array
    - public [getUnresolvedClassReferences](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUnresolvedClassReferences.md)() : array
    - public [getUnresolvedMethodReferences](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUnresolvedMethodReferences.md)() : array
    - public [getClassesWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getClassesWithEmptyMainText.md)() : array
    - public [getTodoTexts](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getTodoTexts.md)() : array
    - public [getPropertiesWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getPropertiesWithEmptyMainText.md)() : array
    - public [getMethodsWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getMethodsWithEmptyMainText.md)() : array

- Inherited methods
    - abstract public [ReportInterface::__toString](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/__toString.md)() : string

}




Properties
=============

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
    
    

- <span id="property-todoTexts"><b>todoTexts</b></span>

    This property holds an array of todo texts.
    
    

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

- [AbstractReport::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/__construct.md) &ndash; Builds the PlanetReport instance.
- [AbstractReport::setCurrentContext](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/setCurrentContext.md) &ndash; Sets the current context.
- [AbstractReport::setIgnore](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/setIgnore.md) &ndash; Sets the ignore array.
- [AbstractReport::addParsedInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addParsedInlineFunction.md) &ndash; Adds the function name and the args of an [inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions).
- [AbstractReport::addParsedBlockLevelTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addParsedBlockLevelTag.md) &ndash; Adds the [block-level tag](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags) to an internal collection.
- [AbstractReport::addUnknownInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUnknownInlineFunction.md) &ndash; Adds an unknown inline function.
- [AbstractReport::addUndefinedInlineKeyword](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUndefinedInlineKeyword.md) &ndash; Adds an undefined keyword (defined with the [keyword inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) or alike).
- [AbstractReport::addUndefinedInlineClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUndefinedInlineClass.md) &ndash; Adds an undefined class (defined with the [class inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions)).
- [AbstractReport::addUnresolvedImplementationTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUnresolvedImplementationTag.md) &ndash; an unresolved @implementation tag.
- [AbstractReport::addUnresolvedOverridesTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUnresolvedOverridesTag.md) &ndash; an unresolved @overrides tag.
- [AbstractReport::addClassWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addClassWithoutComment.md) &ndash; Adds the name of a class which doesn't have a non-empty doc comment.
- [AbstractReport::addMethodWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addMethodWithoutComment.md) &ndash; Adds the name and the visibility of a method which doesn't have a non-empty doc comment.
- [AbstractReport::addMethodWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addMethodWithoutReturnTag.md) &ndash; Adds the name of a method which doesn't have a "@return" tag.
- [AbstractReport::addParameterWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addParameterWithoutParamTag.md) &ndash; Adds the name of a property (and method) which doesn't have a "@param" tag specified.
- [AbstractReport::addPropertyWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addPropertyWithoutComment.md) &ndash; Adds the name and the visibility of a property which doesn't have a non-empty doc comment.
- [AbstractReport::addPropertyWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addPropertyWithoutVarTag.md) &ndash; Adds the name of a property which doesn't have a "@var" tag specified.
- [AbstractReport::addUnresolvedClassReference](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUnresolvedClassReference.md) &ndash; Adds an unresolved class reference.
- [AbstractReport::addUnresolvedMethodReference](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUnresolvedMethodReference.md) &ndash; Adds an unresolved method reference.
- [AbstractReport::addClassWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addClassWithEmptyMainText.md) &ndash; Adds a class with an empty [main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure).
- [AbstractReport::addTodoText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addTodoText.md) &ndash; Adds a todo text.
- [AbstractReport::addPropertyWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addPropertyWithEmptyMainText.md) &ndash; Adds a property with an empty [main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure).
- [AbstractReport::addMethodWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addMethodWithEmptyMainText.md) &ndash; Adds a method with an empty [main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure).
- [AbstractReport::getParsedInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getParsedInlineFunctions.md) &ndash; Returns the array of the inline function parsed during this session.
- [AbstractReport::getParsedBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getParsedBlockLevelTags.md) &ndash; Returns the array of the [block-level tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags) parsed during this session.
- [AbstractReport::getUnknownInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUnknownInlineFunctions.md) &ndash; 
- [AbstractReport::getUndefinedInlineKeywords](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUndefinedInlineKeywords.md) &ndash; 
- [AbstractReport::getUndefinedInlineClasses](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUndefinedInlineClasses.md) &ndash; 
- [AbstractReport::getUnresolvedImplementationTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUnresolvedImplementationTags.md) &ndash; unresolved @implementation tag.
- [AbstractReport::getUnresolvedOverridesTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUnresolvedOverridesTags.md) &ndash; unresolved @overrides tag.
- [AbstractReport::getClassesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getClassesWithoutComment.md) &ndash; don't have a doc comment (or with an empty doc comment).
- [AbstractReport::getMethodsWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getMethodsWithoutComment.md) &ndash; Returns the array of methods without a doc comment (or with an empty doc comment).
- [AbstractReport::getMethodsWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getMethodsWithoutReturnTag.md) &ndash; Returns the array of methods with a doc comment, but without a "@return" tag.
- [AbstractReport::getParametersWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getParametersWithoutParamTag.md) &ndash; Returns the array of parameters without a "@param" tag.
- [AbstractReport::getPropertiesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getPropertiesWithoutComment.md) &ndash; Returns the array of properties without a doc comment (or with an empty doc comment).
- [AbstractReport::getPropertiesWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getPropertiesWithoutVarTag.md) &ndash; Returns the array of properties without a "@var" tag specified.
- [AbstractReport::getUnresolvedClassReferences](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUnresolvedClassReferences.md) &ndash; Returns the array of unresolved class references.
- [AbstractReport::getUnresolvedMethodReferences](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUnresolvedMethodReferences.md) &ndash; Returns the array of unresolved method references.
- [AbstractReport::getClassesWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getClassesWithEmptyMainText.md) &ndash; Returns the array of the classes with an empty main text.
- [AbstractReport::getTodoTexts](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getTodoTexts.md) &ndash; Returns the array of todo texts.
- [AbstractReport::getPropertiesWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getPropertiesWithEmptyMainText.md) &ndash; Returns the array of the properties with an empty main text.
- [AbstractReport::getMethodsWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getMethodsWithEmptyMainText.md) &ndash; Returns the array of the methods with an empty main text.
- [ReportInterface::__toString](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/__toString.md) &ndash; Builds and returns the rendered report as a string.





Location
=============
Ling\DocTools\Report\AbstractReport<br>
See the source code of [Ling\DocTools\Report\AbstractReport](https://github.com/lingtalfi/DocTools/blob/master/Report/AbstractReport.php)



SeeAlso
==============
Previous class: [PlanetParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser.md)<br>Next class: [HtmlReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/HtmlReport.md)<br>
