Ling/JumboExploder
================
2020-06-09 --> 2021-04-06




Table of contents
===========

- [JumboExploderException](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Exception/JumboExploderException.md) &ndash; The JumboExploderException class.
- [JumboExploderCharIterator](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator.md) &ndash; The JumboExploderCharIterator class.
    - [JumboExploderCharIterator::__construct](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/__construct.md) &ndash; Builds the JumboExploderCharIterator instance.
    - [JumboExploderCharIterator::setString](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/setString.md) &ndash; Sets the string to parse.
    - [JumboExploderCharIterator::next](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/next.md) &ndash; Moves the index forward and returns the corresponding character.
    - [JumboExploderCharIterator::lookahead](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/lookahead.md) &ndash; Returns the trimmed substring from the current index to the (current index + length).
- [JumboExploder](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/JumboExploder.md) &ndash; The JumboExploder class.
    - [JumboExploder::explode](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/JumboExploder/explode.md) &ndash; Parses the given string, and returns an array of strings delimited by the given delimiter.
- [JumboExploderScope](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Scope/JumboExploderScope.md) &ndash; The JumboExploderScope class.
    - [JumboExploderScope::__construct](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Scope/JumboExploderScope/__construct.md) &ndash; Builds the JumboExploderScope instance.
    - [JumboExploderScope::create](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Scope/JumboExploderScope/create.md) &ndash; Creates an instance of this class and returns it.
    - [JumboExploderScope::setStartExpression](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Scope/JumboExploderScope/setStartExpression.md) &ndash; Sets the start expression of the scope, and returns the current instance.
    - [JumboExploderScope::setEndExpression](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Scope/JumboExploderScope/setEndExpression.md) &ndash; Sets the end expression of the scope, and returns the current instance.
    - [JumboExploderScope::setEscapeChar](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Scope/JumboExploderScope/setEscapeChar.md) &ndash; Sets the escape char of the scope, and returns the current instance.
    - [JumboExploderScope::getStartExpression](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Scope/JumboExploderScope/getStartExpression.md) &ndash; Returns the startExpression of this instance.
    - [JumboExploderScope::getEndExpression](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Scope/JumboExploderScope/getEndExpression.md) &ndash; Returns the endExpression of this instance.
    - [JumboExploderScope::getEscapeChar](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Scope/JumboExploderScope/getEscapeChar.md) &ndash; Returns the escapeChar of this instance.


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)


