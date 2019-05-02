[Back to the Ling/HtmlPageTools api](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools.md)<br>
[Back to the Ling\HtmlPageTools\CssFileGenerator\CssFileGeneratorInterface class](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/CssFileGenerator/CssFileGeneratorInterface.md)


CssFileGeneratorInterface::generate
================



CssFileGeneratorInterface::generate — and returns the url to this css file.




Description
================


abstract public [CssFileGeneratorInterface::generate](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/CssFileGenerator/CssFileGeneratorInterface/generate.md)([Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot, string $identifier = null) : string




Creates a css file containing all css blocks of code of the given copilot instance,
and returns the url to this css file.
The css file name is based on the given $identifier.




Parameters
================


- copilot

    

- identifier

    


Return values
================

Returns string.








See Also
================

The [CssFileGeneratorInterface](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/CssFileGenerator/CssFileGeneratorInterface.md) class.



