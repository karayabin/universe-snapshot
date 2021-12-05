[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)



The TokenTool class
================
2020-07-28 --> 2021-08-16






Introduction
============

The TokenTool class.

See the [tokenProp definition](https://github.com/lingtalfi/TokenFun/blob/master/doc/pages/conception-notes.md#tokenprop) for more details.



Class synopsis
==============


class <span class="pl-k">TokenTool</span>  {

- Methods
    - public static [explicitTokenNames](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/explicitTokenNames.md)(array $tokens) : array
    - public static [explodeTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/explodeTokens.md)($symbol, array $tokens, ?$limit = null) : array
    - public static [fetch](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/fetch.md)(array $tokens, $tokenProp) : mixed | false
    - public static [fetchAll](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/fetchAll.md)(array $tokens, $tokenProp) : array
    - public static [getStartEndLineByTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/getStartEndLineByTokens.md)(array $tokens) : array
    - public static [ltrim](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/ltrim.md)(array $tokens, ?array $chars = null) : array
    - public static [match](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/match.md)($tokenProp, $token) : bool
    - public static [matchAny](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/matchAny.md)($tokenProp, array $tokens) : bool
    - public static [rtrim](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/rtrim.md)(array $tokens, ?array $chars = null) : array
    - public static [slice](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/slice.md)(array $tokens, int $startIndex, int $endIndex) : array
    - public static [tokensToString](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/tokensToString.md)(array $tokens) : string
    - public static [trim](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/trim.md)(array $tokens, ?array $chars = null) : array

}






Methods
==============

- [TokenTool::explicitTokenNames](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/explicitTokenNames.md) &ndash; Returns an array containing whole the given tokens, but with token ids replaced with explicit names.
- [TokenTool::explodeTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/explodeTokens.md) &ndash; Explodes the tokens using the given symbol as the separator.
- [TokenTool::fetch](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/fetch.md) &ndash; Returns the first token matching the given [tokenProp definition](https://github.com/lingtalfi/TokenFun/blob/master/doc/pages/conception-notes.md#tokenprop), or false if none of them matches.
- [TokenTool::fetchAll](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/fetchAll.md) &ndash; Returns an array of all given tokens matching the given tokenProp definition.
- [TokenTool::getStartEndLineByTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/getStartEndLineByTokens.md) &ndash; Returns an array: [startLine, endLine] containing the line numbers at which the given tokens start and end.
- [TokenTool::ltrim](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/ltrim.md) &ndash; Strip whitespace (or other characters) from the beginning of a string, and returns the array representing the trimmed tokens.
- [TokenTool::match](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/match.md) &ndash; Returns whether the given token matches the given tokenProp.
- [TokenTool::matchAny](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/matchAny.md) &ndash; Returns whether any of the given tokens matches the given tokenProp.
- [TokenTool::rtrim](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/rtrim.md) &ndash; Strip whitespace (or other characters) from the end of a string, and returns an array representing the trimmed tokens.
- [TokenTool::slice](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/slice.md) &ndash; Returns the array slice of the given tokens, which starts and ends at the given indices.
- [TokenTool::tokensToString](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/tokensToString.md) &ndash; Returns the string version of the given tokens.
- [TokenTool::trim](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/trim.md) &ndash; Strip whitespace (or other characters) from the beginning and end of a string, and returns an array representing the trimmed tokens.





Location
=============
Ling\TokenFun\Tool\TokenTool<br>
See the source code of [Ling\TokenFun\Tool\TokenTool](https://github.com/lingtalfi/TokenFun/blob/master/Tool/TokenTool.php)



SeeAlso
==============
Previous class: [VariableAssignmentTokenFinder](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/VariableAssignmentTokenFinder.md)<br>
