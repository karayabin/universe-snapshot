[Back to the Ling/Kwin api](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin.md)<br>
[Back to the Ling\Kwin\Helper\MiniMarkdownToBashtmlTranslator class](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Helper/MiniMarkdownToBashtmlTranslator.md)


MiniMarkdownToBashtmlTranslator::convertArray
================



MiniMarkdownToBashtmlTranslator::convertArray — Converts the [mini-markdown](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#mini-markdown)) to [bashtml](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md) in the given array, and returns the result.




Description
================


public static [MiniMarkdownToBashtmlTranslator::convertArray](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Helper/MiniMarkdownToBashtmlTranslator/convertArray.md)(array $arr, ?array $options = []) : array




Converts the [mini-markdown](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#mini-markdown)) to [bashtml](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md) in the given array, and returns the result.
Both the keys and the values are translated.

Available options are:
- fmtText: string=green, the bashtml format to use for the text part of a link
- fmtUrl: string=blue, the bashtml format to use for the url part of a link




Parameters
================


- arr

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [MiniMarkdownToBashtmlTranslator::convertArray](https://github.com/lingtalfi/Kwin/blob/master/Helper/MiniMarkdownToBashtmlTranslator.php#L63-L68)


See Also
================

The [MiniMarkdownToBashtmlTranslator](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Helper/MiniMarkdownToBashtmlTranslator.md) class.

Previous method: [convertString](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Helper/MiniMarkdownToBashtmlTranslator/convertString.md)<br>Next method: [convertArrayRecursive](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Helper/MiniMarkdownToBashtmlTranslator/convertArrayRecursive.md)<br>

