[Back to the Ling/KrankenStein api](https://github.com/lingtalfi/KrankenStein/blob/master/doc/api/Ling/KrankenStein.md)



The KrankenSteinTool class
================
2019-04-02 --> 2019-07-18






Introduction
============

The KrankenSteinTool class.



Class synopsis
==============


class <span class="pl-k">KrankenSteinTool</span>  {

- Properties
    - private static string [$oneShotReg](#property-oneShotReg) = !^([a-zA-Z0-9_\\]+)(::|->)([a-zA-Z0-9_]+)\((.*)\)$! ;

- Methods
    - public static [isOneShot](https://github.com/lingtalfi/KrankenStein/blob/master/doc/api/Ling/KrankenStein/KrankenSteinTool/isOneShot.md)(string $str) : bool
    - public static [executeOneShot](https://github.com/lingtalfi/KrankenStein/blob/master/doc/api/Ling/KrankenStein/KrankenSteinTool/executeOneShot.md)(string $str, bool &$isOneShotString = false) : mixed
    - public static [getArgsFromArgString](https://github.com/lingtalfi/KrankenStein/blob/master/doc/api/Ling/KrankenStein/KrankenSteinTool/getArgsFromArgString.md)(string $argString) : array

}




Properties
=============

- <span id="property-oneShotReg"><b>oneShotReg</b></span>

    This property holds the oneShot regex used by this class.
    
    



Methods
==============

- [KrankenSteinTool::isOneShot](https://github.com/lingtalfi/KrankenStein/blob/master/doc/api/Ling/KrankenStein/KrankenSteinTool/isOneShot.md) &ndash; Returns whether the given string is [one shot](https://github.com/lingtalfi/KrankenStein/blob/master/README.md#one-shot-notation) or not.
- [KrankenSteinTool::executeOneShot](https://github.com/lingtalfi/KrankenStein/blob/master/doc/api/Ling/KrankenStein/KrankenSteinTool/executeOneShot.md) &ndash; Executes the given [one shot](https://github.com/lingtalfi/KrankenStein/blob/master/README.md#one-shot-notation) string and returns the result.
- [KrankenSteinTool::getArgsFromArgString](https://github.com/lingtalfi/KrankenStein/blob/master/doc/api/Ling/KrankenStein/KrankenSteinTool/getArgsFromArgString.md) &ndash; Returns the array of arguments corresponding to the given $argString.





Location
=============
Ling\KrankenStein\KrankenSteinTool<br>
See the source code of [Ling\KrankenStein\KrankenSteinTool](https://github.com/lingtalfi/KrankenStein/blob/master/KrankenSteinTool.php)



SeeAlso
==============
Previous class: [KrankenSteinException](https://github.com/lingtalfi/KrankenStein/blob/master/doc/api/Ling/KrankenStein/Exception/KrankenSteinException.md)<br>
