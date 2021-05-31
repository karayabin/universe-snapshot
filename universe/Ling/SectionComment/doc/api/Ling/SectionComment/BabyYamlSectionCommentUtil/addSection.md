[Back to the Ling/SectionComment api](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment.md)<br>
[Back to the Ling\SectionComment\BabyYamlSectionCommentUtil class](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil.md)


BabyYamlSectionCommentUtil::addSection
================



BabyYamlSectionCommentUtil::addSection — Adds or replaces a section to the current file.




Description
================


public [BabyYamlSectionCommentUtil::addSection](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/addSection.md)(string $title, string $content, ?array $options = []) : void




Adds or replaces a section to the current file.

If the file doesn't exist, it's created.

Available options are:

- replace: bool=true. Whether to replace the section if it already exists.
     If false, and the section already exists, the file is left unchanged.




Parameters
================


- title

    

- content

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [SectionCommentException](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/Exception/SectionCommentException.md).&nbsp;







Source Code
===========
See the source code for method [BabyYamlSectionCommentUtil::addSection](https://github.com/lingtalfi/SectionComment/blob/master/BabyYamlSectionCommentUtil.php#L68-L111)


See Also
================

The [BabyYamlSectionCommentUtil](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil.md) class.

Previous method: [setFile](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/setFile.md)<br>Next method: [removeSection](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/removeSection.md)<br>

