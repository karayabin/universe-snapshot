[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)<br>
[Back to the Ling\SicTools\ColdServiceResolver class](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md)


ColdServiceResolver::encode
================



ColdServiceResolver::encode — Encodes an expression to be interpreted as raw php.




Description
================


protected [ColdServiceResolver::encode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/encode.md)($expression) : string




Encodes an expression to be interpreted as raw php.

You can use to create:

- variables ($s1, $myVar = 9;, ...)
- or even call methods ($this->getService("myService"), ...)




The encoding serves the purpose of solving internal problems that I had with this implementation.
Namely, the ArrayToStringTool::toInlinePhpArray method that I use in the argsToString method returns an
inline version of a php array, but the variable is interpreted as a string, whereas I need it to be interpreted
as a raw php variable:

$inline_result_by_default = ['$s1'];

$what_i_want = [$s1];

So that it can be interpreted directly as php.
So, the encoding/decoding system allows me to "unquote" the variable name (and by extension any php expression
so that it gets interpreted as php code when the code is read.




Parameters
================


- expression

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [ColdServiceResolver::encode](https://github.com/lingtalfi/SicTools/blob/master/ColdServiceResolver.php#L340-L343)


See Also
================

The [ColdServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver.md) class.

Previous method: [addCodeBlock](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/addCodeBlock.md)<br>Next method: [decode](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/ColdServiceResolver/decode.md)<br>

