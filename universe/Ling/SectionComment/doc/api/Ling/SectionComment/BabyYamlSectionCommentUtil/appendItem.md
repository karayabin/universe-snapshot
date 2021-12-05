[Back to the Ling/SectionComment api](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment.md)<br>
[Back to the Ling\SectionComment\BabyYamlSectionCommentUtil class](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil.md)


BabyYamlSectionCommentUtil::appendItem
================



BabyYamlSectionCommentUtil::appendItem — Appends the given item to the ret array.




Description
================


private [BabyYamlSectionCommentUtil::appendItem](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/appendItem.md)(array &$ret, array $item) : void




Appends the given item to the ret array.
The item array contains:

- title: string, the title of the section header comment
- start: int, the line number at which the section starts (including the header)
- end: int, the line number at which the section ends
- gob: array, the captured lines representing the content of the section


The appended item is described in the doc comments of the getSectionsInfo method above.




Parameters
================


- ret

    

- item

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [BabyYamlSectionCommentUtil::appendItem](https://github.com/lingtalfi/SectionComment/blob/master/BabyYamlSectionCommentUtil.php#L268-L276)


See Also
================

The [BabyYamlSectionCommentUtil](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil.md) class.

Previous method: [getSectionsInfo](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/getSectionsInfo.md)<br>Next method: [init](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/init.md)<br>

