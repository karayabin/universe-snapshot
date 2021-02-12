[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Helper\BashtmlStringTool class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool.md)


BashtmlStringTool::removeLastIncompleteTag
================



BashtmlStringTool::removeLastIncompleteTag — Returns the given string, after removing an incomplete bashtml tag if it ends the given string.




Description
================


public static [BashtmlStringTool::removeLastIncompleteTag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/removeLastIncompleteTag.md)(string $str) : string




Returns the given string, after removing an incomplete bashtml tag if it ends the given string.
So for instance, if the given string is:

- With no argument, reads the <bold:green>lpi.byml</bold:gr

Then this method returns:

- With no argument, reads the <bold:green>lpi.byml




Parameters
================


- str

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [BashtmlStringTool::removeLastIncompleteTag](https://github.com/lingtalfi/CliTools/blob/master/Helper/BashtmlStringTool.php#L64-L79)


See Also
================

The [BashtmlStringTool](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool.md) class.

Previous method: [fixTrimmedStringFormatting](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/fixTrimmedStringFormatting.md)<br>Next method: [captureTags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/captureTags.md)<br>

