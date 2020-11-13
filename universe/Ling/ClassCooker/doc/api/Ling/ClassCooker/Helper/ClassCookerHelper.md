[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)



The ClassCookerHelper class
================
2020-07-21 --> 2020-08-18






Introduction
============

The ClassCookerHelper class.



Class synopsis
==============


class <span class="pl-k">ClassCookerHelper</span>  {

- Methods
    - public static [createSectionComment](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/createSectionComment.md)($label, ?$tabIndent = 1) : string
    - public static [getSectionLineNumber](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getSectionLineNumber.md)(string $sectionLabel, string $file) : false | int
    - public static [getMethodsBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getMethodsBoundaries.md)(string $file, ?array $signatureTags = []) : array
    - private static [getTagsByLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getTagsByLine.md)(string $line) : array

}






Methods
==============

- [ClassCookerHelper::createSectionComment](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/createSectionComment.md) &ndash; Creates a section comment.
- [ClassCookerHelper::getSectionLineNumber](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getSectionLineNumber.md) &ndash; Returns the number of the line (in the file) containing the beginning of the [section comment](https://github.com/lingtalfi/TheBar/blob/master/discussions/section-comment.md), or false if the section wasn't found.
- [ClassCookerHelper::getMethodsBoundaries](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getMethodsBoundaries.md) &ndash; Returns an array of method => [startLine, endLine].
- [ClassCookerHelper::getTagsByLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/Helper/ClassCookerHelper/getTagsByLine.md) &ndash; Returns the tags found in the given line.





Location
=============
Ling\ClassCooker\Helper\ClassCookerHelper<br>
See the source code of [Ling\ClassCooker\Helper\ClassCookerHelper](https://github.com/lingtalfi/ClassCooker/blob/master/Helper/ClassCookerHelper.php)



SeeAlso
==============
Previous class: [UseStatementIngredient](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/FryingPan/Ingredient/UseStatementIngredient.md)<br>
