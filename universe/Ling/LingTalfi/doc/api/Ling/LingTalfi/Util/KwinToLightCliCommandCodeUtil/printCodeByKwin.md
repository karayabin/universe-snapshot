[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\Util\KwinToLightCliCommandCodeUtil class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/KwinToLightCliCommandCodeUtil.md)


KwinToLightCliCommandCodeUtil::printCodeByKwin
================



KwinToLightCliCommandCodeUtil::printCodeByKwin — Prints the php code corresponding to the given kwin string.




Description
================


public [KwinToLightCliCommandCodeUtil::printCodeByKwin](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/KwinToLightCliCommandCodeUtil/printCodeByKwin.md)(string $str, ?array $options = []) : void




Prints the php code corresponding to the given kwin string.

Available options are:
- appId: string, the app id to use with aliases. Actually it's mandatory if an alias is described int the given string.
- verbose: bool=false, whether to use a verbose version of the kwin parser.




Parameters
================


- str

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [KwinToLightCliCommandCodeUtil::printCodeByKwin](https://github.com/lingtalfi/LingTalfi/blob/master/Util/KwinToLightCliCommandCodeUtil.php#L30-L267)


See Also
================

The [KwinToLightCliCommandCodeUtil](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/KwinToLightCliCommandCodeUtil.md) class.

Next method: [format](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/KwinToLightCliCommandCodeUtil/format.md)<br>

