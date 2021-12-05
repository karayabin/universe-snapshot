[Back to the Ling/SectionComment api](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment.md)



The BabyYamlSectionCommentUtil class
================
2021-03-19 --> 2021-08-10






Introduction
============

The SectionCommentUtil class.
An implementation of a [babyYaml based section comment](https://github.com/lingtalfi/TheBar/blob/master/discussions/section-comment.md).


Note that in this implementation, a single **dash line** ends a section.



Class synopsis
==============


class <span class="pl-k">BabyYamlSectionCommentUtil</span>  {

- Properties
    - private string|null [$file](#property-file) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/__construct.md)() : void
    - public [setFile](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/setFile.md)(string $file) : void
    - public [addSection](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/addSection.md)(string $title, string $content, ?array $options = []) : void
    - public [removeSection](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/removeSection.md)(string $sectionTitle) : int
    - public [getSectionsInfo](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/getSectionsInfo.md)() : array
    - private [appendItem](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/appendItem.md)(array &$ret, array $item) : void
    - private [init](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/init.md)() : void
    - private [matchCommentLine](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/matchCommentLine.md)(string $line) : bool
    - private [matchTitleLine](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/matchTitleLine.md)(string $line, ?string &$title = null) : bool
    - private [getHeader](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/getHeader.md)(string $title) : string

}




Properties
=============

- <span id="property-file"><b>file</b></span>

    This property holds the file for this instance.
    
    



Methods
==============

- [BabyYamlSectionCommentUtil::__construct](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/__construct.md) &ndash; Builds the SectionCommentUtil instance.
- [BabyYamlSectionCommentUtil::setFile](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/setFile.md) &ndash; Sets the file.
- [BabyYamlSectionCommentUtil::addSection](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/addSection.md) &ndash; Adds or replaces a section to the current file.
- [BabyYamlSectionCommentUtil::removeSection](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/removeSection.md) &ndash; Removes section(s) which title match the given title, and returns the number of removed sections.
- [BabyYamlSectionCommentUtil::getSectionsInfo](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/getSectionsInfo.md) &ndash; Returns an array of info about the sections found in the current file.
- [BabyYamlSectionCommentUtil::appendItem](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/appendItem.md) &ndash; Appends the given item to the ret array.
- [BabyYamlSectionCommentUtil::init](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/init.md) &ndash; Makes sure the instance is configured properly.
- [BabyYamlSectionCommentUtil::matchCommentLine](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/matchCommentLine.md) &ndash; Returns whether the current line is a comment line.
- [BabyYamlSectionCommentUtil::matchTitleLine](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/matchTitleLine.md) &ndash; Returns whether the current line is a title line.
- [BabyYamlSectionCommentUtil::getHeader](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/BabyYamlSectionCommentUtil/getHeader.md) &ndash; Returns the section header comment from the given title.





Location
=============
Ling\SectionComment\BabyYamlSectionCommentUtil<br>
See the source code of [Ling\SectionComment\BabyYamlSectionCommentUtil](https://github.com/lingtalfi/SectionComment/blob/master/BabyYamlSectionCommentUtil.php)



SeeAlso
==============
Next class: [SectionCommentException](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment/Exception/SectionCommentException.md)<br>
