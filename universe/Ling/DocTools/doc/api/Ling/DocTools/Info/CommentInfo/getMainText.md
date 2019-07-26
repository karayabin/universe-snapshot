[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Info\CommentInfo class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md)


CommentInfo::getMainText
================



CommentInfo::getMainText — Returns the main text.




Description
================


public [CommentInfo::getMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo/getMainText.md)(array $options = []) : string




Returns the main text.




Parameters
================


- options

    - useSeeItems: bool=true. Whether to display a human "see also items" sentence when available.
     Note: it's available if the tags "@seeClass" or "@seeMethod" have been used.


Return values
================

Returns string.


Exceptions thrown
================

- [DocToolsException](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Exception/DocToolsException.md).&nbsp;







Source Code
===========
See the source code for method [CommentInfo::getMainText](https://github.com/lingtalfi/DocTools/blob/master/Info/CommentInfo.php#L168-L178)


See Also
================

The [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md) class.

Previous method: [getRawText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo/getRawText.md)<br>Next method: [hasEmptyMainText](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo/hasEmptyMainText.md)<br>

