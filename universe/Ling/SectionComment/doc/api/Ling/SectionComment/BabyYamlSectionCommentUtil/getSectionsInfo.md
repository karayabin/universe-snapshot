[Back to the Ling/SectionComment api](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment.md)<br>
[Back to the Ling\SectionComment\BabyYamlSectionCommentUtil class](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil.md)


BabyYamlSectionCommentUtil::getSectionsInfo
================



BabyYamlSectionCommentUtil::getSectionsInfo — Returns an array of info about the sections found in the current file.




Description
================


public [BabyYamlSectionCommentUtil::getSectionsInfo](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/getSectionsInfo.md)() : array




Returns an array of info about the sections found in the current file.
The returned array contains sectionItems, each of which:

- title: string, the title of the section
- content: string, the section content
- start: int, the line number at which the section starts (this includes the header)
- end: int, the line number at which the section ends




Parameters
================

This method has no parameters.


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [BabyYamlSectionCommentUtil::getSectionsInfo](https://github.com/lingtalfi/SectionComment/blob/master/BabyYamlSectionCommentUtil.php#L148-L246)


See Also
================

The [BabyYamlSectionCommentUtil](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil.md) class.

Previous method: [removeSection](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/removeSection.md)<br>Next method: [appendItem](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/appendItem.md)<br>

