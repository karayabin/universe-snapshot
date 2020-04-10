[Back to the Ling/Panda_Headers api](https://github.com/lingtalfi/Panda_Headers/blob/master/doc/api/Ling/Panda_Headers.md)



The Panda_Headers_Tool class
================
2020-04-06 --> 2020-04-06






Introduction
============

The Panda_Headers_Tool class.



Class synopsis
==============


class <span class="pl-k">Panda_Headers_Tool</span>  {

- Methods
    - public static [addHeaders](https://github.com/lingtalfi/Panda_Headers/blob/master/doc/api/Ling/Panda_Headers/Panda_Headers_Tool/addHeaders.md)(array $headers) : void
    - public static [attachHeaders](https://github.com/lingtalfi/Panda_Headers/blob/master/doc/api/Ling/Panda_Headers/Panda_Headers_Tool/attachHeaders.md)(array $headers, Ling\Light\Http\HttpResponseInterface $response) : void
    - private static [addOrAttachHeaders](https://github.com/lingtalfi/Panda_Headers/blob/master/doc/api/Ling/Panda_Headers/Panda_Headers_Tool/addOrAttachHeaders.md)(array $headers, ?Ling\Light\Http\HttpResponseInterface $response = null) : void
    - private static [escapeCommas](https://github.com/lingtalfi/Panda_Headers/blob/master/doc/api/Ling/Panda_Headers/Panda_Headers_Tool/escapeCommas.md)(string $string) : string

}






Methods
==============

- [Panda_Headers_Tool::addHeaders](https://github.com/lingtalfi/Panda_Headers/blob/master/doc/api/Ling/Panda_Headers/Panda_Headers_Tool/addHeaders.md) &ndash; Adds [panda headers](https://github.com/lingtalfi/TheBar/blob/master/discussions/panda-headers-protocol.md) to the http response.
- [Panda_Headers_Tool::attachHeaders](https://github.com/lingtalfi/Panda_Headers/blob/master/doc/api/Ling/Panda_Headers/Panda_Headers_Tool/attachHeaders.md) &ndash; Attaches [panda headers](https://github.com/lingtalfi/TheBar/blob/master/discussions/panda-headers-protocol.md) to the given http response.
- [Panda_Headers_Tool::addOrAttachHeaders](https://github.com/lingtalfi/Panda_Headers/blob/master/doc/api/Ling/Panda_Headers/Panda_Headers_Tool/addOrAttachHeaders.md) &ndash; Adds or attaches [panda headers](https://github.com/lingtalfi/TheBar/blob/master/discussions/panda-headers-protocol.md) to the http response.
- [Panda_Headers_Tool::escapeCommas](https://github.com/lingtalfi/Panda_Headers/blob/master/doc/api/Ling/Panda_Headers/Panda_Headers_Tool/escapeCommas.md) &ndash; Transforms the commas in the given string into __panda_comma__, and returns the transformed string.





Location
=============
Ling\Panda_Headers\Panda_Headers_Tool<br>
See the source code of [Ling\Panda_Headers\Panda_Headers_Tool](https://github.com/lingtalfi/Panda_Headers/blob/master/Panda_Headers_Tool.php)



