[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)



The HotServiceResolver class
================
2019-04-25 --> 2021-05-31






Introduction
============

The HotServiceResolver class helps creating a hot service container: a service container which resolves services
on the fly from a stored sic notation.



Note: the callable feature of the sic notation is not used (because services are not callables but instances).



Class synopsis
==============


class <span class="pl-k">HotServiceResolver</span>  {

- Properties
    - private string [$passKey](#property-passKey) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/__construct.md)() : void
    - public [getService](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/getService.md)(array $sicBlock) : false | object | array
    - protected [resolveCustomNotation](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/resolveCustomNotation.md)($value, ?&$isCustomNotation = false) : mixed
    - private [resolveArgs](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/resolveArgs.md)(array $args) : array

}




Properties
=============

- <span id="property-passKey"><b>passKey</b></span>

    This property holds the pass key.
    See sic notation for more info.
    
    



Methods
==============

- [HotServiceResolver::__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/__construct.md) &ndash; Builds the HotServiceResolver instance.
- [HotServiceResolver::getService](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/getService.md) &ndash; Returns the service (an instance of a class) defined in the given sic block.
- [HotServiceResolver::resolveCustomNotation](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/resolveCustomNotation.md) &ndash; Parses the given value as a custom notation and returns the interpreted result.
- [HotServiceResolver::resolveArgs](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/HotServiceResolver/resolveArgs.md) &ndash; Returns the given $args array, but with services resolved (based on the sic notation).





Location
=============
Ling\SicTools\HotServiceResolver<br>
See the source code of [Ling\SicTools\HotServiceResolver](https://github.com/lingtalfi/SicTools/blob/master/HotServiceResolver.php)



SeeAlso
==============
Previous class: [SicToolsException](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Exception/SicToolsException.md)<br>Next class: [SicTool](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/SicTool.md)<br>
