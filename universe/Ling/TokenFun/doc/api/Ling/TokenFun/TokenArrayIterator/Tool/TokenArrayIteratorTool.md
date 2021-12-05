[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)



The TokenArrayIteratorTool class
================
2020-07-28 --> 2021-08-16






Introduction
============

The TokenArrayIteratorTool class.

Concepts to understand before using this class:
See the [tokenProp definition](https://github.com/lingtalfi/TokenFun/blob/master/doc/pages/conception-notes.md#tokenprop).



Class synopsis
==============


class <span class="pl-k">TokenArrayIteratorTool</span>  {

- Methods
    - public static [isWhiteSpace](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/isWhiteSpace.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : bool
    - public static [moveToCorrespondingEnd](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/moveToCorrespondingEnd.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai, ?array $tokens = null, ?array &$capture = []) : bool
    - public static [skipClassLike](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipClassLike.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : bool
    - public static [skipSquareBracketsChain](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipSquareBracketsChain.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : bool
    - public static [skipFunction](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipFunction.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : bool
    - public static [skipNsChain](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipNsChain.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : bool
    - public static [skipWhiteSpaces](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipWhiteSpaces.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : void
    - public static [skipTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipTokens.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai, ?array $tokens = []) : void
    - public static [skipWhiteSpacesOrComma](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipWhiteSpacesOrComma.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : void
    - public static [skipUntil](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipUntil.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai, $tokenProp, ?bool $includeLast = false) : bool

}






Methods
==============

- [TokenArrayIteratorTool::isWhiteSpace](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/isWhiteSpace.md) &ndash; Returns whether the current element of the given iterator is a whitespace.
- [TokenArrayIteratorTool::moveToCorrespondingEnd](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/moveToCorrespondingEnd.md) &ndash; Look at the "opening" token at the current position and tries to move to the corresponding closing token.
- [TokenArrayIteratorTool::skipClassLike](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipClassLike.md) &ndash; Moves the iterator pointer forward skipping class definition, and returns whether or not a class definition has been skipped.
- [TokenArrayIteratorTool::skipSquareBracketsChain](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipSquareBracketsChain.md) &ndash; Moves the iterator pointer forward skipping bracket wrappings, and returns whether a bracket wrapping has been skipped.
- [TokenArrayIteratorTool::skipFunction](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipFunction.md) &ndash; Moves the iterator pointer forward skipping functions, and returns whether a function has been skipped.
- [TokenArrayIteratorTool::skipNsChain](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipNsChain.md) &ndash; Moves the iterator pointer forward skipping namespace chain, and returns whether a namespace chain has been skipped.
- [TokenArrayIteratorTool::skipWhiteSpaces](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipWhiteSpaces.md) &ndash; Skips whitespaces and positions the cursor AFTER the last whitespace.
- [TokenArrayIteratorTool::skipTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipTokens.md) &ndash; Skips the given tokens and positions the cursor AFTER the last found token.
- [TokenArrayIteratorTool::skipWhiteSpacesOrComma](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipWhiteSpacesOrComma.md) &ndash; Skips whitespaces and commas, and positions the cursor AFTER the last whitespace or comma.
- [TokenArrayIteratorTool::skipUntil](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipUntil.md) &ndash; Iterates the given tokenArrayIterator until it finds the given tokenProp.





Location
=============
Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool<br>
See the source code of [Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool](https://github.com/lingtalfi/TokenFun/blob/master/TokenArrayIterator/Tool/TokenArrayIteratorTool.php)



SeeAlso
==============
Previous class: [TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md)<br>Next class: [ArrayReferenceTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/ArrayReferenceTokenFinder.md)<br>
