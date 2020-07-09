[Back to the Ling/HtmlPageTools api](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools.md)



The CssFileGeneratorInterface class
================
2019-04-24 --> 2020-05-28






Introduction
============

The CssFileGeneratorInterface interface.

A css file generator is a class which generates a compiled css file containing all css blocks of code
of the given a copilot instance, and returns the url to that css file.

The name of the css file depends on the given $identifier.



Class synopsis
==============


abstract class <span class="pl-k">CssFileGeneratorInterface</span>  {

- Methods
    - abstract public [generate](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/CssFileGenerator/CssFileGeneratorInterface/generate.md)([Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot, ?string $identifier = null) : string

}






Methods
==============

- [CssFileGeneratorInterface::generate](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/CssFileGenerator/CssFileGeneratorInterface/generate.md) &ndash; and returns the url to this css file.





Location
=============
Ling\HtmlPageTools\CssFileGenerator\CssFileGeneratorInterface<br>
See the source code of [Ling\HtmlPageTools\CssFileGenerator\CssFileGeneratorInterface](https://github.com/lingtalfi/HtmlPageTools/blob/master/CssFileGenerator/CssFileGeneratorInterface.php)



SeeAlso
==============
Previous class: [HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md)<br>Next class: [HtmlPageException](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Exception/HtmlPageException.md)<br>
