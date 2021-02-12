[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Helper\BashtmlStringTool class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool.md)


BashtmlStringTool::fixTrimmedStringFormatting
================



BashtmlStringTool::fixTrimmedStringFormatting — then it can happen that the bashtml formatting of the trimmed string is incorrect, leading to bleeding formatting.




Description
================


public static [BashtmlStringTool::fixTrimmedStringFormatting](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/fixTrimmedStringFormatting.md)(string $trimmed) : string




When you trim a long formatted string (because it's too long description that you want to reduce to only the first 100 chars, for instance),
then it can happen that the bashtml formatting of the trimmed string is incorrect, leading to bleeding formatting.
For instance, a trimmed string could look like this:

- With no argument, reads the <bold:green>lpi.byml</bold:gr

The problem is that if you display that in a console, everything that follows will be bold green.

This method helps fixing this problem by recreating the missing/incomplete formatting tags, and returns the "repaired" string.

It assumes that bashtml formatting is used (i.e. it doesn't fix any other notation).




Parameters
================


- trimmed

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [BashtmlStringTool::fixTrimmedStringFormatting](https://github.com/lingtalfi/CliTools/blob/master/Helper/BashtmlStringTool.php#L32-L46)


See Also
================

The [BashtmlStringTool](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool.md) class.

Next method: [removeLastIncompleteTag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/removeLastIncompleteTag.md)<br>

