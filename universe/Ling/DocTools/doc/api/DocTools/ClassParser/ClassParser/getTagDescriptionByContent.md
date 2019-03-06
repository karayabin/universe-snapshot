[Back to the DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md)<br>
[Back to the DocTools\ClassParser\ClassParser class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser.md)


ClassParser::getTagDescriptionByContent
================



ClassParser::getTagDescriptionByContent — Returns the tag description from the given $content.




Description
================


private [ClassParser::getTagDescriptionByContent](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser/getTagDescriptionByContent.md)(string $content) : string




Returns the tag description from the given $content.
In this method, the tag description is composed of two elements:

- the descriptive text
- the tag tail

The descriptive text: the text located on the first line, starting after the first dot encountered on that line.
The idea being that a dot on the first line indicates the ending of a tag specific notation and the beginning
of a human short description.


The tag tail is any line of the tag except for the first line (which is reserved for tag specific notation).




Parameters
================


- content

    


Return values
================

Returns string.







See Also
================

The [ClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser.md) class.

Previous method: [expandIncludes](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser/expandIncludes.md)<br>

