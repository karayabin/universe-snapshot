[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)<br>
[Back to the Ling\ClassCooker\Helper\ClassCookerHelper class](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper.md)


ClassCookerHelper::getSectionLineNumber
================



ClassCookerHelper::getSectionLineNumber — Returns the number of the line (in the file) containing the beginning of the [section comment](https://github.com/lingtalfi/TheBar/blob/master/discussions/section-comment.md), or false if the section wasn't found.




Description
================


public static [ClassCookerHelper::getSectionLineNumber](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getSectionLineNumber.md)(string $sectionLabel, string $file) : false | int




Returns the number of the line (in the file) containing the beginning of the [section comment](https://github.com/lingtalfi/TheBar/blob/master/discussions/section-comment.md), or false if the section wasn't found.


A section is a special type of comment written on 3 lines, it looks like the one just above this comment.
It's easier to find a section if your section label contains only alpha-numeric chars (see the source code
of this method to understand why).




Parameters
================


- sectionLabel

    

- file

    


Return values
================

Returns false | int.








Source Code
===========
See the source code for method [ClassCookerHelper::getSectionLineNumber](https://github.com/lingtalfi/ClassCooker/blob/master/Helper/ClassCookerHelper.php#L54-L75)


See Also
================

The [ClassCookerHelper](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper.md) class.

Previous method: [createSectionComment](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/createSectionComment.md)<br>Next method: [getMethodsBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getMethodsBoundaries.md)<br>

