[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The BashtmlStringTool class
================
2019-02-26 --> 2021-05-31






Introduction
============

The BashtmlStringTool class.



Class synopsis
==============


class <span class="pl-k">BashtmlStringTool</span>  {

- Methods
    - public static [fixTrimmedStringFormatting](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/fixTrimmedStringFormatting.md)(string $trimmed) : string
    - public static [removeLastIncompleteTag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/removeLastIncompleteTag.md)(string $str) : string
    - private static [captureTags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/captureTags.md)(string $str) : array

}






Methods
==============

- [BashtmlStringTool::fixTrimmedStringFormatting](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/fixTrimmedStringFormatting.md) &ndash; then it can happen that the bashtml formatting of the trimmed string is incorrect, leading to bleeding formatting.
- [BashtmlStringTool::removeLastIncompleteTag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/removeLastIncompleteTag.md) &ndash; Returns the given string, after removing an incomplete bashtml tag if it ends the given string.
- [BashtmlStringTool::captureTags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/captureTags.md) &ndash; Captures and returns all valid bashtml tags found in the given string.





Location
=============
Ling\CliTools\Helper\BashtmlStringTool<br>
See the source code of [Ling\CliTools\Helper\BashtmlStringTool](https://github.com/lingtalfi/CliTools/blob/master/Helper/BashtmlStringTool.php)



SeeAlso
==============
Previous class: [FormatterInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/FormatterInterface.md)<br>Next class: [CommandLineInputHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper.md)<br>
