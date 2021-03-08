[Back to the Ling/Kwin api](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin.md)



The MiniMarkdownToBashtmlTranslator class
================
2021-02-18 --> 2021-03-05






Introduction
============

The MiniMarkdownToBashtmlTranslator class.



Class synopsis
==============


class <span class="pl-k">MiniMarkdownToBashtmlTranslator</span>  {

- Methods
    - public static [convertString](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Helper/MiniMarkdownToBashtmlTranslator/convertString.md)(string $string, ?array $options = []) : string
    - public static [convertArray](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Helper/MiniMarkdownToBashtmlTranslator/convertArray.md)(array $arr, ?array $options = []) : array
    - private static [convertArrayRecursive](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Helper/MiniMarkdownToBashtmlTranslator/convertArrayRecursive.md)(array $arr, array &$ret, ?array $options = []) : void

}






Methods
==============

- [MiniMarkdownToBashtmlTranslator::convertString](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Helper/MiniMarkdownToBashtmlTranslator/convertString.md) &ndash; Converts a [mini-markdown](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#mini-markdown) string to its [bashtml](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md) equivalent.
- [MiniMarkdownToBashtmlTranslator::convertArray](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Helper/MiniMarkdownToBashtmlTranslator/convertArray.md) &ndash; Converts the [mini-markdown](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#mini-markdown)) to [bashtml](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md) in the given array, and returns the result.
- [MiniMarkdownToBashtmlTranslator::convertArrayRecursive](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Helper/MiniMarkdownToBashtmlTranslator/convertArrayRecursive.md) &ndash; Converts the mini-markdown to bashtml in the given array, and place it in the given $ret variable.





Location
=============
Ling\Kwin\Helper\MiniMarkdownToBashtmlTranslator<br>
See the source code of [Ling\Kwin\Helper\MiniMarkdownToBashtmlTranslator](https://github.com/lingtalfi/Kwin/blob/master/Helper/MiniMarkdownToBashtmlTranslator.php)



SeeAlso
==============
Previous class: [KwinException](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Exception/KwinException.md)<br>Next class: [KwinParser](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser.md)<br>
