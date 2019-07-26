[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Helper\TagHelper class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/TagHelper.md)


TagHelper::getTagInfo
================



TagHelper::getTagInfo — Returns the tag info associated with an [expandable block-level tag](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags).




Description
================


public static [TagHelper::getTagInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/TagHelper/getTagInfo.md)(string $tag) : array




Returns the tag info associated with an [expandable block-level tag](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags).
The returned array contains the following entries:

- 0: string. The tag definition: the tag string until it is stopped by either a dot or a newline character.
- 1: string. The tag comment text: it is composed of everything on the first line that follows the first dot character found,
     plus all the subsequent lines (if any). It is an empty string by default




Parameters
================


- tag

    The raw tag expression.


Return values
================

Returns array.








Source Code
===========
See the source code for method [TagHelper::getTagInfo](https://github.com/lingtalfi/DocTools/blob/master/Helper/TagHelper.php#L27-L51)


See Also
================

The [TagHelper](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/TagHelper.md) class.



