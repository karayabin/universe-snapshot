[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Helper\BashtmlStringTool class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool.md)


BashtmlStringTool::captureTags
================



BashtmlStringTool::captureTags — Captures and returns all valid bashtml tags found in the given string.




Description
================


private static [BashtmlStringTool::captureTags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/captureTags.md)(string $str) : array




Captures and returns all valid bashtml tags found in the given string.
The tags are captured in the order they are found in the string.


The return is an array of tagContent => info,
with:

- tagContent: string, the tag content, such as:
     - b
     - bold
     - red:bgBlue
- info: array containing two elements:
     - 0: bool, whether the opening form of the tag was found
     - 0: bool, whether the closing form of the tag was found




Parameters
================


- str

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [BashtmlStringTool::captureTags](https://github.com/lingtalfi/CliTools/blob/master/Helper/BashtmlStringTool.php#L104-L135)


See Also
================

The [BashtmlStringTool](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool.md) class.

Previous method: [removeLastIncompleteTag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/removeLastIncompleteTag.md)<br>

