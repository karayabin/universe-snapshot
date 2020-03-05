[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\ClassParser\ClassParser class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser.md)


ClassParser::expandIncludes
================



ClassParser::expandIncludes — Expands the @implementation and/or @overrides tags in the raw content recursively, and returns the result.




Description
================


private [ClassParser::expandIncludes](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/expandIncludes.md)(string $rawContent, ?&$resolved = false, ?array &$includeReferences = []) : string




Expands the @implementation and/or @overrides tags in the raw content recursively, and returns the result.

Expanding means replacing the @implementation/@overrides stand-alone tags with their related ancestor recursively (i.e. the ancestor
could also use the @implementation/@overrides tag and so forth...).

See the [docTool markup language](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md) page for more details.




Parameters
================


- rawContent

    

- resolved

    Whether the "@implementation tag" or "@overrides tag" has been expanded at least once.

- includeReferences

    An array of the class names participating to the "@override/@implementation" tags resolution chain.


Return values
================

Returns string.








Source Code
===========
See the source code for method [ClassParser::expandIncludes](https://github.com/lingtalfi/DocTools/blob/master/ClassParser/ClassParser.php#L1032-L1143)


See Also
================

The [ClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser.md) class.

Previous method: [trimLines](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/trimLines.md)<br>Next method: [getTagDescriptionByContent](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getTagDescriptionByContent.md)<br>

