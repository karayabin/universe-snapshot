[Back to the DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md)<br>
[Back to the DocTools\ClassParser\ClassParser class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser.md)


ClassParser::expandIncludes
================



ClassParser::expandIncludes — Expands the @implementation and/or @overrides tags in the raw content recursively, and returns the result.




Description
================


private [ClassParser::expandIncludes](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser/expandIncludes.md)(string $rawContent, &$resolved = false) : string




Expands the @implementation and/or @overrides tags in the raw content recursively, and returns the result.

Expanding means replacing the @implementation/@overrides stand-alone tags with their related ancestor recursively (i.e. the ancestor
could also use the @implementation/@overrides tag and so forth...).

See the [docTool markup language](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md) page for more details.




Parameters
================


- rawContent

    

- resolved

    Whether the "@implementation tag" or "@overrides tag" has been expanded at least once.


Return values
================

Returns string.







See Also
================

The [ClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser.md) class.

Previous method: [trimLines](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser/trimLines.md)<br>Next method: [getTagDescriptionByContent](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser/getTagDescriptionByContent.md)<br>

