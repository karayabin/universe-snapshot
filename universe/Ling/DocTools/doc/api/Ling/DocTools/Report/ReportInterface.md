[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The ReportInterface class
================
2019-02-21 --> 2020-04-17






Introduction
============

The ReportInterface interface is the interface for all reports.

A report contains two kinds of data:
- documentation errors
- statistical data

Documentation errors are the things you forgot to make a fully covered documentation.
For instance if you forgot to comment a class, this will appear as an error in the report.
The thing is: if the report show no error, you know for sure that your documentation is perfectly covered :)


Statistical data gives an overview of your documentation in terms of how many doc comment tags you've used,
what are the most popular tags used in your documentation, those kind of things...


![A report screenshot](http://lingtalfi.com/img/universe/DocTools/doctools-report.png)





The information potentially stored in the report is the following (i.e. you don't need to implement all in your concrete Report subclass).


Note: a context (like the class name for instance) is generally provided with all this information,
so that the reader can spot where the problem was found more quickly.
This context is set via the setCurrentContext method of this interface.




Missing comments
----------------
- classes without comments: the names of the classes without a doc comment (or with an empty doc comment).
- methods without comments: the name and visibility of the methods without a doc comment (or with an empty doc comment).
- properties without comments: the name and visibility of the properties without a doc comment (or with an empty doc comment).


Missing tags
---------------
- properties without @var: the names of the properties without a "@var" tag.
- parameters without @param: the names of the method parameters without a "@param" tag.


Empty main texts
---------------
- classes without main text: the names of the classes with an empty [main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure) comment.
- properties without main text: the names of the properties with an empty [main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure) comment.
- methods without main text: the names of the methods with an empty [main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure) comment.


Linkage
-----------------
- unresolved class references: the class names not found in the [generatedItems2Url](https://github.com/lingtalfi/DocTools/blob/master/README.md#generateditems2url) array or its derivatives.
- unresolved method references: the method names not found in the [generatedItems2Url](https://github.com/lingtalfi/DocTools/blob/master/README.md#generateditems2url) array or its derivatives.


Inline functions
---------------
- unresolved @keyword: calls to the keyword [inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) which didn't resolve, and what function was used.
- unresolved @class: calls to the class [inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) which didn't resolve.
         Note that this can create doublons with the "unresolved class references".
- unknown functions: the names of the unknown [inline functions](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) used by the client.
- inline functions usage: this is a statistical data showing the inline functions used in your documentation, and how many times they have been used.
- inline functions usage details: this is the expanded version of the "inline function usage" data, showing the inline functions used along with the arguments
     they were called with.


Block-level tags
------------------
- unresolved @implementation: the names of the methods using an unresolved ["@implementation" tag](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags) (no abstract
     parent or interface class with the same method name was found).

- unresolved @overrides: the names of the methods using an unresolved ["@overrides" tag](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags) (no ancestor class with the same method name was found)
- block-level tags usage: this is a statistical data showing the block-level tags used in your documentation, and how many times they have been used.
- block-level tags usage details: this is the expanded version of the "block-level tags usage" data, showing the block-level tags used and where they were called.














The report can be displayed as a string (via the __toString method).



Class synopsis
==============


abstract class <span class="pl-k">ReportInterface</span>  {

- Methods
    - abstract public [setCurrentContext](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/setCurrentContext.md)(string $context) : void
    - abstract public [addParsedInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addParsedInlineFunction.md)(string $functionName, ?array $argsList = []) : void
    - abstract public [addParsedBlockLevelTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addParsedBlockLevelTag.md)(string $tagName) : void
    - abstract public [addUnknownInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUnknownInlineFunction.md)(string $functionName) : void
    - abstract public [addUndefinedInlineKeyword](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUndefinedInlineKeyword.md)(string $keyword, string $functionName) : void
    - abstract public [addUndefinedInlineClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUndefinedInlineClass.md)(string $className) : void
    - abstract public [addUnresolvedImplementationTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUnresolvedImplementationTag.md)(string $methodName) : void
    - abstract public [addUnresolvedOverridesTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUnresolvedOverridesTag.md)(string $methodName) : void
    - abstract public [addClassWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addClassWithoutComment.md)(string $className) : void
    - abstract public [addMethodWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addMethodWithoutComment.md)(string $methodName, string $visibility) : void
    - abstract public [addMethodWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addMethodWithoutReturnTag.md)(string $methodName) : void
    - abstract public [addPropertyWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addPropertyWithoutComment.md)(string $propertyName, string $visibility) : void
    - abstract public [addPropertyWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addPropertyWithoutVarTag.md)(string $propertyName) : void
    - abstract public [addParameterWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addParameterWithoutParamTag.md)(string $parameterName, string $methodName) : void
    - abstract public [addUnresolvedClassReference](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUnresolvedClassReference.md)(string $className, ?string $hint = null) : void
    - abstract public [addUnresolvedMethodReference](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUnresolvedMethodReference.md)(string $className, string $methodName, ?string $hint = null) : void
    - abstract public [addClassWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addClassWithEmptyMainText.md)(string $className) : void
    - abstract public [addTodoText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addTodoText.md)(string $todoText, string $hint) : mixed
    - abstract public [addPropertyWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addPropertyWithEmptyMainText.md)(string $className, string $propertyName) : void
    - abstract public [addMethodWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addMethodWithEmptyMainText.md)(string $className, string $methodName) : void
    - abstract public [__toString](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/__toString.md)() : string
    - abstract public [getParsedInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParsedInlineFunctions.md)() : array
    - abstract public [getParsedBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParsedBlockLevelTags.md)() : array
    - abstract public [getUnknownInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnknownInlineFunctions.md)() : array
    - abstract public [getUndefinedInlineKeywords](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUndefinedInlineKeywords.md)() : array
    - abstract public [getUndefinedInlineClasses](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUndefinedInlineClasses.md)() : array
    - abstract public [getUnresolvedImplementationTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedImplementationTags.md)() : array
    - abstract public [getUnresolvedOverridesTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedOverridesTags.md)() : array
    - abstract public [getClassesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getClassesWithoutComment.md)() : array
    - abstract public [getMethodsWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getMethodsWithoutComment.md)() : array
    - abstract public [getMethodsWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getMethodsWithoutReturnTag.md)() : array
    - abstract public [getParametersWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParametersWithoutParamTag.md)() : array
    - abstract public [getPropertiesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getPropertiesWithoutComment.md)() : array
    - abstract public [getPropertiesWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getPropertiesWithoutVarTag.md)() : array
    - abstract public [getUnresolvedClassReferences](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedClassReferences.md)() : array
    - abstract public [getUnresolvedMethodReferences](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedMethodReferences.md)() : array
    - abstract public [getClassesWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getClassesWithEmptyMainText.md)() : array
    - abstract public [getTodoTexts](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getTodoTexts.md)() : array
    - abstract public [getPropertiesWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getPropertiesWithEmptyMainText.md)() : array
    - abstract public [getMethodsWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getMethodsWithEmptyMainText.md)() : array

}






Methods
==============

- [ReportInterface::setCurrentContext](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/setCurrentContext.md) &ndash; Sets the name of the current context being parsed.
- [ReportInterface::addParsedInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addParsedInlineFunction.md) &ndash; Adds the function name and the args of an [inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions).
- [ReportInterface::addParsedBlockLevelTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addParsedBlockLevelTag.md) &ndash; Adds the [block-level tag](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags) to an internal collection.
- [ReportInterface::addUnknownInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUnknownInlineFunction.md) &ndash; Adds an unknown inline function.
- [ReportInterface::addUndefinedInlineKeyword](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUndefinedInlineKeyword.md) &ndash; Adds an undefined keyword (defined with the [keyword inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) or alike).
- [ReportInterface::addUndefinedInlineClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUndefinedInlineClass.md) &ndash; Adds an undefined class (defined with the [class inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions)).
- [ReportInterface::addUnresolvedImplementationTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUnresolvedImplementationTag.md) &ndash; an unresolved @implementation tag.
- [ReportInterface::addUnresolvedOverridesTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUnresolvedOverridesTag.md) &ndash; an unresolved @overrides tag.
- [ReportInterface::addClassWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addClassWithoutComment.md) &ndash; Adds the name of a class which doesn't have a non-empty doc comment.
- [ReportInterface::addMethodWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addMethodWithoutComment.md) &ndash; Adds the name and the visibility of a method which doesn't have a non-empty doc comment.
- [ReportInterface::addMethodWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addMethodWithoutReturnTag.md) &ndash; Adds the name of a method which doesn't have a "@return" tag.
- [ReportInterface::addPropertyWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addPropertyWithoutComment.md) &ndash; Adds the name and the visibility of a property which doesn't have a non-empty doc comment.
- [ReportInterface::addPropertyWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addPropertyWithoutVarTag.md) &ndash; Adds the name of a property which doesn't have a "@var" tag specified.
- [ReportInterface::addParameterWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addParameterWithoutParamTag.md) &ndash; Adds the name of a property (and method) which doesn't have a "@param" tag specified.
- [ReportInterface::addUnresolvedClassReference](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUnresolvedClassReference.md) &ndash; Adds an unresolved class reference.
- [ReportInterface::addUnresolvedMethodReference](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addUnresolvedMethodReference.md) &ndash; Adds an unresolved method reference.
- [ReportInterface::addClassWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addClassWithEmptyMainText.md) &ndash; Adds a class with an empty [main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure).
- [ReportInterface::addTodoText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addTodoText.md) &ndash; Adds a todo text.
- [ReportInterface::addPropertyWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addPropertyWithEmptyMainText.md) &ndash; Adds a property with an empty [main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure).
- [ReportInterface::addMethodWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/addMethodWithEmptyMainText.md) &ndash; Adds a method with an empty [main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure).
- [ReportInterface::__toString](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/__toString.md) &ndash; Builds and returns the rendered report as a string.
- [ReportInterface::getParsedInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParsedInlineFunctions.md) &ndash; Returns the array of the inline function parsed during this session.
- [ReportInterface::getParsedBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParsedBlockLevelTags.md) &ndash; Returns the array of the [block-level tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags) parsed during this session.
- [ReportInterface::getUnknownInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnknownInlineFunctions.md) &ndash; 
- [ReportInterface::getUndefinedInlineKeywords](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUndefinedInlineKeywords.md) &ndash; 
- [ReportInterface::getUndefinedInlineClasses](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUndefinedInlineClasses.md) &ndash; 
- [ReportInterface::getUnresolvedImplementationTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedImplementationTags.md) &ndash; unresolved @implementation tag.
- [ReportInterface::getUnresolvedOverridesTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedOverridesTags.md) &ndash; unresolved @overrides tag.
- [ReportInterface::getClassesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getClassesWithoutComment.md) &ndash; don't have a doc comment (or with an empty doc comment).
- [ReportInterface::getMethodsWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getMethodsWithoutComment.md) &ndash; Returns the array of methods without a doc comment (or with an empty doc comment).
- [ReportInterface::getMethodsWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getMethodsWithoutReturnTag.md) &ndash; Returns the array of methods with a doc comment, but without a "@return" tag.
- [ReportInterface::getParametersWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParametersWithoutParamTag.md) &ndash; Returns the array of parameters without a "@param" tag.
- [ReportInterface::getPropertiesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getPropertiesWithoutComment.md) &ndash; Returns the array of properties without a doc comment (or with an empty doc comment).
- [ReportInterface::getPropertiesWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getPropertiesWithoutVarTag.md) &ndash; Returns the array of properties without a "@var" tag specified.
- [ReportInterface::getUnresolvedClassReferences](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedClassReferences.md) &ndash; Returns the array of unresolved class references.
- [ReportInterface::getUnresolvedMethodReferences](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedMethodReferences.md) &ndash; Returns the array of unresolved method references.
- [ReportInterface::getClassesWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getClassesWithEmptyMainText.md) &ndash; Returns the array of the classes with an empty main text.
- [ReportInterface::getTodoTexts](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getTodoTexts.md) &ndash; Returns the array of todo texts.
- [ReportInterface::getPropertiesWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getPropertiesWithEmptyMainText.md) &ndash; Returns the array of the properties with an empty main text.
- [ReportInterface::getMethodsWithEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getMethodsWithEmptyMainText.md) &ndash; Returns the array of the methods with an empty main text.





Location
=============
Ling\DocTools\Report\ReportInterface<br>
See the source code of [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php)



SeeAlso
==============
Previous class: [HtmlReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/HtmlReport.md)<br>Next class: [TemplateWizard](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/TemplateWizard/TemplateWizard.md)<br>
